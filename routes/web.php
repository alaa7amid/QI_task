<?php

use App\Livewire\Dashboard\Admins\AdminAdd;
use App\Livewire\Dashboard\Admins\Admins;
use App\Livewire\Dashboard\Dashboard\DashboardPage;
use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard\MainContent;
use App\Livewire\Dashboard\Orders\AdminOrderDetails;
use App\Livewire\Dashboard\Orders\OrdersList;
use App\Livewire\Dashboard\Products\ProductsAdd;
use App\Livewire\Dashboard\Products\ProductsList;
use App\Livewire\Dashboard\Products\ProductsShow;
use App\Livewire\Dashboard\Products\ProductsEdit;
use App\Livewire\Website\HomePage;
use App\Livewire\Website\ProductDetails;
use App\Livewire\Website\CartPage;
use App\Livewire\Website\OrderDetails;


// Route::view('/', 'welcome');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::view('profile', 'profile')
//     ->middleware(['auth'])
//     ->name('profile');






// Route::get('/dashboard-main', MainContent::class);
Route::get('/dashboard', DashboardPage::class)->name('dashboard.page');

Route::get('/products', ProductsList::class)->name('products');
Route::get('/products/add', ProductsAdd::class)->name('products.add');
Route::get('/products/{id}', ProductsShow::class)->name('products.show');


Route::get('/product/{productId}/edit', ProductsEdit::class)->name('products.edit');


Route::get('/dashboard/products', ProductsList::class)->name('products.list');


Route::get('/',HomePage::class)->name('home.page');
Route::get('/product/{id}', ProductDetails::class)->name('product.details');


Route::get('/cart', CartPage::class)->name('cart')->middleware('auth');


Route::get('/order/{order}', OrderDetails::class)->name('order.details');
Route::get('/dashboard/orders', OrdersList::class)->name('dashboard.orders');


Route::get('/dashboard/orders/{orderId}', AdminOrderDetails::class)->name('dashboard.order.details');

Route::get('/admins', Admins::class)->name('admins');

Route::get('/admins/add', AdminAdd::class)->name('admins.add');




require __DIR__.'/auth.php';
require __DIR__.'/api.php';



