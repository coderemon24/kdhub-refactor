<div>
    <style>
        a:hover{
            text-decoration: none;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h5 class="bg-white py-2 mb-3 rounded px-3">Page Name: {{ $page->page_name }}</h5>
            </div>
            @foreach($sections as $section)
                <div class="col-md-3 mb-4">
                    <a href="{{ route('content.index', $section->id) }}" class="card d-block ">
                        <div class="card-body rounded py-5" style="background: #{{substr(md5(Str::random(10)), 0, 6)}}">
                            <h5 class="text-light text-center">
                                {{ $section->section_name }}
                            </h5>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
