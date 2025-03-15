<?php

namespace App\Livewire\Dashboard\Products;

use App\Models\Product;
use Livewire\Component;

class ProductsList extends Component
{
    public $products;

    public function mount()
    {
        // تحميل المنتجات عند تحميل الكومبوننت
        $this->products = Product::all();
    }

    public function deleteProduct($productId)
    {
        // البحث عن المنتج الذي سيتم حذفه
        $product = Product::find($productId);

        if ($product) {
            // حذف الصورة من التخزين إذا كانت موجودة
            if ($product->image) {
                \Storage::disk('public')->delete($product->image);
            }

            // حذف المنتج من قاعدة البيانات
            $product->delete();

            // إرسال رسالة نجاح
            session()->flash('success', 'Product deleted successfully!');

            // إعادة تحميل المنتجات من قاعدة البيانات بعد الحذف
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
