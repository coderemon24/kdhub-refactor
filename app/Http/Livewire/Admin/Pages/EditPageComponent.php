<?php

namespace App\Http\Livewire\Admin\Pages;

use Livewire\Component;
use App\Models\Admin\Page;
use Illuminate\Support\Str;

class EditPageComponent extends Component
{
    public $page_id, $category_id;
    public $page_name, $meta_title, $meta_description;
    
    public function mount($id)
    {
        $page = Page::findOrfail($id);
        $this->page_id = $page->id;
        $this->page_name = $page->page_name;
        $this->meta_title = $page->meta_title;
        $this->meta_description = $page->meta_description;
        $this->category_id = $page->service_category_id;
    }
    
    public function updatePage()
    {
        $this->validate([
            'page_name' => 'required|string|max:255',
            'category_id' => 'required',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'nullable|string',
        ]);
        
        $page = Page::findOrfail($this->page_id);
        $page->page_name = $this->page_name;
        $page->slug = Str::slug($this->page_name);
        $page->service_category_id = $this->category_id;
        $page->meta_title = $this->meta_title;
        $page->meta_description = $this->meta_description;
        $page->update();
        
        session()->flash('message', 'Page has been updated successfully!');
        return redirect()->route('page.index');
    }
    
    public function render()
    {
        return view('livewire.admin.pages.edit-page-component',[
            'categories' => \App\Models\ServiceCategory::all()
        ])->layout('layouts.admin');
    }
}
