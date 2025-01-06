<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class CheckoutComponent extends Component
{
    public $name;
    public $phone;
    public $flat;
    public $house;
    public $road;
    public $area;
    
    public $dry_shirt_qty;
    public $dry_pants_qty;
    public $dry_punjabi_qty;
    public $dry_others_qty;

    public $wash_shirt_qty;
    public $wash_pants_qty;
    public $wash_punjabi_qty;
    public $wash_others_qty;

    public $loundary_shirt_qty;
    public $loundary_pants_qty;
    public $loundary_punjabi_qty;
    public $loundary_others_qty;

    public $others_shirt_qty;
    public $others_pants_qty;
    public $others_punjabi_qty;
    public $others_others_qty;


    public function updated($fields){
        $this->validateOnly($fields,[
            'name' => 'required',
            'phone' => 'required',
            'flat' => 'required',
            'house' => 'required',
            'road' => 'required',
            'area' => 'required'
        ]);
    }
    public function checkoutOrder(){
        $this->validate([
            'name' => 'required',
            'phone' => 'required',
            'flat' => 'required',
            'house' => 'required',
            'road' => 'required',
            'area' => 'required'
        ]);
        $order = new Order();
        $order->name = $this->name;
        $order->phone =  $this->phone;
        $order->flat =   $this->flat; 
        $order->house =  $this->house;
        $order->road =   $this->road;
        $order->area =   $this->area;
        $order->dry_shirt_qty =  $this->dry_shirt_qty;
        $order->dry_pants_qty =  $this->dry_pants_qty;
        $order->dry_punjabi_qty = $this->dry_punjabi_qty;
        $order->dry_others_qty =  $this->dry_others_qty;
        
        $order->wash_shirt_qty =  $this->wash_shirt_qty;
        $order->wash_pants_qty =  $this->wash_pants_qty;
        $order->wash_punjabi_qty =   $this->wash_punjabi_qty;
        $order->wash_others_qty =  $this->wash_others_qty;
        
        $order->loundary_shirt_qty =  $this->loundary_shirt_qty;
        $order->loundary_pants_qty =   $this->loundary_pants_qty;
        $order->loundary_punjabi_qty =  $this->loundary_punjabi_qty;
        $order->loundary_others_qty =   $this->loundary_others_qty;
        
        $order->others_shirt_qty =  $this->others_shirt_qty;
        $order->others_pants_qty =  $this->others_pants_qty;
        $order->others_punjabi_qty =  $this->others_punjabi_qty;
        $order->others_others_qty =  $this->others_others_qty;
        $order->save();
        session()->flash('message', 'Thank you for placing your order! We have received your request.');
        $this->dispatchBrowserEvent('show-success-message');
        $this->reset([
            'name',
            'phone',
            'flat',
            'house',
            'road',
            'area',
            'dry_shirt_qty',
            'dry_pants_qty',
            'dry_punjabi_qty',
            'dry_others_qty',
            'wash_shirt_qty',
            'wash_pants_qty',
            'wash_punjabi_qty',
            'wash_others_qty',
            'loundary_shirt_qty',
            'loundary_pants_qty',
            'loundary_punjabi_qty',
            'loundary_others_qty',
            'others_shirt_qty',
            'others_pants_qty',
            'others_punjabi_qty',
            'others_others_qty',
        ]);
    }
    public function render()
    {
        return view('livewire.checkout-component');
    }
}
