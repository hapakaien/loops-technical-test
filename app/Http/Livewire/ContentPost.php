<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class ContentPost extends Component
{
    public function render()
    {
        return view('livewire.content-post', [
            'posts' => Post::with('user:id,name,email')->get(),
        ]);
    }
}
