
<div>

    <!-- Add Product Form -->
    <form wire:submit.prevent="submit">
        <!-- Product Name -->
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium">Product Name</label>
            <input type="text" id="name" wire:model="name" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300" placeholder="Enter product name" required>
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>


        <!-- Category -->
        <div class="mb-4">
            <label for="category_id" class="block text-gray-700 font-medium">Category</label>
            <select id="category_id" wire:model="category_id" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Supplier -->
        <div class="mb-4">
            <label for="supplier_id" class="block text-gray-700 font-medium">Supplier</label>
            <select id="supplier_id" wire:model="supplier_id" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300" required>
                <option value="">Select Supplier</option>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                @endforeach
            </select>
            @error('supplier_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-medium">Description</label>
            <textarea id="description" wire:model="description" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300" placeholder="Enter product description"></textarea>
            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Price -->
        <div class="mb-4">
            <label for="price" class="block text-gray-700 font-medium">Price</label>
            <input type="number" id="price" wire:model="price" step="0.01" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300" placeholder="Enter product price" required>
            @error('price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Cost Price -->
        <div class="mb-4">
            <label for="cost_price" class="block text-gray-700 font-medium">Cost Price</label>
            <input type="number" id="cost_price" wire:model="cost_price" step="0.01" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300" placeholder="Enter cost price" required>
            @error('cost_price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Quantity -->
        <div class="mb-4">
            <label for="quantity" class="block text-gray-700 font-medium">Quantity</label>
            <input type="number" id="quantity" wire:model="quantity" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300" placeholder="Enter quantity" required>
            @error('quantity') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Low Stock Alert -->
        <div class="mb-4">
            <label for="low_stock_alert" class="block text-gray-700 font-medium">Low Stock Alert</label>
            <input type="number" id="low_stock_alert" wire:model="low_stock_alert" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300" placeholder="Set low stock alert">
            @error('low_stock_alert') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Unit -->
        <div class="mb-4">
            <label for="unit" class="block text-gray-700 font-medium">Unit</label>
            <input type="text" id="unit" wire:model="unit" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300" placeholder="Enter unit of measurement">
            @error('unit') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            
            <div  wire:loading wire:target="image_path" class="mt-2 text-gray-500">
                <svg class="animate-spin h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                          d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"/>
                </svg>
            </div>

            @if($image_path)
                <img src="{{ $image_path->temporaryUrl() }}" alt="Product Image" class="mt-2 w-32 h-32 object-cover rounded-lg">
                <button type="button" wire:click="$set('image_path', null)" class="mt-2 text-red-500 hover:underline">Remove Image</button>
            @endif
        
            
        </div>

        <!-- Image -->
        <div class="mb-4">
            <label for="image_path" class="block text-gray-700 font-medium">Product Image</label>
            <input type="file" id="image_path" wire:model="image_path" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300">
            @error('image_path') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Is Active -->
        <div class="mb-4 flex items-center">
            <input type="checkbox" id="is_active" wire:model="is_active" class="h-5 w-5 text-blue-600 focus:ring-blue-300 rounded">
            <label for="is_active" class="ml-2 text-gray-700 font-medium">Is Active</label>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" wire:loading.attr="disabled" class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">
                Add Product
            </button>
        </div>
    </form>


</div>