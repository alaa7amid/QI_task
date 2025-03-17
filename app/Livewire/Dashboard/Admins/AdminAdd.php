<?php

namespace App\Livewire\Dashboard\Admins;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AdminAdd extends Component
{

    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $role = 0; 

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
    ];



    public function updatedRole($value)
    {
       
        $this->role = $value ? 1 : 0;
    }
    
    public function saveAdmin()
    {
        $this->validate();
    
        
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => $this->role, 
        ]);
    
        session()->flash('success', 'Admin added successfully!');
    
      
        $this->reset(['name', 'email', 'password', 'password_confirmation', 'role']);
    }
    
    


    public function render()
    {
        return view('livewire.dashboard.admins.admin-add')
        ->extends('layouts.dashboard.master')
            ->section('content');
    }
}
