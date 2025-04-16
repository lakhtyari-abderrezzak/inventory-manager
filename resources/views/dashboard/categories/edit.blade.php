<x-layouts.app title="Edit Category">
    <div class="max-w-4xl mx-auto p-6 bg-white shadow rounded-2xl">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Update Category</h1>
        

        {{-- Form for updating the category using livewire component --}}
        <livewire:edit-category :categoryId="$categoryId" />

    </div>
</x-layouts.app>
