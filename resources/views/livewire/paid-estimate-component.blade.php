@php
    use App\Models\Setting;
    $settings = Setting::find(1);
@endphp
<div>
    <main id="main">

        <!-- Adds information section  -->
        <section id="adds-info" class="section-bg">
        <div class="mx-3">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="adds-info-title mb-3" style="color: #0c5f7d;">Get a Free Paid Search Estimate & Campaign Audit</h2>
                    <p class="adds-info-content mb-3">We help businesses unlock their potential with results-driven paid search campaigns.</p>
                    <h5 class="mb-4" style="color: #636363; font-weight:bolder;"><b>We’ll show you exactly what we’ll do, how much it’ll cost, and how we’re going <i> to crush your competitors in search.</i></b></h5>
                    <h3 class="mb-4" style="color: #ffa600;"><b>Complete the form below and you will:</b></h3>
                    <ul class="custom-square-list mb-3 ms-5">
                        <li><b>A Premier Google Partner agency certified in Google Ads</b></li>
                        <li><b>Weekly meetings & detailed monthly reporting</b></li>
                        <li><b>eCommerce Google Ads strategies focused on online sales</b></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <img src="assets/img/estimate-cover-4.jpg.webp" alt="google" class="img-fluid">
                </div>
            </div>
        </div>
        </section>
    
        <!-- contact section  -->
        <section id="contact">
            <div class="mx-3">
                <div class="contact-section p-5">
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
                            <button type="submit" class="btn btn-success btn-custom-paid mt-3">Submit Paid Search Estimate »</button>
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
      <!-- End #main -->
</div>
