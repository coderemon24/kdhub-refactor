<?php

namespace App\Http\Livewire\Admin\SectionContent;

use Livewire\Component;

class CreateSectionContentComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.section-content.create-section-content-component')->layout('layouts.admin');
    }
}
