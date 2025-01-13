<?php

namespace App\Http\Livewire\Admin\Pages;

use Livewire\Component;

class CreatePageComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.pages.create-page-component')->layout('layouts.admin');
    }
}
