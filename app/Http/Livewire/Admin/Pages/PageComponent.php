<?php

namespace App\Http\Livewire\Admin\Pages;

use Livewire\Component;

class PageComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.pages.page-component',[
            'pages' => \App\Models\Admin\Page::all()
        ])->layout('layouts.admin');
    }
}
