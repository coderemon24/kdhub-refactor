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
    public $section_1;
    public $section_2;
    public $section_3;
    public $section_4;
    public $section_5;
    public $section_6;
    public $section_7;
    public $section_8;
    public $section_9;
    public $section_10;
    
    public function mount($slug)
    {
        $this->page_slug = $slug;
    }
    
    public function render()
    {
        $page = Page::where('slug', $this->page_slug)->first();
        $this->section_1 = Section::where('page_id', $page->id)->where('order', 1)->first();
        $this->section_2 = Section::where('page_id', $page->id)->where('order', 2)->first();
        $this->section_3 = Section::where('page_id', $page->id)->where('order', 3)->first();
        $this->section_4 = Section::where('page_id', $page->id)->where('order', 4)->first();
        $this->section_5 = Section::where('page_id', $page->id)->where('order', 5)->first();
        $this->section_6 = Section::where('page_id', $page->id)->where('order', 6)->first();
        $this->section_7 = Section::where('page_id', $page->id)->where('order', 7)->first();
        $this->section_8 = Section::where('page_id', $page->id)->where('order', 8)->first();
        $this->section_9 = Section::where('page_id', $page->id)->where('order', 9)->first();
        $this->section_10 = Section::where('page_id', $page->id)->where('order', 10)->first();
        
        return view('livewire.website-services-component',[
            'stat' => CompanyStat::first(),
            'page' => $page,
            'section_1' => $this->section_1,
            'section_2' => $this->section_2,
            'section_3' => $this->section_3,
            'section_4' => $this->section_4,
            'section_5' => $this->section_5,
            'section_6' => $this->section_6,
            'section_7' => $this->section_7,
            'section_8' => $this->section_8,
            'section_9' => $this->section_9,
            'section_10' => $this->section_10,
            'clients' => Client::all(),
        ])->layout('layouts.base');
    }
}
