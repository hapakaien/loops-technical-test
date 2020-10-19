<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CommentGuest extends Component
{
    public $comments;
    
    public function render()
    {
        return view('livewire.comment-guest');
    }
}
