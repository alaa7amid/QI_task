<?php

namespace App\Livewire\Dashboard\Products;

use App\Models\Product;
use Livewire\Component;

class ProductsList extends Component
{
    public $products;

    public function mount()
    {
        
        $this->products = Product::all();
    }

    public function deleteProduct($productId)
    {
      
        $product = Product::find($productId);

        if ($product) {
            
            if ($product->image) {
                \Storage::disk('public')->delete($product->image);
            }

            
            $product->delete();

            
            session()->flash('success', 'Product deleted successfully!');

           
            $this->products = Product::all();
        } else {
            session()->flash('error', 'Product not found!');
        }
    }

    public function render()
    {
        return view('livewire.dashboard.products.products-list', [
            'products' => $this->products
        ])
        ->extends('layouts.dashboard.master')
        ->section('content');
    }
}
