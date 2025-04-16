<div>
    <div class="mb-6">
        <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search suppliers by name or contact..."
            class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300" />
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @forelse($suppliers as $supplier)
            <div class="bg-white shadow rounded-2xl p-4 hover:shadow-md transition">
                <h2 class="text-lg font-semibold text-gray-800 mb-1">{{ $supplier->supplier_name }}</h2>
                <p class="text-sm text-gray-500">Contact: {{ $supplier->primary_contact_name }}</p>
                <p class="text-sm text-gray-600 mt-1">Email: <span class="font-medium">{{ $supplier->email }}</span></p>
                <p class="text-sm text-gray-600">Phone: <span class="font-medium">{{ $supplier->phone }}</span></p>
                <p class="text-sm text-gray-600 mt-1">Address: {{ $supplier->address }}, {{ $supplier->city }}, {{ $supplier->country }}</p>
                <p class="text-sm text-gray-600 mt-1">Status: 
                    @if($supplier->is_active)
                        <span class="text-green-600 font-semibold">Active</span>
                    @else
                        <span class="text-red-500 font-semibold">Inactive</span>
                    @endif
                </p>

                <div class="mt-4 flex justify-between">
                    <a wire:navigate href="{{ route('suppliers.show', $supplier)}}" class="text-blue-600 text-sm hover:underline">View</a>
                    <a wire:navigate href="{{ route('suppliers.edit', $supplier)}}" class="text-yellow-500 text-sm hover:underline">Edit</a>
                    <a wire:navigate wire:click="delete({{ $supplier->id }})" class="text-red-500 text-sm hover:underline">Delete</a>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-gray-500">
                No Suppliers Found.
            </div>
        @endforelse
    </div>

    <div class="my-6">
        {{ $suppliers->links() }}
    </div>
</div>
