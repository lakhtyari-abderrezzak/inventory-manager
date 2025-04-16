<x-layouts.app title="Suppliers">
    <div class="max-w-7xl mx-auto px-4 py-10">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Suppliers</h1>
    <a wire:navigate href="/suppliers/create" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">+ Add a supplier</a>
  </div>

  {{-- Success Message if the product is added successfuly --}}
  <x-success-message />

  <livewire:supplier-list />

  
</div>

</x-layouts.app>
