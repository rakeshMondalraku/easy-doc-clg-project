@extends('layout.app')

@section('title', 'Home')

@section('content')
    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="slider_active owl-carousel">
            <div class="single_slider  d-flex align-items-center slider_bg_2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text ">
                                <h3> <span>Health care</span> <br>
                                    For Hole Family </h3>
                                <p>In healthcare sector, service excellence is the facility of <br> the hospital as
                                    healthcare service provider to consistently.</p>
                                <a class="boxed-btn3" href="{{ url('/doctors') }}">Make An Appointment</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider  d-flex align-items-center slider_bg_1">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text ">
                                <h3> <span>Health care</span> <br>
                                    For Hole Family </h3>
                                <p>In healthcare sector, service excellence is the facility of <br> the hospital as
                                    healthcare service provider to consistently.</p>
                                <a class="boxed-btn3" href="{{ url('/doctors') }}">Make An Appointment</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider  d-flex align-items-center slider_bg_3">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text ">
                                <h3> <span>Health care</span> <br>
                                    For Hole Family </h3>
                                <p>In healthcare sector, service excellence is the facility of <br> the hospital as
                                    healthcare service provider to consistently.</p>
                                <a class="boxed-btn3" href="{{ url('/doctors') }}">Make An Appointment</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->
    <!-- offers_area_start -->
    <div class="our_department_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-55">
                        <h3>Our Departments</h3>
                        <p>We Provide many departments in the field of medical <br>
                            and our doctors are masters in their fields . </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_department">
                        <div class="department_thumb">
                            <img src="{{ asset('img/department/1.png') }}" alt="">
                        </div>
                        <div class="department_content">
                            <h3><a href="{{ url('/doctors') }}">Eye Care</a></h3>
                            <p>Your eyes, your best tool, take care of them</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_department">
                        <div class="department_thumb">
                            <img src="{{ asset('img/department/2.png') }}" alt="">
                        </div>
                        <div class="department_content">
                            <h3><a href="{{ url('/doctors') }}">Physical Therapy</a></h3>
                            <p>It’s not just what pain is. It’s what it means to that person.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_department">
                        <div class="department_thumb">
                            <img src="{{ asset('img/department/3.png') }}" alt="">
                        </div>
                        <div class="department_content">
                            <h3><a href="{{ url('/doctors') }}">Dental Care</a></h3>
                            <p>We do have a zeal for laughter in most situation, give or take a dentist</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_department">
                        <div class="department_thumb">
                            <img src="{{ asset('img/department/4.png') }}" alt="">
                        </div>
                        <div class="department_content">
                            <h3><a href="{{ url('/doctors') }}">Diagnostic Test</a></h3>
                            <p>Do all test each test matters for your life . One test can change the therapy </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_department">
                        <div class="department_thumb">
                            <img src="{{ asset('img/department/5.png') }}" alt="">
                        </div>
                        <div class="department_content">
                            <h3><a href="{{ url('/doctors') }}">Skin Surgery</a></h3>
                            <p>Take Care of your skin and make them healthy as it protects you from outside.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_department">
                        <div class="department_thumb">
                            <img src="{{ asset('img/department/6.png') }}" alt="">
                        </div>
                        <div class="department_content">
                            <h3><a href="{{ url('/doctors') }}">Surgery Service</a></h3>
                            <p>Check and do the surgery before it's too late , it's your life afterall and we care for you
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- offers_area_end -->
    <!-- expert_doctors_area_start -->
    <div class="expert_doctors_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="doctors_title mb-55">
                        <h3>Expert Doctors</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="expert_active owl-carousel">
                        @foreach ($doctors as $doctor)
                            <div class="single_expert">
                                <div class="expert_thumb">
                                    <img src="{{ $doctor->picture ? asset($doctor->picture) : asset('img/doctor-avatar.png') }}"
                                        alt="">
                                </div>
                                <div class="experts_name text-center">
                                    <h3>{{ $doctor->name }}</h3>
                                    <span>{{ $doctor->specialization->name }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- expert_doctors_area_end -->
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
                                <p>"To solve a difficult problem in medicine, don't study it directly,<br> but rather pursue
                                    a curiosity about nature and the rest will follow. Do basic research."<br>
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
                                <p>“We practice medicine that our historical ancestors could only dream of,<br> and we have
                                    access to amazing treatments and cures for our patients on a daily basis.”
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
                                <p>"Medicine really matured me as a person because, as a physician,<br> you're obviously
                                    dealing with life and death issues… if you can handle that, you can handle anything."
                                    <br>
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
                            <a href="{{ url('/doctors') }}" class="boxed-btn3-white">Make an Appointment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Emergency_contact end -->
@endsection
