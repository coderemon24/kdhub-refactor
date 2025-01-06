<div>
    <style>
        .phone{
            line-height: 16px
        }
    </style>
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="mb-3 col-lg-12">
                    <h2 class="mb-3 text-center service_title" >
                        <b>Contact Us</b>
                    </h2>
                    <p class="mx-auto text-center" style="width: 800px">
                        You are welcomed to visit our office for any information related to course and training. You can also reach us through the hotline number or messenger.
                    </p>
                </div>
                <div class="mt-2 col-lg-6">
                    <div class="foot_left">
                        <div class="head_office">
                            <h3 class="text-success fw-bolder">
                                Head Office [Main Branch, Dhaka]
                            </h3>
                            <p class="cont_addr" style="width: 300px">
                                Gazi Tower (2th Floor)
                                Signal, 151/6
                                Panthapath, Dhaka- 1205
                            </p>
                        </div>
                        <div class="mt-5 row">
                            <div class="col-md-6">
                                <h3 class="text-success fw-bolder">
                                    Phone Number:
                                </h3>
                                <p class="phone">+880 1934453979</p>
                                <p class="phone">+880 1894886204</p>
                                <p class="phone">+880 1894886206</p>
                                <p class="phone">+880 1894886202</p>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <h3 class="text-success fw-bolder">
                                        Office Time:
                                    </h3>
                                    <p class="phone">Saturday to Friday: 10:00 AM to 7:00 PM</p>
                                </div>
                                <div>
                                    <h3 class="text-success fw-bolder">
                                        E-mail:
                                    </h3>
                                    <p class="phone">info@kaizendigitalhub.com</p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="mt-2 col-lg-6">
                    <div class="foot_right">
                        {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15035.817491838863!2d90.38629921978428!3d23.74936689104649!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa92d50afcc15934d%3A0x598099be9b047da2!2sKaizen%20Digital%20Hub!5e0!3m2!1sen!2sbd!4v1733132652373!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                        {!! $setting->map_link ?? "Please embed map link." !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
