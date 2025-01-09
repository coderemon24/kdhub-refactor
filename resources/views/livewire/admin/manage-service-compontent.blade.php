<div>
    <style>
        a:hover{
            text-decoration: none;
        }
    </style>
    <div class="container">
        <div class="row">
            @foreach($services as $serviceCategory)
                <div class="col-md-3 mb-4">
                    <a href="{{ route('section.index', $serviceCategory->id) }}" class="card d-block ">
                        <div class="card-body rounded py-5" style="background: #{{substr(md5(Str::random(10)), 0, 6)}}">
                            <h5 class="text-light text-center">
                                {{ $serviceCategory->name }}
                            </h5>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
