<div>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-light mt-3">Add New Section</h6>
                        <a href="{{route('section.index', $page->id)}}" class="btn btn-light"><i class="fa fa-arrow-left"></i> Back</a>
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
                        
                        <form wire:submit.prevent="storeSection">
                            <div class="form-group">
                                <label for="section_name">Section Name</label>
                                <input type="text" wire:model="section_name" class="form-control" placeholder="Section Name">
                                @error('section_name') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" wire:model="title" class="form-control" placeholder="Title">
                                @error('title') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">Description</label>
                                <textarea wire:model="description" class="form-control" placeholder="Description"></textarea>
                                @error('description') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">Order By</label>
                                <input type="number" wire:model="order" class="form-control" placeholder="Order">
                                @error('order') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">Section Status</label>
                                <select wire:model="status" class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                                @error('status') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
