<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Unit;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditProduct extends Component
{
    use WithFileUploads;

    public Product $product;
    public $categories;
    public $suppliers;
    public $units;
    public $productId;

    public $name, $sku, $category_id, $supplier_id, $description, $price, $cost_price,
        $quantity, $low_stock_alert, $unit_id, $image_path, $uploadedImage, $barcode, $is_active;

    public function mount($productId)
    {
        $this->productId = $productId;
        $this->product = Product::findOrFail($this->productId);
        $this->categories = Category::all();
        $this->suppliers = Supplier::all(); 
        $this->units = Unit::all(); 
        $this->name = $this->product->name;
        $this->sku = $this->product->sku;
        $this->category_id = $this->product->category_id;
        $this->supplier_id = $this->product->supplier_id;
        $this->description = $this->product->description;
        $this->price = $this->product->price;
        $this->cost_price = $this->product->cost_price;
        $this->quantity = $this->product->quantity;
        $this->low_stock_alert = $this->product->low_stock_alert;
        $this->unit_id = $this->product->unit_id;
        $this->barcode = $this->product->barcode;
        $this->is_active = (bool) $this->product->is_active;
    }



    public function submit()
    {
        $this->validate([
            'name' => 'required|string',
            'sku' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'unit_id' => 'required|exists:units,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'cost_price' => 'required|numeric',
            'quantity' => 'required|integer',
            'low_stock_alert' => 'nullable|integer',
            'uploadedImage' => 'nullable|image|max:2048',
            'barcode' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        try {
            if ($this->uploadedImage) {
                // Delete the old image if it exists
                if ($this->product->image_path && Storage::disk('public')->exists($this->product->image_path)) {
                    Storage::disk('public')->delete($this->product->image_path);
                }

                // Store the new image
                $imagePath = $this->uploadedImage->store('products', 'public');
            } else {
                $imagePath = $this->product->image_path; // Keep the old image path if no new image is uploaded
            }

            // Update the product with the new data
            $this->product->update([
                'name' => $this->name,
                'sku' => $this->sku,
                'category_id' => $this->category_id,
                'supplier_id' => $this->supplier_id,
                'description' => $this->description,
                'price' => $this->price,
                'cost_price' => $this->cost_price,
                'quantity' => $this->quantity,
                'low_stock_alert' => $this->low_stock_alert,
                'unit_id' => $this->unit_id,
                'image_path' => $imagePath, // Save the new image path
                'barcode' => $this->barcode,
                'is_active' => $this->is_active,
            ]);

            $this->reset([
                'name',
                'sku',
                'category_id',
                'supplier_id',
                'description',
                'price',
                'cost_price',
                'quantity',
                'low_stock_alert',
                'unit_id',
                'image_path',
                'uploadedImage',
                'barcode',
                'is_active',
            ]);
            
            
            $this->dispatch('flash', type: 'success', message: 'Product updated!');


            $this->dispatch('redirect', 
                url : route('products.index')
            );

        } catch (\Exception $e) {
            // Handle the error if the image upload fails
            $this->dispatch('flash', type: 'error', message:  'Error uploading image: ' . $e->getMessage());

            return;
        }
    }

    public function removeImage()
{
    $this->reset('uploadedImage');
}



    public function render()
    {
        return view('livewire.edit-product');
    }
}
