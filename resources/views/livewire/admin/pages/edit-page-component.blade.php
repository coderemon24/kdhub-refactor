<div>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
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
                        
                        <form wire:submit.prevent="updatePage">
                            <div class="form-group">
                                <label for="name">Page Name</label>
                                <input type="text" wire:model="page_name" class="form-control" placeholder="Enter Page Name">
                                @error('page_name') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Page Category</label>
                                <select wire:model="category_id" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}" {{ $category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="name">Order</label>
                                <input type="number" wire:model="order" class="form-control" placeholder="Priority">
                                @error('order') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Meta Title</label>
                                <input type="text" wire:model="meta_title" class="form-control" placeholder="Meta Title">
                                @error('meta_title') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Meta Description</label>
                                <textarea placeholder="Meta Description" wire:model="meta_description" class="form-control"  cols="30" rows="5"></textarea>
                                @error('meta_description') <span class="text-danger">{{$message}}</span> @enderror
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
