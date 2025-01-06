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
                  <li>
                    Social Media Marketing</li>
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
                        <h2 class="adds-info-title mb-3"><b>Social Media Marketing & Social Management Agency</b></h2>
                        <p class="adds-info-content mb-3">Grow your brand through a social media campaign <b>built to drive engagement, sales & leads.</b></p>
                        <ul class="adds-info-list mb-5">
                            <li><i class="bx bx-check"></i> <b>Social Media Influencer Marketing</b></li>
                            <li><i class="bx bx-check"></i> <b>Paid Social Media Campaign Management</b></li>
                            <li><i class="bx bx-check"></i> <b>Integrated with Other Digital Marketing</b></li>
                        </ul>
                        <a href="{{route('estimate')}}" class="adds-info-btn mb-3 mt-5">Talk with our social media experts »</a>
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
                        <img src="assets/img/social-media-management-agency-e1627654291737.jpg.webp" alt="google" class="img-fluid">
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
                            <h3 class="mb-0 ms-3" style="font-weight: bolder; font-size:45px;">20</h3>
                        </div>
                        <p class="text-center">Years a PPC agency</p>
                    </div>
                    <div class="d-flex flex-column align-items-center text-center">
                        <div class="d-flex align-items-center mb-2">
                            <img src="assets/img/company/icon-relationship.png.webp" alt="company" class="img-fluid me-2">
                            <h3 class="mb-0 ms-3" style="font-weight: bolder; font-size:45px;">400+</h3>
                        </div>
                        <p class="text-center">Successful client relationships</p>
                    </div>
                    <div class="d-flex flex-column align-items-center text-center">
                        <div class="d-flex align-items-center mb-2">
                            <img src="assets/img/company/icon-trophy.png.webp" alt="company" class="img-fluid me-2">
                            <h3 class="mb-0 ms-3" style="font-weight: bolder; font-size:45px;">45M+</h3>
                        </div>
                        <p class="text-center">Google Ads spend managed</p>
                    </div>
                </div>
            </div>
        </section>
    
        <!-- More socail information section  -->
        <section id="more-adds-info">
            <div class="container text-center">
                <h2 class="mb-4 fw-bold">Work With a Professional Social Media Marketing Agency</h2>
                <p class="text-body-tertiary">When you partner with Kaizen Digital, you’ll gain an expert social media team with over 15 years of experience in the digital marketing industry. We’ll leverage a variety of powerful social media marketing tools and analytical data to develop a custom approach to your social media efforts that suits your brand and goals. In addition to our social media marketing services, we’re also a leading provider of SEO, PPC advertising, and other essential digital marketing strategies. Our ability to develop a cohesive plan across all of your business’s digital channels is what sets us apart from competing social media marketing companies.</p>
                <div class="row mt-5 mb-5">
                    <div class="col-md-4">
                        <img src="assets/img/icons/social-media-research-1.png.webp" alt="icons" class="img-fluid">
                        <h3 class="fw-bolder mt-4 mb-3 text-body-tertiary">Social Media Research</h3>
                        <p>From demographic research to understand your audience to keyword research to better target it, we have the skills, tools, and experience needed to arm your social media campaign with data-driven strategies.</p>
                    </div>
    
                    <div class="col-md-4">
                        <img src="assets/img/icons/social-media-marketing-ads-1.png.webp" alt="icons" class="img-fluid">
                        <h3 class="fw-bolder mt-4 mb-3 text-body-tertiary">Social Media Ad Creation</h3>
                        <p>From creating graphics and design elements to writing ad copy, every aspect of your social media ad creation will be handled by an expert. This allows ut to handle every facet of your ad creation with impeccable attention to detail.</p>
                    </div>
    
                    <div class="col-md-4">
                        <img src="assets/img/icons/reporting-1.png.webp" alt="icons" class="img-fluid">
                        <h3 class="fw-bolder mt-4 mb-3 text-body-tertiary">Monthly Detailed Reporting</h3>
                        <p>Each month, we'll provide your team with a detailed social media report to help you evaluate our success. We also report on what we've accomplished and what progress we're seeing as a result of those accomplishments.</p>
                    </div>
    
                </div>
                <a href="{{route('estimate')}}" class="adds-info-btn mt-5">Discuss your social media marketing campaign with Kaizen Digital »</a>
            </div>
        </section>

        <!-- devider -->
        <div class="pt-5" style="border-bottom: 3px solid #ededed;"></div>

        <!-- contact section  -->
        <section id="contact">
            <div class="container">
                <h1 class="text-center mb-5" style="color:#4eb041; font-family: 'Oswald', sans-serif; font-weight:900;">Get A Social Media Campaign <br> Estimate</h1>
                <p class="text-center">Our team will answer questions, give suggestions and provide you with a detailed eCommerce optimization <br> scope, pricing estimate, and project timeline. Fill out the form below, or if you’d like to discuss your project over <br> the phone, call us at {{$settings->company_phone}}. We’re open 10-9 (GMT+6).</p>
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

       {{-- How does social media campaign management work --}}
       <section id="ecommerce-info">
        <div class="container">
            <!-- devider -->
            <div class="mt-3 mb-4" style="border-bottom: 3px solid #ededed;"></div>
            <h2 class="mb-3"><b>How does social media campaign management work?</b></h2>
            <h3 style="color: #0f7099;"><b>Paid Social Media Campaigns</b></h3>
            <p>Paid social media campaigns provide marketers with the ability to engage an audience with a razor-sharp focus. By utilizing paid social media ads as part of your digital marketing strategy, you’ll be able to leverage the vast amount of user data these social platforms have at their disposal and put it to work for your business. Paid social media advertising can provide an almost instantaneous source of highly qualified traffic.</p>
            <h3 style="color: #0f7099;"><b>Social Media Influencer Marketing</b></h3>
            <p>It’s not what you know, it’s who you know! Extensive industry research will guide us as we discover who the notable social media influencers are within your niche & industry. Once we’ve determined who those influencers are, we’ll develop a plan for outreach and determine a strategy to network and leverage these influencers.</p>
            <h3 style="color: #0f7099;"><b>Viral Social Content</b></h3>
            <p>Creating “viral” social media content can make a business become popular overnight, but it takes the perfect storm of planning, timing, foresight, and creativity to accomplish it. Kaizen Digital has experience creating highly shareable content that entices readers to share it. Social media content that goes “viral” will continue to pay dividends for years to come.</p>
            <h3 style="color: #0f7099;"><b>Monthly Maintenance</b></h3>
            <p>Whether it’s responding to new Google My Business reviews on your behalf or tidying up your social profiles, each month we perform a maintenance audit on all of your active social platforms to keep everything running smoothly.</p>
            <div class="google-ads-services mt-5 p-5" style="background:#f5f5f5; border-left: 20px solid #f2aa4b;">
                <h2 class="fw-bold mb-3" style="color: #4d4d4d;">Social Media Marketing Services Include</h2>
                <ul style="color: #636363; font-size:20px;">
                  <li>Social media account/profile creation, configuration, and branding</li>
                  <li>Strategy development and planning (across all platforms)</li>
                  <li>Content creation & publishing</li>
                  <li>Social media calendar creation and scheduling</li>
                  <li>Demographic Research & Analysis</li>
                  <li>Keyword Research</li>
                  <li>Consulting & Education</li>
                  <li>& much more</li>
                </ul>
            </div>
            <h3 class="mt-5"><b>Social Media Campaign Management & Related Marketing Services Pricing</b></h3>
            <p>Every business is different and pricing is based on your needs, spend and goals. <b>For a quick assessment and to receive a free estimate, please call us at 1-866-647-9218 </b> or <a href="{{route('estimate')}}" style="color: #0f7099; text-decoration:underline;">fill out an estimate request online.</a> We look forward to the opportunity of working with you.</p>
        </div>
       </section>

        {{-- more information about web services --}}
        <section id="google-ads-works">
            <div class="container">
      
              <!-- Popular Articles & Expert Guides -->
                <section id="team" class="team">
                    <div class="container">
            
                    <div class="section-title">
                        <h2 data-aos="fade-in">Social Media Marketing Articles from Our Expert Team</h2>
                    </div>
            
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-6" >
                        <div class="member p-5 text-start" data-aos="fade-up" id="article-1">
                            <h3 class="fw-bolder h2 mb-3">How to Use Social Media Effectively for SEO</h3>
                            <p>Ever wonder how SEO and social media marketing relate to one another? In this article, we'll teach you how to incorporate your social media efforts into your SEO strategy.</p>
                        </div>
                        </div>
            
                        <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="member p-5 text-start"  data-aos="fade-up" data-aos-delay="100" id="article-2">
                            <h3 class="fw-bolder h2 mb-3">5 Tips for Creating a Successful Social Media Campaign</h3>
                            <p>Work smarter, not harder! In this article, we share five great tips to help you improve your social media campaign.</p>
                        </div>
                        </div>
            
                        <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="member p-5 text-start" data-aos="fade-up" data-aos-delay="200" id="article-3">
                            <h3 class="fw-bolder h2 mb-3">Facebook Advertising and Impact on SEO</h3>
                            <p>You may be surprised to learn that your Facebook advertising efforts can impact your organic search results. Learn more about how Facebook ads can affect your website's SEO!</p>
                        </div>
                        </div>
            
                    </div>
                   <div class="text-center mt-5 mb-5">
                    <a href="{{route('estimate')}}" class="social-info-btn mb-3 mt-5 rounded">Start a Successful Campaign - Talk with the Kaizen Digital Team »</a>
                   </div>
                    </div>
                </section><!-- End Team Section -->

              
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
