<?php

namespace App\Http\Livewire\Admin\SectionContent;

use Livewire\Component;
use App\Models\Admin\SectionContent;

class SectionContentComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.section-content.section-content-component',[
            'section_contents' => SectionContent::all(),
        ])->layout('layouts.admin');
    }
}
