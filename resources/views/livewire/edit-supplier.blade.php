<div>

    <x-success-message />

    <!-- Add Supplier Form -->
    <form wire:submit.prevent="submit">
        <!-- Supplier Name -->
        <div class="mb-4">
            <label for="supplier_name" class="block text-gray-700 font-medium">Supplier Name</label>
            <input type="text" id="supplier_name" wire:model="supplier_name" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300" placeholder="Enter supplier name" required>
            @error('supplier_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Primary Contact Name -->
        <div class="mb-4">
            <label for="primary_contact_name" class="block text-gray-700 font-medium">Primary Contact Name</label>
            <input type="text" id="primary_contact_name" wire:model="primary_contact_name" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300" placeholder="Enter contact person's name" required>
            @error('primary_contact_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-medium">Email</label>
            <input type="email" id="email" wire:model="email" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300" placeholder="Enter supplier email" required>
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Phone -->
        <div class="mb-4">
            <label for="phone" class="block text-gray-700 font-medium">Phone</label>
            <input type="text" id="phone" wire:model="phone" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300" placeholder="Enter phone number" required>
            @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Address -->
        <div class="mb-4">
            <label for="address" class="block text-gray-700 font-medium">Address</label>
            <input type="text" id="address" wire:model="address" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300" placeholder="Enter address">
            @error('address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- City -->
        <div class="mb-4">
            <label for="city" class="block text-gray-700 font-medium">City</label>
            <input type="text" id="city" wire:model="city" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300" placeholder="Enter city">
            @error('city') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Country -->
        <div class="mb-4">
            <label for="country" class="block text-gray-700 font-medium">Country</label>
            <input type="text" id="country" wire:model="country" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300" placeholder="Enter country">
            @error('country') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Is Active -->
        <div class="mb-4 flex items-center">
            <input type="checkbox" id="is_active" wire:model="is_active" class="h-5 w-5 text-blue-600 focus:ring-blue-300 rounded">
            <label for="is_active" class="ml-2 text-gray-700 font-medium">Is Active</label>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" wire:loading.attr="disabled" class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">
                Update Supplier
            </button>
        </div>
    </form>

</div>
