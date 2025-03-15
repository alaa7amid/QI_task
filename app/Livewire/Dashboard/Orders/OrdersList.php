<?php

namespace App\Livewire\Dashboard\Orders;

use App\Models\Order;
use Livewire\Component;

class OrdersList extends Component
{
    public function render()
    {
        $orders = Order::all();
        return view('livewire.dashboard.orders.orders-list',compact('orders'))
        ->extends('layouts.dashboard.master')->section('content');
    }
}
