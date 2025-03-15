
<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
    <div class="p-6">
        <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
        <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
            <i class="fas fa-plus mr-3"></i> New Report
        </button>
    </div>
    <nav class="text-white text-base font-semibold pt-3">
        <a href="{{ url('dashboard') }}" 
        wire:navigate
            class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
            <i class="fas fa-tachometer-alt mr-3"></i>
            Dashboard
            </a>

     
            <a href="{{ url('products') }}" 
            wire:navigate
            class="flex items-center text-white py-2 pl-4 nav-item">
            <i class="fas fa-cogs mr-3"></i>
            Products
         </a>
         <a href="{{ url('/dashboard/orders') }}" 
            wire:navigate
            class="flex items-center text-white py-2 pl-4 nav-item">
            <i class="fas fa-cogs mr-3"></i>
            Orders
         </a>
         <a href="{{ url('/admins') }}" 
            wire:navigate
            class="flex items-center text-white py-2 pl-4 nav-item">
            <i class="fas fa-cogs mr-3"></i>
            Admis
         </a>
         {{-- <div class="bg-gray-800 text-white p-4">
            <h2 class="text-xl font-semibold mb-4">لوحة التحكم</h2>
            <ul>
                <li>
                    <a href="{{ route('dashboard.orders') }}" class="hover:underline">قائمة الطلبات</a>
                </li>
            </ul>
        </div> --}}
        
        
</aside>
