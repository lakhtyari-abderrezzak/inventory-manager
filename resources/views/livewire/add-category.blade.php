<div>
    <!-- Add Product Form -->
    <form wire:submit.prevent="submit">
        <!-- Product Name -->
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium">Category Name</label>
            <input type="text" id="name" wire:model="name"
                class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300"
                placeholder="Enter product name" required>
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-medium">Description</label>
            <textarea id="description" wire:model="description"
                class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300"
                placeholder="Enter product description"></textarea>
            @error('description')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" wire:loading.attr="disabled"
                class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">
                Add Category
            </button>
        </div>
    </form>


</div>
