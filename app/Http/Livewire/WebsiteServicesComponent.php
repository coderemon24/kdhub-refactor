<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Estimate;
use App\Models\Admin\Page;
use App\Models\CompanyStat;
use App\Models\Admin\Client;
use App\Models\Admin\Section;
use App\Models\Admin\SectionContent;

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
    public array $sections = [];
    public $sectionIds = [];
    public $contents;
    
    public function mount($slug)
    {
        $this->page_slug = $slug;
    }
    
    public function render()
    {
        $page = Page::where('slug', $this->page_slug)->first();
        
        if($page != null)
        {
            $all_section = Section::where('page_id', $page->id)
                            ->where('status', 'active')
                            ->orderBy('order', 'asc')->get();
                            
            foreach($all_section as $section)
            {
                $this->sections[$section->order] = $section;
                $this->sectionIds[] = $section->id;
            }
        }
        
        $sec_count = count($this->sections);
        if($sec_count !== 0)
        {
            $get_diff = 12 - $sec_count;  // 2
            if($get_diff > 0)
            {
                for($i = 0; $i < $get_diff; $i++)
                {
                    $empty = [
                        'id' => 55,
                        'title' => '',
                    ];
                    array_push($this->sections, $empty);
                }
            }
            
            
        }
        
        $this->contents = SectionContent::whereIn('section_id', $this->sectionIds)
                            ->where('status', 'active')->get();
        // dd($this->sections);
        
        return view('livewire.website-services-component',[
            'stat' => CompanyStat::first(),
            'page' => $page,
            'clients' => Client::all(),
            'sections' => $this->sections,
            'contents' => $this->contents,
        ])->layout('layouts.base');
    }
}
