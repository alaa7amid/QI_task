<div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
    <p class="text-xl pb-6 flex items-center">
        <i class="fas fa-box mr-3"></i> Edit Product
    </p>

    @if (session()->has('success'))
        <div class="mb-4 text-green-600 font-semibold">
            {{ session('success') }}
        </div>
    @endif

    <div class="leading-loose">
        <form wire:submit.prevent="updateProduct" class="p-10 bg-white rounded shadow-xl">
            <div class="mb-4">
                <label class="block text-sm text-gray-600">Product Name</label>
                <input wire:model="name" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" type="text" placeholder="Enter product name">
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm text-gray-600">Price ($)</label>
                <input wire:model="price" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" type="number" placeholder="Enter price">
                @error('price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm text-gray-600">Description</label>
                <textarea wire:model="description" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" rows="4" placeholder="Enter product description"></textarea>
                @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- عرض الصورة الحالية -->
            <div class="mb-4">
                <label class="block text-sm text-gray-600">Current Product Image</label>
                @if($product->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="w-32 h-32 object-cover rounded">
                    </div>
                @else
                    <p>No image available.</p>
                @endif
            </div>

            <div class="mb-4">
                <label class="block text-sm text-gray-600">New Product Image</label>
                <input wire:model="image" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" type="file">
                @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mt-6">
                <button class="px-4 py-2 text-white font-light tracking-wider bg-blue-600 hover:bg-blue-700 rounded" type="submit">
                    Update Product
                </button>
            </div>
        </form>
    </div>
</div>
