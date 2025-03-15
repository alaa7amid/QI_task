<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class MainContent extends Component
{
    public $currentPage = 'dashboard'; // الصفحة الافتراضية

    protected $listeners = ['changePage' => 'goToPage'];

    public function render()
{
    return view('livewire.dashboard.main-content')->extends('layouts.dashboard.master')->section('content');
}


    public function goToPage($page)
    {
        $this->currentPage = $page;
    }
}
