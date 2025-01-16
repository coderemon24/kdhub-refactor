@php
    use App\Models\Setting;
    $settings = Setting::find(1);
@endphp

<div>
    
    @section("title", $page->meta_title )
    @section('description', $page->meta_description)
    
    @if(count($sections) === 0)
        <div class="container">
            <div class="row">
                <div class="col-md-12 py-5">
                    <h2 class="text-center text-secondary fw-semibold">
                        No Services Found!
                    </h2>
                </div>
            </div>
        </div>
    @else
        <main id="main">
                    <!-- ======= Breadcrumbs Section ======= -->
                    <section class="breadcrumbs">
                        <div class="container">
                
                        <div class="d-flex justify-content-between align-items-center">
                            <ol>
                            <li><a href="/">Home</a></li>
                            <li>{{$page->page_name}}</li>
                            </ol>
                        </div>
                
                        </div>
                    </section>
                    <!-- End Breadcrumbs Section -->
                
                    <!-- web information section  -->
                    @if(array_key_exists(1, $sections))
                        @foreach($contents->where('section_id', $sections[1]->id)->where('status', 'active') as $content)
                            <section id="adds-info" class="section-bg">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h2 class="adds-info-title mb-3">
                                                {{$content->title}}
                                            </h2>
                                            <div class="adds-info-content mb-5 pb-3">
                                                {!! $content->description !!}
                                            </div>
                                            
                                            <a href="{{route('estimate')}}" class="adds-info-btn mb-3 mt-5">Talk with our Google Ads management experts »</a>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row no-gutters clients-wrap clearfix wow fadeInUp">
                                                @foreach(json_decode($content->multi_image) as $single_img)
                                                    <div class="col-lg-4 col-md-4 col-6">
                                                        <div class="client-logo">
                                                            <img src="{{asset('assets/image/contents/'.$single_img)}}" class="img-fluid" alt="" data-aos="flip-right" data-aos-delay="100">
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <img src="{{asset('assets/image/contents/'.$content->image)}}" alt="google" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </section>
                        @endforeach
                    @endif
                    <!-- Company status section -->
                    <section id="company-status" style="background-color: #757575; color: white; padding: 20px 0;">
                        <div class="container">
                            <div class="company-status-content d-flex justify-content-between align-items-center">
                                <h2>Company <br> Stats:</h2>
                                <div class="d-flex flex-column align-items-center text-center">
                                    <div class="d-flex align-items-center mb-2">
                                        <img src="{{asset('assets/img/company/icon-target.png.webp')}}" alt="company" class="img-fluid me-2">
                                        <h3 class="mb-0 ms-3" style="font-weight: bolder; font-size:45px;">{{ $stat->years_of_glory }}</h3>
                                    </div>
                                    <p class="text-center">Years of Glory</p>
                                </div>
                                <div class="d-flex flex-column align-items-center text-center">
                                    <div class="d-flex align-items-center mb-2">
                                        <img src="{{asset('assets/img/company/icon-relationship.png.webp')}}" alt="company" class="img-fluid me-2">
                                        <h3 class="mb-0 ms-3" style="font-weight: bolder; font-size:45px;">{{ $stat->happy_clients }}</h3>
                                    </div>
                                    <p class="text-center">Happy Clients</p>
                                </div>
                                <div class="d-flex flex-column align-items-center text-center">
                                    <div class="d-flex align-items-center mb-2">
                                        <img src="{{asset('assets/img/company/icon-trophy.png.webp')}}" alt="company" class="img-fluid me-2">
                                        <h3 class="mb-0 ms-3" style="font-weight: bolder; font-size:45px;">{{ $stat->ads_spend }}</h3>
                                    </div>
                                    <p class="text-center">Google Ads Spend</p>
                                </div>
                            </div>
                        </div>
                    </section>
                
                    <!-- More web information section  -->
                    @if(array_key_exists(2, $sections))
                        <section id="more-adds-info">
                            <div class="container text-center">
                                <h2 class="mb-4 fw-bold">{{ $sections[2]->title }}</h2>
                                <p class="mb-5" style="color: #737373;">
                                    {!! $sections[2]->description !!}
                                </p>
                                <div class="row">

                                    @foreach($contents->where('section_id', $sections[2]->id)->where('status', 'active') as $content)
                                        <div class="col-md-4">
                                            <img src="{{asset('assets/image/contents/'.$content->image)}}" alt="icons" class="img-fluid">
                                            <h3 class="fw-bolder mt-4 mb-3 text-body-tertiary">
                                                {{ $content->title }}
                                            </h3>
                                            <p>
                                                {!! $content->description !!}
                                            </p>
                                        </div>
                                    @endforeach
                    
                                </div>
                            </div>
                        </section>
                    @endif
                    <!-- contact section  -->
                    @if(array_key_exists(3, $sections))
                        <section id="contact">
                            <div class="container">
                                <h1 class="text-center mb-5" style="width:800px; margin:auto; color:#4eb041; font-family: 'Oswald', sans-serif; font-weight:900;">
                                    {{ $sections[3]->title }}
                                </h1>
                                <p class="text-center">At Kaizen Digital we’ll make your Google Ads campaign reach its true potential.</p>
                                <h5 class="text-center"><b>Our proposal will show you exactly what we’ll do, how much it’ll cost, and how we’re going <br> to </b> <i>crush your competitors.</i></h5>
                                <h3 class="text-center mb-4" style="color: #ffa600;"><b>Want to get the ball rolling quicker? Call {{$settings->company_phone}}.</b></h3>
                                <div class="contact-section mt-4 p-5">
                                <div class="row">
                                    @if ($message)
                                        <div class="alert alert-success">{{ $message }}</div>
                                    @endif
                                    <div class="col-md-5">
                                        <h4 class="mb-4 mt-3 fw-bolder" style="color: #1683ab;">Paid Search</h4>
                                        <form wire:submit.prevent='estimate'>
                                            <div class="form-group mb-4">
                                                <label for="web_name"><b>Website Address / Domain:</b></label>
                                                <input type="text" id="web_name" class="form-control" wire:model='web_name'>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="category"><b>Are you looking to grow online sales or leads?</b></label>
                                                <select id="category" class="form-select" wire:model='category'>
                                                    <option value="Increase online sales (eCommerce)">Increase online sales (eCommerce)</option>
                                                    <option value="Increase online leads (Lead Gen)">Increase online leads (Lead Gen)</option>
                                                    <option value="Increase both online sales & leads">Increase both online sales & leads</option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="description"><b>Tell Us About Your Paid Search Goals:</b></label><br>
                                                <span>Please describe your campaign goals, current ad spend, and challenges.</span>
                                                <textarea id="description" class="form-control" cols="30" rows="5" wire:model='description'></textarea>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="service_type" class="mb-3"><b>Interested in any other services?</b></label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="Search Engine Optimization" id="flexCheckDefault" wire:model='service_type'> 
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Search Engine Optimization
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="Conversion Rate Optimization" id="flexCheckDefault1" wire:model='service_type'>
                                                    <label class="form-check-label" for="flexCheckDefault1">
                                                        Conversion Rate Optimization
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="Email Marketing" id="flexCheckDefault2" wire:model='service_type'>
                                                    <label class="form-check-label" for="flexCheckDefault2">
                                                        Email Marketing
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="Website Design & Development" id="flexCheckDefault3" wire:model='service_type'>
                                                    <label class="form-check-label" for="flexCheckDefault3">
                                                        Website Design & Development
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="Website Maintenance" id="flexCheckDefault4" wire:model='service_type'>
                                                    <label class="form-check-label" for="flexCheckDefault4">
                                                        Website Maintenance
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="Product Feed Management" id="flexCheckDefault5" wire:model='service_type'>
                                                    <label class="form-check-label" for="flexCheckDefault5">
                                                        Product Feed Management
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-5">
                                            <h4 class="mb-4 mt-3 fw-bolder" style="color: #1683ab;">My Contact Information</h4>
                                            <div class="form-group mb-4">
                                                <label for="full_name"><b>Your Full Name:</b></label>
                                                <input type="text" id="full_name" class="form-control @error('full_name') is-invalid @enderror" wire:model='full_name'>
                                                @error('full_name') <span class="text-danger">{{$message}}</span> @enderror
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="company"><b>Company:</b></label>
                                                <input type="text" id="company" class="form-control" wire:model='company'>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="email"><b>Email Address:</b></label>
                                                <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" wire:model='email'>
                                                @error('email') <span class="text-danger">{{$message}}</span> @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="phone"><b>Phone Number:</b></label>
                                                <input type="text" id="phone" class="form-control @error('phone') is-invalid @enderror" wire:model='phone'>
                                                @error('phone') <span class="text-danger">{{$message}}</span> @enderror
                                            </div>
                                            <small>*Providing a phone number will allow us to easily contact you regarding questions we may have about your project.</small>
                                            <button type="submit" class="btn btn-success btn-custom-paid mt-3">Submit Estimate Request</button>
                                        </form>
                                    </div>
                                    
                    
                                    <div class="col-md-2 mt-4">
                                        <img src="assets/img/premier-google-partner.gif" alt="premier">
                                        <div class="card mt-3 border-none" style="width: 14rem; border:none; border-radius:0; background-color: #faa537; color: #fff;">
                                            <div class="card-body">
                                                <img src="assets/img/24image.png" alt="24hours" class="img-fluid d-block mx-auto" width="100" height="100">
                                                <h5 class="card-title text-center mb-3">We'll get back to you within 24 hours.</h5>
                                                <h6 class="card-subtitle mb-2  text-center"><small>Saturday - Friday.</small></h6>
                                            </div>
                                        </div>
                                        <div class="card mt-3 border-none" style="width: 14rem; border:none; border-radius:0; background-color: #1582a3; color: #fff;">
                                            <div class="card-body">
                                                <img src="assets/img/24phone.png" alt="24hours" class="img-fluid d-block mx-auto mb-3" width="40" height="40">
                                                <h5 class="card-title text-center mb-3">Want To Talk Now?<br> {{$settings->company_phone}}</h5>
                                                <h6 class="card-subtitle mb-2  text-center"><small>Offices open 10-9 (GMT+6).</small></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                    
                            </div>
                        </section>
                    @endif
                    <!-- devider -->
                    <div class="mt-5 pt-5" style="border-bottom: 3px solid #ededed;"></div>
                
                
                    <!-- Examples section  -->
                    @if(array_key_exists(4, $sections))
                        <section id="case-studies">
                            <div class="container">
                                <h3 class="fw-bolder mb-3 text-center">
                                    {{$sections[4]->title}}
                                </h3>
                                <p class="mb-3 text-center text-body-tertiary fw-semibold">
                                    {!! $sections[4]->description !!}
                                </p>
                                <div class="text-center">
                                    <a href="{{route('estimate')}}" class="btn btn-warning btn-custom py-2 px-5 mt-5 w-60 fw-bold fs-5">Discuss your website needs with Kaizen Digital <i class="bx bx-chevron-right"></i></a>
                                </div>
                                
                            </div>
                        </section>
                    @endif
                    <div class="mt-5 pt-5" style="border-bottom: 3px solid #ededed;"></div>
                
                
                    <!-- We're WordPress Website Design Experts section  -->
                    
                    
                        <section id="google-ads-works">
                        <div class="container mt-5">
                            @if(array_key_exists(5, $sections))
                                @foreach($contents->where('section_id', $sections[5]->id)->where('status','active') as $content)
                                <div class="row">
                                    <div class="col-md-6">
                                        <h2 class="mb-3" style="color:#0f7099; font-family: 'Oswald', sans-serif; font-weight:900;">
                                            {{$content->title}}
                                        </h2>
                                        <div class="text-body-tertiary">
                                            {!! $content->description !!}
                                        </div>
                                        <a href="{{route('estimate')}}" class="btn btn-success btn-custom py-2 px-5 mt-2 w-60 fw-bold fs-5">Get a quote for your project <i class="bx bx-chevron-right"></i></a>
                                    </div>
                            
                                    <div class="col-md-6">
                                        <img src="{{asset('assets/image/contents/'.$content->image)}}" class="img-fluid" alt="{{$sections[4]->slug}}" >
                                    </div>
                        
                                </div>
                                @endforeach
                            @endif
                        
                            <!-- ======= Clients Section ======= -->
                            <section id="clients" class="clients py-5">
                                <div class="container">
                                <h5 class="fw-bolder text-center text-secondary p-3">We're Website Design & Development Experts Across All Major Platforms</h5>
                                <div class="swiper-container clients-slider">
                                    <div class="swiper-wrapper">
                                        @foreach($clients as $client)
                                        <div class="swiper-slide">
                                            <div class="client-logo">
                                            <img src="{{asset('assets/image/clients/'.$client->image)}}" class="img-fluid" alt="" data-aos="flip-right">
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                
                                    
                                </div>
                                </div>
                            </section>
                        <!-- End Clients Section -->
                        @if(array_key_exists(6, $sections))
                            @foreach($contents->where('section_id', $sections[6]->id)->where('status','active') as $content)
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="{{asset('assets/image/contents/'.$content->image)}}" class="img-fluid" alt="landing" >
                                    </div>
                                    <div class="col-md-6">
                                    <h2 class="mb-3" style="color:#0f7099; font-family: 'Oswald', sans-serif; font-weight:900;">
                                        {{$content->title}}
                                    </h2>
                                    <div class="text-body-tertiary">
                                        {!! $content->description !!}
                                    </div>
                                    <a href="{{route('estimate')}}" class="btn btn-success btn-custom py-2 px-5 mt-2 w-60 fw-bold fs-5">eCommerce Website Design Services <i class="bx bx-chevron-right"></i></a>
                                    </div>
                        
                                </div>
                            @endforeach
                        @endif
                        </div>
                        </section>
                    

                    <!-- Website Design & Development Case Studies section  -->
                    @if(array_key_exists(7, $sections))
                        <section id="case-studies">
                            <div class="container">
                                <h3 class="fw-bolder mb-3 text-center">
                                    {{$sections[7]->title}}
                                </h3>
                                <p class="mb-3 text-center fw-semibold" style="width:800px; margin: auto;">
                                    {!! $sections[7]->description !!}
                                </p>
                                
                                <div class="row mt-3 pt-5 gy-4">
                                    
                                    @foreach($contents->where('section_id', $sections[7]->id)->where('status', 'active') as $content)
                                    <div class="col-md-6">
                                        <div class="card" style="height: 500px;">
                                            <img src="{{asset('assets/image/contents/'.$content->image)}}" class="card-img-top" alt="{{$content->title}}">
                                            <div class="card-body">
                                                <h3 class="card-title fw-bolder" style="color: #0b526e;">
                                                    {{$content->title}}
                                                </h3>
                                                <div class="card-text">
                                                    {!! $content->description !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                    
                                </div>
                            </div>
                        </section>
                    @endif

                    {{-- web services --}}
                    @if(array_key_exists(8, $sections))
                        <section id="web-services">
                            <div class="container">
                                <div class="google-ads-services mt-3 p-5 mb-3" style="background:#f5f5f5; border-left: 20px solid #f2aa4b;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h2><b>
                                                {{$sections[8]->title}}    
                                            </b></h2>
                                        </div>
                                    </div>
                                    
                                    @foreach($contents->where('section_id', $sections[8]->id)->where('status', 'active') as $content)
                                    <div class="row">
                                        <div class="col-md-6">
                                            <ul style="color: #636363;">
                                                <li style="color: #0f7099;"><h4><b>{{ $content->title }}</b></h4></li>
                                                <div class="text-body-tertiary">
                                                    {!! $content->description !!}
                                                </div> 
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <img src="{{asset('assets/image/contents/'.$content->image)}}" class="img-fluid" alt="{{$content->title}}">
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="text-center">
                                    <a href="{{route('estimate')}}" class="btn btn-success btn-custom py-2 px-5 mt-5 w-60 fw-bold fs-5">Let's talk about your website design project <i class="bx bx-chevron-right"></i></a>
                                </div>
                            </div>
                        </section>
                    @endif

                    {{-- more information about web services --}}
                    <section id="google-ads-works">
                        <div class="container">
                        
                
                        <div class="how-much-it-cost">
                        @if(array_key_exists(9, $sections))    
                            @foreach($contents->where('section_id', $sections[9]->id)->where('status', 'active') as $content)  
                                <h2 class="fw-bold mb-3 mt-4" style="color: #0f7099;">
                                    {{$content->title}}
                                </h2>
                                <p class="text-body-tertiary">
                                    {!! $content->description !!}
                                </p>
                                @if($content->image)
                                    <img src="{{asset('assets/image/contents/'.$content->image)}}" class="img-fluid d-block mx-auto" alt="{{$content->title}}">
                                @endif
                            @endforeach 
                        @endif
                            
                            <div class="mt-2 pt-5" style="border-bottom: 3px solid #ededed;"></div>
                        @if(array_key_exists(10, $sections))
                            @foreach($contents->where('section_id', $sections[10]->id)->where('status', 'active') as $content)  
                                <h2 class="fw-bold mb-3 mt-4" style="color: #4d4d4d;">
                                    {{$content->title}}
                                </h2>
                                
                                <div class="text-body-tertiary">
                                    {!! $content->description !!}
                                </div>
                            @endforeach
                            <div class="mt-2 pt-5" style="border-bottom: 3px solid #ededed;"></div>
                        @endif
                            
                            
                        @if(array_key_exists(11, $sections))   
                            @foreach($contents->where('section_id', $sections[11]->id)->where('status', 'active') as $content)  
                                <h2 class="fw-bold mb-3 mt-4" style="color: #4d4d4d;">
                                    {{$content->title}}
                                </h2>
                                <div class="text-body-tertiary">
                                    {!! $content->description !!}
                                </div>
                                <img src="{{asset('assets/image/contents/'.$content->image)}}" class="img-fluid d-block mx-auto" alt="{{$content->title}}">
                            @endforeach 
                            <!-- devider -->
                            <div class="mt-3" style="border-bottom: 3px solid #ededed;"></div>
                        @endif
                         
                            
                        </div>
                        
                        @if(array_key_exists(12, $sections))
                            <div class="accordion-body">
                                <div class="accordion">
                                <h2 class="text-center mb-5" style="color:#4d4d4d; font-family: 'Oswald', sans-serif; font-weight:900;">
                                    {{$sections[12]->title ?? ''}}
                                </h2>
                                
                                @foreach($contents->where('section_id', $sections[12]->id ?? '')->where('status', 'active') as $content)
                                    <div class="container">
                                        <div class="label">{{$content->title}}</div>
                                        <div class="content text-body-tertiary">
                                            {!! $content->description !!}
                                        </div>
                                    </div>
                                @endforeach 
                                </div>
                                
                            </div>
                        @endif
                        
                        <img src="{{asset('assets/img/5-star-company.gif')}}" class="d-block mx-auto" alt="5star">
                        <p class="text-center mt-4">Kaizen Digital is rated 4.8 / 5 average from 867 reviews on FeaturedCustomers, Clutch & Google</p>
                        <!-- devider -->
                        <div class="mt-5 mb-5" style="border-bottom: 3px solid #ededed;"></div>
                        <!-- ======= Clients Section ======= -->
                        <section id="clients" class="clients section-bg">
                            <div class="container">
                
                            <div class="row no-gutters clients-wrap clearfix wow fadeInUp ms-5">
                            @foreach($clients as $client)  
                                <div class="col-lg-2 col-md-4 col-6">
                                    <div class="google-client-logo">
                                        <img src="{{asset('assets/image/clients/'.$client->image)}}" class="img-fluid" alt="{{$client->img_alt}}" data-aos="flip-right" width="100" height="200">
                                    </div>
                                </div>
                            @endforeach  
                
                            </div>
                
                            </div>
                        </section><!-- End Clients Section -->
                
                
                        </div>
                    </section>
                
                
        </main>
    
    @endif
</div>
