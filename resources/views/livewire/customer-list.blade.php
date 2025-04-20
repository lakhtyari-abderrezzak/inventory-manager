<div>
    <div class="mb-6">
        <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search customers by name or SKU..."
            class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300" />
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @forelse($customers as $customer)
            <div wire:key="customer-{{ $customer->id }}" class="bg-white shadow rounded-2xl p-4 hover:shadow-md transition">
                

                <h2 class="text-lg font-semibold text-gray-800">{{ $customer->name }}</h2>
                <p class="text-sm text-gray-500">E-mail: {{ $customer->email }}</p>
    
                <p class="text-sm text-gray-600 mt-2">Phone: <span class="font-semibold">{{ $customer->phone }}</span></p>
                <p class="text-sm text-gray-600">Address: <span class="font-semibold">{{ $customer->address }}</span></p>
                <p class="text-sm text-gray-600">City: <span class="font-semibold">{{ $customer->city }}</span></p>
                <p class="text-sm text-gray-600">State: <span class="font-semibold">{{ $customer->country }}</span></p>   


                <div class="mt-4 flex justify-between">
                    <a wire:navigate href="{{ route('customers.show', $customer)}}" class="text-blue-600 text-sm hover:underline">View</a>
                    <a wire:navigate href="{{ route('customers.edit', $customer)}}" class="text-yellow-500 text-sm hover:underline">Edit</a>
                    <a wire:navigate wire:click="delete({{$customer->id}})" class="text-red-500 text-sm hover:underline">Delete</a>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-gray-500">
                No customers found.
            </div>
        @endforelse
    </div>

    <div class="my-6">
        {{ $customers->links() }}
    </div>
</div>
