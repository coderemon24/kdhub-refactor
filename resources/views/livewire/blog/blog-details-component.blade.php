@php
    $setting = App\Models\Setting::first();
@endphp
<div>
    <div style="background: #000">
        <section id="service_details_top">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="service_title_section">
                            <h1 class="service-title">{{$blog?->title}}</h1>
                            
                            <div class="social-links">
                                <a target="_blank" href="{{$setting?->twitter_link}}" class="social twitter"><i class="bx bxl-twitter"></i></a>
                                <a target="_blank" href="{{$setting?->facebook_link}}" class="social facebook"><i class="bx bxl-facebook"></i></a>
                                <a target="_blank" href="{{$setting?->instagram_link}}" class="social instagram"><i class="bx bxl-instagram"></i></a>
                                <a target="_blank" href="{{$setting?->linkedin_link}}" class="social linkedin"><i class="bx bxl-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="details_main">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="details-left">
                            <div class="blog-image">
                                <img width="100%" src="{{asset('assets/image/Blog/'.$blog?->image)}}" alt="image">
                            </div>
                            <div class="blog-contents">
                                {!! $blog?->description !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="details-right">
                            <div class="youtube-video">
                                <iframe width="100%" height="315" src="https://www.youtube.com/embed/R0AcVLPNc7Q?si=c51ogOqhgteE7ciW" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </div>
                            <div class="recent-post">
                                <h3 class="text-white mb-3">Recent Post</h3>
                                <ul class="list-unstyled">
                                    @foreach($blogs as $blog)
                                        <li class="mb-3">
                                            <a href="{{route('blog.details', $blog->slug)}}">
                                                <div class="media">
                                                    <img width="50" src="{{asset('assets/image/Blog/'.$blog->image)}}" alt="image">
                                                    <div class="media-body">
                                                        <h6>
                                                            {{Str::limit($blog->title, 70, '...') }}
                                                        </h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
