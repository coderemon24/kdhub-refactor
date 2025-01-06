<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;

class ServiceDetailsComponent extends Component
{
    private $service;

    public function mount($slug)
    {
        $this->service = Service::where('slug', $slug)->first(); ;
    }
    
    public function render()
    {
        return view('livewire.service-details-component',[
            'service' => $this->service,
        ])->layout('layouts.base');
    }
}
