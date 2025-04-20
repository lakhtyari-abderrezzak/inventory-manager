<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Customer;

class CustomerList extends Component
{
    public $search = '';

    public function render()
    {
        $customers = Customer::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orWhere('phone', 'like', '%' . $this->search . '%')
            ->orWhere('address', 'like', '%' . $this->search . '%')
            ->orWhere('city', 'like', '%' . $this->search . '%')
            ->orWhere('country', 'like', '%' . $this->search . '%')
            ->paginate(10);
        return view('livewire.customer-list', compact(
            'customers'
        ));
    }
}
