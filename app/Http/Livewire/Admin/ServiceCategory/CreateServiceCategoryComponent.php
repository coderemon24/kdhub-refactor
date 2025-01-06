<?php

namespace App\Http\Livewire\Admin\ServiceCategory;

use Livewire\Component;

class CreateServiceCategoryComponent extends Component
{
    
    public $name;
    
    public function storeCategory()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);
        
        $category = new \App\Models\ServiceCategory();
        $category->name = $this->name;
        $category->slug = strtolower(str_replace(' ','-',$this->name));
        $category->save();
        
        $this->name = '';
        
        session()->flash('message','Category added successfully');
    }
    
    public function render()
    {
        return view('livewire.admin.service-category.create-service-category-component')->layout('layouts.admin');
    }
}
