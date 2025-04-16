<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class AddCategory extends Component
{
    public $name, $description, $is_active = true;      

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'nullable|string|max:255',
        'is_active' => 'boolean',
    ];

    public function submit()
    {
        $this->validate();

        // Assuming you have a Category model and a categories table
        Category::create([
            'name' => $this->name,
            'description' => $this->description,
            'is_active' => $this->is_active,
        ]);

        session()->flash('message', 'Category added successfully!');

        // Reset the form fields
        $this->reset();

        return redirect()->route('categories.index');
    }

    public function render()
    {
        return view('livewire.add-category');
    }
}
