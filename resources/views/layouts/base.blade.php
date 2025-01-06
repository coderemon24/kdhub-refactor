@php
    use App\Models\Setting;
    $settings = Setting::find(1);
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{$settings->company_name}} - Home</title>
 
  <meta content="Kaizen Digital Hub offers expert digital marketing services including SEO, PPC, and social media marketing to help businesses increase online visibility, drive traffic, and boost conversions. Contact us today to grow your brand" name="description">
  <meta content="Digital marketing services, SEO services, PPC management, social media marketing, online marketing, search engine optimization, digital marketing agency, pay-per-click advertising, website traffic, brand visibility, conversion optimization, online business growth, Kaizen Digital Hub" name="keywords">
<meta name="robots" content="index, follow">
    <meta name="author" content="Kaizen Digital Hub">
    
  <!-- Favicons -->
  <link href="{{asset('assets/image/Settings')}}/{{$settings->company_favicon}}" rel="icon">               
  <link href="{{asset('assets/image/Settings')}}/{{$settings->company_logo}}" rel="apple-touch-icon">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
  @livewireStyles
  
  <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-GDRNTHCTWE"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-GDRNTHCTWE');
</script>
  
</head>

<body>

  <!-- ======= Header ======= -->
  <div class="" style="background:#1e6279;">
    <div class="info d-flex justify-between text-light d-none d-md-flex align-items-center">
      <p class="my-2 mx-2"><i class="bx bx-play p-1" style="border: 1px solid #fff; border-radius:50%;"></i> Kaizen Digital Has Been Named "Best SEO Services" of 2024 by Forbes Advisor</p>
      <p class="my-2 mx-2 ms-auto">Need an Expert Team? <i class="bx bx-phone p-1" style="border: 1px solid #fff; border-radius:50%;"></i> {{$settings->company_phone}}</p>
    </div>
  </div>
  
  <header id="navbar-top" @if(request()->is('/')) style="position: absolute; background: transparent;" @else style="position: static; background: #17212e;" @endif>
    <div class="container">
      <nav id="navbar" class="navbar">
        
          <div class="logo">
            <!--<h1><a href="/">Kaizen Digital<span>.</span></a></h1>-->
            <a href="/"><img style="max-height:55px;" src="{{asset('assets/image/Settings')}}/{{$settings->company_logo}}"></a>
          </div>
        <ul>
          <li><a class="nav-link scrollto fw-bold text-uppercase" href=""></a>
        <li class="dropdown"><a href="#" class="fw-bold text-uppercase"><span>Web services</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="/web-services" class="fw-bold">Web design</a></li>
              <li><a href="/web-services" class="fw-bold">Web Design ( WordPress) </a></li>
              <li><a href="/web-services" class="fw-bold">Web Development</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#" class="fw-bold text-uppercase"><span>CRO</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="/ecommerce-optimization-services" class="fw-bold">eCommerce Optimization Services</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#" class="fw-bold text-uppercase"><span>Digital Services</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="/digital-marketing-consultant" class="fw-bold">Digital Marketing Consulting</a></li>
              <li><a href="/seo-services" class="fw-bold">Search Engine Optimization (SEO) </a></li>
              <li><a href="/social-media-marketing-management" class="fw-bold">Social Media Marketing Management</a></li>
              <li><a href="content-marketing-agency" class="fw-bold">Content Marketing</a></li>
              <li><a href="/google-ads-management-agency" class="fw-bold" >Google Ads Management</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto fw-bold text-uppercase" href="/about-us">About us</a></li>
          <li><a href="{{route("contact-us")}}" class="fw-bold text-uppercase"><span>Contact us</span> <i></a></i>
          <li><a href="{{route("blog.all")}}" class="fw-bold text-uppercase"><span>blog</span><i></a></i>
          {{-- <li class="dropdown"><a href="#" class="fw-bold text-uppercase"><span>About</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#" class="fw-bold">About Us</a></li>
              <li><a href="#" class="fw-bold">Office & Directions</a></li>
              <li><a href="#" class="fw-bold">Our Team</a></li>
              <li><a href="#" class="fw-bold">Careers</a></li>
            </ul>
          </li> --}}
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->

    </div>
  


  </header>
  <!-- End Header -->

  {{$slot}}

  <!-- ======= Footer ======= -->
  <div style="border-bottom: 8px solid #f2aa4b;"></div>
  <footer class="footer" id="footer">
    <div class="container">
      <div class="row mb-5">
        <div class="col-lg-5">
          <div class="footer-newsletter p-5" style="background: #0371a3; border-radius:10px;">
            <h3 class="fw-bolder"><b>Sign Up For Industry News</b></h3>
            <p>Receive the latest updates and industry news.</p>
            {{-- <form action="" method="post">
              <input type="email" name="email" placeholder="Enter your Email"><input type="submit" value="Subscribe">
            </form> --}}
          </div>
        </div>
        <div class="col-md-7 text-right p-5" style="background: #0371a3; border-radius:10px;">
            <h5>Contact Us For Expert Advice</h5>
            <p>Call {{$settings->company_phone}} or click a button below to contact our team <a href="{{route('estimate')}}" class="btn btn-info">request an estimate</a> | <a href="{{route('estimate')}}" class="btn btn-info">contact customer support</a></p>
        </div>
      </div>
      <div class="row section-footer p-5">
            <div class="col-md-3 footer-column">
                <h5>SEO Services</h5>
                <ul>
                    <li><a href="/seo-services">Ecommerce SEO</a></li>
                    <li><a href="/seo-services">SEO Audits</a></li>
                    <li><a href="/seo-services">SEO Packages</a></li>
                    <li><a href="/seo-services">SEO Consulting</a></li>
                    <li><a href="/seo-services">SEO Copywriting</a></li>
                    <li><a href="/seo-services">Enterprise SEO</a></li>
                    <li><a href="/seo-services">Google SEO</a></li>
                    <li><a href="/seo-services">SEO Agency</a></li>
                    <li><a href="/seo-services">Amazon SEO</a></li>
                    <li><a href="/seo-services">SEO Migration</a></li>
                    <li><a href="/seo-services">Link Building</a></li>
                    <li><a href="/seo-services">Local SEO</a></li>
                    <li><a href="/seo-services">SEO for Shopify</a></li>
                    <li><a href="/seo-services">SEO for WordPress</a></li>
                    <li><a href="/seo-services">SEO for BigCommerce</a></li>
                    <li><a href="/seo-services">SEO for Magento</a></li>
                    <li><a href="/seo-services">Google Penalty Recovery</a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-column">
                <h5>PPC Management</h5>
                <ul>
                    <li><a href="/google-ads-management-agency">Google Ads Management Services</a></li>
                    <li><a href="/google-ads-management-agency">Google Shopping Management</a></li>
                    <li><a href="/google-ads-management-agency">PPC Consulting</a></li>
                    <li><a href="/google-ads-management-agency">Google Premier Partner</a></li>
                    <li><a href="/ecommerce-optimization-services">eCommerce PPC</a></li>
                    <li><a href="/google-ads-management-agency">Google Ads Consultant</a></li>
                </ul>
                <h5 class="mt-5">Conversion Rate Optimization</h5>
                <ul>
                    <li><a href="/ecommerce-optimization-services">CRO Services</a></li>
                    <li><a href="/ecommerce-optimization-services">eCommerce Optimization Services</a></li>
                </ul>
                <h5 class="mt-5">Offices & Locations</h5>
                <ul>
                    <li><a href="/about-us">Akron Ohio Office</a></li>
                    <li><a href="/about-us">Columbus SEO</a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-column">
                <h5>Web Design</h5>
                <ul>
                    <li><a href="/web-services">Corporate Website Design</a></li>
                    <li><a href="/web-services">WordPress Website Design</a></li>
                    <li><a href="/web-services">WooCommerce Development</a></li>
                    <li><a href="/web-services">White Label Website Design</a></li>
                    <li><a href="/ecommerce-optimization-services">B2B eCommerce Web Design</a></li>
                    <li><a href="/web-services">Website Design Consulting</a></li>
                    <li><a href="/web-services">Custom Website Design</a></li>
                </ul>
                <h5 class="mt-5">eCommerce Web Design</h5>
                <ul>
                    <li><a href="/web-services">Shopify Website Design</a></li>
                    <li><a href="/web-services">BigCommerce Website Design</a></li>
                </ul>
                <h5 class="mt-5">PPC By Industry</h5>
                <ul>
                    <li><a href="/ecommerce-optimization-services">PPC for eCommerce</a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-column">
                <h5>SEO By Industry</h5>
                <ul>
                    <li><a href="/seo-services">B2B SEO</a></li>
                    <li><a href="/seo-services">Law Firm SEO</a></li>
                    <li><a href="/seo-services">SEO for Moving Companies</a></li>
                    <li><a href="/seo-services">Medical SEO</a></li>
                    <li><a href="/seo-services">Financial SEO</a></li>
                    <li><a href="/seo-services">Hospital & Healthcare SEO</a></li>
                    <li><a href="/seo-services">HVAC SEO</a></li>
                    <li><a href="/seo-services">SEO for Plastic Surgeons</a></li>
                    <li><a href="/seo-services">SEO for Self Storage</a></li>
                </ul>
                <h5 class="mt-5">Featured Guides</h5>
                <ul>
                    <li><a href="/seo-services">SEO Companies</a></li>
                    <li><a href="/seo-services">SEO Pricing</a></li>
                    <li><a href="/ecommerce-optimization-services">eCommerce Website Pricing</a></li>
                    <li><a href="/digital-marketing-consultant">Guerrilla Marketing Tips</a></li>
                    <li><a href="/web-services">Increase Website Sales</a></li>
                    <li><a href="/ecommerce-optimization-services">eCommerce Features</a></li>
                    <li><a href="/web-services">Website Design Pricing</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="row mt-3">
              <div class="col-lg-6">
                <div class="p-5" style="background: #0371a3; border-radius:10px;">
                  <h3><b>Be Social</b></h3>
                  <div class="social-links">
                    <a href="https://www.x.com/kaizendigitalhub/" class="twitter"><i class="bx bxl-twitter"></i></a>
                    <a href="https://www.facebook.com/p/Kaizen-Digital-Hub-61568565617987/?mibextid=ZbWKwL" class="facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="https://www.instagram.com/kaizendigitalhub/" class="instagram"><i class="bx bxl-instagram"></i></a>
                    <a href="https://www.pinterest.com/kaizendigitalhub/" class="pinterest"><i class="bx bxl-pinterest"></i></a>
                    <a href="https://www.linkedin.com/company/kaizen-digital-hub/" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-md-6 text-right p-5" style="background: #0371a3; border-radius:10px;">
                <h3><b>Copyright & Credits</b></h3>
                <p>Website Copyright &copy; {{date("Y")}} {{$settings->company_name}}.</p>
              </div>
            </div>
        </div>
    </div>
  </footer>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>
  <script>
    var typed = new Typed('#typingAni', {
        strings: ['Market Share.', 'Google Positions.', 'Online Transactions.', 'Sales and Leads.', 'New Customers.'],
        typeSpeed: 50,
        backSpeed: 30,     
        backDelay: 500,    
        loop: true        
    });
    
