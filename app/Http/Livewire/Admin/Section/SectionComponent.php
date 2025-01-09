<?php

namespace App\Http\Livewire\Admin\Section;

use Livewire\Component;
use App\Models\Admin\Section;
use App\Models\ServiceCategory;

class SectionComponent extends Component
{
    public $cat_id;
    
    public function mount($id)
    {
        $this->cat_id = $id;
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
            'sections' => Section::where('service_category_id', $this->cat_id)->get(),
            'service_cat' => ServiceCategory::findOrfail($this->cat_id),
        ])->layout('layouts.admin');
    }
}
