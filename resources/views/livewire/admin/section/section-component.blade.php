<div>
    <section id="all-data">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="service_cat_name">
                        <h5 class="">Page Name: {{ $page->page_name }}</h5>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">All Section</h6>
                            <a href="{{route('section.create', $page->id)}}" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Add New</a>
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
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">SL</th>
                                            <th>Order By</th>
                                            <th scope="col">Section Name</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sections as $key=>$data)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $data->order }}</td>
                                                <td>{{ $data->section_name }}</td>
                                                <td>{{ $data->title }}</td>
                                                <td>{{ $data->description }}</td>
                                                <td>
                                                    <a href="{{route('section.edit',$data->id)}}" class="btn btn-success" title="Edit" ><i class="fa fa-edit"></i></a>
                                                    <a href="#" wire:click.prevent="deleteSection('{{ $data->id }}')" onclick="confirm('Are you sure to delete?') || event.stopImmediatePropagation()"  class="btn btn-danger" title="delete" data-toggle="modal" data-target="#DeleteWhyus"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</div>
