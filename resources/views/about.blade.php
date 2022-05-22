@extends('layout.app')

@section('title', 'About Us')

@section('content')
    <!-- bradcam_area_start  -->
    <div class="bradcam_area breadcam_bg bradcam_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>About Us</h3>
                        <p><a href="{{ url('/') }}">Home /</a> About</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->


    <!-- welcome_docmed_area_start -->
    <div class="welcome_docmed_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="welcome_thumb">
                        <div class="thumb_1">
                            <img src="img/about/1.png" alt="">
                        </div>
                        <div class="thumb_2">
                            <img src="img/about/2.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="welcome_docmed_info">
                        <h2>Welcome to EasyDoc</h2>
                        <h3>Best Care For Your <br>
                            Good Health</h3>
                        <p>Providing high-quality, trusted, and accessible healthcare is our reason for being</p>
                        <ul>
                            <li> <i class="flaticon-right"></i> Completely Private and Confidential </li>
                            <li> <i class="flaticon-right"></i> 24 X 7 Access to Doctors</li>
                            <li> <i class="flaticon-right"></i>Starts with Very Reasonable Price </li>
                        </ul>
                        <!-- <a href="#" class="boxed-btn3-white-2">Learn More</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- welcome_docmed_area_end -->

    <!-- testmonial_area_start -->
    <div class="testmonial_area">
        <div class="testmonial_active owl-carousel">
            <div class="single-testmonial testmonial_bg_1 overlay2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-10 offset-xl-1">
                            <div class="testmonial_info text-center">
                                <div class="quote">
                                    <i class="flaticon-straight-quotes"></i>
                                </div>
                                <p>"To solve a difficult problem in medicine, don't study it directly,<br> but rather pursue a curiosity about nature and the rest will follow. Do basic research."<br>
                                   
                                </p>
                                <div class="testmonial_author">
                                    <h4>Roger Kornberg, PhD</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-testmonial testmonial_bg_2 overlay2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-10 offset-xl-1">
                            <div class="testmonial_info text-center">
                                <div class="quote">
                                    <i class="flaticon-straight-quotes"></i>
                                </div>
                                <p>“We practice medicine that our historical ancestors could only dream of,<br> and we have access to amazing treatments and cures for our patients on a daily basis.”
                                </p>
                                <div class="testmonial_author">
                                    <h4>Suneel Dhand, MD </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-testmonial testmonial_bg_1 overlay2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-10 offset-xl-1">
                            <div class="testmonial_info text-center">
                                <div class="quote">
                                    <i class="flaticon-straight-quotes"></i>
                                </div>
                                <p>"Medicine really matured me as a person because, as a physician,<br> you're obviously dealing with life and death issues… if you can handle that, you can handle anything."
                                </p>
                                <div class="testmonial_author">
                                    <h4>Ken Jeong, MD</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testmonial_area_end -->
    <!-- About start -->
    <div class="whole-wrap">
        <div class="container box_1170">
            <div class="section-top-border">
                <h3 class="mb-30">COMPASSION</h3>
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{ asset('img/elements/compassion.jpeg') }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-9 mt-sm-20">
                        <p>We have a deeper level of patient understanding and are always empathetic to their needs.
                             This encourages a culture of providing a higher standard of patient-centred care.
                              We respect each other and our patients, and ensure that their needs are met with dignity.
                               We rise to the occasion each time for we recognise the positive social impact we can create.</p>
                    </div>
                </div>
            </div>
            <div class="section-top-border ">
                <h3 class="mb-30">EXCELLENCE</h3>
                <div class="row">
                    <div class="col-md-9 mt-sm-20">
                        <p>We ask more of ourselves and are always passionate about achieving the highest standards of medical expertise and patient care.
                             We understand that being the best is a continuous journey of becoming better versions of ourselves every day.</p>
                    </div>
                    <div class="col-md-3">
                        <img src="{{ asset('img/elements/excellence.jpeg') }}" alt="" class="img-fluid">
                    </div>

                </div>
            </div>
            <div class="section-top-border">
                <h3 class="mb-30">EFFICIENCY</h3>
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{ asset('img/elements/efficiency.jpeg') }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-9 mt-sm-20">
                        <p>We create a responsive healing environment, by being nimble to the needs of our patients and delivering what they really need with precision and timing.
                             We are focused yet fast, personal yet practical, advanced yet seamless in delivering the exact care our patients need.</p>
                    </div>
                </div>
            </div>
            <div class="section-top-border ">
                <h3 class="mb-30">CONSISTENCY</h3>
                <div class="row">
                    <div class="col-md-9 mt-sm-20">
                        <p>We always deliver on our commitment and ensure the highest level of patient care is met at every stage, every time.
                             We believe that only through consistency can we achieve our patients’ trust and fulfil our goals</p>.</div>
                    <div class="col-md-3">
                        <img src="{{ asset('img/elements/consistency.jpeg') }}" alt="" class="img-fluid">
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- About end  -->


    <!-- Emergency_contact start -->
    <div class="Emergency_contact">
        <div class="conatiner-fluid p-0">
            <div class="row no-gutters">
                <div class="col-xl-6">
                    <div
                        class="single_emergency d-flex align-items-center justify-content-center emergency_bg_1 overlay_skyblue">
                        <div class="info">
                            <h3>For Any Emergency Contact</h3>
                            <p>Please call this number</p>
                        </div>
                        <div class="info_button">
                            <a href="tel:9382113570" class="boxed-btn3-white"> +91 9382113570</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div
                        class="single_emergency d-flex align-items-center justify-content-center emergency_bg_2 overlay_skyblue">
                        <div class="info">
                            <h3>Make an Online Appointment</h3>
                            <p>Click the button below</p>
                        </div>
                        <div class="info_button">
                            <a href="{{ url('/doctors')}}" class="boxed-btn3-white">Make an Appointment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Emergency_contact end -->
@endsection
