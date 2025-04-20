<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ProductList extends Component
{
    public string $search = '';

    public function delete($id){
        $product = Product::findOrFail($id);

        if ($product->image_path && Storage::disk('public')->exists($product->image_path)) {
            Storage::disk('public')->delete($product->image_path);
        }

        $product->delete();

        $this->dispatch('flash', type: 'success', message: 'Product deleted!');
    }
    
    public function render()
    {
        $products = Product::query()
            ->with(['unit', 'category']) // Ensure the 'unit' relationship is loaded
            ->where(function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('sku', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(15);

        // foreach ($products as $product) {
        //     dd($product->unit->unit_id); // Debugging line to check the unit relationship
        // }

        return view('livewire.product-list', compact('products'));
    }
}
