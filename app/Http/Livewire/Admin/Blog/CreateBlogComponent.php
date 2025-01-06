<?php

namespace App\Http\Livewire\Admin\Blog;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateBlogComponent extends Component
{
    use WithFileUploads;
    
    public $title;
    public $description;
    public $image;
    public $slug;
    
    
    public function createBlog(){
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|max:10000',
            'slug' => 'required|string',
        ]);
        
        $data = new \App\Models\Blog();
        $data->title = $this->title;
        $data->slug = strtolower(str_replace(' ', '-', $this->slug));
        $data->description = $this->description;
        
        $imagename = Carbon::now()->timestamp . '.' .$this->image->extension();
        
        $this->image->storeAs('Blog', $imagename);
        
        $data->image = $imagename;
        
        $data->save();
        
        session()->flash('message','Blog has been created successfully');
        
        return redirect()->route('blog.index');
    }
    
    public function render()
    {
        return view('livewire.admin.blog.create-blog-component')->layout('layouts.admin');
    }
}
