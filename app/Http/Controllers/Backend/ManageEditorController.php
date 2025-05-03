<?php

namespace App\Http\Controllers\Backend;

use App\Models\Editor;
use Illuminate\Http\Request;
use App\Services\FileUploadService;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditorRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ManageEditorController extends Controller
{
    protected $fileUploadService;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['search'] = $search = $request->input('search');
        $data['sortBy'] = $sortBy = $request->input('sort_by', 'id');
        $data['sortDirection'] = $sortDirection = $request->input('sort_direction', 'desc');
        $data['all_editors'] = Editor::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            })
            ->orderBy($sortBy, $sortDirection)
            ->paginate(10);

        return view('Backend.admin.manage-editor.list', $data);
    }

    public function create()
    {
        return view('Backend.admin.manage-editor.create');
    }

    public function store(EditorRequest $request)
    {
        $validatedData = $request->validated();
        $fullpath = null;
        $fileOriginalName = null;
        $fileSize = null;
        $fileExtension = null;

        if ($request->profile_image) {
            $tempPath = 'temp/' . $request->profile_image;
            $newDirectory = 'uploads/editors';
            // Call the file upload service
            $fileUploadData = $this->fileUploadService->handleFileUpload($request->profile_image, $tempPath, $newDirectory);
            // Assign values from the service response
            $fullpath = $fileUploadData['fullPath'];
            $fileOriginalName = $fileUploadData['originalName'];
            $fileSize = $fileUploadData['size'];
            $fileExtension = $fileUploadData['extension'];
        }
        Editor::create([
            'name' => $validatedData['editor_name'] ?? NULL,
            'email' => $validatedData['editor_email'] ?? NULL,
            'status' => $request->editor_status ?? 0,
            'password' => Hash::make($validatedData['editor_password']),
            'file_name' => $fullpath,
            'file_original_name' => $fileOriginalName,
            'file_size' => $fileSize,
            'file_extention' => $fileExtension,
        ]);
        return redirect()->back()->with('success', 'Editor created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['editor'] = $editor = Editor::find($id);
        $data['existingFilesArray'] = [];
        if ($editor->file_name) {
            $data['existingFilesArray'] = [
                [
                    'full_path' => url($editor->file_name),
                    'name' => $editor->file_original_name,
                    'size' => $editor->file_size,
                    'path' => $editor->file_name
                ],
            ];
        }
        return view('Backend.admin.manage-editor.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditorRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $editor = Editor::findOrFail($id);
        $editor->name =  $validatedData['editor_name'] ?? NULL;
        $editor->email = $validatedData['editor_email'] ?? NULL;
        $editor->status = $validatedData['editor_status'] ?? 0;
        if ($request->filled('editor_password')) {
            $editor->password = Hash::make($request->input('editor_password'));
        }
        if ($request->filled('profile_image')) {
            $newDirectory = 'uploads/editors';
            $fileData = $this->fileUploadService->handleFileUpload($request->profile_image, 'temp/' . $request->profile_image, $newDirectory);
            $fullpath = $fileData['fullPath'] ?? NULL;
            $fileOriginalName = $fileData['originalName'] ?? NULL;
            $fileSize = $fileData['size'] ?? NULL;
            $fileExtension = $fileData['extension'] ?? NULL;
            $editor->file_name = $fullpath;
            $editor->file_original_name = $fileOriginalName;
            $editor->file_size = $fileSize;
            $editor->file_extention = $fileExtension;
        }
        if ($request->filled('files_to_delete')) {
            $filePath = public_path($request->files_to_delete);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }
        $editor->save();
        return redirect()->back()->with('success', 'editor updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $editor = Editor::findOrFail($id);
        if ($editor->file_name) {
            $filePath = public_path($editor->file_name);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }
        $editor->delete();
        return redirect()->route('manage-editor.index')->with('success', 'Editor deleted successfully!');
    }
}
