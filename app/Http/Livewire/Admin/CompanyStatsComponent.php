<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\CompanyStat;

class CompanyStatsComponent extends Component
{
    public $years_of_glory;
    public $happy_clients;
    public $ads_spend;
    
    public function mount()
    {
        $stats = CompanyStat::first();
        if($stats)
        {
            $this->years_of_glory = $stats->years_of_glory;
            $this->happy_clients = $stats->happy_clients;
            $this->ads_spend = $stats->ads_spend;
        }
    }
    
    public function saveStat()
    {
        $this->validate([
            'years_of_glory' => 'required',
            'happy_clients' => 'required',
            'ads_spend' => 'required',
        ]);
        
        if(!CompanyStat::first())
        {
            $stats = new CompanyStat();
        }else{
            $stats = CompanyStat::first();
        }
        $stats->years_of_glory = $this->years_of_glory;
        $stats->happy_clients = $this->happy_clients;
        $stats->ads_spend = $this->ads_spend;
        $stats->save();
        
        session()->flash('message', 'Company Stats Saved Successfully');
    }
    
    
    public function render()
    {
        return view('livewire.admin.company-stats-component')->layout('layouts.admin');
    }
}
