<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderItems;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'nullable|integer|min:1'
        ]);

      
        $order = Order::firstOrCreate([
            'user_id' => $request->user()->id,
            'status' => 'pending', 
        ]);

       
        $orderItem = OrderItems::updateOrCreate(
            [
                'order_id' => $order->id,
                'product_id' => $request->product_id,
            ],
            [
                'quantity' => $request->quantity ?? 1,
            ]
        );

        return response()->json($orderItem, 201);
    }

    public function destroy($id)
    {
        $orderItem = OrderItems::find($id);
        if (!$orderItem) {
            return response()->json(['message' => 'Item not found'], 404);
        }

        $orderItem->delete();
        return response()->json(['message' => 'Item removed from cart']);
    }
}
