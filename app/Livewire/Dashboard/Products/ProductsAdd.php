<?php

namespace App\Livewire\Dashboard\Products;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;

class ProductsAdd extends Component
{
    use WithFileUploads;

    public $name, $price, $description, $image;
    public $productId; // متغير لتخزين ID المنتج الذي يتم تعديله
    public $products; // متغير لتخزين المنتجات التي سيتم عرضها

    public function mount()
    {
        // تحميل المنتجات عند تحميل المكون
        $this->products = Product::all();
    }

    public function saveProduct()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'required|image|max:2048', // الصورة لا تتجاوز 2MB
        ]);

        // حفظ الصورة ورفعها إلى مجلد التخزين
        $imagePath = $this->image->store('products', 'public');

        // حفظ المنتج في قاعدة البيانات
        Product::create([
            'name' => $this->name,
            'price' => $this->price,
            'description' => $this->description,
            'image' => $imagePath,
        ]);

        // إعادة تحميل المنتجات
        $this->products = Product::all();

        // إعادة ضبط المدخلات
        $this->reset(['name', 'price', 'description', 'image']);

        // رسالة نجاح
        session()->flash('success', 'Product added successfully!');
    }

    public function updateProduct()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048', // الصورة اختياري
        ]);

        // البحث عن المنتج الذي سيتم تحديثه
        $product = Product::find($this->productId);

        // إذا كان هناك صورة جديدة تم تحميلها، نقوم بتخزينها
        if ($this->image) {
            $imagePath = $this->image->store('products', 'public');
            $product->image = $imagePath;
        }

        // تحديث البيانات
        $product->name = $this->name;
        $product->price = $this->price;
        $product->description = $this->description;
        $product->save();

        // إعادة تحميل المنتجات
        $this->products = Product::all();

        // إعادة ضبط المدخلات
        $this->reset(['name', 'price', 'description', 'image']);

        // رسالة نجاح
        session()->flash('success', 'Product updated successfully!');
    }

    
    public function editProduct($productId)
    {
        // جلب المنتج الذي سيتم تعديله
        $product = Product::find($productId);

        // ملء المدخلات بالقيم الموجودة في المنتج
        $this->productId = $product->id;
        $this->name = $product->name;
        $this->price = $product->price;
        $this->description = $product->description;
    }

    public function render()
    {
        return view('livewire.dashboard.products.products-add')
            ->extends('layouts.dashboard.master')
            ->section('content');
    }
}