</script>
<script>
  window.addEventListener('scroll', function() {
    var navbar = document.getElementById('navbar');
    if (window.scrollY > 50) {
      navbar.classList.add('fixed');
    } else {
      navbar.classList.remove('fixed');
    }
  });
</script>

@livewireScripts

<!-- Start of LiveChat (www.livechat.com) code -->
<script>
    window.__lc = window.__lc || {};
    window.__lc.license = 18912603;
    window.__lc.integration_name = "manual_onboarding";
    window.__lc.product_name = "livechat";
    ;(function(n,t,c){function i(n){return e._h?e._h.apply(null,n):e._q.push(n)}var e={_q:[],_h:null,_v:"2.0",on:function(){i(["on",c.call(arguments)])},once:function(){i(["once",c.call(arguments)])},off:function(){i(["off",c.call(arguments)])},get:function(){if(!e._h)throw new Error("[LiveChatWidget] You can't use getters before load.");return i(["get",c.call(arguments)])},call:function(){i(["call",c.call(arguments)])},init:function(){var n=t.createElement("script");n.async=!0,n.type="text/javascript",n.src="https://cdn.livechatinc.com/tracking.js",t.head.appendChild(n)}};!n.__lc.asyncInit&&e.init(),n.LiveChatWidget=n.LiveChatWidget||e}(window,document,[].slice))
</script>
<noscript><a href="https://www.livechat.com/chat-with/18912603/" rel="nofollow">Chat with us</a>, powered by <a href="https://www.livechat.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript>
<!-- End of LiveChat code -->

</body>

</html>