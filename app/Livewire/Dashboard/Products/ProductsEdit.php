<?php
namespace App\Livewire\Dashboard\Products;

namespace App\Livewire\Dashboard\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductsEdit extends Component
{
    use WithFileUploads;

    public $productId;
    public $name;
    public $price;
    public $description;
    public $image;

   
    public function mount($productId)
    {
        $this->productId = $productId;
        $product = Product::find($this->productId);
        $this->name = $product->name;
        $this->price = $product->price;
        $this->description = $product->description;
        $this->image = $product->image;
    }

   
    public function updateProduct()
    {
        $product = Product::find($this->productId);
        $product->name = $this->name;
        $product->price = $this->price;
        $product->description = $this->description;

        
        if ($this->image) {
            
            $imagePath = $this->image->storePublicly('product_images', 'public');
            $product->image = $imagePath;
        }

        $product->save();

        session()->flash('success', 'Product updated successfully!');
        return redirect()->route('products'); 
    }

    public function render()
    {
        $product = Product::find($this->productId);
        return view('livewire.dashboard.products.products-edit', compact('product'))
            ->extends('layouts.dashboard.master')
            ->section('content');
    }
}
