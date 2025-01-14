<div>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-light mt-3">Add New Content</h6>
                        <a href="{{route('content.index')}}" class="btn btn-light"><i class="fa fa-arrow-left"></i> Back</a>
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
                        
                        <form wire:submit.prevent="createContent">
                            <div class="form-group">
                                <label for="name">Title</label>
                                <input type="text" wire:model="title" class="form-control" placeholder="Title">
                                @error('title') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="name">Subtitle</label>
                                <input type="text" wire:model="subtitle" class="form-control" placeholder="Subtitle">
                                @error('subtitle') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="name">Select Section</label>
                                <select wire:model="section_id" class="form-control">
                                    <option value="">Select Section</option>
                                </select>
                                @error('title') <span class="text-danger">{{$message}}</span> @enderror
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
