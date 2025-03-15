<?php

namespace App\Livewire\Website;

use App\Models\Product;
use Livewire\Component;

class HomePage extends Component
{
    public function render()
    {
        $products = Product::all();
        return view('livewire.website.home-page',compact('products'))->extends('layouts.website.master')->section('content');
    }
}
