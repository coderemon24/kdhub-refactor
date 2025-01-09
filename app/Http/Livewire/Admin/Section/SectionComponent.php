<?php

namespace App\Http\Livewire\Admin\Section;

use Livewire\Component;

class SectionComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.section.section-component',[
            'sections' => \App\Models\Admin\Section::all(),
        ])->layout('layouts.admin');
    }
}
