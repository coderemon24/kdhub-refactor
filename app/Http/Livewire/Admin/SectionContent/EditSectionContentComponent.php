<?php

namespace App\Http\Livewire\Admin\SectionContent;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Admin\SectionContent;

class EditSectionContentComponent extends Component
{
    use WithFileUploads;
    
    public $content_id, $section_id;
    public $title, $subtitle, $description, $image, $old_image, $images, $old_images;
    public $status;
    
    public function mount($id)
    {
        $this->content_id = $id;
        $content = SectionContent::find($id);
        $this->title = $content->title;
        $this->subtitle = $content->subtitle;
        $this->description = $content->description;
        $this->old_image = $content->image;
        $this->old_images = $content->multi_image;
        $this->status = $content->status;
        $this->section_id = $content->section_id;
    }
    
    public function updateContent()
    {
        $this->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'images.*' => 'nullable|image',
            'image' => 'nullable|image',
        ]);
        
        $section_content = SectionContent::find($this->content_id);
        $section_content->title = $this->title;
        $section_content->subtitle = $this->subtitle;
        $section_content->description = $this->description;
        
        if($this->image != null)
        {
            if(file_exists('assets/image/contents/' . $this->old_image)){
                unlink('assets/image/contents/' . $this->old_image);
            }
            $image_name = time().'_'.$this->image->getClientOriginalExtension();
            $this->image->storeAs('contents', $image_name);
            $section_content->image = $image_name;
        }
        
        if($this->images)
        {
            if($this->old_images)
            {
                $old_images = json_decode($this->old_images);
                foreach($old_images as $image)
                {
                    if(file_exists('assets/image/contents/' . $image)){
                        unlink('assets/image/contents/' . $image);
                    }
                }
            }
            
            $images = [];
            foreach ($this->images as $key => $image) 
            {
                $image_name = time().'_'.$image->getClientOriginalName();
                $image->storeAs('contents', $image_name);
                $images[] = $image_name;
            }
            $section_content->multi_image = json_encode($images);
        }
        
        $section_content->update();
        
        session()->flash('message', 'Content updated successfully');
        
        return redirect()->route('content.index', $this->section_id);
    }
    
    public function render()
    {
        return view('livewire.admin.section-content.edit-section-content-component',[
            'section_content' => 'content',
        ])->layout('layouts.admin');
    }
}
