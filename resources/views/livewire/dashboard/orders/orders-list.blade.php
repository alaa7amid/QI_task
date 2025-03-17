<div class="max-w-7xl mx-auto p-6 bg-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Order List</h2>

    <!-- Display Order List -->
    @if($orders->isEmpty())
        <p class="text-center text-gray-600">No orders available.</p>
    @else
        <table class="min-w-full table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-left border-b">Order ID</th>
                    <th class="px-4 py-2 text-left border-b">Address</th>
                    <th class="px-4 py-2 text-left border-b">Date</th>
                    <th class="px-4 py-2 text-left border-b">Total</th>
                    <th class="px-4 py-2 text-left border-b">Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td class="px-4 py-2 border-b">{{ $order->id }}</td>
                        <td class="px-4 py-2 border-b">{{ $order->address }}</td>
                        <td class="px-4 py-2 border-b">{{ $order->created_at->format('d-m-Y') }}</td>
                        <td class="px-4 py-2 border-b">{{ $order->total_price }} IQD</td>
                        <td class="px-4 py-2 border-b">
                            <a wire:navigate href="{{ route('dashboard.order.details', ['orderId' => $order->id]) }}" class="text-blue-500 hover:underline">View Details</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
