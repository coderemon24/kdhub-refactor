<div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header bg-success py-3">
                    <div class="d-sm-flex justify-content-between">
                        <h6 class="m-0 font-weight-bold text-light mt-3">Update Why us</h6>
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
                <form wire:submit.prevent='updatewhyus'>
                    <div class="form-group">
                        <label for="file">Title</label>
                        <input type="text" id="file" class="form-control @error('title') is-invalid @enderror mb-2" wire:model='title'>
                        @error('title') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="short_description">Upload New Icon</label>
                        <input type="file" id="short_description" class="form-control @error('newIcon') is-invalid @enderror mb-2" wire:model='newIcon'>
                        @error('newIcon') <span class="text-danger">{{$message}}</span> @enderror
                        <div wire:loading wire:target="newIcon">Uploading...</div>
                        @if($newIcon)
                            <img src="{{$newIcon->temporaryUrl() }}" alt="" width="120">
                        @else
                            <img src="{{asset('assets/image/WhyUS')}}/{{$icon}}" alt="">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" class="form-control @error('description') is-invalid @enderror mb-2" cols="30" rows="10" wire:model='description'></textarea>
                        @error('description') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    
                </div>
                <div class="card-footer bg-success">
                    <button class="btn btn-success active mx-auto d-block"><i class="fas fa-edit"></i> Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>


