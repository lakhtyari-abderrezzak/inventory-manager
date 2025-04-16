<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryList extends Component
{
    use WithPagination;

    public $search = '';

    public $bg = [
        'bg-red-200',
        'bg-yellow-200',
        'bg-green-200',
        'bg-blue-200',
        'bg-gray-200',
        'bg-orange-200',
        'bg-brown-200',
        'bg-black',
        'bg-gold-200',
        'bg-silver-200',
        'bg-purple-200',
    ];

    public function delete($id){
        $category = Category::findOrFail($id);

        $category->delete();

        session()->flash('success', 'Category deleted succeffully!');

    }

    public function render()
    {
        $categories = Category::where('name', 'like', '%' . $this->search . '%')
            ->latest()
            ->paginate(6);

        return view('livewire.category-list', compact('categories'));
    }
}
