<?php

namespace App\Http\Livewire\Admin;

use App\Models\ServiceCategory;
use Livewire\Component;

class ManageServiceCompontent extends Component
{
    public function render()
    {
        return view('livewire.admin.manage-service-compontent',[
            'services' => ServiceCategory::all(),
        ])->layout('layouts.admin');
    }
}
