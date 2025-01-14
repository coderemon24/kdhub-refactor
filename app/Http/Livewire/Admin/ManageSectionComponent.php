<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class ManageSectionComponent extends Component
{
    public $page_id;
    
    public function mount($id){
        $this->page_id = $id;
    }
    
    public function render()
    {
        return view('livewire.admin.manage-section-component',[
            'sections' => \App\Models\Admin\Section::all(),
            'page' => \App\Models\Admin\Page::find($this->page_id),
        ])->layout('layouts.admin');
    }
}
