<?php

namespace App\Services;

use App\Models\Bundle;
use App\Models\Product;
use App\Models\BundleImage;
use Illuminate\Support\Facades\File;

class ProductBundleCrudService
{
    public function getProductBundleList($request)
    {
        $data['search'] = $search = $request->input('search');
        $data['sortBy'] = $sortBy = $request->input('sort_by', 'id');
        $data['sortDirection'] = $sortDirection = $request->input('sort_direction', 'desc');
        $data['productBundle'] = Bundle::when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            })
            ->orderBy($sortBy, $sortDirection)
            ->paginate(10);
        return $data;
    }


    public function createProductBundle($request)
    {
        $productBundle = new Bundle();
        $productBundle->name = $request->name;
        $productBundle->description = $request->description;
        $productBundle->min_price = $request->min_price;
        $productBundle->max_price = $request->max_price;
        $productBundle->status = $request->status ?? 0;

        $this->bundleIconUpload($productBundle, $request);

        if ($productBundle->save()) {
            $this->storeBundleImages($productBundle, $request->bundle_images ?: []);
            $productBundle->products()->sync($request->bundle_products ?? []);
        }

        return $productBundle;
    }

    public function editProductBundle($id)
    {
        $bundle = Bundle::with(['bundleImages','products'])->findOrFail($id);

        // Build up $data without clobbering it
        // dd($bundle->bundleImages);
        $data = [
            'products'          => $this->getProductList(),
            'productBundle'     => $bundle,
            'selectedProducts'  => $bundle->products->pluck('id')->toArray(),
            'existingIconFile'  => $bundle->icon_path ? [[
                'full_path' => url($bundle->icon_path),
                'name'      => $bundle->file_original_name,
                'size'      => $bundle->file_size,
                'path'      => $bundle->icon_path,
            ]] : [],
            'existingFilesArray' => $bundle->bundleImages->map(function ($image) {
                return [
                    'full_path' => url($image->image_path),
                    'name'      => $image->file_original_name ?? basename($image->image_url),
                    'size'      => (int) ($image->file_size ?? 0),
                    'path'      => $image->image_path,
                ];
            })->toArray(),
        ];
        return $data;
    }


    public function updateProductBundle($request, $id)
    {
        $productBundle = Bundle::findOrFail($id);
        // dd($request->bundle_products);
        $productBundle->name = $request->name;
        $productBundle->description = $request->description;
        $productBundle->min_price = $request->min_price;
        $productBundle->max_price = $request->max_price;
        $productBundle->status = $request->status ?? 0;

        $this->bundleIconUpload($productBundle, $request);

        if ($request->files_to_delete) {
            $this->deleteBundleImages($request->files_to_delete ?? []);
        }

        if ($productBundle->save()) {
            $this->storeBundleImages($productBundle, $request->bundle_images ?: []);
            $productBundle->products()->sync($request->bundle_products ?? []);
        }

        return $productBundle;
    }

    public function deleteProductBundle($id)
    {
        $productBundle = Bundle::find($id);
        $productBundle->delete();
    }

    public function statusUpdate($id)
    {
        $productBundle = Bundle::find($id);
        $productBundle->status = !$productBundle->status;
        $productBundle->save();
    }

    private function storeBundleImages(Bundle $bundle, array $uploadedFiles): void
    {
        if (empty($uploadedFiles) || empty($uploadedFiles[0])) {
            return;
        }

        $filenames = explode(',', $uploadedFiles[0]);
        $newDirectory = 'uploads/bundles';
        $fileUploadService = new FileUploadService();

        $bundleImagesData = [];

        foreach ($filenames as $filename) {
            $filename = trim($filename);
            if ($filename === '') {
                continue;
            }

            try {
                $fileData = $fileUploadService->handleFileUpload($filename, 'temp/' . $filename, $newDirectory);

                $fullPath = $fileData['fullPath'] ?? null;
                $fileOriginalName = $fileData['originalName'] ?? null;
                $fileSize = $fileData['size'] ?? null;
                $fileExtension = $fileData['extension'] ?? null;

                if ($fullPath) {
                    $bundleImagesData[] = [
                        'bundle_id' => $bundle->id,
                        'image_path' => $fullPath,
                        'file_original_name' => $fileOriginalName,
                        'file_size' => $fileSize,
                        'file_extension' => $fileExtension,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            } catch (\Throwable $e) {
                continue;
            }
        }

        if (!empty($bundleImagesData)) {
            BundleImage::insert($bundleImagesData);
        }
    }

    public function getProductList()
    {
        return Product::select('id', 'product_name')->where('deleted_at', null)->get();
    }

    public function bundleIconUpload(Bundle $productBundle, $request)
    {   
        if ($request->file_to_delete) {
            $filePath = public_path($request->file_to_delete);
            // dd($request->file_to_delete, $filePath);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
             // Clear DB fields if they match the deleted file
            if ($productBundle->icon_path === $request->file_to_delete) {
                $productBundle->icon_path = null;
                $productBundle->file_original_name = null;
                $productBundle->file_size = null;
                $productBundle->file_extension = null;
            }
        }
        if (!$request->bundle_icon) {
            return;
        }
        $fileUploadService = new FileUploadService();
        $newDirectory = 'uploads/bundles';
        $fileData = $fileUploadService->handleFileUpload($request->bundle_icon, 'temp/' . $request->bundle_icon, $newDirectory);
        $fullpath = $fileData['fullPath'] ?? NULL;
        $fileOriginalName = $fileData['originalName'] ?? NULL;
        $fileSize = $fileData['size'] ?? NULL;
        $fileExtension = $fileData['extension'] ?? NULL;
        $productBundle->icon_path = $fullpath;
        $productBundle->file_original_name = $fileOriginalName;
        $productBundle->file_size = $fileSize;
        $productBundle->file_extension = $fileExtension;
    }

    public function deleteBundleImages(array|null $filesToDelete): void
    {
        if (empty($filesToDelete) || !is_array($filesToDelete)) {
            return;
        }

        $filenames = explode(',', $filesToDelete[0]);

        foreach ($filenames as $relativePath) {
            $filePath = realpath(public_path($relativePath));
            if (file_exists($filePath) && is_file($filePath)) {
                unlink($filePath);
            }
            BundleImage::where('image_path', $relativePath)->delete();
        }
    }
}
