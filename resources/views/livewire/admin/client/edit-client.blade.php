<div>
    <div class="container-fluid">
        <div class="mb-4 shadow card">
            <div class="py-3 card-header d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Update client</h6>
                <a href="{{ route('admin.clients') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <form wire:submit.prevent='updateClient'>
                            {{-- CSRF is handled by Livewire --}}
                            <div class="row">
                                <div class="col-md-12">
                                    @if(session()->has('message'))
                                        <div class="alert alert-success">{{ session()->get('message') }}</div>
                                    @endif
                                    @if(session()->has('error'))
                                        <div class="alert alert-danger">{{ session()->get('error') }}</div>
                                    @endif
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" id="image" wire:model='new_image' class="form-control @error('new_image') is-invalid @enderror">
                                        @error('new_image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        @if($new_image)
                                            <img src="{{ $image->temporaryUrl() }}" width="100" height="100" alt="Image Preview">
                                        @else
                                            <img src="{{ asset('assets/image/clients') }}/{{$image}}" width="100" height="100" alt="Image Preview">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="image_alt">Image Alt</label>
                                        <input type="text" id="image_alt" wire:model='image_alt' placeholder="Image Alt" class="form-control @error('image_alt') is-invalid @enderror">
                                        @error('image_alt')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6"></div>
                                <div class="text-right col-md-6">
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
