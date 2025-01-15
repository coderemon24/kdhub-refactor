<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Estimate;
use App\Models\Admin\Page;
use App\Models\CompanyStat;
use App\Models\Admin\Client;
use App\Models\Admin\Section;

class WebsiteServicesComponent extends Component
{
    public $message;
    public $web_name;
    public $category;
    public $description;
    public $service_type = [];
    public $full_name;
    public $company;
    public $email;
    public $phone;

    protected $rules = [
        'full_name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
    ];

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function estimate()
    {
        $this->validate();

        $estimate = new Estimate();
        $estimate->web_name = $this->web_name;
        $estimate->category = $this->category;
        $estimate->description = $this->description;
        $estimate->service_type = implode(', ', $this->service_type);
        $estimate->full_name = $this->full_name;
        $estimate->company = $this->company;
        $estimate->email = $this->email;
        $estimate->phone = $this->phone;
        $estimate->save();

        session()->flash('message', 'Thank you for placing your order! We have received your request.');
        $this->reset([
            'web_name', 'category', 'description', 'service_type',
            'full_name', 'company', 'email', 'phone'
        ]);
        $this->message = session('message');
    }
    
    //  mount
    public $page_slug;
    public $sections = [];
    
    public function mount($slug)
    {
        $this->page_slug = $slug;
    }
    
    public function render()
    {
        $page = Page::where('slug', $this->page_slug)->first();
        
        if($page != null)
        {
            $this->sections = Section::where('page_id', $page->id)
                            ->where('status', 'active')
                            ->orderBy('order', 'asc')->get();
        }
        // if(count($this->sections) == 0)
        // {
        //     dd($this->sections);
        // }
        // dd($this->sections);
        
        return view('livewire.website-services-component',[
            'stat' => CompanyStat::first(),
            'page' => $page,
            'clients' => Client::all(),
            'sections' => $this->sections,
        ])->layout('layouts.base');
    }
}
