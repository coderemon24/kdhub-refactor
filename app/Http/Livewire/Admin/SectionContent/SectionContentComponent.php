<?php

namespace App\Http\Livewire\Admin\SectionContent;

use Livewire\Component;
use App\Models\Admin\SectionContent;

class SectionContentComponent extends Component
{
    public $section_id;
    public function mount($id)
    {
        $this->section_id = $id;
    }
    public function render()
    {
        return view('livewire.admin.section-content.section-content-component',[
            'section_contents' => SectionContent::where('section_id', $this->section_id)->get(),
            'section' => \App\Models\Admin\Section::find($this->section_id),
        ])->layout('layouts.admin');
    }
}
