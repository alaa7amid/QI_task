<?php
namespace App\Livewire\Dashboard\Dashboard;

use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DashboardPage extends Component
{
    public $userCount;
    public $productCount;
    public $orderCount;

    public function mount()
    {
        
        if (Auth::check()) {
            if (Auth::user()->role != 1) {
              
                return redirect()->route('home.page');
            }
        } else {
            
            return redirect()->route('login');
        }

        
        $this->userCount = User::count(); 
        $this->productCount = Product::count(); 
        $this->orderCount = Order::count(); 
    }

    public function render()
{
    $users = User::latest()->take(5)->get(); 
    return view('livewire.dashboard.dashboard.dashboard-page', compact('users'))
        ->extends('layouts.dashboard.master')
        ->section('content');
}

}
