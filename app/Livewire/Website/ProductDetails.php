<?php

namespace App\Livewire\Website;

use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ProductDetails extends Component
{
    public $product;

    public $cart = [];

   

    public function addToCart($productId){
        $product = Product::findOrFail($productId);
        if(isset($this->cart[$productId])){
            $this->cart[$productId]['quantity'] +=1;
        }else{
            $this->cart[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }
        Session::put('cart',$this->cart);
        session()->flash('success', 'add products to cart!');

    }

    public function mount($id){
        $this->product = Product::findOrFail($id);
        $this->cart = Session::get('cart',[]);
    }

    public function render()
    {

        return view('livewire.website.product-details')->extends('layouts.website.master')->section('content');
    }
}
