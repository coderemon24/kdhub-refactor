<?php

namespace App\Http\Livewire\Admin\ServiceCategory;

use Livewire\Component;

class EditServiceCategoryComponent extends Component
{
    public $name;
    public $category_id;
    
    public function mount($id)
    {
        $category = \App\Models\ServiceCategory::find($id);
        $this->name = $category->name;
        $this->category_id = $category->id;
    }
    
    public function updateCategory()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);
        
        $category = \App\Models\ServiceCategory::find($this->category_id);
        $category->name = $this->name;
        $category->slug = strtolower(str_replace(' ','-',$this->name));
        $category->update();
        
        session()->flash('message','Category updated successfully');
        
        return redirect()->route('service.category.index');
    }
    
    public function render()
    {
        return view('livewire.admin.service-category.edit-service-category-component')->layout('layouts.admin');
    }
}
