<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductTag;
use App\Models\ProductSize;
use Illuminate\Support\Str;
use App\Models\ProductBrand;
use App\Models\ProductImage;
use App\Models\ProductCategory;


class ProductCrudService
{

    public function getProductList($request)
    {
        $data['search'] = $search = $request->input('search');
        $data['sortBy'] = $sortBy = $request->input('sort_by', 'id');
        $data['sortDirection'] = $sortDirection = $request->input('sort_direction', 'desc');
        $data['products'] = Product::with('categories','brands')
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

        $this->storeProductImages($product, $validated['product_images'] ?? []);
        $this->storeStock($product, $validated['stock_quantity'] ?? 0);
        $this->storeRelations($product, $validated);
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
    }

    private function storeBasicInfo(array $validated): Product
    {
        $regular = $validated['regular_price'] ?? 0;
        $sale = $validated['sale_price'] ?? 0;

        $discount = $this->calculateDiscounts($regular, $sale);

        return Product::create([
            'product_name' => $validated['product_name'],
            'slug' =>  Str::slug($validated['product_name']),
            'barcode' => $validated['barcode'] ?? $this->generateBarcode(),
            'sku' => $validated['sku'],
            'short_description' => $validated['short_description'],
            'description' => $validated['description'],
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
            'quantity' => $validated['stock_quantity'] ?? 0,
        ]);
    }
    private function storeProductImages(Product $product, array $uploadedFiles): void
    {
        if (empty($uploadedFiles) || empty($uploadedFiles[0])) {
            return;
        }

        $filenames = explode(',', $uploadedFiles[0]);

        foreach ($filenames as $filename) {
            $filename = trim($filename);
            if ($filename === '') {
                continue;
            }

            try {
                // You can inject this instead of creating a new instance every time
                $fileUploadService = new FileUploadService();
                $newDirectory = 'uploads/products';

                $fileData = $fileUploadService->handleFileUpload($filename, 'temp/' . $filename, $newDirectory);
                $fullPath = $fileData['fullPath'] ?? null;

                if ($fullPath) {
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_url' => $fullPath,
                    ]);
                }
            } catch (\Throwable $e) {
                // Silently fail or optionally log the error if needed
                // Log::error("Image upload failed for $filename: " . $e->getMessage());
                continue;
            }
        }
    }



    private function storeStock(Product $product, int $quantity)
    {
        $product->inventory()->create([
            'quantity' => $quantity,
        ]);

        $product->stockLedgers()->create([
            'type' => 'in',
            'quantity' => $quantity,
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
        // dd($validated);
        if (!empty($validated['categories'])) {
            $product->categories()->sync($validated['categories']);
        }

        if (!empty($validated['tags'])) {
            $product->tags()->sync($validated['tags']);
        }

        if (!empty($validated['sizes'])) {
            $product->sizes()->sync($validated['sizes']);
        }

        if (!empty($validated['brand_id'])) {
            $product->brands()->sync($validated['brand_id']);
        }

    }


    private function calculateDiscounts(float $regular, float $sale): array
    {
        $discountPrice = $sale - $regular;
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
