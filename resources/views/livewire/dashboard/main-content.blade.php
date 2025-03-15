<div>
    @if($currentPage === 'dashboard')
        @livewire('dashboard.dashboard.dashboard-page')
    @elseif($currentPage === 'products')
        @livewire('dashboard.products.products-list')
    @endif
</div>

