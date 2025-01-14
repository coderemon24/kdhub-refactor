<?php

namespace App\Http\Livewire\Admin\SectionContent;

use Livewire\Component;
use App\Models\Admin\SectionContent;
use Livewire\WithFileUploads;

class CreateSectionContentComponent extends Component
{
    use WithFileUploads;
    
    public $section_id;
    public $title, $subtitle, $description, $image, $images, $status;
    
    public function mount($id)
    {
        $this->section_id = $id;
    }
    
    public function createContent()
    {
        $this->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'images.*' => 'nullable|image',
            'image' => 'nullable|image',
            'status' => 'required',
        ]);
        
        $section_content = new SectionContent();
        $section_content->section_id = $this->section_id;
        $section_content->title = $this->title;
        $section_content->subtitle = $this->subtitle;
        $section_content->description = $this->description;
        
        if ($this->image) 
        {
            $image_name = time().'_'.$this->image->getClientOriginalName();
            $this->image->storeAs('contents', $image_name);
            $section_content->image = $image_name;
        }
        
        if ($this->images) 
        {
            $images = [];
            foreach ($this->images as $key => $image) 
            {
                $image_name = time().'_'.$image->getClientOriginalName();
                $image->storeAs('contents', $image_name);
                $images[] = $image_name;
            }
            $section_content->multi_image = json_encode($images);
        }
        
        $section_content->save();
        
        $this->reset([
            'title', 'subtitle', 'description', 'image', 'images',
            'status',
        ]);
        
        session()->flash('message', 'Section content has been created successfully!');
        
        return redirect()->route('content.create', $this->section_id);
    }
    
    public function render()
    {
        return view('livewire.admin.section-content.create-section-content-component')->layout('layouts.admin');
    }
}
