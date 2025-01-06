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
                    Content Marketing</li>
                </ol>
              </div>
      
            </div>
        </section>
          <!-- End Breadcrumbs Section -->
    
          <!-- content information section  -->
        <section id="adds-info" class="section-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="adds-info-title mb-3"><b>Content Marketing Services</b></h2>
                        <p class="adds-info-content mb-3">A well-developed & executed content marketing strategy attracts, inspires, and engages your audience.  <b>Whether the goal is to build trust, gain exposure, or influence purchasing decisions, accomplish it now with Kaizen Digital’s content marketing services.</b></p>
                        <ul class="adds-info-list mb-5">
                            <li><i class="bx bx-check"></i> <b>In-house content marketing agency</b></li>
                            <li><i class="bx bx-check"></i> <b>Experience content writers across industries</b></li>
                            <li><i class="bx bx-check"></i> <b>Over 50 SEO experts on staff</b></li>
                        </ul>
                        <a href="{{route('estimate')}}" class="adds-info-btn mb-3 mt-5">Talk With Our Content Marketing Experts »</a>
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
                        <img src="assets/img/digital-marketing-services-company-2.jpg.webp" alt="google" class="img-fluid">
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
    
        <!-- More content marketing information section  -->
        <section id="more-adds-info">
            <div class="container text-center">
                <h2 class="mb-4 fw-bold">Content Marketing Services That Grows Your Website Traffic</h2>
                <p class="text-body-tertiary">Content Marketing services from Kaizen Digital will help you increase website traffic across all of your digital marketing channels. Our holistic understanding of the digital landscape helps our clients pave the path of least resistance for their customers and facilitate engagement and goal completion.</p>
                <h6><b>The best content in the world is worthless without an audience.</b></h6>
                <p>Let Kaizen Digital develop a custom content marketing strategy that takes all of your website traffic sources into consideration, including social media, organic and paid search, email, referral, etc. Our big-picture approach is driven by our unrivaled understanding of digital marketing tactics like SEO, PPC, and Social Media marketing.</p>
                <div class="row mt-5">
                    <div class="col-md-4">
                        <img src="assets/img/icons/content-marketing-strategies.png.webp" alt="icons" class="img-fluid">
                        <h3 class="fw-bolder mt-4 mb-3 text-body-tertiary">Content Marketing Strategies</h3>
                        <p>Developing a strong content marketing strategy is where other agencies miss the target. While other agencies tend to publish an endless sea of thin, weak content, Kaizen Digital develops a custom content marketing plan built on keyword, competitor, and industry research.</p>
                    </div>
    
                    <div class="col-md-4">
                        <img src="assets/img/icons/content-development.png.webp" alt="icons" class="img-fluid">
                        <h3 class="fw-bolder mt-4 mb-3 text-body-tertiary">Content Development</h3>
                        <p>Once we've developed our plan and created a strategy, it's time to execute that strategy. Kaizen Digital staffs a complete team of professional content strategists and writers, all located in-house in the heart of the USA.</p>
                    </div>
    
                    <div class="col-md-4">
                        <img src="assets/img/icons/seo-copywriting-services.png.webp" alt="icons" class="img-fluid">
                        <h3 class="fw-bolder mt-4 mb-3 text-body-tertiary">SEO Copywriting</h3>
                        <p>If you want your content to be discovered organically in search engines, you need an agency that understands the increasing demands of search engine algorithms. Our understanding of SEO makes us your ideal copywriting partner.</p>
                    </div>
    
                </div>
    
            </div>
        </section>

        <!-- devider -->
        <div class="pt-5" style="border-bottom: 3px solid #ededed;"></div>
        <section id="infor">
            <div class="container">
                <h2 class="text-center mb-4">What is Content Marketing?</h2>
                <h5 class="text-center mb-4"><b>Content Marketing is the strategic creation of relevant, valuable, and engaging content designed to indirectly promote a brand, product, or service.</b></h5>
                <p class="text-center">The term “content marketing” is commonly used today when discussing digital marketing. However, as a philosophy, content marketing has been around since at least the 1700s, when Benjamin Franklin issued an almanac to promote his new printing capabilities. Johnson & Johnson, John Deere, and Michelin are also credited with using content marketing before the turn of the 20th century.</p>
                <div class="google-ads-services mt-3 p-5 mb-5" style="background:#f5f5f5; border-left: 20px solid #f2aa4b;">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 style="color: #0f7099;"><b>Digital Content Marketing Mediums Include:</b></h4>
                            <ul style="color: #636363;">
                                <li>Articles (blog articles, how-to articles, reviews, buying guides)</li>
                                <li>Emails (blasts, nurture campaigns, drip campaigns, cart abandonment, etc.)</li>
                                <li>Infographics</li>
                                <li>Many, many more!</li>
                            </ul>
                            <h4 style="color: #0f7099;"><b>Ideally, these are the goals of hiring a digital marketing agency for content marketing services</b></h4>
                            <ul style="color: #636363;">
                                <li>Attract attention and/or Expand Customer Base</li>
                                <li>Generate leads or increase online sales & revenue</li>
                                <li>Increase trust, credibility, and/or brand awareness</li>
                                <li>Develop and/or Engage an online community of potential customers</li>
                            </ul>
                        </div>
    
                    </div>
                    
                </div>
                <p class="text-center mt-5">
                    <a href="{{route('estimate')}}" class="content-info-btn mb-3 mt-5 rounded">Get Started - Discuss Your Content Marketing Needs »</a>
                </p>
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

       {{-- How does content marketing management work --}}
       <section id="ecommerce-info">
        <div class="container">

            <div class="google-ads-services mt-5 p-5" style="background:#f5f5f5; border-left: 20px solid #f2aa4b;">
                <h3 class="fw-bold mb-3" style="color: #0f7099;">Why Choose Kaizen Digital as Your Content Marketing Services Provider?</h3>
                <p>Kaizen Digital is a full-service digital marketing agency, with a full team of over 50 web developers, programmers, designers, and marketers.</p>
                <p>There are numerous advantages to choosing Kaizen Digital as your content marketing partner:</p>
                <ul style="color: #636363; font-size:20px;">
                  <li>We are a full-service, one-stop digital marketing agency, and we can handle more than just your content marketing! We offer web development, design, and marketing, and there are numerous benefits to allowing one company to handle all of these services for your business.</li>
                  <li>Kaizen Digital never outsources! All content developed will be written in-house by our team of professional content writers.</li>
                  <li>We are the eCommerce Experts! Our team of professional content writers comes from all sorts of industries and backgrounds. We’re completely proficient in B2B and lead generation models, but eCommerce is our specialty. If your eCommerce store needs content marketing or digital marketing services, let’s talk!</li>
                </ul>
            </div>
            
        </div>
       </section>

        <!-- devider -->
        <div class="" style="border-bottom: 3px solid #ededed;"></div>

       <section id="ecommerce-info">
        <div class="container">
            <div class="accordion-body">
                <div class="accordion">
                  <h2 class="text-center mb-5" style="color:#4d4d4d; font-family: 'Oswald', sans-serif; font-weight:900;">Content Marketing Services FAQs</h2>
                  
                  <div class="container">
                    <div class="label">What is content marketing?</div>
                    <div class="content">Content Marketing is the strategic creation of relevant, valuable and engaging content designed to indirectly promote a brand, product, or service.</div>
                  </div>
                  
                  <div class="container">
                    <div class="label">What is a content marketing agency?</div>
                    <div class="content">A content marketing agency refers to any agency that offers Content Marketing as a service. While some companies choose to focus on this, content marketing is just one (important) facet of digital marketing. Kaizen Digital is a full-service digital marketing agency offering a myriad of other services. So, while we are a content marketing agency, we do much more than content!</div>
                  </div>

                  <div class="container">
                    <div class="label">Why is content marketing a good choice for my business?</div>
                    <div class="content">That depends. Content Marketing is a great tactic that has applications in almost every industry imaginable. Typically, websites that regularly produce new content get significantly more traffic. Also, consider that content marketing is significantly cheaper to implement than many other forms of marketing. It also can help to enhance your existing marketing efforts, such as social media and email.</div>
                  </div>

                  <div class="container">
                    <div class="label">What types of results should I expect from content marketing services from Kaizen Digital?</div>
                    <div class="content">We love this question, as we’re a results-driven agency. The short answer is, that it all depends.
                        <br>
                        The long answer is that before you on board with Kaizen Digital, we will establish performance benchmarks and KPI to improve upon. By establishing these early on, we can be transparent about our progress and cut right to the chase.</div>
                  </div>

                  <div class="container">
                    <div class="label">What is digital marketing strategy?</div>
                    <div class="content">A business’ digital marketing strategy refers to the big-picture, holistic approach behind its digital marketing efforts. When you partner with Kaizen Digital, we will advise you on the types of digital marketing services that would benefit your business the most. Once we’ve agreed upon the services needed, we will develop a custom, holistic strategy that ensures all of our marketing initiatives work together in harmony.</div>
                  </div>

                  <div class="container">
                    <div class="label">I don't need a whole content marketing plan, just a few blogs per month. Do you guys do that?</div>
                    <div class="content">Yes, we typically operate on a monthly retainer for digital marketing services, but we do also offer ala carte services. Contact us today to discuss your needs and determine if Kaizen Digital is the right fit!</div>
                  </div>

                  <div class="container">
                    <div class="label">What should I look for when choosing a content marketing company?</div>
                    <div class="content">Ask for examples of content they have created and how it impacted the company’s bottom line. Any established agency should have no problem providing a few relevant examples, case studies, testimonials from existing clients, etc.</div>
                  </div>

                  <div class="container">
                    <div class="label">What is B2B content marketing?</div>
                    <div class="content">B2B refers to “business-to-business”. Therefore, B2B content marketing is content created by one business to market to another business, instead of a consumer. We offer B2B SEO specific-services and our team of professional writers has no problem creating B2B-quality content.</div>
                  </div>

                  <div class="container">
                    <div class="label">How long should a blog be?</div>
                    <div class="content">There is no ideal blog length. Any studies that indicate short blogs perform better than long blogs, or vice versa, are likely to mistake correlation for causation. When Kaizen Digital writes a blog article, the length is a function of the topic. If the topic requires 200 words then it is silly to write more than that. The goal is to fully cover the topic in a useful and succinct way for both search engines and your audience.</div>
                  </div>

                  <div class="container">
                    <div class="label">I have highly-technical topics that I need content created for? Does Kaizen Digital do this?</div>
                    <div class="content">Our team is full of highly capable technical writers from a diverse set of industrial backgrounds. If the topic is very technical, such as medical or legal, we may recommend hiring a third-party writer. In these cases, we develop a content marketing plan and assign articles to the writer of your choice as needed.</div>
                  </div>

                  <div class="container">
                    <div class="label">What KPI do you use for content?</div>
                    <div class="content">We will establish KPI with you when you begin working with us. At the end of the day, we measure the success of our content in terms of traffic and goal completions that can be attributed to the content. While other KPIs can be meaningful, we understand the importance of ROI.</div>
                  </div>

                  <div class="container">
                    <div class="label">Will you be able to capture our brand's voice?</div>
                    <div class="content">Yes, this is one of our specialties. Our Content Marketing team will work directly with your company to understand the nuances of your brand and tone.</div>
                  </div>
                  

                </div>
                
            </div>

            
            <div class="google-ads-services mt-5 p-5" style="background:#f5f5f5; border-left: 20px solid #f2aa4b;">
            <h3 class="fw-bold mb-3" style="color:#636363;">We’re an expert content marketing agency that offers the following services:</h3>
            
            <ul style="color: #0f7099; font-size:20px;">
                <li><b>On-Page Content (homepage, landing page, information pages, content pages)</b></li>
                <li><b>eCommerce Content (products, categories, etc.)</b></li>
                <li><b>Blogs & Article</b></li>
                <li><b>Press Releases</b></li>
                <li><b>Email Marketing</b></li>
                <li><b>SEO Copywriting</b></li>
                <li><b>& Many Other Digital Marketing Services</b></li>
            </ul>
            </div>
            
        </div>
       </section>

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
    
    </main>
      
</div>
