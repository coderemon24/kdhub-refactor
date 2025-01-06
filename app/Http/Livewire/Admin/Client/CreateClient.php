<?php

namespace App\Http\Livewire\Admin\Client;

use Livewire\Component;
use App\Models\Admin\Client;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;

class CreateClient extends Component
{
    use WithFileUploads;

    public $image, $image_alt;

    protected $rules = [
        'image' => 'required',
        'image_alt' => 'nullable|string',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields, $this->rules);
    }

    public function createClient()
    {
        $this->validate($this->rules);

        try {
            // Store the image and get the path
            $imagename = Carbon::now()->timestamp . '.' .$this->image->extension();
            $this->image->storeAs('clients', $imagename);
            // $imagePath = $this->image->storeAs('clients', $this->image->getClientOriginalName());

            // Create the client record
            Client::create([
                'image' => $imagename,
                'img_alt' => $this->image_alt,
            ]);

            $this->reset(['image', 'image_alt']);

            session()->flash('message', 'Client created successfully.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            session()->flash('error', 'Something went wrong. Please try again.');
        }
    }

    // Render view
    public function render()
    {
        return view('livewire.admin.client.create-client')->layout('layouts.admin');
    }
}
