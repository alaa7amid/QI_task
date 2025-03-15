<div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">سلة التسوق</h2>

    @foreach($cart as $item)
    <div class="flex justify-between items-center py-3 border-b border-gray-300">
        <div class="flex items-center space-x-4">
            <!-- صورة المنتج -->
            @if(isset($item['image']) && $item['image'])
            {{-- {{ dd($item['image']) }} --}}

                <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="w-16 h-16 object-cover rounded-lg">
            @else
                {{-- <img src="{{ asset('default-image.jpg') }}" alt="صورة افتراضية" class="w-16 h-16 object-cover rounded-lg"> --}}
            @endif

            <p class="text-gray-700 font-medium">{{ $item['name'] }} - ${{ $item['price'] }} × {{ $item['quantity'] }}</p>
        </div>
        <button wire:click="removeFromCart({{ $item['id'] }})"
            class="bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600 focus:outline-none">
            إزالة
        </button>
    </div>
    @endforeach

    @if(!empty($cart))
        <div class="mt-6">
            <label for="address" class="block text-gray-700 mb-2">عنوان التوصيل:</label>
            <input 
                type="text" 
                id="address" 
                wire:model="address" 
                placeholder="أدخل عنوانك" 
                class="w-full p-3 border border-gray-300 rounded-lg mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500">

            <button 
                wire:click="checkout" 
                class="w-full bg-green-500 text-white py-3 rounded-lg hover:bg-green-600 focus:outline-none">
                إتمام الطلب
            </button>
        </div>
    @endif
</div>
