<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Setting;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class SettingsComponent extends Component
{
    use WithFileUploads;
    public $web_name;
    public $website_logo;
    public $website_favicon;
    public $address;
    public $map_link;
    public $email;
    public $phone;
    public $facebook;
    public $twitter;
    public $instagram;
    public $linkedin;
    public $newlogo;
    public $newfavicon;

    public function mount(){
        $settings = Setting::find(1);
        $this->web_name = $settings->company_name;
        $this->website_logo = $settings->company_logo;
        $this->website_favicon = $settings->company_favicon;
        $this->address = $settings->company_address;
        $this->map_link = $settings->map_link;
        $this->email = $settings->company_email;
        $this->phone = $settings->company_phone;
        $this->facebook = $settings->facebook_link;
        $this->twitter = $settings->twitter_link;
        $this->instagram = $settings->instagram_link;
        $this->linkedin = $settings->linkedin_link;
    }

    public function render()
    {
        return view('livewire.admin.settings-component')->layout('layouts.admin');
    }
    public function updated($fields){
        $this->validateOnly($fields,[
            'web_name' => 'required',
            'address' => 'required',
            'map_link' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',
            'linkedin' => 'required',
        ]);
    }

    public function updateSetting(){
        $this->validate([
            'web_name' => 'required',
            'address' => 'required',
            'map_link' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',
            'linkedin' => 'required',
        ]);

        $setting = Setting::find(1);
        $setting->company_name = $this->web_name;
        $setting->company_address = $this->address;
        $setting->map_link = $this->map_link;
        $setting->company_email = $this->email;
        $setting->company_phone = $this->phone;
        $setting->facebook_link = $this->facebook;
        $setting->twitter_link = $this->twitter;
        $setting->instagram_link = $this->instagram;
        $setting->linkedin_link = $this->linkedin;

        if($this->newlogo) { 
            $logoname = Carbon::now()->timestamp . '_logo.' . $this->newlogo->extension();
            $this->newlogo->storeAs('Settings', $logoname);
            $setting->company_logo = $logoname;
        }
        
        if($this->newfavicon) { 
            $faviconName = Carbon::now()->timestamp . '_favicon.' . $this->newfavicon->extension();
            $this->newfavicon->storeAs('Settings', $faviconName);
            $setting->company_favicon = $faviconName;
        }
        
        $setting->save();
        session()->flash('message','Settings updated successfully');
        return redirect()->route('admin.settings');
    }
}
