<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Admin\Page;

class ManageServiceCompontent extends Component
{
    
    public function render()
    {
        return view('livewire.admin.manage-service-compontent',[
            'pages' => Page::all(),
        ])->layout('layouts.admin');
    }
}
