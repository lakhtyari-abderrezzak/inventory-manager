<x-layouts.app title="Edit Customer">
    <div class="max-w-4xl mx-auto p-6 bg-white shadow rounded-2xl">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Update Customer</h1>
        

        {{-- Form for adding the Customer using livewire component --}}
        <livewire:edit-customer :customerId="$customerId" />

    </div>
</x-layouts.app>
