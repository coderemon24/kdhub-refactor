<div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary mt-3">All Blogs</h6>
                {{-- <button type="button" class="btn btn-primary"><i class="fa fa-plus" data-bs-toggle="modal" data-bs-target="#exampleModal"></i> Add order</button> --}}
                <input type="text" class="form-control w-50" placeholder="Search order"wire:model='searchTerm'>
                <a href="{{route('blog.create')}}" class="btn btn-primary">Add New</a>
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
                            <th>Blog Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $data)
                            <tr>
                                <td>{{ $data->title }}</td>
                                <td>{{ Str::limit(strip_tags($data->description), 50, '...') }}</td>
                                <td><img src="{{asset('assets/image/Blog')}}/{{$data->image}}" width="30" height="30"></td>
                                <td class="d-flex ">
                                    <a href="{{route('blog.edit', $data->id)}}" class="btn btn-success mr-2" title="Edit" ><i class="fa fa-edit"></i></a>
                                    <a href="#" class="btn btn-danger" title="delete" data-toggle="modal" data-target="#DeleteWhyus"><i class="fa fa-trash"></i></a>
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
            @foreach ($blogs as $data)
            @endforeach
            @if($blogs->count() > 0)
            <a class="btn btn-danger" href="" wire:click.prevent="deleteBlog({{$data->id}})">Delete</a>
            @endif
        </div>
    </div>
</div>
</div>


</div>

