<?php

namespace App\Http\Livewire\Admin\Section;

use App\Models\Admin\Section;
use Livewire\Component;
use App\Models\ServiceCategory;

class CreateSectionComponent extends Component
{
    public $cat_id;
    public $section_name, $title, $description, $order, $status;
    
    public function mount($id)
    {
        $this->cat_id = $id;
    }
    
    public function storeSection()
    {
        $this->validate([
            'section_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order' => 'required|integer',
            'status' => 'required',
        ]);
        
        $section = new Section();
        $section->service_category_id = $this->cat_id;
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
            'service_cat' => ServiceCategory::findOrfail($this->cat_id),
        ])->layout('layouts.admin');
    }
}
