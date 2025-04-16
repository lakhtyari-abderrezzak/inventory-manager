<?php

use Livewire\Volt\Component;
use App\Models\Product;

new class extends Component {
    public $product;

    public function mount($product)
    {
        $this->product = $product;
    }
    public function delete($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            session()->flash('message', 'Product deleted successfully.');
        } else {
            session()->flash('error', 'Product not found.');
        }
        return redirect()->route('products.index');
    }
}; ?>

<div>
    <button x-data
        x-on:click="
        if (confirm('Are you sure you want to delete this product?')) {
            $wire.delete({{ $product }});
        }
    "
        wire:click="delete({{ $product }})" class="bg-red-500  text-white px-6 py-2 rounded-lg hover:bg-red-700 transition">
        Delete Product
    </button>

</div>
