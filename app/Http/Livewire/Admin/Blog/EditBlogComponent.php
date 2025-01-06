<?php

namespace App\Http\Livewire\Admin\Blog;

use Carbon\Carbon;
use App\Models\Blog;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditBlogComponent extends Component
{
    use WithFileUploads;
    
    public $blog_id;
    public $title, $description, $image, $old_image;
    public $slug;
    
    public function mount($id)
    {
        $blog = Blog::findOrfail($id);
        $this->blog_id = $blog->id;
        $this->title = $blog->title;
        $this->description = $blog->description;
        $this->old_image = $blog->image;
        $this->slug = $blog->slug;
    }
    
    public function updateBlog(){
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:10000',
            'slug' => 'required|string',
        ]);
        
        $data = Blog::findOrfail($this->blog_id);
        $data->title = $this->title;
        $data->slug = strtolower(str_replace(' ', '-', $this->slug));
        $data->description = $this->description;
        
        if($this->image){
            if(file_exists('assets/image/Blog/' . $this->old_image)){
                unlink('assets/image/Blog/' . $this->old_image);
            }
            $imagename = Carbon::now()->timestamp . '.' .$this->image->extension();
            $this->image->storeAs('Blog', $imagename);
            $data->image = $imagename;
        }
        
        $data->update();
        
        session()->flash('message','Blog has been updated successfully');
        
        return redirect()->route('blog.index');
    }
    
    public function render()
    {
        return view('livewire.admin.blog.edit-blog-component')->layout('layouts.admin');
    }
}
