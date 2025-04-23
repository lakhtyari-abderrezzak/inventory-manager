<x-layouts.app title="Orders">
    <div class="max-w-7xl mx-auto px-4 py-10">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Orders</h1>
    <a wire:navigate href="/orders/create" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">+ Add an order</a>
  </div>

  {{-- Livewire component to display the list of orders --}}
  <livewire:order-list />

</div>

</x-layouts.app>