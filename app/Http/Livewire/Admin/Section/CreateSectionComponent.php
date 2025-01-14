<?php

namespace App\Http\Livewire\Admin\Section;

use Livewire\Component;
use App\Models\Admin\Page;
use App\Models\Admin\Section;
use App\Models\ServiceCategory;

class CreateSectionComponent extends Component
{
    public $page_id;
    public $section_name, $title, $description, $order, $status;
    
    public function mount($id)
    {
        $this->page_id = $id;
    }
    
    public function storeSection()
    {
        $this->validate([
            'section_name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'order' => 'required|integer',
            'status' => 'required',
        ]);
        
        $section = new Section();
        $section->page_id = $this->page_id;
        $section->section_name = $this->section_name;
        $section->title = $this->title;
        $section->slug = str_replace(' ', '-', strtolower($this->section_name));
        $section->description = $this->description;
        $section->order = $this->order;
        $section->status = $this->status;
        $section->save();
        
        $this->reset([
            'section_name', 'title', 'description', 'order', 'status',
        ]);
        
        session()->flash('message', 'Section has been created successfully!');
    }
    
    public function render()
    {
        return view('livewire.admin.section.create-section-component',[
            'page' => Page::findOrfail($this->page_id),
        ])->layout('layouts.admin');
    }
}
