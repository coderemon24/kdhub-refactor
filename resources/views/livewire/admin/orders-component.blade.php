<div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary mt-3">All orders</h6>
                {{-- <button type="button" class="btn btn-primary"><i class="fa fa-plus" data-bs-toggle="modal" data-bs-target="#exampleModal"></i> Add order</button> --}}
                <input type="text" class="form-control w-50" placeholder="Search order"wire:model='searchTerm'>
            </div>
        </div>
        <div class="card-body">
            @if (Session::has('message'))
            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-success">Success</span> {{Session::get('message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif 
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Company Name</th>
                            <th>Web Name</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Service Type</th>
                            <th>Order Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->full_name }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->company }}</td>
                                <td>{{ $order->web_name }}</td>
                                <td>{{ $order->category }}</td>
                                <td>{{ $order->description }}</td>
                                <td>
                                    <ul>
                                        @foreach (explode(', ', $order->service_type) as $service)
                                            <li>{{ $service }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>{{ $order->created_at->format('d-m-Y') }}</td>
                                <td>
                                    <a href="" class="btn btn-danger" title="delete" data-toggle="modal" data-target="#Deleteorders"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


<!-- Delete order Modal-->
<div class="modal fade" id="Deleteorders" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to delete this order?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Select "Delete" below if you are ready to delete this order.</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            @foreach ($orders as $order)
            @endforeach
            @if($orders->count() > 0)
            <a class="btn btn-danger" href="" wire:click.prevent="deleteOrder({{$order->id}})">Delete</a>
            @endif
        </div>
    </div>
</div>
</div>


</div>

