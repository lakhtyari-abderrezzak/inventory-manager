<x-layouts.app>
    <div class="max-w-5xl mx-auto px-4 py-8">
        <div class="bg-white shadow-xl rounded-2xl p-6 grid md:grid-cols-2 gap-6">
          
          <!-- Product Image -->
          <div class="flex items-center justify-center">
            <img src="https://via.placeholder.com/300x300.png?text=Product+Image" alt="Product Image" class="rounded-xl w-full h-auto object-cover">
          </div>
          
          <!-- Product Details -->
          <div>
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Smartphone XYZ</h2>
      
            <div class="space-y-3 text-gray-700">
              <p><span class="font-semibold">SKU:</span> PROD-12345</p>
              <p><span class="font-semibold">Price:</span> $499.99</p>
              <p><span class="font-semibold">Stock:</span> 120 units</p>
              <p><span class="font-semibold">Category:</span> Electronics</p>
              <p><span class="font-semibold">Supplier:</span> Tech Supplies Inc.</p>
            </div>
      
            <div class="mt-6">
              <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">Edit Product</button>
              <button class="ml-2 bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-600 transition">Delete</button>
            </div>
          </div>
      
        </div>
      
        <!-- Product Description -->
        <div class="mt-10 bg-white rounded-2xl shadow p-6">
          <h3 class="text-xl font-semibold text-gray-800 mb-3">Description</h3>
          <p class="text-gray-700 leading-relaxed">
            The Smartphone XYZ is a high-performance device with a sleek design, powerful processor, and long-lasting battery. Perfect for everyday use and professional tasks.
          </p>
        </div>
      </div>
      
</x-layouts.app> 