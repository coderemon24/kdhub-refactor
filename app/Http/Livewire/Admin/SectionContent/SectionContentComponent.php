<?php

namespace App\Http\Livewire\Admin\SectionContent;

use Livewire\Component;
use App\Models\Admin\Section;
use App\Models\Admin\SectionContent;

class SectionContentComponent extends Component
{
    public $section_id;
    public $page_id;
    public $statuses = [];

    public function mount($id)
    {
        $this->section_id = $id;
        $getPage = Section::find($id);
        $this->page_id = $getPage->page_id;
        $this->initializeStatuses();
    }

    public function initializeStatuses()
    {
        $contents = SectionContent::where('section_id', $this->section_id)->get();
        foreach ($contents as $content) {
            $this->statuses[$content->id] = $content->status;
        }
    }

    public function updateStatus($content_id)
    {
        if (isset($this->statuses[$content_id])) {
            $content = SectionContent::find($content_id);
            $content->status = $this->statuses[$content_id];
            $content->update();

            session()->flash('message', 'Status has been updated successfully!');
        }
    }
    
    public function deleteContent($id)
    {
        $content = SectionContent::find($id);
        
        if(file_exists('assets/image/contents/' . $content->image)){
            unlink('assets/image/contents/' . $content->image);
        }
        
        if($content->multi_image){
            $images = json_decode($content->multi_image);
            foreach($images as $image){
                if(file_exists('assets/image/contents/' . $image)){
                    unlink('assets/image/contents/' . $image);
                }
            }
        }
        
        $content->delete();
        
        session()->flash('message', 'Content has been deleted successfully!');
    }

    public function render()
    {
        return view('livewire.admin.section-content.section-content-component', [
            'section_contents' => SectionContent::where('section_id', $this->section_id)->get(),
            'section' => \App\Models\Admin\Section::find($this->section_id),
        ])->layout('layouts.admin');
    }
}
