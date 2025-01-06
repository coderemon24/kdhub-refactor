<div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary mt-3">Services Section</h6>
                {{-- <button type="button" class="btn btn-primary"><i class="fa fa-plus" data-bs-toggle="modal" data-bs-target="#exampleModal"></i> Add order</button> --}}
                <input type="text" class="form-control w-50" placeholder="Search order"wire:model='searchTerm'>
                <a href="{{route('admin.service_create')}}" class="btn btn-primary">Add new service</a>
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
                            <th>Service Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $data)
                            <tr>
                                <td>{{ $data->name }}</td>
                                <td>{{ Str::limit($data->description, 50, '...') }}</td>
                                <td><img src="{{asset('assets/image/Services')}}/{{$data->image}}" width="30" height="30"></td>
                                <td>
                                    <a href="{{route('admin.service_edit',['id'=>$data->id])}}" class="btn btn-success" title="Edit" ><i class="fa fa-edit"></i></a>
                                    <a href="" class="btn btn-danger" title="delete" data-toggle="modal" data-target="#DeleteWhyus"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


<!-- Delete order Modal-->
<div class="modal fade" id="DeleteWhyus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to delete this data?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Select "Delete" below if you are ready to delete this data.</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            @foreach ($services as $data)
            @endforeach
            @if($services->count() > 0)
            <a class="btn btn-danger" href="" wire:click.prevent="deleteService({{$data->id}})">Delete</a>
            @endif
        </div>
    </div>
</div>
</div>


</div>

