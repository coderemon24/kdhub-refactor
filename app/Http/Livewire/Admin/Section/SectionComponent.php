<?php

namespace App\Http\Livewire\Admin\Section;

use App\Models\Admin\Page;
use Livewire\Component;
use App\Models\Admin\Section;
use App\Models\ServiceCategory;

class SectionComponent extends Component
{
    public $page_id;
    
    public function mount($id)
    {
        $this->page_id = $id;
    }
    
    public function deleteSection($id)
    {
        $section = Section::find($id);
        $section->delete();
        session()->flash('message','Section deleted successfully');
    }
    
    public function render()
    {
        return view('livewire.admin.section.section-component',[
            'sections' => Section::where('page_id', $this->page_id)->get(),
            'page' => Page::find($this->page_id),
        ])->layout('layouts.admin');
    }
}
