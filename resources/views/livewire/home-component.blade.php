<main id="main">
<header id="header">
  <!-- ======= Hero Section ======= -->
  <section id="hero">

    <div class="container">
      <div class="row d-flex align-items-center">
      <div class=" col-lg-6 py-5 py-lg-0 order-2 order-lg-1" data-aos="fade-right">
        <h1>Helping Clients Win</h1>
        <h1 style="color:#fdc134;" id="typingAni"></h1>
        <h2>We deliver high-performing B2C & B2B SEO, paid search, CRO & digital marketing campaigns that help drive over $5.3B in annual revenue.</h2>
        <a href="{{route('estimate')}}" class="btn-get-started scrollto fw-bolder h4">Get a Proposal & Free Audit</a>
      </div>
      <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left">
        <img src="assets/img/hero-img.png" class="img-fluid" alt="">
      </div>
    </div>
    </div>

  </section>
</header>
    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
      <div class="container">

        <div class="row no-gutters clients-wrap clearfix wow fadeInUp">

          @foreach ($clients as $client)  
            <div class="col-lg-2 col-md-4 col-6">
              <div class="client-logo">
                <img src="{{asset('assets/image/clients')}}/{{$client->image}}" class="img-fluid" alt="{{$client->img_alt}}" data-aos="flip-right">
              </div>
            </div>
          @endforeach

        </div>

      </div>
    </section><!-- End Clients Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
      <div class="container">

        <div class="row gy-4">
          <div class="col-xl-5 mt-5">
            <div class="about-sidebar">
              <h2>WE HELP OUR CLIENTS <span style="color: #4eb03f;">GROW ONLINE.</span></h2>
              <p class="text-secondary"><b>Our formula is simple. When you succeed, we succeed. When your business grows, our business grows, too.</b></p>
              <p>At Kaizen Digital, we build long-term relationships with our clients delivering SEO, paid search marketing, Google Ads management, website design, eCommerce development, CRO and email marketing. With services under one roof, we provide a data-driven approach to online marketing which multiplies the effects of each channel. Founded in 2004, we offer you a team of more than 125+ digital marketing experts.</p>
              <a href=""><b>Let’s talk about growing your business online »</b></a>
            </div>
          </div>
          <div class="col-xl-7">
            <div class="content d-flex flex-column justify-content-center ps-0 ps-xl-4">
              <h4 data-aos="fade-in" class="text-center text-secondary">
                <i>Browse Our Flagship Services</i>
              </h4>
              <div class="row gy-4 gx-3 mt-3">
                @foreach ($services as $key => $service)
                 @php
                   if($key == 4) break; 
                 @endphp
                 
                 
                  <div class="col-md-6" data-aos="fade-up">
                    <div class="member icon-box text-center p-5" data-aos="fade-up">
                      <a href="">
                        <img width="100" height="100" src="{{asset('assets/image/Services')}}/{{$service->image}}" id="icon-box-img-1" class="text-center" alt="{{$service->name}}">
                        <h3>{{$service->name}}</h3>
                      </a>
                    </div>
                  </div>
                @endforeach
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section>
    <!-- End About Section -->
    
    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">
        <h2 class="fw-bolder text-center mb-3 service_title"><b>Our Services</b></h2>
        <div class="row">
          @foreach($services as $service)
            <div class="col-md-4">
                <a href="{{route('service.details', $service->slug)}}" class="service_inner d-block">
                    <div class="service_icon">
                      <img height="100%" width="100%" src="{{asset('assets/image/Services')}}/{{$service->image}}" alt="{{$service->slug}}">
                    </div>
                    <h4>{{ $service->name }}</h4>
                    <p>
                      {{ $service->description }}
                    </p>
                </a>
            </div>
           @endforeach
        </div>
      </div>
    </section>
    <!-- End Services Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg py-5">
      <div class="container">
        <h5 class="fw-bolder text-center text-secondary p-3">From Start-Ups To Fortune 500 Companies, Our Clients Are Succeeding Online</h5>
        <div class="swiper-container clients-slider">
          <div class="swiper-wrapper">
    
            @foreach ($clients as $client)
              <div class="swiper-slide">
                <div class="client-logo">
                  <img src="{{asset('assets/image/clients')}}/{{$client->image}}" class="img-fluid" alt="{{$client->img_alt}}" data-aos="flip-right">
                </div>
              </div>
            @endforeach
    
          </div>
        
          
        </div>
      </div>
    </section>
    <!-- End Clients Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg about-bg">
      <div class="container">

        <div class="row gy-4">
          <div class="col-xl-6 mt-5">
            <div class="image"></div>
          </div>
          <div class="col-xl-6 text-light">
            <div class="content d-flex flex-column justify-content-center ps-0 ps-xl-4">
              <h2 data-aos="fade-in" class="text-center">
                <b>An In-House Digital Marketing Agency With 125+ Team Members. 500+ Clients Nationwide.</b>
              </h2>
              <p class="mt-3">At Kaizen Digital, we’re a full-service digital marketing agency offering the best in website design, SEO, paid search marketing, and more. Our teams work together, creating synergy in your marketing campaigns, helping your brand to get the most out of your website every day. We have the ability to market your website through visual appeal, best-practice user-experience design, and SEO expertise to bring traffic to your professional website & online marketing tool, and convert them into customers.</p>
              <h6 class="mt-4"><b>We’re excited to show you how digital marketing can grow your business online.</b></h6>
              <a href="{{route('estimate')}}" class="btn-get-about scrollto fw-bolder h4 mt-4">Get a Proposal & Free Audit <i class="bx bx-right-arrow"></i></a>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section>
    <!-- End About Section -->


    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg py-5">
      <div class="container">
        <h5 class="fw-bolder text-center text-secondary p-3">We Partner With All Major Website Platforms</h5>
        <div class="swiper-container clients-slider">
          <div class="swiper-wrapper">
            @foreach ($clients as $client)
              <div class="swiper-slide">
                <div class="client-logo">
                  <img src="{{asset('assets/image/clients')}}/{{$client->image}}" class="img-fluid" alt="{{$client->img_alt}}" data-aos="flip-right">
                </div>
              </div>
            @endforeach
          </div>
        
           
          <!-- If we need navigation buttons -->
          <!-- <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div> -->
          
        </div>
      </div>
    </section>
    <!-- End Clients Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
      <div class="container">

        <div class="row gy-4">
          <div class="col-xl-6">
            <div class="content d-flex flex-column justify-content-center ps-0 ps-xl-4">
              <h2 data-aos="fade-in" style="color: #0c5f7d;">
                <b>We're a Full Service Digital Marketing Company</b>
              </h2>
              <p class="mt-3">At Kaizen Digital, we’re one of the <b>nation’s leading digital marketing agencies. </b> We’ve been crushing competitors since 2004, helping our clients dominate digital marketing. With more than 4.66 billion internet users and growing, we know your online image, reputation, and marketing strategy is more important than ever.</p>
              <p class="mt-3">Since inception, we’ve built Kaizen Digital’s name on eCommerce. We’ve been rated the #1 <a href="">eCommerce SEO services </a> provider in the world and have an in-house eCommerce website design team. The combination of design, development, and marketing under one roof allows us to create integrated marketing campaigns, making the most of every dollar you spend. As an <b>award-winning <a href=""> web design company</a> </b>, we lead the industry in designing & developing custom websites that not only look amazing but focus on driving leads and sales.</p>
              <p class="mt-3">Our search marketing team offers proven SEO services to rank your website at the top of Google and other major search engines. We deliver the best <a href="">Shopify SEO services</a>, know the ins and outs of <a href="">WordPress SEO</a>, and are the <a href="">SEO consultant</a> you want on your team. In our 18+ years in business, we’ve worked across industries, from <a href="">B2B SEO</a> campaigns to B2C. We coordinate SEO seamlessly with your paid search efforts, offering <a href="">Google Ads management</a>, social media ads management, and email marketing services.</p>
              <p class="mt-3">With your entire digital marketing strategy working in harmony, the growth you’ve only dreamed of is possible.</p>
            </div><!-- End .content-->
          </div>
          <div class="col-xl-6 mt-5">
            <!-- <div class="about-image"></div> -->
            <img src="assets/img/digital-marketing-services.jpg.webp" class="img-fluid" alt="">
          </div>
        </div>

      </div>
    </section>
    <!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="about" class="about section-bg">
      <div class="container">
        <h2 class="fw-bolder text-center mb-3" style="color: #787878;"><b>Why US?</b></h2>
        <div class="row">
          
          @foreach ($whyUs as $item)
            <div class="col-xl-4 col-lg-4 col-md-6" data-aos="fade-up">
              <div class="member icon-box text-center p-5" data-aos="fade-up">
                <a href="">
                  <img src="{{asset('assets/image/WhyUS')}}/{{$item->icon}}" id="icon-box-img-1" class="text-center" alt="icon-graph-green">
                  <h4 class="fw-bolder text-start mt-3" style="color: #0c5f7d;">{{$item->title}}</h4>
                  <p style="color: #9d9e9d;" class="text-start">{{$item->description}}</p>
                </a>
              </div>
            </div>
          @endforeach

      </div>
    </section>
    <!-- End Services Section -->

    <!-- ======= get Estimation Section ======= -->
    <section id="about" class="about section-bg">
      <div class="container">

        <div class="row gy-4">
          <div class="col-xl-12 mt-5 text-center">
            <div class="content d-flex flex-column justify-content-center ps-0 ps-xl-4">
              <h2 data-aos="fade-in" style="color: #0c5f7d;">
                <b>Want An Estimate For Your Project?</b>
              </h2>
              <p class="mt-3 mb-5">At Kaizen Digital we know each client is unique and you have unique business goals. We’ll tailor a strategy and budget that makes your needs and objectives. Talk with our team of experts today to receive a FREE detailed proposal, strategy, and pricing options.  Take the step now towards expert online marketing for your website.</p>
              <a href="{{route('estimate')}}" class="btn-get-free-estimate scrollto fw-bolder h4 mx-auto d-block">Get Your Free Estimate »</a>
            </div><!-- End .content-->
          </div>
          {{--<div class="col-xl-6 mt-5">
            <div class="estimate-image">
              <div class="position-relative" style="height: 80vh;">
                <div class="position-absolute bottom-0 start-50 translate-middle-x text-center text-light">
                  <h3>John Battaglini</h3>
                  <p><i>Director of SEO Essentials</i></p>
                </div>
              </div>
              
            </div>
          </div>--}}
        </div>

      </div>
    </section>
    <!-- End get Estimation Section -->

    <!-- Popular Articles & Expert Guides -->
    <section id="team" class="team section-bg">
      <div class="container">

        <div class="section-title">
          <h2 data-aos="fade-in">Popular Articles & Expert Guides</h2>
        </div>

        <div class="row">
          <div class="col-xl-4 col-lg-4 col-md-6" >
            <div class="member p-5 text-start" data-aos="fade-up" id="article-1">
              <h3 class="fw-bolder h2 mb-3">eCommerce Website Features</h3>
              <p>The power of your eCommerce website often is behind the scenes. The ability to easily manage your content, run promotions, and keep content.</p>
            </div>
          </div>

          <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="member p-5 text-start"  data-aos="fade-up" data-aos-delay="100" id="article-2">
              <h3 class="fw-bolder h2 mb-3">eCommerce SEO Guide</h3>
              <p>Commerce SEO is complex. With hundreds of categories, products, and landing pages, where does an SEO campaign begin? Gain insights into our approach at making an SEO campaign successful</p>
            </div>
          </div>

          <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="member p-5 text-start" data-aos="fade-up" data-aos-delay="200" id="article-3">
              <h3 class="fw-bolder h2 mb-3">Listen In: Search Authority Podcast</h3>
              <p>Justin Smith (CEO) & Jason Dutt (President) discuss SEO and online marketing each week on Search Authority. Give it a listen!</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
      <div class="container">

        <div class="row no-gutters clients-wrap clearfix wow fadeInUp">
          @foreach ($clients as $client)
            <div class="col-lg-2 col-md-4 col-6">
              <div class="client-logo">
                <img src="{{asset('assets/image/clients')}}/{{$client->image}}" class="img-fluid" alt="" data-aos="flip-right">
              </div>
            </div> 
          @endforeach
        </div>

      </div>
    </section><!-- End Clients Section -->

  </main><!-- End #main -->