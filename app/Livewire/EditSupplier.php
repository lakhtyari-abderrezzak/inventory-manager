<?php

namespace App\Livewire;

use Livewire\Component;

class EditSupplier extends Component
{
    public $supplier;
    public $supplierId;
    public $supplier_name;
    public $primary_contact_name;
    public $email;
    public $phone;
    public $address;
    public $city;
    public $country;
    public $is_active = true; // Default value for is_active

    public function mount($supplierId)
    {
        $this->supplierId = $supplierId;
        $this->supplier = \App\Models\Supplier::find($supplierId);
        $this->supplier_name = $this->supplier->supplier_name;
        $this->primary_contact_name = $this->supplier->primary_contact_name;
        $this->email = $this->supplier->email;
        $this->phone = $this->supplier->phone;
        $this->address = $this->supplier->address;
        $this->city = $this->supplier->city;
        $this->country = $this->supplier->country;
        $this->is_active = (bool) $this->supplier->is_active; // Set the default value for is_active
    }

    public function submit()
    {
        $this->validate([
            'supplier_name' => 'required|string',
            'primary_contact_name' => 'required|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'city' => 'nullable|string',
            'country' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $this->supplier->update([
            'supplier_name' => $this->supplier_name,
            'primary_contact_name' => $this->primary_contact_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'city' => $this->city,
            'country' => $this->country,
            'is_active' => $this->is_active,
        ]);

        $this->dispatch('flash', type: 'success', message: 'Supplier updated!');

        $this->dispatch('redirect', url: route('suppliers.show', ['supplier' => $this->supplier->id]));


    }
    public function render()
    {
        return view('livewire.edit-supplier');
    }
}
