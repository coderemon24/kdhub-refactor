<?php

namespace App\Http\Livewire\Admin;

use App\Models\WhyUs;
use Livewire\Component;

class WhyusComponent extends Component
{
    public $searchTerm;
    public function render()
    {
        $whyus = WhyUs::when($this->searchTerm, function ($query) {
            $query->where('title', 'LIKE', '%' . $this->searchTerm . '%');
            $query->orwhere('description', 'LIKE', '%' . $this->searchTerm . '%');
        })->get();
        return view('livewire.admin.whyUs.whyus-component', compact('whyus'))->layout('layouts.admin');
    }

    public function deleteWhyus($id){
        $order = WhyUs::find($id);
        $order->delete();
        session()->flash('message','Data deleted successfully');
        return redirect()->route('admin.whyus');
    }
}
