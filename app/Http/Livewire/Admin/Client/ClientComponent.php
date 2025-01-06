<?php

namespace App\Http\Livewire\Admin\Client;

use Livewire\Component;
use App\Models\Admin\Client;

class ClientComponent extends Component
{

    //  delete client
    public function deleteClient($id){
        $client = Client::find($id);

        if($client->image){
            unlink('assets/image/'.$client->image);
        }

        $client->delete();

        session()->flash('message', 'Client Deleted Successfully');
    }

    //  render view
    public function render()
    {
        $clients = Client::all();
        return view('livewire.admin.client.client-component',[
            'clients'=>$clients
        ])->layout('layouts.admin');
    }
}
