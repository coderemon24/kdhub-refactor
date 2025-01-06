<?php

namespace App\Http\Livewire\Admin;

use App\Models\Team;
use Livewire\Component;

class ManageTeamComponenet extends Component
{
    public $searchTerm;
    public function render()
    {
        // $team = Team::all();
        $team = Team::when($this->searchTerm, function ($query) {
                        $query->where('title', 'LIKE', '%' . $this->searchTerm . '%');
                        $query->orwhere('name', 'LIKE', '%' . $this->searchTerm . '%');
                    })->get();
        
        return view('livewire.admin.team.manage-team-componenet',['team'=>$team])->layout('layouts.admin');
    }

    public function deleteTeam($id){
        $team = Team::find($id);
        $team->delete();
        session()->flash('message','Team deleted successfully');
        return redirect()->route('admin.team');
    }
}
