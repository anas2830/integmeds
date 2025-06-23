<?php

namespace App\Services;

use App\Models\HomeSidebarBanner;
use Illuminate\Support\Facades\File;

class HomePageSettingsService {

    public function getHomePageSettingsData()
    {
        $banners = HomeSidebarBanner::orderBy('id')->get()->keyBy('id');
        $data['banners'] = $banners;

        $existingFilesArray = [];

        foreach ([1, 2, 3] as $id) {
            $banner = $banners[$id] ?? null;

            $existingFilesArray[$id] = $banner && $banner->image_path ? [[
                'full_path' => asset($banner->image_path),
                'name'      => $banner->file_original_name ?? basename($banner->image_path),
                'size'      => $banner->file_size ?? 0,
                'path'      => $banner->image_path,
            ]] : [];
        }

        $data['existingFilesArray'] = $existingFilesArray;

        return $data;
    }

    public  function updateHomePageSidebarSettings($request){
        // dd($request->all());
        $updates = [];

        foreach ([1, 2, 3] as $id) {
            $input = $request->input("banner_{$id}");
            if (!$input) continue;

            $banner = HomeSidebarBanner::find($id);
            if (!$banner) continue;

            // Handle image update & deletion (updates $banner properties)
            $fileData = $this->updateBannerImage($banner, $input['image_path'] ?? null, $request->input("filesToDelete_{$id}"));

            // Prepare update data (use file data if present, otherwise keep current banner data)
            $updates[$id] = [
                'title'              => $input['title'] ?? '',
                'short_description'  => $input['short_description'] ?? '',
                'button_text'        => $input['button_text'] ?? '',
                'button_url'         => $input['button_url'] ?? '',
                'image_path'         => $fileData['fullPath'] ?? $banner->image_path,
                'file_original_name' => $fileData['originalName'] ?? $banner->file_original_name,
                'file_size'          => $fileData['size'] ?? $banner->file_size,
                'file_extension'     => $fileData['extension'] ?? $banner->file_extension,
            ];
        }

        // Update all banners in the database
        foreach ($updates as $id => $data) {
            logger("Updating ID $id", $data);
            $affected = HomeSidebarBanner::where('id', $id)->update($data);
            logger("Rows affected: $affected");
        }
    }

    private function updateBannerImage($banner, $newImagePath, $filesToDelete = null)
    {
        // Delete files requested from frontend first
        if (!empty($filesToDelete)) {
            foreach ((array) $filesToDelete as $fileToDelete) {
                $deletePath = public_path($fileToDelete);
                if (File::exists($deletePath)) {
                    File::delete($deletePath);

                    // Clear banner image fields if deleted file was the banner image
                    if ($banner->image_path === $fileToDelete) {
                        $banner->image_path = null;
                        $banner->file_original_name = null;
                        $banner->file_size = null;
                        $banner->file_extension = null;
                        $banner->save();

                        return [
                            'fullPath' => null,
                            'originalName' => null,
                            'size' => null,
                            'extension' => null,
                        ];
                    }
                }
            }
        }


        // Now handle new image upload if given
        if (!empty($newImagePath)) {
            $fileUploadService = new FileUploadService();
            $newDirectory = 'uploads/sidebar-banners';
            $fileData = $fileUploadService->handleFileUpload($newImagePath, 'temp/' . $newImagePath, $newDirectory);
            return [
                'fullPath'       => $fileData['fullPath'] ?? null,
                'originalName'   => $fileData['originalName'] ?? null,
                'size'           => $fileData['size'] ?? null,
                'extension'      => $fileData['extension'] ?? null,
            ];
        }
    }
}