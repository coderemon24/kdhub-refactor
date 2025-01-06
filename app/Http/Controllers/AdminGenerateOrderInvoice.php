<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminGenerateOrderInvoice extends Controller
{
    //
    public function invoice($id)
{
    $order = Order::find($id);
    $customPaper = array(0, 0, 216, 432);
    $data = [
        'order' => $order
    ];
    
    $pdf = app('dompdf.wrapper');
    $pdf->setPaper($customPaper, 'portrait'); // Set the paper size here
    $pdf->loadView('livewire.admin.invoice-component', $data);

    return $pdf->stream('invoice.pdf');
}
}
