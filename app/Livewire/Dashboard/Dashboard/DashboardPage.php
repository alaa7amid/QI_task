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
        // تحقق من الرول قبل تنفيذ أي عملية داخل الـ Component
        if (Auth::check()) {
            if (Auth::user()->role != 1) {
                // إذا لم يكن المستخدم أدمن، يمكنك توجيههم إلى صفحة أخرى
                return redirect()->route('home.page');
            }
        } else {
            // إذا لم يكن المستخدم مسجل دخول، يمكنك توجيههم إلى صفحة التسجيل
            return redirect()->route('login');
        }

        // جمع البيانات
        $this->userCount = User::count(); // عدد المستخدمين
        $this->productCount = Product::count(); // عدد المنتجات
        $this->orderCount = Order::count(); // عدد الطلبات
    }

    public function render()
{
    $users = User::latest()->take(5)->get(); // الحصول على آخر 5 مستخدمين
    return view('livewire.dashboard.dashboard.dashboard-page', compact('users'))
        ->extends('layouts.dashboard.master')
        ->section('content');
}

}
