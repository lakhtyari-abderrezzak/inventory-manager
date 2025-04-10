<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryList extends Component
{
    use WithPagination;
    public $search = '';
    public function render()
    { 
        $categories = Category::where('name', 'like', '%' . $this->search . '%')
            ->latest()
            ->paginate(6);
         
        return view('livewire.category-list', compact('categories'));
    }
}
