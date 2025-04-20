<?php

namespace App\Livewire;

use App\Models\Customer;
use Livewire\Component;

class EditCustomer extends Component
{
    public $customer;
    public $customerId;
    public $name, $email, $phone, $city, $address, $country;



    public function mount($customerId)
    {
        $this->customerId = $customerId;
        $this->customer = Customer::findOrFail($customerId);

        $this->name = $this->customer->name;
        $this->email = $this->customer->email;
        $this->phone = $this->customer->phone;
        $this->city = $this->customer->city;
        $this->address = $this->customer->address;
        $this->country = $this->customer->country;
    }
    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:customers,name,' . $this->customerId,
            'email' => 'required|email|max:255|unique:customers,email,' . $this->customerId,
            'phone' => 'required|string|max:255|unique:customers,phone,' . $this->customerId,
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'country' => 'required|string|max:255',
        ];
    }

    public function submit()
    {
        $this->validate();

        $this->customer->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'city' => $this->city,
            'address' => $this->address,
            'country' => $this->country,
        ]);

        $this->dispatch('flash', type: 'success', message: 'Customer updated!');

        $this->dispatch(
            'redirect',
            url: route('customers.index', ['customer' => $this->customer->id])
        );
    }

    public function render()
    {
        return view('livewire.edit-customer');
    }
}
