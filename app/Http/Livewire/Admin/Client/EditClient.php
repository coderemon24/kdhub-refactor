<?php

namespace App\Http\Livewire\Admin\Client;

use Livewire\Component;
use App\Models\Admin\Client;
use Livewire\WithFileUploads;

class EditClient extends Component
{
    use WithFileUploads;
    
    public $client_id, $image, $new_image, $image_alt;

    //  mount client
    public function mount($id)
    {
        $this->client_id = $id;
        $client = Client::find($id);
        $this->image = $client->image;
        $this->image_alt = $client->img_alt;
    }

    //  update client
    public function updateClient()
    {
        
        
        $this->validate([
            'new_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_alt' => 'nullable|string|max:255',
        ]);


        $client = Client::find($this->client_id);

        if($client->image && $this->new_image){
            unlink(asset('assets/image/clients/'.$client->image));
        }
        $client->image = $this->new_image ?? $this->image;
        $client->img_alt = $this->image_alt;
        $client->save();

        session()->flash('message', 'Client updated successfully.');
    }

    //  render view
    public function render()
    {
        return view('livewire.admin.client.edit-client')->layout('layouts.admin');
    }
}
