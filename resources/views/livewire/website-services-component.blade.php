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
                  <li>Website Design & Web Development Services</li>
                </ol>
              </div>
      
            </div>
        </section>
          <!-- End Breadcrumbs Section -->
    
          <!-- web information section  -->
        <section id="adds-info" class="section-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="adds-info-title mb-3">Web Design & Website Development Services</h2>
                        <p class="adds-info-content mb-3">Need a web design company with 20+ years of experience? <b> Our professional website design services increase your leads and sales</b> -  <i>crushing the competition since 2004.</i></p>
                        <ul class="adds-info-list mb-5">
                            <li><i class="bx bx-check"></i> <b>Custom designed & developed websites</b></li>
                            <li><i class="bx bx-check"></i> <b>SEO optimized for top Google rankings</b></li>
                            <li><i class="bx bx-check"></i> <b>An in-house team of web designers, developers, & SEM/SEO pros</b></li>
                        </ul>
                        <a href="{{route('estimate')}}" class="adds-info-btn mb-3 mt-5">Talk with our Google Ads management experts »</a>
                    </div>
                    <div class="col-md-6">
                        <div class="row no-gutters clients-wrap clearfix wow fadeInUp">
    
                            <div class="col-lg-4 col-md-4 col-6">
                            <div class="client-logo">
                                <img src="assets/img/clients/google-premier-partner-badge.gif" class="img-fluid" alt="" data-aos="flip-right">
                            </div>
                            </div>
                
                            <div class="col-lg-4 col-md-4 col-6">
                            <div class="client-logo">
                                <img src="assets/img/clients/forbes-google-ads-management.gif" class="img-fluid" alt="" data-aos="flip-right" data-aos-delay="100">
                            </div>
                            </div>
                
                            <div class="col-lg-4 col-md-4 col-6">
                            <div class="client-logo">
                                <img src="assets/img/clients/clutch-5-stars-gray.webp" class="img-fluid" alt="" data-aos="flip-right" data-aos-delay="200">
                            </div>
                            </div>
            
                
                        </div>
                        <img src="assets/img/website-design-company-3.webp" alt="google" class="img-fluid">
                    </div>
                </div>
            </div>
        </section>
    
        <!-- Company status section -->
        <section id="company-status" style="background-color: #757575; color: white; padding: 20px 0;">
            <div class="container">
                <div class="company-status-content d-flex justify-content-between align-items-center">
                    <h2>Company <br> Stats:</h2>
                    <div class="d-flex flex-column align-items-center text-center">
                        <div class="d-flex align-items-center mb-2">
                            <img src="assets/img/company/icon-target.png.webp" alt="company" class="img-fluid me-2">
                            <h3 class="mb-0 ms-3" style="font-weight: bolder; font-size:45px;">{{ $stat->years_of_glory }}</h3>
                        </div>
                        <p class="text-center">Years of Glory</p>
                    </div>
                    <div class="d-flex flex-column align-items-center text-center">
                        <div class="d-flex align-items-center mb-2">
                            <img src="assets/img/company/icon-relationship.png.webp" alt="company" class="img-fluid me-2">
                            <h3 class="mb-0 ms-3" style="font-weight: bolder; font-size:45px;">{{ $stat->happy_clients }}</h3>
                        </div>
                        <p class="text-center">Happy Clients</p>
                    </div>
                    <div class="d-flex flex-column align-items-center text-center">
                        <div class="d-flex align-items-center mb-2">
                            <img src="assets/img/company/icon-trophy.png.webp" alt="company" class="img-fluid me-2">
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
                <h2 class="mb-4 fw-bold">Let's make your web design project a success</h2>
                <p class="mb-5" style="color: #737373;">At Kaizen Digital, we’re a professional web design agency that focuses on lead generation and eCommerce website design services to grow your business online. Our expert team of in-house web designers, developers, project managers, and search marketing strategists use the latest technology to create websites that drive results such as increased traffic, leads and online sale. We’re skilled in development across all popular CMS platforms including WordPress, Shopify, BigCommerce, Magento, and many others. No matter the type of website you need, the Kaizen Digital team will take your online presence to the next level.</p>
                <div class="row">
                    <div class="col-md-4">
                        <img src="assets/img/icons/website-design-icon-e1626877769222.png.webp" alt="icons" class="img-fluid">
                        <h3 class="fw-bolder mt-4 mb-3 text-body-tertiary">Custom Website Design Services</h3>
                        <p>Need a custom web design and development company? At Kaizen Digital, we don't use templates. Our web designers create custom graphics and layouts to match your brand, goals, and turn visitors engaged customers.</p>
                    </div>
    
                    <div class="col-md-4">
                        <img src="assets/img/icons/web-design-ecommerce-e1626877790587.png.webp" alt="icons" class="img-fluid">
                        <h3 class="fw-bolder mt-4 mb-3 text-body-tertiary">The Ultimate eCommerce Experts</h3>
                        <p>We've been the leading eCommerce agency since 2004, developing hundreds of eCommerce websites and thousands of custom features. If you're looking for an eCommerce site that performs, look no further.</p>
                    </div>
    
                    <div class="col-md-4">
                        <img src="assets/img/icons/website-content-management-e1626877811700.png.webp" alt="icons" class="img-fluid">
                        <h3 class="fw-bolder mt-4 mb-3 text-body-tertiary">Easily Manage Your Content</h3>
                        <p>Having an easy to use custom content management system is the key to managing your day-to-day data. Whether your project calls for WordPress or a custom CMS, we'll build your website in a way that's easy to manage for all users.</p>
                    </div>
    
                </div>
            </div>
        </section>

        <!-- contact section  -->
        <section id="contact">
            <div class="container">
                <h1 class="text-center mb-5" style="color:#4eb041; font-family: 'Oswald', sans-serif; font-weight:900;">Get Your Google Ads Campaign <br> Estimate</h1>
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
                <h3 class="fw-bolder mb-3 text-center">Need Enterprise-Level Custom Website Design Services?</h3>
                <p class="mb-3 text-center text-body-tertiary"><b>From simple informational websites to complex, data-rich applications and eCommerce stores, Kaizen Digital has the technical skills and creative chops to match. We’ll work with your team to understand your goals and provide custom solutions to match. We’re located in the USA, do not outsource overseas, and are proud to deliver superior customer service through our dedicated in-house team. Our custom web design projects can range anywhere from $20,000 to $100,000+. If you have a complex development project, talk with our professionals and we’ll provide a free consultation.</p>
                <div class="text-center">
                    <a href="{{route('estimate')}}" class="btn btn-warning btn-custom py-2 px-5 mt-5 w-60 fw-bold fs-5">Discuss your website needs with Kaizen Digital <i class="bx bx-chevron-right"></i></a>
                </div>
                 
            </div>
        </section>
        <div class="mt-5 pt-5" style="border-bottom: 3px solid #ededed;"></div>
    
    
        <!-- We're WordPress Website Design Experts section  -->
        <section id="google-ads-works">
          <div class="container mt-5">
            
            <div class="row">
              <div class="col-md-6">
                <h2 class="mb-3" style="color:#0f7099; font-family: 'Oswald', sans-serif; font-weight:900;">We're WordPress Website Design Experts</h2>
                <p class="text-body-tertiary">WordPress is the most widely used content management system (CMS), powering more than 40% of all websites on the internet and over 60% of all websites that use a content management system. With a large number of available plug-ins and an easy-to-use administration, it’s not surprising WordPress is so popular. Many clients come to us already familiar with WordPress, so using it to power their website only makes sense, when applicable. Our WordPress website design services deliver a powerful, easy-to-manage website, that’s aligned with your branding and business goals.</p>
                <p class="text-body-tertiary">The first step we take with any new client is to determine which platform is best for your project. While WordPress is often a great fit, it’s not always the best option for every client. We’ll walk you through the pros and cons of each possible CMS platform, helping you to make an informed decision. For example, if you’re looking for a powerful online store, using Shopify, BigCommerce, or another eCommerce-specific platform might be best. WordPress does offer these capabilities through WooCommerce but also has limitations for enterprise businesses.</p>
                <p class="text-body-tertiary">The most important factor when building a WordPress website is developing the site in a way that’s easy to manage. There are great WordPress websites and some that are very difficult to manage due to poor planning, development, and overuse of plug-ins (which also slows your site speed down). At Kaizen Digital, we’re WordPress experts, meaning we have experienced WordPress developers in-house to create a WordPress website that’s both fast on the front-end and easy to manage on the back-end. Our WordPress sites land top scores with Google Core Web Vitals and produce conversion rates far above industry averages.</p>
                <a href="{{route('estimate')}}" class="btn btn-success btn-custom py-2 px-5 mt-2 w-60 fw-bold fs-5">Get a quote for your project <i class="bx bx-chevron-right"></i></a>
              </div>
    
              <div class="col-md-6">
                <img src="assets/img/wordpress-website-design-company-1.webp" class="img-fluid" alt="landing" >
              </div>
    
            </div>
          
            <!-- ======= Clients Section ======= -->
            <section id="clients" class="clients py-5">
                <div class="container">
                <h5 class="fw-bolder text-center text-secondary p-3">We're Website Design & Development Experts Across All Major Platforms</h5>
                <div class="swiper-container clients-slider">
                    <div class="swiper-wrapper">
            
                    <div class="swiper-slide">
                        <div class="client-logo">
                        <img src="assets/img/clients/wordpress-logo.jpg.webp" class="img-fluid" alt="" data-aos="flip-right">
                        </div>
                    </div>
            
                    <div class="swiper-slide">
                        <div class="client-logo">
                        <img src="assets/img/clients/woocommerce-logo.jpg.webp" class="img-fluid" alt="" data-aos="flip-right" data-aos-delay="100">
                        </div>
                    </div>
            
                    <div class="swiper-slide">
                        <div class="client-logo">
                        <img src="assets/img/clients/shopify-logo.jpg.webp" class="img-fluid" alt="" data-aos="flip-right" data-aos-delay="200">
                        </div>
                    </div>
            
                    <div class="swiper-slide">
                        <div class="client-logo">
                        <img src="assets/img/clients/sap-logo.jpg.webp" class="img-fluid" alt="" data-aos="flip-right" data-aos-delay="300">
                        </div>
                    </div>
            
                    <div class="swiper-slide">
                        <div class="client-logo">
                        <img src="assets/img/clients/magento-logo.jpg.webp" class="img-fluid" alt="" data-aos="flip-right" data-aos-delay="400">
                        </div>
                    </div>
            
                    <div class="swiper-slide">
                        <div class="client-logo">
                        <img src="assets/img/clients/bigcommerce-logo.jpg.webp" class="img-fluid" alt="" data-aos="flip-right" data-aos-delay="500">
                        </div>
                    </div>
            
                    </div>
                
                    
                </div>
                </div>
            </section>
           <!-- End Clients Section -->

           <div class="row">
            <div class="col-md-6">
                <img src="assets/img/ecommerce-web-design-services.jpg.webp" class="img-fluid" alt="landing" >
            </div>
            <div class="col-md-6">
              <h2 class="mb-3" style="color:#0f7099; font-family: 'Oswald', sans-serif; font-weight:900;">We're eCommerce Website Design Pros</h2>
              <p class="text-body-tertiary">Online sales are booming as US consumers will spend over $1.1 trillion on eCommerce websites this year, up 18% year-over-year. Although this seems like an extremely high number, it’s still only 15% of total retail sales, meaning online sales still have a huge growth curve. While modern business and upstarts have made the transition, many traditional businesses have yet to do so, especially in the B2B space. At Kaizen Digital, our services help to move your business forward, giving you the technology needed to sell basic products online or complex custom services. We also specialize in ERP integrations, API data integrations, and other services needed for enterprise-level businesses. We’ve been development experts since 2004, so if you’re in the market for a new website, look no further. Give our team a call today.</p>
              <a href="{{route('estimate')}}" class="btn btn-success btn-custom py-2 px-5 mt-2 w-60 fw-bold fs-5">eCommerce Website Design Services <i class="bx bx-chevron-right"></i></a>
            </div>
  
          </div>
    
          </div>
        </section>

        <!-- Website Design & Development Case Studies section  -->
        <section id="case-studies">
            <div class="container">
                <h3 class="fw-bolder mb-3 text-center">Website Design & Development Case Studies</h3>
                <p class="mb-3 text-center"><b>Want to know more about the website development projects we’ve worked on?</b> <br> Over the last 20+ years, we’ve designed and developed hundreds of websites – growing leads and sales month-over-month.</p>
                <div class="row mt-3 pt-5 gy-4">
                    <div class="col-md-6">
                        <div class="card" style="height: 500px;">
                            <img src="assets/img/atlas-oil.jpg.webp" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h3 class="card-title fw-bolder" style="color: #0b526e;">Atlas Oil</h3>
                                <p class="card-text">Atlas Oil came to Kaizen Digital in need of a modern look for their industrial brand. Along with the new look, came custom development and functionality, creating capabilities to order and schedule oil deliveries online. Atlas Oil increased conversions by more than 700% and boosted organic traffic 147%.</p>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-md-6">
                        <div class="card" style="height: 500px;">
                            <img src="assets/img/k2-awards.webp" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h3 class="card-title fw-bolder" style="color: #0b526e;">K2 Awards</h3>
                                <p class="card-text">A complete redesign, the K2 project included a custom product builder, product configuration tools, and custom ERP integration. The new website increased the conversion rate by more than 25% and helped propel revenue by over 130%.</p>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-md-6">
                        <div class="card" style="height: 500px;">
                            <img src="assets/img/boat-rv-ecommerce-website.webp" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h3 class="card-title fw-bolder" style="color: #0b526e;">Boat & RV Accessories</h3>
                                <p class="card-text">Through a redesign and eCommerce SEO campaign, Boat and RV has grown significantly over the last 3 years. Online revenue has increased by 659%, shattering previous sales records.</p>
                                <br><br>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-md-6">
                        <div class="card" style="height: 500px;">
                            <img src="assets/img/ac-plastic-ecommerce-development.webp" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h3 class="card-title fw-bolder" style="color: #0b526e;">A&C Plastics</h3>
                                <p class="card-text">With a simple brochure website, A&C Plastics knew it was time to break into online sales. Partnering with Kaizen Digital, A&C launched a a new website and tackled first-page Google rankings. With a thorough a digital marketing strategy, organic traffic increased over 550% with online transactions up more than 300%.</p>
                            </div>
                        </div>
                    </div>
    
    
                </div>
            </div>
        </section>

        {{-- web services --}}
        <section id="web-services">
            <div class="container">
                <div class="google-ads-services mt-3 p-5 mb-3" style="background:#f5f5f5; border-left: 20px solid #f2aa4b;">
                    <div class="row">
                        <div class="col-md-6">
                            <h2><b>As an industry-leading web design company, we offer the following services:</b></h2>
                            <ul style="color: #636363;">
                                <li style="color: #0f7099;"><h4><b>Custom website design</b></h4></li>
                                <p class="text-body-tertiary">Our web designers know each website has unique design needs. We’ll design a site that matches your goals and brand guidelines. Every website Kaizen Digital creates is a product of our proprietary creative design processes, designed to ensure your website is unique, visually appealing, and articulate. A website that reflects your brand and conveys your messaging effectively will engage your visitors, converting a larger percentage into customers.</p> 
                                <li style="color: #0f7099;"><h4><b>Website wireframe creation and planning</b></h4></li>
                                <p class="text-body-tertiary">We begin each web design project by creating an architecture for the website through a wireframe design process. You’ll work hand-in-hand with our creative digital marketing team to be sure we’ve thought through all website elements needed for success.</p> 
                                <li style="color: #0f7099;"><h4><b>Competitor research</b></h4></li>
                                <p class="text-body-tertiary">Understanding your competition is an important part of beating them online. We’ll help you understand what’s working for them and create a plan to perform even better than they are.</p> 
                                <li style="color: #0f7099;"><h4><b>Front-end HTML / CSS development</b></h4></li>
                                <p class="text-body-tertiary">Not only will we take you through a creative design process, but we have the in-house front-end development team to code all your HTML, CSS, and Javascript, bringing your website to life on all devices.</p> 
                                <li style="color: #0f7099;"><h4><b>Back-end website development</b></h4></li>
                                <p class="text-body-tertiary">Whether you need completely custom functionality, data imports, or a CMS implementation, our back-end development team and programmers are ready for the challenge. And the major plus? They are in-house, in the USA.</p> 
                                <li style="color: #0f7099;"><h4><b>SEO friendly web design coding & ongoing SEO plans</b></h4></li>
                                <p class="text-body-tertiary">Kaizen Digital is a year-over-year SEO award winner and industry leader. We build all of our SEO knowledge into our projects, setting you up for a successful SEO campaign post-launch. Need first-page Google rankings to drive traffic to your website? Combine our ongoing SEO plans with development services to make the most of your online potential.</p> 
                                <li style="color: #0f7099;"><h4><b>Conversion focused design</b></h4></li>
                                <p class="text-body-tertiary">New visitors are great, but leads and sales are even better! Our conversion-focused design and marketing places an emphasis on your CTA’s (calls to action). Whether you’re looking for visitors to call or fill out an online form, we’ll design a website that performs.</p> 
                                <li style="color: #0f7099;"><h4><b>Website copywriting and content strategy</b></h4></li>
                                <p class="text-body-tertiary">To take your site to the next level, we offer website copywriting services. Compelling content will boost conversions, engage visitors and give you an edge over your competition. For ongoing content, our content team is ready to develop a content plan and help you implement the strategy.</p> 
                                <li style="color: #0f7099;"><h4><b>CMS installation and setup</b></h4></li>
                                <p class="text-body-tertiary">From WordPress to advanced eCommerce CMS platforms, we’re CMS implementation experts and can guide your business in the right direction. We’re also experienced in CMS customizations and data integrations.</p> 
                                <li>& much more</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <img src="assets/img/professional-website-design-services.png.webp" class="img-fluid" alt="">
                            <img src="assets/img/professional-website-design-services.png.webp" class="img-fluid" alt="">
                            <img src="assets/img/professional-website-design-services.png.webp" class="img-fluid" alt="">
                            <img src="assets/img/professional-website-design-services.png.webp" class="img-fluid" alt="">
                            <img src="assets/img/professional-website-design-services.png.webp" class="img-fluid" alt="">
                            <img src="assets/img/professional-website-design-services.png.webp" class="img-fluid" alt="">
                            <img src="assets/img/professional-website-design-services.png.webp" class="img-fluid" alt="">
                            <img src="assets/img/professional-website-design-services.png.webp" class="img-fluid" alt="">
                        </div>
                    </div>
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
