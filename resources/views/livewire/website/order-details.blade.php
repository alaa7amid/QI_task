<div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">تفاصيل الطلب</h2>

    <!-- معلومات الطلب -->
    <div class="mb-4">
        <p><strong>رقم الطلب:</strong> {{ $order->id }}</p>
        <p><strong>العنوان:</strong> {{ $order->address }}</p>
        <p><strong>التاريخ:</strong> {{ $order->created_at->format('d-m-Y H:i') }}</p>
        <p><strong>المجموع:</strong> {{ $order->total_price }} د.ع</p>
    </div>

    <h3 class="text-xl font-semibold text-gray-700 mb-4">المنتجات</h3>
    
    <ul class="space-y-4">
        @foreach($order->items as $item)
            <li class="flex items-center justify-between p-4 bg-gray-50 rounded-lg shadow-sm border border-gray-200">
                <!-- صورة المنتج -->
                <img src="{{ asset('storage/' . ($item->product->image ?? 'default-image.jpg')) }}" 
                     alt="{{ $item->product->name }}" 
                     class="w-16 h-16 object-cover rounded-lg mr-4">

                <!-- تفاصيل المنتج -->
                <div class="flex-1">
                    <strong class="text-lg text-gray-800">{{ $item->product->name }}</strong>
                    <p class="text-gray-600 text-sm">{{ $item->quantity }} × {{ $item->price }} د.ع</p>
                </div>
                
                <!-- الإجمالي لكل منتج -->
                <p class="font-semibold text-gray-800">{{ $item->quantity * $item->price }} د.ع</p>
            </li>
        @endforeach
    </ul>
</div>
