<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use App\Models\WhyUs;
use App\Models\People;
use App\Models\Service;
use Livewire\Component;
use App\Models\Admin\Client;
use GuzzleHttp\Psr7\Request;

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
            'services'=>$services,
            'blogs' => Blog::all(),
            ])->layout('layouts.base');
    }
}
