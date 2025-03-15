<div class="container mx-auto p-8 flex justify-center min-h-screen mt-16">
    <div class="text-white rounded-lg shadow-lg p-6 flex flex-col md:flex-row-reverse items-center md:items-start w-full max-w-5xl h-auto md:max-h-96 overflow-auto">
        
        <img src="{{ asset('storage/'. $product->image) }}" alt="منتج" class="w-full md:w-1/2 h-64 object-cover rounded-md shadow-md">
        
        <div class="md:mr-6 text-center md:text-left mt-6 md:mt-0 w-full md:w-1/2 flex flex-col justify-center overflow-hidden">
            <h2 class="text-3xl font-bold text-yellow-400 truncate">{{$product->name}}</h2>
            
            <p class="text-gray-300 text-lg mt-4 leading-relaxed overflow-auto max-h-32">
                {{$product->description}}
            </p>

            <div class="mt-4 text-gray-400">
                <p><span class="font-semibold text-green-400">متوفر في المخزون:</span> نعم</p>
                <p><span class="font-semibold text-green-400">الشحن:</span> مجاني لجميع المناطق</p>
            </div>

            <div class="flex justify-between md:justify-start items-center mt-6">
                <span class="text-2xl font-bold text-green-400">{{$product->price}}</span>
                <button wire:click="addToCart({{$product->id}})" class="bg-blue-600 text-white px-6 py-3 text-lg rounded-lg hover:bg-blue-500 transition ml-4 shadow-lg">
                    إضافة إلى السلة
                </button>
            </div>
        </div>
    </div>
</div>
