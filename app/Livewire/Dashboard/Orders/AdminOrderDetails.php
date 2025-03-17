<?php

namespace App\Livewire\Dashboard\Orders;

use App\Models\Order;
use Livewire\Component;

class AdminOrderDetails extends Component
{
    public $order;  
    public $status; 

    public function mount($orderId)
    {
        $this->order = Order::find($orderId);
        if ($this->order) {
            $this->status = $this->order->status == 'delivered' ? 'delivered' : 'processing';  // تعيين الحالة الافتراضية
        } else {
            session()->flash('error', 'الطلب غير موجود');
            return redirect()->route('dashboard.orders');
        }
    }

    
    public function updateStatus()
{
    
    $validStatuses = ['processing', 'shipped', 'delivered'];

    if (in_array($this->status, $validStatuses)) {
        $this->order->status = $this->status;
        $this->order->save();
    } else {
       
        session()->flash('error', ' error ');
    }
}


    public function render()
    {
        return view('livewire.dashboard.orders.admin-order-details')
            ->extends('layouts.dashboard.master')->section('content');
    }
}
