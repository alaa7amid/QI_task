<div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
    <p class="text-xl pb-6 flex items-center">
        <i class="fas fa-box mr-3"></i> View Product Details
    </p>

    @if (session()->has('success'))
        <div class="mb-4 text-green-600 font-semibold">
            {{ session('success') }}
        </div>
    @endif

    <div class="leading-loose">
        <div class="p-10 bg-white rounded shadow-xl">
            <div class="mb-4">
                <label class="block text-sm text-gray-600">Product Name</label>
                <p class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded">{{ $product->name }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-sm text-gray-600">Price ($)</label>
                <p class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded">{{ $product->price }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-sm text-gray-600">Description</label>
                <p class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded">{{ $product->description }}</p>
            </div>

            <div class="mb-4">
                <label class="block text-sm text-gray-600">Product Image</label>
                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="w-32 h-32 object-cover rounded">
            </div>

            <div class="mt-6">
                <a href="{{ route('products.edit', ['productId' => $product->id]) }}">
                    <button class="px-4 py-2 text-white font-light tracking-wider bg-yellow-600 hover:bg-yellow-700 rounded">
                        Edit Product
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
