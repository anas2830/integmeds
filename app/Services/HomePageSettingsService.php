<?php

namespace App\Services;

use App\Models\Product;
use App\Models\HomePageBody;
use App\Models\HomeSidebarBanner;
use Illuminate\Support\Facades\File;
use App\Models\HomePageFeaturedProduct;

class HomePageSettingsService {

    public function getHomePageSidebarSettingsData()
    {
        $banners = HomeSidebarBanner::orderBy('id')->get()->keyBy('id');
        $data['banners'] = $banners;

        $existingFilesArray = [];

        foreach ([1, 2, 3] as $id) {
            $banner = $banners[$id] ?? null;

            $existingFilesArray[$id] = $banner && $banner->image_path ? [[
                'full_path' => $banner->image_path,
                'name'      => $banner->file_original_name ,
                'size'      => $banner->file_size ?? 0,
                'path'      => $banner->image_path,
            ]] : [];
        }

        $data['existingFilesArray'] = $existingFilesArray;
        return $data;
    }

    public  function updateHomePageSidebarSettings($request){
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
            foreach ((array) $newImagePath as $image) {
                $newImagePath = $image;
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

    public function getHomePageBodySettingsData()
    {
        $banner = HomePageBody::first() ?? new HomePageBody();
        $products = Product::where('status', 1) ->orderBy('created_at', 'desc')->get();

        $featuredProducts = HomePageFeaturedProduct::take(3)->get();

        // Re-index by 0 or 1 depending on your blade loop (adjust as needed)
        $selectedProducts = [];

        foreach ($featuredProducts as $index => $item) {
            $selectedProducts[$index] = [
                'product_id' => $item->product_id,
                'btn_text'   => $item->btn_text,
                'btn_url'    => $item->btn_url,
            ];
        }

        $existingFilesArray = [

            'banner_1_featured_image' => $banner->banner_1_featured_image ? [
                [
                    'full_path' => $banner->banner_1_featured_image,
                    'name'      => $banner->banner_1_featured_original_name,
                    'size'      => $banner->banner_1_featured_size ?? 0,
                    'path'      => $banner->banner_1_featured_image,
                ]
            ] : [],

            'banner_1_cover_image' => $banner->banner_1_cover_image ? [
                [
                    'full_path' => $banner->banner_1_cover_image,
                    'name'      => $banner->banner_1_cover_original_name,
                    'size'      => $banner->banner_1_cover_size ?? 0,
                    'path'      => $banner->banner_1_cover_image,
                ]
            ] : [],

            'banner_2_image' => $banner->banner_2_image ? [
                [
                    'full_path' => $banner->banner_2_image,
                    'name'      => $banner->banner_2_image_original_name,
                    'size'      => $banner->banner_2_image_size ?? 0,
                    'path'      => $banner->banner_2_image,
                ]
            ] : [],
        ];

        return [
            'banner' => $banner,
            'existingFilesArray' => $existingFilesArray,
            'products' => $products,
            'selectedProducts' => $selectedProducts,
        ];
    }

    public function updateHomePageBodySettings($request)
    {
        $homePage = HomePageBody::firstOrNew();

        // Delete files if requested
        if ($request->files_to_delete) {
            $this->deleteFilesIfRequested($homePage, $request->files_to_delete);
        }

        // Update banner images metadata
        $this->handleBannerImageUpload($homePage, $request);

        // Update other fields (titles, descriptions, buttons)
        $homePage->banner_1_title        = $request->banner_1_title;
        $homePage->banner_1_description  = $request->banner_1_description;
        $homePage->banner_1_btn_text     = $request->banner_1_btn_text;
        $homePage->banner_1_btn_url      = $request->banner_1_btn_url;

        $homePage->banner_2_title        = $request->banner_2_title;
        $homePage->banner_2_description  = $request->banner_2_description;
        $homePage->banner_2_btn_text     = $request->banner_2_btn_text;
        $homePage->banner_2_btn_url      = $request->banner_2_btn_url;

        $homePage->save();

        // Update featured products
        if ($request->products) {
            $this->updateFeaturedProducts($request->products);
        }
    }

    protected function updateFeaturedProducts(array $products)
    {
        // Clear previous featured products
        HomePageFeaturedProduct::truncate();

        // Store new featured products
        foreach ($products as $product) {
            HomePageFeaturedProduct::create([
                'product_id' => $product['product_id'],
                'btn_text'   => $product['btn_text'] ?? null,
                'btn_url'    => $product['btn_url'] ?? null,
            ]);
        }
    }

    private function handleBannerImageUpload($homePage, $request)
    {
            $fileUploadService = new FileUploadService();
            $uploadDirectory = 'uploads/body-banners';

            if ($request->banner_1_cover_image) {
                $fileName = $request->banner_1_cover_image;
                $fileData = $fileUploadService->handleFileUpload($fileName, 'temp/' . $fileName, $uploadDirectory);
                if ($fileData) {
                    $homePage->banner_1_cover_image = $fileData['fullPath'] ?? null;
                    $homePage->banner_1_cover_original_name = $fileData['originalName'] ?? null;
                    $homePage->banner_1_cover_extension = $fileData['extension'] ?? null;
                    $homePage->banner_1_cover_size = $fileData['size'] ?? null;
                }
            }

            if ($request->banner_1_featured_image) {
                $fileName = $request->banner_1_featured_image;
                $fileData = $fileUploadService->handleFileUpload($fileName, 'temp/' . $fileName, $uploadDirectory);
                if ($fileData) {
                    $homePage->banner_1_featured_image = $fileData['fullPath'] ?? null;
                    $homePage->banner_1_featured_original_name = $fileData['originalName'] ?? null;
                    $homePage->banner_1_featured_extension = $fileData['extension'] ?? null;
                    $homePage->banner_1_featured_size = $fileData['size'] ?? null;
                }
            }

            if ($request->banner_2_image) {
                $fileName = $request->banner_2_image;
                $fileData = $fileUploadService->handleFileUpload($fileName, 'temp/' . $fileName, $uploadDirectory);
                if ($fileData) {
                    $homePage->banner_2_image = $fileData['fullPath'] ?? null;
                    $homePage->banner_2_image_original_name = $fileData['originalName'] ?? null;
                    $homePage->banner_2_image_extension = $fileData['extension'] ?? null;
                    $homePage->banner_2_image_size = $fileData['size'] ?? null;
                }
            }
        }



    /**
     * Delete image file if it matches stored path, and clear metadata fields.
     */
    protected function deleteFilesIfRequested($homePage, $filesToDelete)
    {
        foreach ((array) $filesToDelete as $fileToDelete) {
            $deletePath = public_path($fileToDelete);
            if (File::exists($deletePath)) {
                File::delete($deletePath);

                if ($homePage->banner_1_cover_image === $fileToDelete) {
                    $homePage->banner_1_cover_image = null;
                    $homePage->banner_1_cover_original_name = null;
                    $homePage->banner_1_cover_extension = null;
                    $homePage->banner_1_cover_size = null;
                }
                if ($homePage->banner_1_featured_image === $fileToDelete) {
                    $homePage->banner_1_featured_image = null;
                    $homePage->banner_1_featured_original_name = null;
                    $homePage->banner_1_featured_extension = null;
                    $homePage->banner_1_featured_size = null;
                }
                if ($homePage->banner_2_image === $fileToDelete) {
                    $homePage->banner_2_image = null;
                    $homePage->banner_2_image_original_name = null;
                    $homePage->banner_2_image_extension = null;
                    $homePage->banner_2_image_size = null;
                }
                $homePage->save();
            }
        }
    }


    /**
     * Dummy placeholder for your file upload handler.
     * Replace this with your actual implementation.
     */
    private function processUploadedFile($fileName, $directory)
    {
        // Returning dummy data structure for example:
        return [
            'fullPath'     => $directory . '/' . $fileName,
            'originalName' => $fileName,
            'extension'    => pathinfo($fileName, PATHINFO_EXTENSION),
            'size'         => 0, // You can get file size here if needed
        ];
    }
}