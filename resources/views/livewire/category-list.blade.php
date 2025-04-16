<div>
    <input type="text" wire:model.debounce.300ms="search" placeholder="Search categories..."
        class="px-4 py-2 border rounded-lg shadow-sm focus:ring focus:border-blue-300 w-full my-4 " />
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @forelse ($categories as $category)
            <div class="bg-white shadow rounded-2xl p-4 hover:shadow-md transition">
                <div
                    class="w-full h-32 bg-gray-100 rounded-lg flex items-center justify-center text-gray-500 text-xl font-semibold mb-4">
                    {{ strtoupper(substr($category->name, 0, 1)) }}
                </div>

                <h2 class="text-lg font-semibold text-gray-800">{{ $category->name }}</h2>
                <p class="text-sm text-gray-600">{{ $category->description ?? 'No description available.' }}</p>

                <div class="mt-4 flex justify-between text-sm">
                    <a wire:navigate href="{{ route('categories.show', $category->id)}}" class="text-blue-600 hover:underline">View</a>
                    <a wire:navigate href="{{ route('categories.edit', $category->id)}}" class="text-yellow-500 hover:underline">Edit</a>
                    <a wire:navigate wire:click="delete({{$category->id}})" class="text-red-500 hover:underline">Delete</a>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center text-gray-500">No categories found.</div>
        @endforelse
    </div>

    <div class="mt-6">
        {{ $categories->links() }}
    </div>

</div>
