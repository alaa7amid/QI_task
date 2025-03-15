<div class="max-w-7xl mx-auto p-6 bg-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">تفاصيل الطلب</h2>

    <p><strong>رقم الطلب:</strong> {{ $order->id }}</p>
    <p><strong>العنوان:</strong> {{ $order->address }}</p>
    <p><strong>التاريخ:</strong> {{ $order->created_at->format('d-m-Y') }}</p>
    <p><strong>المجموع:</strong> {{ $order->total_price }} د.ع</p>

    <!-- حالة الطلب -->
    <p><strong>حالة الطلب:</strong> 
        @if($status == 'processing')
            قيد المعالجة
        @else
            تم اكتمال الطلب
        @endif
    </p>

    <!-- جك بوكس لتحديد اكتمال الطلب -->
    <div class="flex items-center mt-4">
        <input type="checkbox" 
               id="complete" 
               wire:model="status" 
               wire:click="updateStatus" 
               value="delivered" 
               {{ $status == 'delivered' ? 'checked' : '' }} 
               class="mr-2">
        <label for="complete" class="text-gray-700">تم اكتمال الطلب</label>
    </div>

    <h3 class="text-xl font-semibold text-gray-700 mb-4">المنتجات</h3>
    <ul>
        @foreach($order->items as $item)
            <li class="flex items-center space-x-4 py-2 border-b">
                <!-- صورة المنتج -->
                <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="w-16 h-16 object-cover rounded-lg mr-4">
                <strong>{{ $item->product->name }}</strong> - 
                {{ $item->quantity }} × {{ $item->price }} د.ع
            </li>
        @endforeach
    </ul>
</div>
