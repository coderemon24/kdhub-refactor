<div>
    <section id="all-data">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="bg-white py-2 mb-3 rounded px-3">Section Name : {{ $section->section_name }}</h5>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">All Section Contents</h6>
                            <a href="{{route('content.create', $section->id)}}" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Add New</a>
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
                                            <th scope="col">Thumbnail</th>
                                            <th scope="col">Images</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Subtitle</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($section_contents as $key=>$data)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>
                                                    @if ($data->image)
                                                        <img src="{{ asset('assets/image/contents/'.$data->image) }}" width="50" height="50" alt="Thumbnail">
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($data->multi_image != null)
                                                        @foreach (json_decode($data->multi_image) as $image)
                                                            <img src="{{ asset('assets/image/contents/'.$image) }}" width="50" height="50" alt="Thumbnail">
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td>{{ $data->title }}</td>
                                                <td>{{ $data->subtitle }}</td>
                                                <td>{{ Str::limit(strip_tags($data->description), 50, '...') }}</td>
                                                <td>
                                                    <select wire:model="statuses.{{ $data->id }}" 
                                                            wire:change="updateStatus({{ $data->id }})" 
                                                            class="form-control">
                                                        <option value="active">Active</option>
                                                        <option value="inactive">Inactive</option>
                                                    </select>
                                                </td>
                                                
                                                <td>
                                                    <a href="{{route('content.edit',$data->id)}}" class="btn btn-success" title="Edit" ><i class="fa fa-edit"></i></a>
                                                    <a href="#" wire:click.prevent="deleteContent('{{ $data->id }}')" onclick="confirm('Are you sure to delete?') || event.stopImmediatePropagation()"  class="btn btn-danger" title="delete" data-toggle="modal" data-target="#DeleteWhyus"><i class="fa fa-trash"></i></a>
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
