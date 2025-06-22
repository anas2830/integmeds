<?php

namespace App\Services;

use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserService
{
    public function login($request)
    {
        $request->validate([
            'email' => 'required|email|max:100',
            'password' => 'required|string|min:8|max:50',
        ]);
        $credentials = $request->only('email', 'password');
        if (auth()->guard()->attempt($credentials, $request->remember)) {
            return redirect()->route('user.dashboard');
        }
        return back()
            ->withInput($request->only('email', 'remember'))
            ->withErrors(['email' => 'Invalid credentials.']);
    }

    public function logout($request)
    {
        Auth::guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return to_route('user.login');
    }

    public  function register($request){
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:users,email',
            'password' => 'required|string|min:8|max:50|confirmed',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Auth::login($user);
        return redirect()->route('user.dashboard');
    }

    //orders
    public function getOrders($request)
    {
        $orders = Order::where('user_id', auth()->id());
        if ($request->filled('search')) {
            $orders->where('order_number', 'like', '%' . $request->search . '%');
        }
        if ($request->filled('status')) {
            $orders->where('order_status', $request->status);
        }
        if ($request->filled('sort')) {
            if ($request->sort == 'oldest') {
                $orders->orderBy('id', 'asc');
            } else if ($request->sort == 'newest') {
                $orders->orderBy('id', 'desc');
            } else if ($request->sort == 'price_low_to_high') {
                $orders->orderBy('total_amount', 'asc');
            } else if ($request->sort == 'price_high_to_low') {
                $orders->orderBy('total_amount', 'desc');
            }
        }
        $orders = $orders->paginate(10);
        return $orders;
    }

    //account
    public function getUser()
    {
        return User::where('id', auth()->id())->first();
    }

    public function updateAccount($request)
    {
        if ($request->hasFile('profile_image')) {
            $fileSize = $request->file('profile_image')->getSize();
            $maxSize = 2 * 1024 * 1024;
            if ($fileSize > $maxSize) {
                return redirect()->route('user.account')->with('error', 'Profile image must be less than 2MB');
            }
        }

        $user = User::where('id', auth()->id())->first();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        if ($request->hasFile('profile_image')) {
            if ($user->profile_image && file_exists(public_path($user->profile_image))) {
                unlink(public_path($user->profile_image));
            }
            $image = $request->file('profile_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/users'), $imageName);
            $fullpath = 'uploads/users/' . $imageName;
            $user->profile_image = $fullpath;
        }
        $user->save();
        return redirect()->route('user.account')->with('success', 'Account updated successfully!');
    }
    //end account



    //address
    public function updateBillingAddress($request)
    {
        $user = User::where('id', auth()->id())->first();
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'address_line1' => $request->address_line1,
            'address_line2' => $request->address_line2,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
        ];
        $user->billing_address = json_encode($data);
        $user->save();
        return redirect()->route('user.billing-address')->with('success', 'Billing address updated successfully');
    }

    public function updateShippingAddress($request)
    {
        $user = User::where('id', auth()->id())->first();
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'address_line1' => $request->address_line1,
            'address_line2' => $request->address_line2,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
        ];
        $user->shipping_address = json_encode($data);
        $user->save();
        return redirect()->route('user.shipping-address')->with('success', 'Shipping address updated successfully');
    }
    //end address


    //change password
    public function changePassword($request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required|string|min:8|max:50',
            'new_password' => 'required|string|min:8|max:50',
            'confirm_password' => 'required|string|min:8|max:50|same:new_password',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::where('id', auth()->id())->first();
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->route('user.change-password')->with('error', 'Current password is incorrect');
        }
        $user->password = Hash::make($request->new_password);
        $user->save();
        return redirect()->route('user.change-password')->with('success', 'Password updated successfully');
    }
    //end change password


}
