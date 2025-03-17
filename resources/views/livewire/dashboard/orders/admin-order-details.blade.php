<div class="max-w-7xl mx-auto p-6 bg-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Order Details</h2>

    <p><strong>Order ID:</strong> {{ $order->id }}</p>
    <p><strong>Address:</strong> {{ $order->address }}</p>
    <p><strong>Date:</strong> {{ $order->created_at->format('d-m-Y') }}</p>
    <p><strong>Total:</strong> {{ $order->total_price }} IQD</p>

    <!-- Order Status -->
    <p><strong>Order Status:</strong> 
        @if($status == 'processing')
            Processing
        @else
            Completed
        @endif
    </p>

    <!-- Checkbox to Mark Order as Completed -->
    <div class="flex items-center mt-4">
        <input type="checkbox" 
               id="complete" 
               wire:model="status" 
               wire:click="updateStatus" 
               value="delivered" 
               {{ $status == 'delivered' ? 'checked' : '' }} 
               class="mr-2">
        <label for="complete" class="text-gray-700">Order Completed</label>
    </div>

    <h3 class="text-xl font-semibold text-gray-700 mb-4">Products</h3>
    <ul>
        @foreach($order->items as $item)
            <li class="flex items-center space-x-4 py-2 border-b">
                <!-- Product Image -->
                <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="w-16 h-16 object-cover rounded-lg mr-4">
                <strong>{{ $item->product->name }}</strong> - 
                {{ $item->quantity }} × {{ $item->price }} IQD
            </li>
        @endforeach
    </ul>
</div>
