<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function temporaryUpload(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '__' . $file->getClientOriginalName();
            $file->storeAs('temp', $filename, 'public');

            return response()->json(['file' => $filename]);
        }

        return response()->json(['error' => 'File not uploaded'], 400);
    }

    public function deleteTempFile(Request $request)
    {
        $fileName = $request->input('file');
        $tempFilePath = storage_path('app/public/temp/' . $fileName); // Adjust path for public storage

        // Check if the temp file exists and delete it
        if (file_exists($tempFilePath)) {
            unlink($tempFilePath);
            return response()->json(['success' => true]);
        }

        return response()->json(['error' => 'File not found'], 404);
    }
}
