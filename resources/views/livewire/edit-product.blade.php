<div>

    <!-- Add Product Form -->
    <form wire:submit.prevent="submit">
        <!-- Product Name -->
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium">Product Name</label>
            <input type="text" id="name" wire:model="name" 
                class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300"
                placeholder="Enter product name" required>
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- SKU -->
        <div class="mb-4">
            <label for="sku" class="block text-gray-700 font-medium">SKU</label>
            <input type="text" id="sku" wire:model="sku" 
                class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300"
                placeholder="Enter product SKU" required>
            @error('sku')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Category -->
        <div class="mb-4">
            <label for="category_id" class="block text-gray-700 font-medium">Category</label>
            <select id="category_id" wire:model="category_id"
            class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300"
            required>
            <option value="">Select Category</option>
            @foreach ($this->categories as $category)
                <option value="{{ $category->id }}">
                {{ $category->name }}
                </option>
            @endforeach
            </select>
            @error('category_id')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Supplier -->
        <div class="mb-4">
            <label for="supplier_id" class="block text-gray-700 font-medium">Supplier</label>
            <select id="supplier_id" wire:model="supplier_id"
            class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300"
            required>
            <option value="">Select Supplier</option>
            @foreach ($this->suppliers as $supplier)
                <option value="{{ $supplier->id }}">
                {{ $supplier->supplier_name }}
                </option>
            @endforeach
            </select>
            @error('supplier_id')
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

        <!-- Price -->
        <div class="mb-4">
            <label for="price" class="block text-gray-700 font-medium">Price</label>
            <input type="number" id="price" wire:model="price" step="1.00"
                class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300"
                placeholder="Enter product price" required>
            @error('price')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Cost Price -->
        <div class="mb-4">
            <label for="cost_price" class="block text-gray-700 font-medium">Cost Price</label>
            <input type="number" id="cost_price" wire:model="cost_price" step="0.01"
                class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300"
                placeholder="Enter cost price" required>
            @error('cost_price')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Quantity -->
        <div class="mb-4">
            <label for="quantity" class="block text-gray-700 font-medium">Quantity</label>
            <input type="number" id="quantity" wire:model="quantity"
                class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300"
                placeholder="Enter quantity" required>
            @error('quantity')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Low Stock Alert -->
        <div class="mb-4">
            <label for="low_stock_alert" class="block text-gray-700 font-medium">Low Stock Alert</label>
            <input type="number" id="low_stock_alert" wire:model="low_stock_alert"
                class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300"
                placeholder="Set low stock alert">
            @error('low_stock_alert')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Unit -->
        <div class="mb-4">
            <label for="unit_id" class="block text-gray-700 font-medium">Unit</label>
            <select wire:model="unit_id" id="unit" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300" placeholder="Enter unit of measurement">
                <option value="">Select Unit</option>
                @foreach($units as $unit)
                    <option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
                @endforeach
            </select>
            @error('unit_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Image -->
        <div class="mb-4">
            <label for="uploadedImage" class="block text-sm font-medium text-gray-700">Product Image</label>
            <input type="file" id="uploadedImage" wire:model="uploadedImage"
                class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300">
                @error('uploadedImage') 
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div> 
            @enderror
            
            <!-- Loading indicator -->
            <div wire:loading wire:target="uploadedImage" class="text-sm text-gray-500 mt-2">
                Uploading preview...
            </div>

            <!-- Preview new selected image -->
            @if ($uploadedImage)
                <div class="mt-4">
                    <p class="text-sm font-semibold text-gray-600">Image Preview:</p>
                    <img src="{{ $uploadedImage->temporaryUrl() }}" alt="Preview"
                        class="mt-1 max-h-40 rounded shadow">

                    <!-- Remove button -->
                    <button type="button" wire:click="removeImage"
                        class="mt-2 inline-block px-3 py-1 text-sm text-white bg-red-500 hover:bg-red-600 rounded">
                        Remove Selected Image
                    </button>
                </div>

                <!-- Show existing image if no new one selected -->
            @elseif ($product->image_path)
                <div class="mt-2">
                    <p><strong>Current Image:</strong></p>
                    <img src="{{ Storage::url($product->image_path) }}" alt="Current" style="max-height: 150px;">
                </div>
            @endif
        </div>


        <!-- Barcode -->
        <div class="mb-4">
            <label for="barcode" class="block text-gray-700 font-medium">Barcode</label>
            <input type="text" id="barcode" wire:model="barcode"
                class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300"
                placeholder="Enter barcode">
            @error('barcode')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Is Active -->
        <div class="mb-4 flex items-center">
            <input type="checkbox" id="is_active" wire:model="is_active"
                class="h-5 w-5 text-blue-600 focus:ring-blue-300 rounded">
            <label for="is_active" class="ml-2 text-gray-700 font-medium">Is Active</label>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" wire:loading.attr="disabled"
                class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">
                Update Product
            </button>
        </div>
    </form>


</div>
