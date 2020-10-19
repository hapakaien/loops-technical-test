<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserList extends Component
{
    public function render()
    {
        return view('livewire.user-list', [
            'users' => User::with('comments')->get(),
        ]);
    }
}