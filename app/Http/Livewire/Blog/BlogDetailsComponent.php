<?php

namespace App\Http\Livewire\Blog;

use App\Models\Blog;
use Livewire\Component;

class BlogDetailsComponent extends Component
{
    public $slug;
    
    public function mount($slug){
        $this->slug = $slug;
    }
    
    public function render()
    {
        $blog = Blog::where('slug', $this->slug)->first();
        
        // dd($blog);
        
        return view('livewire.blog.blog-details-component',[
            'blogs' => Blog::all(),
            'blog' => $blog,
        ])->layout('layouts.base');
    }
}
