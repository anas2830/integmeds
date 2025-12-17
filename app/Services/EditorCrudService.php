<?php

namespace App\Services;

use App\Models\Editor;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class EditorCrudService
{

    public function login($request)
    {
        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);
        // $credentials = $request->only('email', 'password');
        // if (auth()->guard('editor')->attempt($credentials, $request->remember)) {
        //     return redirect()->route('dashboard');
        // }
        // return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function logout($request)
    {
        // Auth::guard('editor')->logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        // return redirect('/editor/login');
    }

    public function showEditorProfile()
    {
        // $authId = Auth::guard('editor')->user()->id;
        // $data['editor'] = $editor = Editor::where('id', $authId)->first();
        // $data['existingFilesArray'] = [];
        // if ($editor->file_name) {
        //     $data['existingFilesArray'] = [
        //         [
        //             'full_path' => url($editor->file_name),
        //             'name' => $editor->file_original_name,
        //             'size' => $editor->file_size,
        //             'path' => $editor->file_name
        //         ],
        //     ];
        // }
        // return $data;
    }

    public function editorProfileUpdate($request)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'editor_password' => 'nullable|min:8',
        //     'editor_confirm_password' => 'nullable|same:editor_password',
        // ]);
        // $editor = Editor::findOrFail($request->id);
        // $editor->name =  $request->name ?? NULL;
        // if ($request->filled('editor_password')) {
        //     $editor->password = Hash::make($request->input('editor_password'));
        // }
        // if ($request->profile_image) {
        //     $fileUploadService = new FileUploadService();
        //     $newDirectory = 'uploads/editors';
        //     $fileData = $fileUploadService->handleFileUpload($request->profile_image, 'temp/' . $request->profile_image, $newDirectory);
        //     $fullpath = $fileData['fullPath'] ?? NULL;
        //     $fileOriginalName = $fileData['originalName'] ?? NULL;
        //     $fileSize = $fileData['size'] ?? NULL;
        //     $fileExtension = $fileData['extension'] ?? NULL;
        //     $editor->file_name = $fullpath;
        //     $editor->file_original_name = $fileOriginalName;
        //     $editor->file_size = $fileSize;
        //     $editor->file_extention = $fileExtension;
        // }
        // if ($request->filled('files_to_delete')) {
        //     $filePath = public_path($request->files_to_delete);
        //     if (File::exists($filePath)) {
        //         File::delete($filePath);
        //     }
        // }
        // $editor->save();
        // return redirect()->route('editor.profile')->with('success', 'Profile updated successfully!');
    }
}
