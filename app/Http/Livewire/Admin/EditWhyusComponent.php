<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\WhyUs;
use Illuminate\Support\Carbon;

class EditWhyusComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $description;
    public $icon;
    public $whyus_id;
    public $newIcon;

    public function mount($id){
        $data = WhyUs::find($id);
        $this->title =  $data->title;
        $this->description = $data->description;
        $this->icon = $data->icon;
        $this->whyus_id = $data->id;
    }

    public function render()
    {
        return view('livewire.admin.whyUs.edit-whyus-component')->layout('layouts.admin');
    }
    public function updated($fields){
        $this->validateOnly($fields,[
            'title'=>'required',
            'description'=>'required',
            'icon'=>'required'
        ]);
    }

    public function updatewhyus(){
        $this->validate([
            'title'=>'required',
            'description'=>'required',
            'icon'=>'required'
        ]);
        $data =WhyUs::find($this->whyus_id);
        $data->title = $this->title;
        $data->description = $this->description;

        if($this->newIcon){
            $imagename = Carbon::now()->timestamp . '.' .$this->newIcon->extension();
            $this->newIcon->storeAs('WhyUS', $imagename);
            $data->newIcon = $imagename;
        }

        $data->save();
        session()->flash('message', "Updated data why us section");
        return redirect()->route('admin.whyus');
    }
}
