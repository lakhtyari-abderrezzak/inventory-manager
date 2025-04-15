<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditProduct extends Component
{
    use WithFileUploads;

    public Product $product;
    public $categories;
    public $suppliers;
    public $productId;

    public $name, $sku, $category_id, $supplier_id, $description, $price, $cost_price,
           $quantity, $low_stock_alert, $unit, $image_path, $barcode, $is_active;

    public function mount($productId)
    {
        $this->productId = $productId;
        $this->product = Product::findOrFail($this->productId);
        $this->categories = Category::all();
        $this->suppliers = Supplier::all();

        $this->name = $this->product->name;
        $this->sku = $this->product->sku;
        $this->category_id = $this->product->category_id;
        $this->supplier_id = $this->product->supplier_id;
        $this->description = $this->product->description;
        $this->price = $this->product->price;
        $this->cost_price = $this->product->cost_price;
        $this->quantity = $this->product->quantity;
        $this->low_stock_alert = $this->product->low_stock_alert;
        $this->unit = $this->product->unit;
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
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'cost_price' => 'required|numeric',
            'quantity' => 'required|integer',
            'low_stock_alert' => 'nullable|integer',
            'unit' => 'nullable|string',
            'image_path' => 'nullable|image|max:2048', // image_path validation
            'barcode' => 'nullable|string',
            'is_active' => 'boolean',
        ]);
    
        try {
            // Check if a new image is uploaded
            if ($this->image_path) {
                // If there's a new image, delete the old one from storage
                if ($this->product->image_path) {
                    // The product already has an image_path, so delete the old one
                    Storage::disk('public')->delete($this->product->image_path);
                }
    
                // Store the new image and get its path
                $imagePath = $this->image_path->store('products', 'public');
            } else {
                // No new image, keep the existing one
                $imagePath = $this->product->image_path;
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
                'unit' => $this->unit,
                'image_path' => $imagePath, // Save the new image path
                'barcode' => $this->barcode,
                'is_active' => $this->is_active,
            ]);
    
            // Success message
            session()->flash('message', 'Product updated successfully.');
            
        } catch (\Exception $e) {
            // Handle the error if the image upload fails
            session()->flash('error', 'Error uploading image: ' . $e->getMessage());
            return;
        }
    }
    
    

    public function render()
    {
        return view('livewire.edit-product');
    }
}
