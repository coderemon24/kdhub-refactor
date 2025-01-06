<div>
    <section id="fintech_bg" style="    background: linear-gradient(#17212ed1, #17212ed1), url(http://127.0.0.1:8000/assets/image/fintech.webp) center center / cover no-repeat;">
        <div class="container">
            <div class="col-md-12">
                <h2 class="text-center text-light fw-bolder fs-1">Blogs</h2>
            </div>
        </div>
    </section>
    <section id="blog_details">
        <div class="container">
            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-md-3 mb-4">
                        <a href="{{ route('blog.details', $blog->slug) }}" class="card d-block blog-single-inner">
                            <img width="100%" height="200" class="card-img-top" src="{{ asset('assets/image/Blog/'.$blog->image)}}" alt="">
                            <div class="card-body">
                                <h6 class="card-title">
                                    {{Str::limit($blog->title, 60, '...') }}
                                </h6>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
