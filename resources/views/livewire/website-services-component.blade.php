@php
    use App\Models\Setting;
    $settings = Setting::find(1);
@endphp

<div>
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
      @php
          $contens = App\Models\Admin\SectionContent::where('section_id', $section_1->id)->get();
      @endphp
      
      @foreach($contens as $content)
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
        <section id="more-adds-info">
            <div class="container text-center">
                <h2 class="mb-4 fw-bold">{{ $section_2->title }}</h2>
                <p class="mb-5" style="color: #737373;">
                    {!! $section_2->description !!}
                </p>
                <div class="row">
                    @php    
                        $contents = App\Models\Admin\SectionContent::where('section_id', $section_2->id)->get();
                    @endphp

                    @foreach($contents as $content)
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

        <!-- contact section  -->
        <section id="contact">
            <div class="container">
                <h1 class="text-center mb-5" style="width:800px; margin:auto; color:#4eb041; font-family: 'Oswald', sans-serif; font-weight:900;">
                    {{ $section_3->title }}
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
    
        <!-- devider -->
        <div class="mt-5 pt-5" style="border-bottom: 3px solid #ededed;"></div>
    
    
        <!-- Examples section  -->
        <section id="case-studies">
            <div class="container">
                <h3 class="fw-bolder mb-3 text-center">
                    {{$section_4->title}}
                </h3>
                <p class="mb-3 text-center text-body-tertiary fw-semibold">
                    {!! $section_4->description !!}
                </p>
                <div class="text-center">
                    <a href="{{route('estimate')}}" class="btn btn-warning btn-custom py-2 px-5 mt-5 w-60 fw-bold fs-5">Discuss your website needs with Kaizen Digital <i class="bx bx-chevron-right"></i></a>
                </div>
                 
            </div>
        </section>
        <div class="mt-5 pt-5" style="border-bottom: 3px solid #ededed;"></div>
    
    
        <!-- We're WordPress Website Design Experts section  -->
        @php
            $contents = App\Models\Admin\SectionContent::where('section_id', $section_5->id)->get();
        @endphp
        
            <section id="google-ads-works">
            <div class="container mt-5">
                @foreach($contents as $content)
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
                        <img src="{{asset('assets/image/contents/'.$content->image)}}" class="img-fluid" alt="{{$section_5->slug}}" >
                    </div>
        
                </div>
                @endforeach
            
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
        @php
            $contents = App\Models\Admin\SectionContent::where('section_id', $section_6->id)->get();
        @endphp
            @foreach($contents as $content)
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
            </div>
            </section>
        

        <!-- Website Design & Development Case Studies section  -->
        <section id="case-studies">
            <div class="container">
                <h3 class="fw-bolder mb-3 text-center">
                    {{$section_7->title}}
                </h3>
                <p class="mb-3 text-center fw-semibold" style="width:800px; margin: auto;">
                    {!! $section_7->description !!}
                </p>
                
                <div class="row mt-3 pt-5 gy-4">
                    @php
                        $contents = App\Models\Admin\SectionContent::where('section_id', $section_7->id)
                        ->where('status','active')->get();
                    @endphp
                    @foreach($contents as $content)
                    <div class="col-md-6">
                        <div class="card" style="height: 500px;">
                            <img src="{{asset('assets/image/contents/'.$content->image)}}" class="card-img-top" alt="...">
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

        {{-- web services --}}
        <section id="web-services">
            <div class="container">
                <div class="google-ads-services mt-3 p-5 mb-3" style="background:#f5f5f5; border-left: 20px solid #f2aa4b;">
                    <div class="row">
                        <div class="col-md-6">
                            <h2><b>
                                {{$section_8->title}}    
                            </b></h2>
                        </div>
                    </div>
                    
                    @php
                        $contents = App\Models\Admin\SectionContent::where('section_id', $section_8->id)
                        ->where('status','active')->get();
                    @endphp
                    @foreach($contents as $content)
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


        {{-- more information about web services --}}
        <section id="google-ads-works">
            <div class="container">
              <div class="how-it-works mt-5 pt-5">
                <h2 class="fw-bold mb-3" style="color: #4d4d4d;">How Investing in a High-End Website Helps Your Business</h2>
                <p class="text-body-tertiary">There’s a big difference between a professional website and lower-cost services, but how do high-end services really impact your business? We all know it when we see it – a website that we land on and quickly hit the back button. A high-end look will not only be built to engage visitors but have a major impact on your search engine rankings, conversion rate, and more.</p>
                <img src="assets/img/website-design-services.jpg.webp" class="img-fluid d-block mx-auto" alt="google-ads-manager-dashboard">
                <p class="text-body-tertiary">Let’s review the main benefits of a professional website:</p>
              </div>
              
      
              <div class="how-much-it-cost">
                <h2 class="fw-bold mb-3 mt-4" style="color: #0f7099;">Engage Your Visitors & Increase Your Conversion Rate</h2>
                <p class="text-body-tertiary">Depending on your industry, the average conversion rate falls between 2-5%. Your conversion rate is the percentage of website visitors that convert into a lead or sale. Typical conversions include filling out an online form, visiting a store in-person, calling for a quote, or completing the checkout process. But did you know the top-performing websites’ average conversion rate is above 5%? If your website is built to be a top performer, you can double your business. If you want to maximize each visitor, developing a high-end presence with engaging graphics and unique features is a must. Not only will you stand out, decreasing your bounce rate, but you’ll be presenting your business in the most professional way possible. Remember, your website is the face of your business and the first impression for most of your potential customers. A web project is a long-term investment, an asset you’ll have for years, and should be your best marketing tool and sales representative every single day.</p>
                
                <h2 class="fw-bold mb-3 mt-4" style="color: #0f7099;">Ranking at the top of Search Engines with SEO-Friendly Website Development</h2>
                <p class="text-body-tertiary">There are more than 5.6 billion searches on Google every day, so it goes without saying, being at the top of Google and other major search engines when your products and services are searched is a must if you want to grow your business. Did you know the top 3 organic results on Google get 75% of the clicks? This means if you’re not at the top, you’re losing out on a massive amount of potential customers. So, how do website design services impact your search engines rankings? SEO-friendly development is an absolute must and one of the main factors often overlooked when heading into a project. During the design and development of your website, designers and coders are setting the foundation for how your website works and how it’s presented to the search engines. If they code pages incorrectly or don’t optimize the layout for search, no matter what you do in the future, or how much content you create, you’ll be penalized for poor site structure. The great part about working with Kaizen Digital is we’re not only a web agency but also one of the nation’s leading SEO agencies. When we’re building a website our SEO team is involved from the beginning, making sure your website is built correctly. Our SEOs check all code, are involved in content creation and are heavily involved post-launch ensuring you’re being seen by Google in an optimal way.</p>
                <img src="assets/img/ecommerce-google-ads-management.jpg.webp" class="img-fluid d-block mx-auto" alt="google-ads-manager-dashboard">
                
                <h2 class="fw-bold mb-3 mt-4" style="color: #0f7099;">Setting Up All of Your Marketing Channels for Success</h2>
                <p class="text-body-tertiary">No matter what marketing channel you’re using, offline advertising or digital marketing, you’re often driving people to your site. If your website isn’t the absolute best it can be, you’re ROAS (return on advertising spend) is lower across all channels. Your website needs to act as the main conversion funnel, turning your interested consumers into buyers. A great site will help you to maximize and see success across all of your advertising methods, allowing you to reinvest into growth.</p>
                <div class="mt-2 pt-5" style="border-bottom: 3px solid #ededed;"></div>
                
                <h2 class="fw-bold mb-3 mt-4" style="color: #4d4d4d;">How Much Do Website Design Services Cost?</h2>
                <p class="text-body-tertiary">Pricing a website project is similar to pricing a home build. It comes down to how big the project is, what features you want, and how long it’ll take to do the job. The average project with Kaizen Digital ranges between $10,000 – $50,000, but can exceed $100,000+ for large projects. Below are some of the main items that impact pricing:</p>
                <ul class="text-body-tertiary">
                  <li>Number of pages</li>
                  <li>Design styles (basic/clean, advanced/animations)</li>
                  <li>Amount of copywriting needed</li>
                  <li>eCommerce functionality</li>
                  <li>Platforms / CMS chosen</li>
                  <li>Data integrations / API integrations</li>
                  <li>SEO needs (more work needed during redesigns)</li>
                </ul>
                
                <div class="mt-2 pt-5" style="border-bottom: 3px solid #ededed;"></div>
                <h2 class="fw-bold mb-3 mt-4" style="color: #4d4d4d;">Why Work With Kaizen Digital For Your New Website</h2>
                <p class="text-body-tertiary">For 20+ years we’ve been the go-to website design company, launching hundreds of websites across all industries. Our in-house team of 125+, all here in the U.S., makes us a reliable choice knowing you’ll have outstanding customer support. From initial planning all the way through ongoing maintenance, we’ll have your back, creating a long-term relationship focused on growing your business.</p>
                <img src="assets/img/Mou.jpg" class="img-fluid d-block mx-auto" alt="google-ads-manager-dashboard">
                <!-- devider -->
                <div class="mt-3" style="border-bottom: 3px solid #ededed;"></div>
                
              </div>
      
              <div class="accordion-body">
                <div class="accordion">
                  <h2 class="text-center mb-5" style="color:#4d4d4d; font-family: 'Oswald', sans-serif; font-weight:900;">Web Design Services FAQs</h2>
                  
                  <div class="container">
                    <div class="label">Will Our Website Be Custom?</div>
                    <div class="content text-body-tertiary">At Kaizen Digital, we start each website design project with a blank white screen, meaning we don’t use templates or pre-made designs. Our creative director will take you through a creative process, understanding your brand identify, visual goals, and reviewing competitors. We’ll provide you with multiple mock-ups and design revisions to land on a graphic design you’re 100% satisfied with.</div>
                  </div>
                  
                  <div class="container">
                    <div class="label">How Can I Drive Visitors to My Website?</div>
                    <div class="content text-body-tertiary">We will not only design your website, we will market your site using SEO, paid search, social media, and utilize other digital marketing services.

                        All websites we develop are built with search engine optimization as a top priority. This means your website will be designed and coded SEO-friendly, set up for potential customers to find you via search engines.
                        
                        We can also work with you to create a paid search marketing campaign to drive traffic instantly. For more information view our Google Ads management services page.</div>
                  </div>
                  
                  <div class="container">
                    <div class="label">Will My Website Work on Mobile Devices and Tablets?</div>
                    <div class="content text-body-tertiary">Yes, using responsive website design we create an optimized design and layout to display on all devices, no matter what the resolution or screen size. This means your layout will be optimized on a phone, tablet, and desktop computer, and the user experience will be tailored to the device. A device optimized website user experience leads to increased conversions, leads, and sales.</div>
                  </div>
                  
                  <div class="container">
                    <div class="label">What Is the Web Design Process?</div>
                    <div class="content text-body-tertiary">Our team will guide you through the process of building a new website and work with you hand-in-hand during development. If you’d like to talk to your web designer or programmer, you can. With Kaizen Digital you’re not handed over to a project manager who works with an outside team – you’ll receive a personal experience.

                        We begin by taking you through the creative process, designing the website to look exactly the way you want. From there our web developers will begin programming, bringing it to life.
                        
                        We’ll then work through content population and data population, loading in your products, pages, and other key elements. The final step is quality assurance where our team runs through each piece of functionality on the website.
                        
                        Once the site has launched, we’ll deliver expert marketing services such as SEO and content marketing to bring new visitors and customers to your brand each day.
                        
                        To learn even more about our process, talk to an Kaizen Digital representative or read about our web design process.</div>
                  </div>
                  
                  <div class="container">
                    <div class="label">How Long Does Website Development Take?</div>
                    <div class="content text-body-tertiary">We provide realistic timelines – not timelines just to close the sale. Though website development times vary, we’ll agree on a schedule and stick to it.

                        In fact, project deadlines are written into every Kaizen Digital proposal. Our average timeline to build a new website  ranges from 2-6 months.
                        
                        For a timeline estimate for your project, simply request a free estimate.</div>
                  </div>
                  
                  <div class="container">
                    <div class="label">Where Is Kaizen Digital Located?</div>
                    <div class="content text-body-tertiary">Kaizen Digital is located in Akron, Ohio, 30 minutes from Cleveland, Ohio. We serve clients nationwide and are located 15 minutes from Akron / Canton Airport. If you’d like to schedule a trip to meet with us, we’ll be happy to assist you with travel arrangements.</div>
                  </div>
      
      
                  <div class="container">
                    <div class="label">Why Should I Choose Kaizen Digital as My Web Design Company?</div>
                    <div class="content text-body-tertiary">We’ve won multiple awards for our website services over our 20+ years in business. Not only that, we’ve been rated the #1 SEO agency by DesignRush, Clutch, SEMfirms, TopSEOs, and many others. The best web design companies are experienced in launching complex websites and have a team to handle all of your requests. With our team of 125+ in-house team members, we offer all of the web design services you’ll need to now and in the future.</div>
                  </div>

                  <div class="container">
                    <div class="label">How Can We Begin?</div>
                    <div class="content text-body-tertiary">Let’s talk! You can either fill out our website design estimate or give us a call at 1-866-647-9218. Let us know when you are ready to get started or would like more information. We’ll take it from there.</div>
                  </div>
                </div>
                
              </div>
              <img src="assets/img/5-star-company.gif" class="d-block mx-auto" alt="5star">
              <p class="text-center mt-4">Kaizen Digital is rated 4.8 / 5 average from 867 reviews on FeaturedCustomers, Clutch & Google</p>
              <!-- devider -->
              <div class="mt-5 mb-5" style="border-bottom: 3px solid #ededed;"></div>
              <!-- ======= Clients Section ======= -->
              <section id="clients" class="clients section-bg">
                <div class="container">
      
                  <div class="row no-gutters clients-wrap clearfix wow fadeInUp ms-5">
      
                    <div class="col-lg-2 col-md-4 col-6">
                      <div class="google-client-logo">
                        <img src="assets/img/clients/inc500.webp" class="img-fluid" alt="" data-aos="flip-right" width="100" height="200">
                      </div>
                    </div>
      
                    <div class="col-lg-2 col-md-4 col-6">
                      <div class="google-client-logo">
                        <img src="assets/img/clients/top-rated-seo-agency.webp" class="img-fluid" alt="" data-aos="flip-right" data-aos-delay="100">
                      </div>
                    </div>
      
                    <div class="col-lg-2 col-md-4 col-6">
                      <div class="google-client-logo">
                        <img src="assets/img/clients/PremierBadgeClickable.svg" class="img-fluid" alt="" data-aos="flip-right" data-aos-delay="200">
                      </div>
                    </div>
      
                    <div class="col-lg-2 col-md-4 col-6">
                      <div class="google-client-logo">
                        <img src="assets/img/clients/clutch.webp" class="img-fluid" alt="" data-aos="flip-right" data-aos-delay="300">
                      </div>
                    </div>
      
                    <div class="col-lg-2 col-md-4 col-6">
                      <div class="google-client-logo">
                        <img src="assets/img/clients/2024-forbes-advisor-awards.png.webp" class="img-fluid" alt="" data-aos="flip-right" data-aos-delay="400">
                      </div>
                    </div>
      
                  </div>
      
                </div>
              </section><!-- End Clients Section -->
       
      
            </div>
        </section>
    
    
    </main>
      
</div>
