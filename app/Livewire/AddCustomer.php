<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Customer;

class AddCustomer extends Component
{
    public $name;
    public $email;
    public $phone;
    public $address;
    public $city;
    public $country;
    
    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:15',
        'address' => 'required|string|max:255',
        'city' => 'required|string|max:100',
        'country' => 'required|string|max:100',
    ];

    public function submit()
    {
        $this->validate();

        // Create a new customer using the validated data
        Customer::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'city' => $this->city,
            'country' => $this->country,
        ]);

        // Reset the form fields
        $this->reset(
            'name',
            'email',
            'phone',
            'address',
            'city',
            'country'
        );

        
        $this->dispatch('flash', type: 'success', message: 'Customer created!');
        
        $this->dispatch('redirect', url: route('customers.index'));
    }

    public function render()
    {
        return view('livewire.add-customer');
    }
}
