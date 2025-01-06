<?php

namespace App\Http\Livewire\Admin;

use App\Models\Service;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
class EditServiceComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $description;
    public $image;
    public $service_id;
    public $newImage;
    public $title;
    public $details;

    public function mount($id){
        $data = Service::find($id);
        $this->name =  $data->name;
        $this->description = $data->description;
        $this->image = $data->image;
        $this->service_id = $data->id;
    }
    public function render()
    {
        return view('livewire.admin.services.edit-service-component')->layout('layouts.admin');
    }

    public function updateService()
{
    $this->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'newImage' => 'nullable|image|max:2048', // Validate new image if present
    ]);

    $data = Service::find($this->service_id);
    $data->name = $this->name;
    $data->slug = strtolower(str_replace(' ', '-', $this->name));
    $data->description = $this->description;
    if ($this->newImage) {
        if (file_exists('assets/image/Services/' . $data->image)) {
            @unlink('assets/image/Services/' . $data->image);
        }
        $imageName = Carbon::now()->timestamp . '.' . $this->newImage->extension();
        $this->newImage->storeAs('Services', $imageName);
        $data->image = $imageName;
    }

    $data->save();
    session()->flash('message', "Service updated successfully.");
    return redirect()->route('admin.services');
}

}
