<?php

namespace App\Livewire;

use App\Models\Supplier;
use Livewire\Component;
use Livewire\WithPagination;

class SupplierList extends Component
{
    use WithPagination;

    public $search = '';

    public function delete($id)
    {
        $supplier = Supplier::findOrFail($id);

        $supplier->delete();

        session()->flash('message', 'Supplier deleted successfully!');
    }

    public function render()
    {
        $suppliers = Supplier::where('supplier_name', 'like', '%' . $this->search . '%')
            ->latest()
            ->paginate(15);
        return view('livewire.supplier-list', compact('suppliers'));
    }
}
