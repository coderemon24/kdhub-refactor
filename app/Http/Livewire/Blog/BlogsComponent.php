<?php

namespace App\Http\Livewire\Blog;

use App\Models\Blog;
use Livewire\Component;

class BlogsComponent extends Component
{
    public function render()
    {
        return view('livewire.blog.blogs-component',[
            'blogs' => Blog::all(),
        ])->layout('layouts.base');
    }
}
