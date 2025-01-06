<?php

namespace App\Http\Livewire;
use App\Models\Estimate;
use Livewire\Component;

class SeoServicesComponent extends Component
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

    public function render()
    {
        return view('livewire.seo-services-component')->layout('layouts.base');
    }
}
