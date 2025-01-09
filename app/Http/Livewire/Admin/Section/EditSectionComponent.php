<?php

namespace App\Http\Livewire\Admin\Section;

use Livewire\Component;
use App\Models\Admin\Section;

class EditSectionComponent extends Component
{
    public $section_id;
    public $section_name, $title, $description, $service_category_id,$status,$order;
    
    public function mount($id)
    {
        $this->section_id = $id;
        $section = Section::findOrfail($id);
        $this->section_name = $section->section_name;
        $this->title = $section->title;
        $this->description = $section->description;
        $this->service_category_id = $section->service_category_id;
        $this->status = $section->status;
        $this->order = $section->order;
    }
    
    public function updateSection()
    {
        $this->validate([
            'section_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order' => 'required|integer',
            'status' => 'required',
        ]);
        
        $section = Section::findOrfail($this->section_id);
        $section->section_name = $this->section_name;
        $section->title = $this->title;
        $section->description = $this->description;
        $section->order = $this->order;
        $section->status = $this->status;
        $section->update();
        
        session()->flash('message', 'Section has been updated successfully!');
        
    }
    
    public function render()
    {
        return view('livewire.admin.section.edit-section-component')->layout('layouts.admin');
    }
}
