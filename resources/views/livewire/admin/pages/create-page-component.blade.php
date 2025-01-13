<div>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-light mt-3">Add New Page</h6>
                        <a href="{{route('page.index')}}" class="btn btn-light"><i class="fa fa-arrow-left"></i> Back</a>
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
                        
                        <form wire:submit.prevent="storeCategory">
                            <div class="form-group">
                                <label for="name">Page Name</label>
                                <input type="text" wire:model="name" class="form-control" placeholder="Enter Page Name">
                                @error('name') <span class="text-danger">{{$message}}</span> @enderror
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
