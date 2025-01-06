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
                    Digital Marketing Consultants</li>
                </ol>
              </div>
      
            </div>
        </section>
          <!-- End Breadcrumbs Section -->
    
          <!--  Banner section  -->
        <section id="adds-info" class="section-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="adds-info-title mb-3">Marketing Consultants & Digital Marketing Consulting</h2>
                        <p class="adds-info-content mb-3">Our team offers digital marketing consulting services to help your business grow online. <b>We’re the expert digital marketing consultants you need to reach your sales goals.</b></p>
                        <ul class="adds-info-list mb-3">
                            <li><i class="bx bx-check"></i> <b>Ala carte marketing consulting services and audits</b></li>
                            <li><i class="bx bx-check"></i> <b>Premier Google Partner Agency with in-house marketing consultants</b></li>
                            <li><i class="bx bx-check"></i> <b>Hands on consulting with our in-house team</b></li>
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
                        <video muted autoplay src="assets/img/k-video.mp4" class="img-fluid rounded mt-4"></video>
                        {{-- <img src="assets/img/google-adwords-management-banner-e1626960701638.png.webp" alt="google" class="img-fluid"> --}}
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
    
        <!-- More digital information section  -->
        <section id="more-adds-info">
            <div class="container text-center">
                <h2 class="mb-4 fw-bold">Digital Marketing Consultants That Grow Your Business Online</h2>
                <p><b>If you’re looking to make the most of your digital marketing campaign, every dollar you spend must be intentional and measured.</b></p>
                <p class="text-body-tertiary">Since the evolution of the internet, digital marketing has helped businesses to grow online, generation millions, if not billions in revenue. Companies spend more on digital marketing now than ever before, meaning competition is always growing. At Kaizen Digital, our goal as marketing consultants is to help you put your money into the most effective channels. Our digital marketing consulting services look at paid search, Google ads, organic search (SEO), conversion rate optimization, email marketing, social media and more. Optimizing each of your campaigns, and making sure they work together, makes for a strong digital marketing campaign that’ll produce the ROI you need reinvest in continued growth.</p>
                <p class="text-body-tertiary">The Kaizen Digital team consists of specialists in each area. We’ll start our consulting process by meeting with your team to understand where you’re at now, where you’re spending advertising dollars and look at the performance of each campaign. We’ll provide an audit based on our extensive knowledge of each channel, allowing you to understand the strengths and weaknesses of each campaign. Our details reports will give you insights into what to change, fix or modify and <b class="text-dark">our team is also available to handle managed campaigns, implementing and optimizing your digital marketing channels for you.</b></p>
               
                <h3 class="mt-5 fw-bolder mb-5" style="color: #737373;">As a leading digital marketing consultant, we're also a Google Premiere Partner</h3>
                <div class="d-flex justify-content-around align-items-center mt-5 mb-5">
                    <img src="assets/img/company/google-ads-logo.gif" alt="company" class="img-fluid">
                    <img src="assets/img/company/google-shopping-ads-logo.gif" alt="company" class="img-fluid">
                    <img src="assets/img/company/google-video-ads-logo.gif" alt="company" class="img-fluid">
                    <img src="assets/img/company/google-analytics-logo.gif" alt="company" class="img-fluid">
                </div>
            </div>
        </section>
    
        <!-- contact section  -->
        <section id="contact">
            <div class="container">
                <h1 class="text-center mb-5" style="color:#4eb041; font-family: 'Oswald', sans-serif; font-weight:900;">Get an Estimate for Digital <br> Marketing Consulting</h1>
                <p class="text-center">Each marketing consulting project and each client we work with is unique. To determine a budget for your digital marketing consulting services, we’ll talk over your brand, current performance, and learn more about your goals. Fill out the form below and we’ll get back to you in 24 hours. Or, if you’d like to discuss your project over the phone, call us at {{$settings->company_phone}}. We’re open Saturday through Friday, 10-9 (GMT+6).</p>
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
                            <button type="submit" class="btn btn-success btn-custom-paid mt-3">I'm Done. Send It »</button>
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

        {{-- digital marketing services --}}
        <section id="web-services">
            <div class="container">
                <div class="google-ads-services mt-3 p-5 mb-3" style="background:#f5f5f5; border-left: 20px solid #f2aa4b;">
                    <div class="row">
                        <div class="col-md-12">
                            <h2><b>What Our Digital Marketing Consulting Services Include</b></h2>
                            <p><b>Wondering how our expert digital marketing consulting services work?</b> Every business that comes to us is different, so always tailor our process for each customer. Below we’ll break down how to analyze areas of your business.</p>
                            <ul style="color: #636363;">
                                <li style="color: #0f7099;"><h4><b>Paid Campaign & Google Ads</b></h4></li>
                                <p class="">Our in-house PPC consultants will review your campaigns and analyze them against our checklist of must-have optimizations. After identifying weak areas of the campaign, we’ll make suggestions as to how you can strengthen the paid search campaigns. One of our most requested services is Google Ads consulting, where our Google Premiere Partner team will deep dive into your Ads campaign providing you with a detailed hot list of opportunities.</p> 
                                <li style="color: #0f7099;"><h4><b>Search Network Advertising</b></h4></li>
                                <p class="">The Google Search Network is a group of search-related apps and web properties that you can also pay for ad placement. We understand how to best leverage Google’s search network to put your ads in front directly in front of your audience not just on Google, but on relevant websites they frequently visit!</p> 
                                <li style="color: #0f7099;"><h4><b>Search Engine Optimization</b></h4></li>
                                <p class="">Kaizen Digital is well known as a worldwide leader in SEO services and employees some of the top SEO consultants in the world. Our team will review every detail of your website, from technical aspect to content, onsite to offsite, to give you a clear picture of SEO opportunities. With around 70% of all search resulting in an organic click, focusing on the organic channel is an absolute must.</p> 
                                <li style="color: #0f7099;"><h4><b>Conversion Rate Optimization</b></h4></li>
                                <p class="">Improving your conversion rate through CRO services will allow your website to conversion traffic into conversions at a higher rate, meaning all of your digital marketing efforts will produce a higher return on investment. Often overlooked, CRO can be the solution to creating a complete digital marketing strategy to works.</p> 
                                <li style="color: #0f7099;"><h4><b>Social Media</b></h4></li>
                                <p class="">We focus on paid social media campaigns and looking at the performance of those campaigns based on competitors and average ROAS (return on ad spend). We’ll be able to identify social ad opportunities and optimizations that’ll drive more revenue per dollar spent. Also, we’ll review your social media presence, accounts and reputation as these affect your business on many levels.</p> 
                                <li style="color: #0f7099;"><h4><b>Email Marketing</b></h4></li>
                                <p class="">If you already have customers, making the most of those names and email addresses is a must. Email marketing is often the highest converting marketing channel for eCommerce businesses. We’ll review your graphics, messaging and email strategy, along with helping in creating drip campaigns and focused email campaigns.</p> 
                                
                            </ul>
                        </div>
    
                    </div>
                </div>
                <div class="text-center">
                    <a href="{{route('estimate')}}" class="btn btn-success btn-custom py-2 px-5 mt-5 w-60 fw-bold fs-5">Get Digital Marketing Results - Talk with the Kaizen Digital Team <i class="bx bx-chevron-right"></i></a>
                </div>
            </div>
        </section>

        {{-- Digital marketing FAQs section --}}
        <section>
            <div class="accordion-body">
                <div class="accordion">
                    <h2 class="text-center mb-5" style="color:#4d4d4d; font-family: 'Oswald', sans-serif; font-weight:900;">Digital Marketing Consulting FAQS</h2>
                    
                    <div class="container">
                    <div class="label">What digital marketing channels are most effective?</div>
                    <div class="content">Each business is truly different and lends itself to needing to market to their target audience differently. With that being said, the blend advertising focus changes on a per client basis. Most businesses do heavily rely on paid search, Google ads and organic search to drive revenue, so we are often focused on these areas when consulting, helping to improve the performance on the channels with the highest spend.</div>
                    </div>
                    
                    <div class="container">
                    <div class="label">How can a digital marketing consultant help our business?</div>
                    <div class="content">A digital marketing consultant can come to you with a wealth of data and information on many businesses, what’s working and what isn’t. It’s very tough, if not impossible, to gather this data yourself, making hiring a consultant necessary. In our process, we’ll use past and current client data to power our suggestions for optimizing your campaigns, using strategies we know our proven to drive results.</div>
                    </div>
                    
                    <div class="container">
                    <div class="label">Who will I work with on your consulting team?</div>
                    <div class="content">When hiring Kaizen Digital for marketing consulting you’ll work with a team of 5-10 experts. Our paid search team will be involved in the paid search audit, our SEO team in the SEO audit and so on. It’s important that the consultant isn’t a “one man show” as no one is an expert in every area. Bringing our wealth of knowledge to the table is what produces the actionable items that will drive your marketing campaign forward.</div>
                    </div>
                </div>
                
            </div>
            <img src="assets/img/5-star-company.gif" class="d-block mx-auto" alt="5star">
            <p class="text-center mt-4">Kaizen Digital is rated 4.8 / 5 average from 867 reviews on FeaturedCustomers, Clutch & Google</p>

        </section>
        <hr>

        <!-- What Does a Marketing Consultant Do? section  -->
        <section id="google-ads-works">
          <div class="container mt-5">
            <div class="row">
              <div class="col-md-9">
                    <h4 class="mb-3" style="color:#0f7099; font-family: 'Oswald', sans-serif; font-weight:900;">Digital Marketing Consultants Vs Traditional Marketing Consultants</h4>
                    <p>First things first – there is a big difference between a traditional marketing consultant and a digital marketing consultant. To determine which type of consultant you’ll need, consider the marketing channels you’re looking to improve upon. Below we’ve outlined different marketing channels and which channel falls under which type of consultant. If you’re entirely unsure of where to start, hiring a general marketing consultant is probably the best move as they can help with foundational market research, determining your target audience, and more. If they feel the need to bring in digital experts, they will make that suggestion.</p>
                    <h4 class="mb-3" style="font-family: 'Oswald', sans-serif; font-weight:900;">Digital Marketing Consultants Typically Consult On:</h4>
                    <ul>
                        <li>SEO (Search Engine Optimization)</li>
                        <li>Website Design & Development</li>
                        <li>Paid Search</li>
                        <li>Social Media Marketing</li>
                        <li>Conversion Rate Optimization</li>
                        <li>Display Advertising</li>
                        <li>Online Press and Reputation</li>
                        <li>Email Marketing</li>
                        <li>Analytics and Data Analysis</li>
                        <li>Affiliate Marketing</li>
                        <li>Video Production</li>
                    </ul>
                    <h4 class="mb-3" style="font-family: 'Oswald', sans-serif; font-weight:900;">Traditional Marketing Consultants Typically Consult On:</h4>
                    <ul>
                        <li>Traditional PR (magazines, print, television)</li>
                        <li>Branding</li>
                        <li>Messaging and Copy</li>
                        <li>Print and Collateral</li>
                        <li>TV Advertising / Commercials</li>
                        <li>Radios Ads</li>
                        <li>Outdoor Ads / Billboards</li>
                        <li>Direct Mailings</li>
                        <li>Newspaper Ads</li>
                    </ul>
                    <p>Of course, within these two areas, depending on who you hire, there may be overlap. It isn’t to say that a digital marketing consultant couldn’t help with messaging and branding, for example. <b> If you know focusing on your website and search engine marketing is a top priority for your digital marketing strategy, hiring a consultant focused on digital marketing would definitely be best.</b></p>
                    
                    <!-- devider -->
                    <div class="mt-3 mb-3" style="border-bottom: 3px solid #ededed;"></div>
                    <h4 class="mb-3" style="color:#0f7099; font-family: 'Oswald', sans-serif; font-weight:900;">Marketing Strategies</h4>
                    <p>A seasoned marketing consultant will be able to create marketing strategies based on a lot of data and past experiences, something that is very hard to come by with an in-house marketing team. Whether it’s SEO or radio ads, a consultant can guide you down the right path knowing what has worked for hundreds of other businesses. Without a consultant, many businesses go blind to new marketing strategies and channels, often wasting advertising dollars guessing and trying what might work best for them. Using a consultant should limit the amount of guessing that goes into your overall marketing strategy.</p>
                    
                    <!-- devider -->
                    <div class="mt-3 mb-3" style="border-bottom: 3px solid #ededed;"></div>
                    <h4 class="mb-3" style="color:#0f7099; font-family: 'Oswald', sans-serif; font-weight:900;">Marketing Consultants Can Provide Insights To Your In-House Marketing Department</h4>
                    <p>If you have an in-house marketing team, it doesn’t mean a marketing consultant cannot provide a ton of value. Usually, in this situation, a marketing consultant can provide even more value by pushing your internal resources in the right direction. Often, internal teams lack data and insights to create actionable plans of attack and get “lost” in the day-to-day. A consultant can come in, develop a detailed marketing plan, and get your team working on the right items. A new marketing strategy can invigorate your team and get them to think outside of the box.</p>
                    
                    <!-- devider -->
                    <div class="mt-3 mb-3" style="border-bottom: 3px solid #ededed;"></div>
                    <h4 class="mb-3" style="color:#0f7099; font-family: 'Oswald', sans-serif; font-weight:900;">Does a Marketing Consulting Actually Do the Work?</h4>
                    <p>This is a great question to ask yourself as to what your needs are and to ask a consultant when interviewing. If you have an in-house team you may want a consultant that simply guides your team, other businesses may be looking for a consultant to do more than consulting, they want someone who can implement the marketing strategy.</p>
                    <p>If you’re looking for a consultant who can develop the plan and execute it, be sure to be upfront with those expectations. Some consultants are high-level consultants focusing on strategy, turning it over to your team to implement, while some consulting agencies are just that – agencies that have a team to handle implementation. For example, if you’re looking for an SEO consultant to help with an SEO campaign you will need multiple skill sets to implement the strategy including a designer, programmer, copywriter, and more. Launching a successful marketing campaign usually isn’t a one-man job that an individual consultant can handle alone.</p>
                    <p><b>Remember, your marketing consultant isn’t a full-time employee, they are a partner in your business. </b> Someone that can guide you in the right direction and advise you and management about the best practices, while also doing some of the work.</p>
                    
                    <!-- devider -->
                    <div class="mt-3 mb-3" style="border-bottom: 3px solid #ededed;"></div>
                    <h4 class="mb-3" style="color:#0f7099; font-family: 'Oswald', sans-serif; font-weight:900;">Who Hires a Marketing Consultant</h4>
                    <p>Ranging from start-up businesses to Fortune 500 companies, businesses of all sizes use marketing consultants, albeit in different ways. Whether your marketing efforts are brand awareness or to develop branding to get your business off the ground, you’re never too small or too big to gain valuable insights from a professional marketing consultant.</p>
                    
                    <!-- devider -->
                    <div class="mt-3 mb-3" style="border-bottom: 3px solid #ededed;"></div>
                    <h4 class="mb-3" style="color:#0f7099; font-family: 'Oswald', sans-serif; font-weight:900;">How Much Does a Marketing Consultant Cost?</h4>
                    <p>A marketing consultant often bills hourly with a monthly retainer, meaning you choose how many hours a month you need and are invoiced each month for those hours. Hourly rates can range from $75-$500+ an hour. If you wanted a seasoned pro, someone who can truly bring unique value to your business, paying $150-$250 an hour is normal. Remember, the value of a marketing consultant is in the experience they have and a successful marketing consultant will always be more expensive than someone just getting into the field.</p>
                    
                    <!-- devider -->
                    <div class="mt-3 mb-3" style="border-bottom: 3px solid #ededed;"></div>
                    <h4 class="mb-3" style="color:#0f7099; font-family: 'Oswald', sans-serif; font-weight:900;">What Skills Should I Look For In a Marketing Consultant?</h4>
                    <p>Remember, this person will be part of your team, so just like hiring an employee, it’s important your consultant fits in with your culture and has the skills you need.</p>
                    <h4 class="mb-3" style="font-family: 'Oswald', sans-serif; font-weight:900;">We recommend looking for a consultant with the following skills:</h4>
                    <ul>
                        <li>Strong at critical thinking and creative thinking</li>
                        <li>Clear communication skills</li>
                        <li>Marketing management skills to guide your team effectively</li>
                        <li>Strong at internal communications</li>
                        <li>A quality writer and experience in content marketing</li>
                        <li>A background in working in and implementing the types of campaigns you feel your business most needs</li>
                    </ul>
                    <p>If you have questions about hiring a consultant or need help with your campaigns, give us a call or request a free quote.</p>
           
     
              </div>
              <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h3>Want to be #1 on Google</h3>
                        <h5>Don’t let your competition take your customers. </h5>
                        <p>Founded in 2004, we’re the #1 SEO agency in the USA. <br> <b class="text-warning">We have proven methods to increase your rankings, traffic, and sales.</b> PS: We’re also a certified Google Ads partner 📈</p>
                        <img src="assets/img/Mou.jpg" alt="cse" class="img-fluid">
                    </div>
                </div>
              </div>
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

        {{-- boost section  --}}
        <section id="boost">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card bg-white shadow">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img src="assets/img/cta-image.png" alt="cta" class="img-fluid">
                                    </div>
                                    <div class="col-md-8">
                                        <h3 style="color:#0f7099;"><b>Want to take your SEO to the next level?</b></h3>
                                        <p>For 20+ years we've been an award-winning design, development, and SEO marketing agency. Talk with us and see how we can help your business rank page #1!</p>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="" class="btn btn-warning p-4">Free SEO Quote</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    
    
      </main>
      <!-- End #main -->
</div>
