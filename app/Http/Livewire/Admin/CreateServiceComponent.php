<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Service;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateServiceComponent extends Component
{
    use WithFileUploads;
    
    public $name;
    public $description;
    public $image;

    public function render()
    {
        return view('livewire.admin.services.create-service-component')->layout('layouts.admin');
    }


    public function addwhyus(){
        $this->validate([
            'name'=>'required|string|max:255',
            'description'=>'required|string',
            'image'=>'required',
        ]);
        $data = new Service();
        $data->name = $this->name;
        $data->slug = strtolower(str_replace(' ', '-', $this->name));
        $data->description = $this->description;

        $imagename = Carbon::now()->timestamp . '.' .$this->image->extension();
        
        $this->image->storeAs('Services', $imagename);
        
        $data->image = $imagename;

        $data->save();
        session()->flash('message', "Added a service in services section");
        return redirect()->route('admin.services');
    }
}
