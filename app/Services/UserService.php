<?php

namespace App\Services;

use App\Models\User;
use App\Models\Order;
use App\Models\Wishlist;
use App\Models\BundleReview;
use App\Models\ProductReview;
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
        $orders = Order::where('user_id', auth()->id())->where('payment_status', 'paid');
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

    public function getOrder($id)
    {
        $order = Order::with('items.product')->where('user_id', auth()->id())->find($id);
        if (!$order) {
            throw new \Exception('Order not found');
        }
        return $order;
    }

    //account
    public function getUser()
    {
        return User::with('orders')->where('id', auth()->id())->first();
    }

    public function updateAccount($request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048', // 2MB max, image only
        ]);

        $user = User::findOrFail(auth()->id());
        $user->name = $validated['name'];
        $user->phone = $validated['phone'] ?? $user->phone;
        $user->address = $validated['address'] ?? $user->address;

        if ($request->hasFile('profile_image')) {
            if ($user->profile_image && file_exists(public_path($user->profile_image))) {
                unlink(public_path($user->profile_image));
            }
            // Upload new image
            $image = $request->file('profile_image');
            $imageName = time() . '_' . preg_replace('/\s+/', '_', $image->getClientOriginalName());
            $image->move(public_path('uploads/users'), $imageName);
            $user->profile_image = 'uploads/users/' . $imageName;
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

    //wishlist
    public function removeWishlist($id)
    {
        $wishlist = Wishlist::where('id', $id)->where('user_id', auth()->id())->first();
        if (!$wishlist) {
            return redirect()->route('user.wishlist')->with('error', 'Wishlist not found');
        }
        $wishlist->delete();
        return redirect()->route('user.wishlist')->with('success', 'Wishlist removed successfully');
    }
    //end wishlist

    public function addToWishlist($request)
    {
        $wishlist = Wishlist::where('user_id', auth()->id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($wishlist) {
            return [
                'message' => 'Product already in wishlist.',
                'status' => false,
            ];
        }

        Wishlist::create([
            'user_id' => auth()->id(),
            'product_id' => $request->product_id,
        ]);

        return [
            'message' => 'Product added to wishlist successfully.',
            'status' => true,
        ];
    }

    public function productReviewStore(array $data)
    {
        $review = ProductReview::create([
            'product_id' => $data['product_id'],
            'user_id' => Auth::id(),
            'rating' => $data['rating'],
            'review' => $data['review'],
        ]);

        return [
            'message' => 'Review submitted successfully.',
            'review' => $review,
            'status' => true,
        ];
    }

    public function bundleReviewStore(array $data)
    {
        $review = BundleReview::create([
            'bundle_id' => $data['bundle_id'],
            'user_id' => Auth::id(),
            'rating' => $data['rating'],
            'review' => $data['review'],
        ]);

        return [
            'message' => 'Review submitted successfully.',
            'review' => $review,
            'status' => true,
        ];
    }

}
