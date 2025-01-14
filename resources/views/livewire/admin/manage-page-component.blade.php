<div>
    <style>
        a:hover{
            text-decoration: none;
        }
    </style>
    <div class="container">
        <div class="row">
            @foreach($pages as $page)
                <div class="col-md-3 mb-4">
                    <a href="{{ route('manage.section', $page->id) }}" class="card d-block ">
                        <div class="card-body rounded py-5" style="background: #{{substr(md5(Str::random(10)), 0, 6)}}">
                            <h5 class="text-light text-center">
                                {{ $page->page_name }}
                            </h5>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
