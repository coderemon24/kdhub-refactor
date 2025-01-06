<?php

namespace App\Http\Livewire\Admin;

use App\Models\Estimate;

use Livewire\Component;

class DashboardComponent extends Component
{
    public function render()
    {
        $orders = Estimate::all();
        return view('livewire.admin.dashboard-component',['orders'=>$orders])->layout('layouts.admin');
    }
}
