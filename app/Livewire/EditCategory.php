<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class EditCategory extends Component
{
    public $category;
    public $categoryId;
    public $name;
    public $description;

    public function mount($categoryId)
    {
        $this->categoryId = $categoryId;
        $this->category = Category::findOrFail($categoryId);
        
        $this->name = $this->category->name;
        $this->description = $this->category->description;
    }

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'nullable|string|max:1000',
    ];
    public function submit(){
        $this->validate();

        $this->category->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->dispatch('flash', type: 'success', message: 'Category updated!');


        $this->dispatch('redirect', 
            url : route('categories.index', ['category' => $this->category->id])
        );
    }
    public function render()
    {
        return view('livewire.edit-category');
    }
}
