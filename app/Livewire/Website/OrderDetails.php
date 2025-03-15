<?php

namespace App\Livewire\Website;

use App\Models\Order;
use Livewire\Component;

class OrderDetails extends Component
{
    public $order;

    public function mount(Order $order)
    {
        $this->order = $order;
    }

    public function render()
    {
        return view('livewire.website.order-details')->extends('layouts.website.master')->section('content');
    }
}

