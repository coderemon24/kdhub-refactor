<div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header bg-primary py-3">
                    <div class="d-sm-flex justify-content-between">
                        <h6 class="m-0 font-weight-bold text-light mt-3">Add Team Member</h6>
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
                <form wire:submit.prevent='addTeam'>
                    <div class="form-group">
                        <label for="file">Member name</label>
                        <input type="text" id="file" class="form-control @error('name') is-invalid @enderror mb-2" wire:model='name'>
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="title">Designation</label>
                        <input type="text" id="title" class="form-control @error('title') is-invalid @enderror mb-2" wire:model='title'>
                        @error('title') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="short_description">Upload Service Image</label>
                        <input type="file" id="short_description" class="form-control @error('image') is-invalid @enderror mb-2" wire:model='image'>
                        @error('image') <span class="text-danger">{{$message}}</span> @enderror
                        <div wire:loading wire:target="image">Uploading...</div>
                        @if($image)
                            <img src="{{$image->temporaryUrl()}}" alt="" width="100">
                        @endif
                    </div>
                    
                </div>
                <div class="card-footer bg-primary">
                    <button class="btn btn-primary active mx-auto d-block"><i class="fas fa-save"></i> Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>


