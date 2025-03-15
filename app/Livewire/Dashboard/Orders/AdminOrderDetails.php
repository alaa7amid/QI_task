<?php

namespace App\Livewire\Dashboard\Orders;

use App\Models\Order;
use Livewire\Component;

class AdminOrderDetails extends Component
{
    public $order;  // لحفظ الطلب
    public $status; // لحفظ حالة الطلب التي سيتم تعديلها

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

    // تحديث حالة الطلب بناءً على الجيك بوكس
    public function updateStatus()
{
    // تحقق من القيمة المحددة وتأكد من أنها ضمن القيم المسموح بها
    $validStatuses = ['processing', 'shipped', 'delivered'];

    if (in_array($this->status, $validStatuses)) {
        $this->order->status = $this->status;
        $this->order->save();
    } else {
        // في حال كانت القيمة غير صحيحة، نعرض رسالة خطأ
        session()->flash('error', 'حالة الطلب غير صحيحة');
    }
}


    public function render()
    {
        return view('livewire.dashboard.orders.admin-order-details')
            ->extends('layouts.dashboard.master')->section('content');
    }
}
