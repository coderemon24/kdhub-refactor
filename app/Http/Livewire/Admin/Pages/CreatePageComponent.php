<?php

namespace App\Http\Livewire\Admin\Pages;

use Livewire\Component;
use Illuminate\Support\Str;

class CreatePageComponent extends Component
{
    
    public $page_name, $category_id, $order, $meta_title, $meta_description;
    
    public function createPage()
    {
        $this->validate([
            'page_name' => 'required|string|max:255',
            'category_id' => 'required',
            'order' => 'required|numeric',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'nullable|string',
        ]);
        
        $page = new \App\Models\Admin\Page();
        $page->page_name = $this->page_name;
        $page->slug = Str::slug($this->page_name);
        $page->service_category_id = $this->category_id;
        $page->order = $this->order;
        $page->meta_title = $this->meta_title;
        $page->meta_description = $this->meta_description;
        
        $page->save();
        
        $this->reset([
            'page_name', 'category_id', 'order', 'meta_title', 'meta_description'
        ]);
        
        session()->flash('message','Page created successfully');
    }
    
    public function render()
    {
        return view('livewire.admin.pages.create-page-component',[
            'categories' => \App\Models\ServiceCategory::all()
        ])->layout('layouts.admin');
    }
}
