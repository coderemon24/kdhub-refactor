<?php

namespace App\Http\Livewire\Admin\ServiceCategory;

use Livewire\Component;

class ServiceCategoryComponent extends Component
{
    
    public function deleteCategory($id)
    {
        
        $category = \App\Models\ServiceCategory::find($id);
        $category->delete();
        session()->flash('message','Category deleted successfully');
        // return redirect()->route('service.category.index');
    }
    
    public function render()
    {
        return view('livewire.admin.service-category.service-category-component',[
            'categories' => \App\Models\ServiceCategory::all()
        ])->layout('layouts.admin');
    }
}
