<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FileUploadService
{

    public function handleFileUpload($file, $tempPath, $newDirectory)
    {

        $fullPath = null;
        $fileOriginalName = null;
        $fileSize = null;
        $fileExtension = null;

        if (Storage::disk('public')->exists($tempPath)) {
            // Create directory if it doesn't exist
            if (!File::exists($newDirectory)) {
                File::makeDirectory($newDirectory, 0755, true);
            }
            $fullPath = $newDirectory . '/' . basename($file);
            File::move(storage_path('app/public/' . $tempPath), public_path($fullPath));

            // Retrieve additional file information
            $fileOriginalName = pathinfo($file, PATHINFO_FILENAME);
            $fileNameWithTimestamp = basename($file);
            $fileOriginalName = substr($fileNameWithTimestamp, strpos($fileNameWithTimestamp, '__') + 2);
            $fileExtension = pathinfo($file, PATHINFO_EXTENSION);
            $fileSize = File::size(public_path($fullPath));
        }

        return [
            'fullPath' => $fullPath,
            'originalName' => $fileOriginalName,
            'size' => $fileSize,
            'extension' => $fileExtension,
        ];
    }
}
