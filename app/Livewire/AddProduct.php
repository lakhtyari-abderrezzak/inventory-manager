<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class AddProduct extends Component
{
    use WithFileUploads;

    public $name, $sku, $category_id, $supplier_id, $description, $price, $cost_price, $quantity,
        $low_stock_alert, $unit, $image_path, $barcode, $is_active = true;

  

    public function submit()
    {
        // SKU Generation 
        $sku = strtoupper(substr($this->name, 0, 3)) . '-' . rand(1000, 9999);

        // Check for uniqueness of the SKU
        while (Product::where('sku', $sku)->exists()) {
            $sku = strtoupper(substr($this->name, 0, 3)) . '-' . rand(1000, 9999);
        }

        // Automatically generate a barcode using the SKU or product ID
        $barcode = 'BARCODE-' . strtoupper(substr($this->name, 0, 3)) . rand(100000, 999999);

        // Check for uniqueness of the barcode
        while (Product::where('barcode', $barcode)->exists()) {
            $barcode = 'BARCODE-' . strtoupper(substr($this->name, 0, 3)) . rand(100000, 999999);
        }

        // Validate data including the generated SKU
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'sku' => 'nullable|string|max:100|unique:products,sku,' . $sku, 
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'description' => 'nullable|string|max:1000',
            'price' => 'required|numeric|min:0',
            'cost_price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'low_stock_alert' => 'nullable|integer|min:0',
            'unit' => 'nullable|string|max:50',
            'image_path' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'barcode' => 'nullable|string|max:255',
            'is_active' => 'required|boolean',
        ]);

        // Add generated SKU to validated data
        $validatedData['sku'] = $sku;
        
        // Add generated barcode to validated data
        $validatedData['barcode'] = $barcode;

        // Handle image upload in a try-catch block
        try {
            if ($this->image_path) {
                $validatedData['image_path'] = $this->image_path->store('products', 'public');
            }
        } catch (\Exception $e) {
            $this->dispatch('flash', type: 'error', message: 'Something went wrong');
            return;
        }

        // Create the product with validated data
        Product::create($validatedData);

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
            'unit',
            'image_path',
            'barcode',
            'is_active',
        ]);

        $this->dispatch('flash', type: 'success', message: 'Product created!');
        $this->dispatch('redirect', url: route('products.index'));

    }

    public function render()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();

        return view('livewire.add-product', compact('categories', 'suppliers'));
    }
}
