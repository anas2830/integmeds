<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductTag;
use App\Models\ProductSize;
use Illuminate\Support\Str;
use App\Models\ProductBrand;
use App\Models\ProductImage;
use App\Models\ProductVideo;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\File;


class ProductCrudService
{

    public function getProductList($request)
    {
        $data['search'] = $search = $request->input('search');
        $data['sortBy'] = $sortBy = $request->input('sort_by', 'id');
        $data['sortDirection'] = $sortDirection = $request->input('sort_direction', 'desc');
        $data['products'] = Product::with('categories','firstImage')
            ->when($search, function ($query, $search) {
                return $query->where('product_name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            })
            ->orderBy($sortBy, $sortDirection)
            ->paginate(10);
        return $data;
    }

    public function createProduct(array $validated)
    {
        $product = $this->storeBasicInfo($validated);

        if(!empty($validated['video_url'])){
            $this->storeVideo($product, $validated['video_url']);
        }

        $this->storeProductImages($product, $validated['product_images'] ?? []);
        $this->createStock($product, $validated['stock_quantity']);
        $this->storeRelations($product, $validated);
    }

    public function editProduct($id)
    {
        $data = $this->getCreateProductData();
        // Find the product first
        $product = Product::find($id);

        if (!$product) {
            // handle product not found, maybe throw exception or return null/empty data
            abort(404, 'Product not found');
        }

        // Get existing product images via relationship or separate query
        $productImages = $product->images;

        // Get selected category IDs
        $selectedCategories = $product->categories->pluck('id')->toArray();
        $selectedBrands = $product->brands->pluck('id')->toArray();
        $selectedTags = $product->tags->pluck('id')->toArray();
        // $selectedSizes = $product->sizes->pluck('id')->toArray();



        $data['existingFilesArray'] = [];

        if ($productImages->isNotEmpty()) {
            $data['existingFilesArray'] = $productImages->map(function ($image) {
                return [
                    'full_path' => url($image->image_url),             // DB column image_url mapped to full_path
                    'name'      => $image->file_original_name ?? basename($image->image_url),
                    'size'      => (int) ($image->file_size ?? 0),
                    'path'      => $image->image_url,
                ];
            })->toArray();
        }

        $data['product'] = $product;
        $data['selectedCategories'] = $selectedCategories;
        $data['selectedBrands'] = $selectedBrands;
        $data['selectedTags'] = $selectedTags;
        // $data['selectedSizes'] = $selectedSizes;
        $data['videoUrls'] = $product->videos()->pluck('video_url')->toArray();

        return $data;
    }


    public function updateProduct(array $validated, $id)
    {
        $product = Product::findOrFail($id);

        $product = $this->storeBasicInfo($validated, $product);



        if (!empty($validated['product_images'])) {
            $this->storeProductImages($product, $validated['product_images']);
        }
        if (!empty($validated['video_url'])) {
            $this->storeVideo($product, $validated['video_url']);
        }

        if(request()->files_to_delete){
            $this->deleteProductImages(request()->files_to_delete);
        }
        $this->storeRelations($product, $validated);

        $this->updateStock($product, $validated['stock_quantity'] ?? 0);

        // Add stock/relations if needed

        return $product;
    }


    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
    }

    private function storeBasicInfo(array $validated, ?Product $product = null): Product
    {
        $regular = $validated['regular_price'] ?? 0;
        $sale = $validated['sale_price'] ?? 0;

        $discount = $this->calculateDiscounts($regular, $sale);

        $data = [
            'product_name' => $validated['product_name'],
            'slug' => Str::slug($validated['product_name'], '-'),
            'barcode' => $validated['barcode'] ?? ($product->barcode ?? $this->generateBarcode()),
            'ups_code' => $validated['ups_code'],
            'sku' => $validated['sku'],
            'short_description' => $validated['short_description'],
            'description' => $validated['description'],
            'research' => $validated['research'],
            'video_en' => $validated['video_en'] ?? null,
            'video_bn' => $validated['video_bn'] ?? null,
            'meta_title' => $validated['meta_title'] ?? null,
            'meta_keywords' => $validated['meta_keywords'] ?? null,
            'meta_description' => $validated['meta_description'] ?? null,
            'purchase_price' => $validated['purchase_price'] ?? 0,
            'regular_price' => $regular,
            'sale_price' => $sale,
            'discount_price' => $discount['discount_price'],
            'discount_percentage' => $discount['discount_percentage'],
            'weight'        => $validated['weight'],
            'weight_converted' => $this->weightToKgram($validated['weight']),
            'length'        => $validated['length'],
            'width'         => $validated['width'],
            'height'        => $validated['height'],
            'status'        => $validated['status']
        ];

        if ($product) {
            $product->fill($data);
            $product->save();
            return $product;
        }

        return Product::create($data);
    }

    private function weightToKgram($weight)
    {
        return $weight > 0 ? round($weight / 1000, 2) : 0;
    }



    private function storeVideo(Product $product, array $videoIntros)
    {
        $product->videos()->delete();

        // Create new ones
        $videoData = collect($videoIntros)
            ->filter() // remove empty/null values
            ->map(function ($url) use ($product) {
                return [
                    'product_id'  => $product->id,
                    'video_url' => $url,
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ];
            })->toArray();

        // Insert all at once
        if (!empty($videoData)) {
            ProductVideo::insert($videoData);
        }
    }


    private function storeProductImages(Product $product, array $uploadedFiles): void
    {
        if (empty($uploadedFiles) || empty($uploadedFiles[0])) {
            return;
        }

        $filenames = explode(',', $uploadedFiles[0]);
        $newDirectory = 'uploads/products';
        $fileUploadService = new FileUploadService();

        $productImagesData = [];

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
                    $productImagesData[] = [
                        'product_id' => $product->id,
                        'image_url' => $fullPath,
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

        if (!empty($productImagesData)) {
            ProductImage::insert($productImagesData);
        }        
    }

    /**
     * Delete multiple files from the public directory.
     *
     * @param array|null $filesToDelete
     * @return void
     */
    public function deleteProductImages(array|null $filesToDelete): void
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
            ProductImage::where('image_url', $relativePath) ->delete();
        }
    }


    // For creating product inventory and ledger
    private function createStock(Product $product, int $quantity): void
    {
        // Update product's quantity column
        $product->update(['quantity' => $quantity]);

        // Create initial inventory record
        $product->inventory()->create([
            'quantity' => $quantity,
        ]);

        // Create initial stock ledger record for 'in' type if quantity > 0
        if ($quantity > 0) {
            $product->stockLedgers()->create([
                'type' => 'in',
                'quantity' => $quantity,
                'note' => "Initial stock added $quantity by admin",
            ]);
        }
    }


    // For updating inventory and ledger on product update
    private function updateStock(Product $product, int $newQuantity): void
    {
        $currentQuantity = $product->quantity ?? 0;
        $difference = $newQuantity - $currentQuantity;

        if ($difference === 0) {
            return; // no change, no ledger
        }

        $type = $difference > 0 ? 'in' : 'out';

        $note = $type === 'in'
            ? "Quantity increased by admin: +{$difference}"
            : "Quantity decreased by admin: " . abs($difference);

        // Update the product quantity
        $product->update(['quantity' => $newQuantity]);

        // Update the inventory record
        $product->inventory()->update([
            'quantity' => $newQuantity,
        ]);

        // Create stock ledger entry for the change
        $product->stockLedgers()->create([
            'type' => $type,
            'quantity' => $newQuantity,
            'note' => $note,
        ]);
    }





    private function generateBarcode()
    {
        do {
            $barcode = mt_rand(1000000000000, 9999999999999);
        } while (Product::where('barcode', $barcode)->exists());
        return $barcode;
    }

    private function storeRelations(Product $product, array $validated)
    {
        $product->categories()->sync($validated['categories'] ?? []);
        $product->brands()->sync($validated['brand_id'] ?? []);
        $product->tags()->sync($validated['tags'] ?? []);
    }


    private function calculateDiscounts(float $regular, float $sale): array
    {
        // Regular price will always be bigger
        $discountPrice = $regular - $sale;
        $discountPercentage = ($regular != 0.0)
            ? round(($discountPrice / $regular) * 100, 2)
            : 0.0;

        return [
            'discount_price' => $discountPrice,
            'discount_percentage' => $discountPercentage,
        ];
    }


    public function statusUpdate($id)
    {
        $product = Product::find($id);
        $product->status = !$product->status;
        $product->save();
    }

    public function getCreateProductData(): array
    {
        return [
            'categories' => $this->getCategories(),
            'brands'     => $this->getBrands(),
            'tags'       => $this->getTags(),
            'sizes'      => $this->getSizes(),
        ];
    }

    protected function getCategories()
    {
        return ProductCategory::select('id', 'name')->orderBy('name')->get();
    }

    protected function getBrands()
    {
        return ProductBrand::select('id', 'name')->orderBy('name')->get();
    }

    protected function getTags()
    {
        return ProductTag::select('id', 'name')->orderBy('name')->get();
    }

    protected function getSizes()
    {
        return ProductSize::select('id', 'name')->orderBy('name')->get();
    }
}
