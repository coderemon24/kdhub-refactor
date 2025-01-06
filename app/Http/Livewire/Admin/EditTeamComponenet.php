<?php

namespace App\Http\Livewire\Admin;

use App\Models\Team;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditTeamComponenet extends Component
{
    use WithFileUploads;
    public $name;
    public $title;
    public $image;
    public $team_id;
    public $newImage;

    public function mount($id){
        $data = Team::find($id);
        $this->name =  $data->name;
        $this->title = $data->title;
        $this->image = $data->image;
        $this->team_id = $data->id;
    }
    public function render()
    {
        return view('livewire.admin.team.edit-team-componenet')->layout('layouts.admin');
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'name'=>'required',
            'title'=>'required',
            'image'=>'required'
        ]);
    }

    public function updateTeam(){
        $this->validate([
            'name'=>'required',
            'title'=>'required',
            'image'=>'required'
        ]);
        $data = Team::find($this->team_id);
        $data->name = $this->name;
        $data->title = $this->title;

        if($this->newImage){
            $imagename = Carbon::now()->timestamp . '.' .$this->newImage->extension();
            $this->newImage->storeAs('Team', $imagename);
            $data->image = $imagename;
        }

        $data->save();
        session()->flash('message', "Updated team member data");
        return redirect()->route('admin.team');
    }
}
