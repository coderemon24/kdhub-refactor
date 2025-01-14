<div>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-light mt-3">Add New Content</h6>
                        <a href="{{route('content.index', $section_id)}}" class="btn btn-light"><i class="fa fa-arrow-left"></i> Back</a>
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
                        
                        <form wire:submit.prevent="updateContent">
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
                                <label for="color">Description</label>
                                <textarea id="editor" wire:model="description" class="form-control @error('description') is-invalid @enderror mb-2" cols="30" rows="5"></textarea>
                                @error('description') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="name">Thumbnail Image</label>
                                <input type="file" wire:model="image" class="form-control mb-1" >
                                @error('image') <span class="text-danger">{{$message}}</span> @enderror
                                @if($old_image != null)
                                    <img width="50" src="{{asset('assets/image/contents/'.$old_image)}}" alt="">
                                @endif
                            </div>
                            
                            <div class="form-group">
                                <label for="name">Multiple Image <small>(If Needed)</small></label>
                                <input type="file" multiple wire:model="images" class="form-control mb-1" >
                                @error('images') <span class="text-danger">{{$message}}</span> @enderror
                                @if($old_images)
                                    @foreach(json_decode($old_images) as $old_image)
                                        <img width="50" src="{{asset('assets/image/contents/'.$old_image)}}" alt="">
                                    @endforeach
                                @endif
                            </div>
                            
                            <div class="form-group">
                                <label for="name">Status</label>
                                <select wire:model="status" class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="active" {{$status == 'active' ? 'selected' : ''}}>Active</option>
                                    <option value="inactive" {{$status == 'inactive' ? 'selected' : ''}}>Inactive</option>
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


<!-- CKEditor for create -->
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let editorInstance;
            let isEditorFocused = false;

            function initCKEditor() {
                ClassicEditor
                    .create(document.querySelector('#editor'), {
                        toolbar: [
                            'undo', 'redo', '|',
                            'bold', 'italic', 'underline', 'link', '|',
                            'bulletedList', 'numberedList', '|',
                            'blockQuote', 'insertTable', 'imageUpload', 'mediaEmbed', '|',
                            'fontSize', 'fontFamily', 'fontColor'
                        ],
                        fontSize: { options: [9, 11, 13, 15, 17, 19, 21, 23, 25] },
                        fontFamily: {
                            options: [
                                'Arial, Helvetica, sans-serif',
                                'Courier New, Courier, monospace',
                                'Georgia, serif',
                                'Lucida Sans Unicode, Lucida Grande, sans-serif',
                                'Tahoma, Geneva, sans-serif',
                                'Times New Roman, Times, serif',
                                'Verdana, Geneva, sans-serif'
                            ]
                        },
                        fontColor: { columns: 5 }
                    })
                    .then(editor => {
                        editorInstance = editor;

                        // Sync data with Livewire
                        editor.model.document.on('change:data', () => {
                            @this.set('description', editor.getData());
                        });

                        // Track focus state
                        editor.editing.view.document.on('focus', () => {
                            isEditorFocused = true;
                        });

                        editor.editing.view.document.on('blur', () => {
                            isEditorFocused = false;
                        });
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }

            // Initialize CKEditor on page load
            if (!editorInstance) {
                initCKEditor();
            }

            // Reinitialize CKEditor only if necessary after Livewire DOM updates
            Livewire.hook('message.processed', () => {
                if (document.querySelector('#editor') && !editorInstance) {
                    initCKEditor();
                }
            });
        });

    </script>
@endpush