<div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-success ">
                    <div class="d-sm-flex justify-content-center">
                        <h6 class="m-0 font-weight-bold text-light text-center mt-3">Website Settings</h6>
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
                <form wire:submit.prevent='updateSetting'>
                    <div class="form-group">
                        <label for="web">Website Name</label>
                        <input type="text" id="web" class="form-control @error('web_name') is-invalid @enderror mb-2" wire:model='web_name'>
                        @error('web_name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="logo">Website Logo</label>
                        <input type="file" id="logo" class="form-control @error('newlogo') is-invalid @enderror mb-2" wire:model='newlogo'>
                        @error('newlogo') <span class="text-danger">{{$message}}</span> @enderror
                        <div wire:loading wire:target="newlogo">Uploading...</div>
                        @if ($newlogo)
                            <img src="{{ $newlogo->temporaryUrl() }}" width="120">
                        @else
                            <img src="{{asset('assets/image/Settings')}}/{{$website_logo}}" width="120">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="logo">Website Favicon</label>
                        <input type="file" id="logo" class="form-control @error('newfavicon') is-invalid @enderror mb-2" wire:model='newfavicon'>
                        @error('newfavicon') <span class="text-danger">{{$message}}</span> @enderror
                        <div wire:loading wire:target="newfavicon">Uploading...</div>
                        @if ($newfavicon)
                            <img src="{{ $newfavicon->temporaryUrl() }}" width="120">
                        @else
                            <img src="{{asset('assets/image/Settings')}}/{{$website_favicon}}" width="120">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="address">Company Address</label>
                        <textarea id="address" class="form-control @error('address') is-invalid @enderror mb-2" wire:model='address' rows="3" cols="5"></textarea>
                        @error('address') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Company Email</label>
                        <input type="text" id="email" class="form-control @error('email') is-invalid @enderror mb-2" wire:model='email'>
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Company Phone</label>
                        <input type="text" id="phone" class="form-control @error('phone') is-invalid @enderror mb-2" wire:model='phone'>
                        @error('phone') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="facebook">Facebook Link</label>
                        <input type="text" id="facebook" class="form-control @error('facebook') is-invalid @enderror mb-2" wire:model='facebook'>
                        @error('facebook') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="twitter">Twitter Link</label>
                        <input type="text" id="twitter" class="form-control @error('twitter') is-invalid @enderror mb-2" wire:model='twitter'>
                        @error('twitter') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="instagram">Instagram Link</label>
                        <input type="text" id="instagram" class="form-control @error('instagram') is-invalid @enderror mb-2" wire:model='instagram'>
                        @error('instagram') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="linkedin">Linkedin Link</label>
                        <input type="text" id="linkedin" class="form-control @error('linkedin') is-invalid @enderror mb-2" wire:model='linkedin'>
                        @error('linkedin') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="map">Address Map Link</label>
                        <input type="text" id="map" class="form-control @error('map_link') is-invalid @enderror mb-2" wire:model='map_link'>
                        @error('map_link') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    
                </div>
                <div class="card-footer bg-success">
                    <button class="btn btn-success active mx-auto d-block"><i class="fas fa-plus"></i> Save changes</button>
                </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>


