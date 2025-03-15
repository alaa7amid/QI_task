<div class="w-full mt-12">
    <div class="flex justify-between items-center pb-3">
        <p class="text-xl flex items-center">
            <i class="fas fa-list mr-3"></i> Products List
        </p>
        <a href="{{route('products.add')}}">
            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                + Add New Product
            </button>
        </a>
    </div>
    <div class="bg-white overflow-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Product Name</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Price</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Description</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Image</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($products as $product)
                    <tr>
                        <td class="text-left py-3 px-4">{{$product->name}}</td>
                        <td class="text-left py-3 px-4">{{$product->price}}</td>
                        <td class="text-left py-3 px-4">{{$product->description}}</td>
                        <td class="text-left py-3 px-4">
                            <img src="{{asset('storage/' .$product->image)}}" alt="Product 1" class="w-16 h-16 object-cover">
                        </td>
                        <td class="text-left py-3 px-4">
                            <!-- ترتيب الأزرار في سطر واحد باستخدام Flexbox -->
                            <div class="flex space-x-2">
                                <!-- أيقونة العرض -->
                                <a href="{{ route('products.show', $product->id) }}">
                                    <button class="text-blue-500 hover:text-blue-600">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </a>
                                
                                
                                <!-- أيقونة التعديل -->
                                <a href="{{ route('products.edit', $product->id) }}">
                                <button class="text-yellow-500 hover:text-yellow-600">
                                    <i class="fas fa-edit"></i>
                                </button>
                                </a>
                                <!-- أيقونة الحذف -->
                                <button wire:click="deleteProduct({{ $product->id }})" class="text-red-500 hover:text-red-600">
                                    <i class="fas fa-trash-alt"></i> 
                                </button>
                            </div> 
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
