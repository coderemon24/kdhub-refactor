<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\WhyUs;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateWhyusComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $description;
    public $icon;
    public function render()
    {
        return view('livewire.admin.whyUs.create-whyus-component')->layout('layouts.admin');
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'title'=>'required',
            'description'=>'required',
            'icon'=>'required'
        ]);
    }

    public function addwhyus(){
        $this->validate([
            'title'=>'required',
            'description'=>'required',
            'icon'=>'required'
        ]);
        $data = new WhyUs();
        $data->title = $this->title;
        $data->description = $this->description;

        $imagename = Carbon::now()->timestamp . '.' .$this->icon->extension();
        $this->icon->storeAs('WhyUS', $imagename);
        $data->icon = $imagename;

        $data->save();
        session()->flash('message', "Added new column to the why us section");
        return redirect()->route('admin.whyus');
    }
}
