<x-layouts.app>
    {{-- <div class="max-w-5xl mx-auto px-4 py-8">
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
      </div> --}}
    
      <div class="container">
        <h1 class="mb-4">{{ $product->name }}</h1>
    
        <div class="row">
            <div class="col-md-4">
                @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}">
                @else
                    <img src="{{ asset('images/no-image.png') }}" class="img-fluid" alt="No image">
                @endif
            </div>
    
            <div class="col-md-8">
                <table class="table table-bordered">
                    <tr>
                        <th>SKU</th>
                        <td>{{ $product->sku }}</td>
                    </tr>
                    <tr>
                        <th>Category</th>
                        <td>{{ $product->category->name ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Supplier</th>
                        <td>{{ $product->supplier->name ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{ $product->description ?? '—' }}</td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <td>${{ number_format($product->price, 2) }}</td>
                    </tr>
                    <tr>
                        <th>Cost Price</th>
                        <td>${{ number_format($product->cost_price, 2) }}</td>
                    </tr>
                    <tr>
                        <th>Quantity</th>
                        <td>{{ $product->quantity }} {{ $product->unit ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Low Stock Alert</th>
                        <td>{{ $product->low_stock_alert ?? '—' }}</td>
                    </tr>
                    <tr>
                        <th>Barcode</th>
                        <td>{{ $product->barcode ?? '—' }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <span class="badge {{ $product->is_active ? 'bg-success' : 'bg-danger' }}">
                                {{ $product->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                    </tr>
                </table>
                <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Back to Products</a>
            </div>
        </div>
    </div>  

    </x-layouts.app> 