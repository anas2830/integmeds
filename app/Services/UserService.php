<?php

namespace App\Services;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $orders = Order::where('user_id', auth()->id())->latest('id');
        if ($request->has('search')) {
            $orders->where('order_number', 'like', '%' . $request->search . '%');
        }
        if ($request->has('status')) {
            $orders->where('order_status', $request->status);
        }
        if ($request->has('sort')) {
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



    // public function  showAdminProfile()
    // {
    //     $authUser = Auth::guard('admin')->user()->id;
    //     $data['admin'] = $admin = Admin::where('id', $authUser)->first();
    //     $data['existingFilesArray'] = [];
    //     if ($admin->file_name) {
    //         $data['existingFilesArray'] = [
    //             [
    //                 'full_path' => url($admin->file_name),
    //                 'name' => $admin->file_original_name,
    //                 'size' => $admin->file_size,
    //                 'path' => $admin->file_name
    //             ],
    //         ];
    //     }
    //     return $data;
    // }

    // public function profileUpdate($request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'admin_password' => 'nullable|min:8',
    //         'admin_confirm_password' => 'nullable|same:admin_password',
    //     ]);
    //     $admin = Admin::findOrFail($request->id);
    //     $admin->name =  $request->name ?? NULL;

    //     if ($request->filled('admin_password')) {
    //         $admin->password = Hash::make($request->input('admin_password'));
    //     }
    //     if ($request->profile_image) {
    //         $fileUploadService = new FileUploadService();
    //         $newDirectory = 'uploads/admins';
    //         $fileData = $fileUploadService->handleFileUpload($request->profile_image, 'temp/' . $request->profile_image, $newDirectory);
    //         $fullpath = $fileData['fullPath'] ?? NULL;
    //         $fileOriginalName = $fileData['originalName'] ?? NULL;
    //         $fileSize = $fileData['size'] ?? NULL;
    //         $fileExtension = $fileData['extension'] ?? NULL;
    //         $admin->file_name = $fullpath;
    //         $admin->file_original_name = $fileOriginalName;
    //         $admin->file_size = $fileSize;
    //         $admin->file_extention = $fileExtension;
    //     }
    //     if ($request->filled('files_to_delete')) {
    //         $filePath = public_path($request->files_to_delete);
    //         if (File::exists($filePath)) {
    //             File::delete($filePath);
    //         }
    //     }
    //     $admin->save();
    //     return redirect()->route('admin.profile')->with('success', 'Profile updated successfully!');
    // }
}
