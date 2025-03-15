<?php

namespace App\Livewire\Dashboard\Orders;

use App\Models\Order;
use Livewire\Component;

class OrdersDetails extends Component
{
    

    public function render()
    {
        return view('livewire.dashboard.orders.orders-details')
        ->extends('layouts.dashboard.master')->section('content');
    }
}
