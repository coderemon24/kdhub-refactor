<div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>About Us</h1>
                <p class="lead">Your Partner in Digital Excellence</p>
            </div>
        </div>
    
        <div class="row mt-5">
            <div class="col-md-6">
                <h2>Who We Are</h2>
                <p>We are a premier digital agency committed to helping businesses thrive in the digital landscape. Our team of experts is dedicated to providing top-notch services in Google Ads management, social media marketing, SEO, content marketing, web services, digital marketing consulting, and eCommerce optimization.</p>
            </div>
            <div class="col-md-6">
                <img src="assets/img/Mou.jpg" class="img-fluid" alt="Digital Agency">
            </div>
        </div>
    
        <div class="row mt-5">
            <div class="col-md-4 text-center">
                <h3>Our Mission</h3>
                <p>To empower businesses by delivering innovative and effective digital marketing solutions that drive growth and success.</p>
            </div>
            <div class="col-md-4 text-center">
                <h3>Our Vision</h3>
                <p>To be the leading digital agency recognized for transforming businesses through creative and data-driven strategies.</p>
            </div>
            <div class="col-md-4 text-center">
                <h3>Our Values</h3>
                <p>Innovation, Integrity, Excellence, Collaboration, and Customer Success.</p>
            </div>
        </div>
    
        <div class="row mt-5">
            <div class="col-md-12 text-center">
                <h2>Meet Our Team</h2>
            </div>
        </div>
    
        <div class="row mt-4">
            @foreach ($team as $item)
                <div class="col-md-3 text-center">
                    {{--<img src="{{asset('assets/image/Team')}}/{{$item->image}}" class="rounded-circle" alt="{{$item->name}}" width="150" height="150">--}}
                    <img src="https://via.placeholder.com/150" class="rounded-circle" alt="{{$item->name}}">
                    <h4>{{$item->name}}</h4>
                    <p>{{$item->title}}</p>
                </div>
            @endforeach
            
        </div>
    
        <div class="row mt-5">
            <div class="col-md-12 text-center">
                <h2>Why Choose Us?</h2>
                <p class="lead">Our comprehensive suite of services and our commitment to excellence set us apart. We don't just provide services; we create partnerships for success.</p>
            </div>
        </div>
    
        <div class="row mt-5">
            <div class="col-md-6">
                <h3>Data-Driven Strategies</h3>
                <p>We leverage data and analytics to craft strategies that deliver measurable results. Our team stays ahead of trends and continuously adapts to the ever-changing digital landscape.</p>
            </div>
            <div class="col-md-6">
                <h3>Client-Centric Approach</h3>
                <p>We put our clients at the heart of everything we do. Our solutions are tailored to meet your unique needs and goals, ensuring your success is our top priority.</p>
            </div>
        </div>
    </div>
</div>
