<?php

namespace App\Http\Livewire\Admin\Blog;

use App\Models\Blog;
use Livewire\Component;

class BlogComponent extends Component
{
    
    
    public function deleteBlog($id)
    {
        $blog = Blog::findOrfail($id);
        if(file_exists('assets/image/Blog/'.$blog->image))
        {
            unlink('assets/image/Blog/'.$blog->image);
        }
        
        $blog->delete();
        
        session()->flash('message', 'Blog Deleted Successfully');
        
        return redirect()->route('blog.index');
    }
    
    public function render()
    {
        return view('livewire.admin.blog.blog-component',[
            'blogs' => Blog::all(),
        ])->layout('layouts.admin');
    }
}
