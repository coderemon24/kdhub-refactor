<?php

namespace App\Http\Livewire;

use App\Models\Team;
use Livewire\Component;

class AboutusComponent extends Component
{
    public function render()
    {
        $team = Team::all();
        return view('livewire.aboutus-component', ['team'=>$team])->layout('layouts.base');
    }
}
