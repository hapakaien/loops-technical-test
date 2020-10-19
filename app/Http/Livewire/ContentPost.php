<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ContentPost extends Component
{
    public $posts;

    public function render()
    {
        return view('livewire.content-post');
    }
}
