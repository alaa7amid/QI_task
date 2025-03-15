<?php

namespace App\Livewire\Dashboard\Admins;

use App\Models\User;
use Livewire\Component;

class Admins extends Component
{
    public function render()
    {$users = User::latest()->take(5)->get();
        return view('livewire.dashboard.admins.admins',compact('users'))
        ->extends('layouts.dashboard.master')
            ->section('content');
    }
}
