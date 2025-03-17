<?php

namespace App\Livewire\Dashboard\Products;

use Livewire\Component;
use App\Models\Product;

class ProductsShow extends Component
{
    public $product;

    public function mount($id)
    {
        
        $this->product = Product::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.dashboard.products.products-show')
        ->extends('layouts.dashboard.master')->section('content');
    }
} 
