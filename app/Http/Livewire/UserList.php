<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserList extends Component
{
    public $users;

    public function render()
    {
        return view('livewire.user-list');
    }
}
