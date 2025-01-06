<div>
    <style>
        a:hover{
            text-decoration: none;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-5">
                <a href="" class="btn btn-primary">
                    Manage Services Under Service Category 
                </a>
            </div>
        </div>
        <div class="row">
            @foreach($services as $serviceCategory)
                <div class="col-md-3 mb-4">
                    <a href="#" class="card d-block ">
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
