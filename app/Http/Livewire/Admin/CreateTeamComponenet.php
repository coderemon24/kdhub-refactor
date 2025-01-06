<?php

namespace App\Http\Livewire\Admin;

use App\Models\Team;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateTeamComponenet extends Component
{
    use WithFileUploads;
    public $name;
    public $title;
    public $image;
    public function render()
    {
        return view('livewire.admin.team.create-team-componenet')->layout('layouts.admin');
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'name'=>'required',
            'title'=>'required',
            'image'=>'required'
        ]);
    }

    public function addTeam(){
        $this->validate([
            'name'=>'required',
            'title'=>'required',
            'image'=>'required'
        ]);
        $data = new Team();
        $data->name = $this->name;
        $data->title = $this->title;

        $imagename = Carbon::now()->timestamp . '.' .$this->image->extension();
        $this->image->storeAs('Team', $imagename);
        $data->image = $imagename;

        $data->save();
        session()->flash('message', "Added a member in the team");
        return redirect()->route('admin.team');
    }
}
