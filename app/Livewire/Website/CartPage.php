<?php

namespace App\Livewire\Website;

use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CartPage extends Component
{
    public $cart = [];
    public $address = '';

    public function mount(){
        $cartItems = Session::get('cart', []);

        $this->cart = collect($cartItems)->map(function ($item) {
            $product = Product::find($item['id']);
            return [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $item['quantity'],
                'image' => $product->image ?? 'default-image.jpg', 
            ];
        })->toArray();
    }

    public function addToCart($productId){
        $product = Product::findOrFail($productId);

        if(isset($this->cart[$productId])){
            $this->cart[$productId]['quantity'] += 1;
        } else {
            $this->cart[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image ?? 'default-image.jpg', 
            ];
        }

        Session::put('cart', $this->cart);
        session()->flash('success', ' add product to cart');
    }

    public function removeFromCart($productId){
        if(isset($this->cart[$productId])){
            unset($this->cart[$productId]);
            Session::put('cart', $this->cart);
            session()->flash('success', 'remove product from cart!');
        }
    }

    public function checkout(){
        if (empty($this->cart)) {
            session()->flash('error', ' empty cart!');
            return;
        }

        if (!$this->address) {
            session()->flash('error', ' enter your address!');
            return;
        }

        $totalPrice = collect($this->cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        $order = Order::create([
            'total_price' => $totalPrice,
            'status' => 'processing',
            'address' => $this->address,
        ]);

        foreach ($this->cart as $item) {
            OrderItems::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        Session::forget('cart');
        $this->cart = [];
        session()->flash('success', 'تم إتمام الطلب بنجاح!');
        return redirect()->route('order.details', ['order' => $order->id]); 
    }

    public function render()
    {
        return view('livewire.website.cart-page')->extends('layouts.website.master')->section('content');
    }
}
