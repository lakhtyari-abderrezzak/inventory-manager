<x-layouts.app title="Edit Supplier">
    <div class="max-w-4xl mx-auto p-6 bg-white shadow rounded-2xl">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Update Supplier</h1>
        

        {{-- Form for adding the product using livewire component --}}
        <livewire:edit-supplier :supplierId="$supplierId" />

    </div>
</x-layouts.app>