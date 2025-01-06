<div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header bg-primary py-3">
                    <div class="d-sm-flex justify-content-between">
                        <h6 class="m-0 font-weight-bold text-light mt-3">Add New Blog</h6>
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
                <form wire:submit.prevent='createBlog'>
                    <div class="form-group">
                        <label for="file">Blog Title</label>
                        <input type="text" id="file" class="form-control @error('title') is-invalid @enderror mb-2" wire:model='title'>
                        @error('title') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="file">Slug</label>
                        <input type="text" id="file" class="form-control @error('slug') is-invalid @enderror mb-2" wire:model='slug'>
                        @error('slug') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="color">Description</label>
                        <textarea id="editor" wire:model.defer="description" class="form-control @error('description') is-invalid @enderror mb-2" cols="30" rows="5"></textarea>
                        @error('description') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="short_description">Image</label>
                        <input type="file" id="image" class="form-control @error('image') is-invalid @enderror mb-2" wire:model.defer='image'>
                        @error('image') <span class="text-danger">{{$message}}</span> @enderror
                        <div wire:loading wire:target="image">Uploading...</div>
                        @if($image)
                            <img width="100" src="{{$image->temporaryUrl()}}" alt="">
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

