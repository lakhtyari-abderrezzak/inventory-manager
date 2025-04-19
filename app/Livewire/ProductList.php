<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductList extends Component
{
    public string $search = '';

    public function delete($id){
        $product = Product::findOrFail($id);

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

        return view('livewire.product-list', compact('products'));
    }
}
