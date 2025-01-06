<?php

namespace App\Http\Livewire;

use App\Models\Admin\Client;
use App\Models\People;
use App\Models\Service;
use App\Models\WhyUs;
use GuzzleHttp\Psr7\Request;
use Livewire\Component;

class HomeComponent extends Component
{   
    public function render()
    {
        $clients = Client::all();
        $services = Service::all();
        $whyUs = WhyUs::all();
        return view('livewire.home-component', [
            'clients'=>$clients,  
            'whyUs'=>$whyUs,
            'services'=>$services
            ])->layout('layouts.base');
    }
}
