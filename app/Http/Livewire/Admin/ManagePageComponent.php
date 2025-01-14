<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Admin\Page;

class ManagePageComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.manage-page-component',[
            'pages' => Page::all(),
        ])->layout('layouts.admin');
    }
}
