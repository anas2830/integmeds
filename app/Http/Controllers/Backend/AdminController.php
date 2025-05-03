<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Services\FileUploadService;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;


class AdminController extends Controller
{
    protected $fileUploadService;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }


    public function dashboard()
    {
        $data = [];
        return view('Backend.dashboard', $data);
    }

    public function showLoginForm()
    {
        return view('Backend.admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (auth()->guard('admin')->attempt($credentials, $request->remember)) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function  logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function showAdminProfile()
    {
        $authUser = Auth::guard('admin')->user()->id;
        $data['admin'] = $admin = Admin::where('id', $authUser)->first();
        $data['existingFilesArray'] = [];
        if ($admin->file_name) {
            $data['existingFilesArray'] = [
                [
                    'full_path' => url($admin->file_name),
                    'name' => $admin->file_original_name,
                    'size' => $admin->file_size,
                    'path' => $admin->file_name
                ],
            ];
        }
        return view('Backend.admin.profile', $data);
    }

    public function profileUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'admin_password' => 'nullable|min:8',
            'admin_confirm_password' => 'nullable|same:admin_password',
        ]);
        $admin = Admin::findOrFail($request->id);
        $admin->name =  $request->name ?? NULL;

        if ($request->filled('admin_password')) {
            $admin->password = Hash::make($request->input('admin_password'));
        }
        if ($request->profile_image) {
            $newDirectory = 'uploads/admins';
            $fileData = $this->fileUploadService->handleFileUpload($request->profile_image, 'temp/' . $request->profile_image, $newDirectory);
            $fullpath = $fileData['fullPath'] ?? NULL;
            $fileOriginalName = $fileData['originalName'] ?? NULL;
            $fileSize = $fileData['size'] ?? NULL;
            $fileExtension = $fileData['extension'] ?? NULL;
            $admin->file_name = $fullpath;
            $admin->file_original_name = $fileOriginalName;
            $admin->file_size = $fileSize;
            $admin->file_extention = $fileExtension;
        }
        if ($request->filled('files_to_delete')) {
            $filePath = public_path($request->files_to_delete);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }
        $admin->save();
        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully!');
    }
}
