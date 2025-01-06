<?php

namespace App\Http\Livewire\Admin;

use App\Models\Service;
use Livewire\Component;

class ServicesComponent extends Component
{
    public function render()
    {
        $services = Service::all();
        return view('livewire.admin.services.services-component', compact('services'))->layout('layouts.admin');
    }

    public function deleteService($id){
        $service = Service::find($id);
        $path = 'assets/image/Services/';
        // dd($path.$service->image);
        
        if(file_exists($path.$service->image))
        {
            unlink($path.$service->image);
        }
        
        $service->delete();
        
        session()->flash('message','Service deleted successfully');
        return redirect()->route('admin.services');
    }
}
