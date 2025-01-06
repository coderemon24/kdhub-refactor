<?php

namespace App\Http\Livewire\Admin;

use App\Models\Estimate;
use App\Models\Order;
use Livewire\Component;

class OrdersComponent extends Component
{
    public $searchTerm;
    public function render()
    {
        // $orders = Estimate::paginate(10);
        $orders = Estimate::when($this->searchTerm, function ($query) {
            $query->where('full_name', 'LIKE', '%' . $this->searchTerm . '%');
            $query->orwhere('email', 'LIKE', '%' . $this->searchTerm . '%');
            $query->orwhere('phone', 'LIKE', '%' . $this->searchTerm . '%');
            $query->orwhere('company', 'LIKE', '%' . $this->searchTerm . '%');
            $query->orwhere('web_name', 'LIKE', '%' . $this->searchTerm . '%');
        })->get();
        return view('livewire.admin.orders-component',['orders'=>$orders])->layout('layouts.admin');
    }

    public function deleteOrder($id){
        $order = Estimate::find($id);
        $order->delete();
        session()->flash('message','Order deleted successfully');
        return redirect()->route('admin.orders');
    }
}
