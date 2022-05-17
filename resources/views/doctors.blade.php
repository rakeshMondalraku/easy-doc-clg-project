@extends('layout.app')

@section('title', 'Doctors')

@section('content')
    <!-- bradcam_area_start  -->
    <div class="bradcam_area breadcam_bg_2 bradcam_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Doctors</h3>
                        <p><a href="index.html">Home /</a> Doctors</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->
    <!-- doctors list -->
    <div class="our_department_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-55">
                        <h3>Our Doctors</h3>
                        <p>Our Doctors are highly qualified and verified in their specialities <br>
                            and they try to solve every consultant's problem within minimum time. </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_department">
                        <div class="department_thumb">
                            <img src="img/department/1.png" alt="">
                        </div>
                        <div class="department_content">
                            <h3><a href="#">Rakesh Mondal</a></h3>
                            <h4> child specialist(MBBS,MD,BDS) </h4>
                            <h5>Days : MON , WED , FRI </h5>
                            <h5>Time : 3pm - 8pm </h5>
                            <h5>Fees : 400 Rs</h5>

                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_department">
                        <div class="department_thumb">
                            <img src="img/department/1.png" alt="">
                        </div>
                        <div class="department_content">
                            <h3><a href="#">Rakesh Mondal</a></h3>
                            <h4 style="color: darkslategray;"> child specialist(MBBS,MD) </h4>
                            <h5 style="color: darkslategray;">Days : MON , WED , FRI </h5>
                            <h5 style="color: darkslategray;">Time : 3pm - 8pm </h5>
                            <h5 style="color: darkslategray;">Fees : 400 Rs</h5>

                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_department">
                        <div class="department_thumb">
                            <img src="img/department/1.png" alt="">
                        </div>
                        <div class="department_content">
                            <h3><a href="#">Pritam Dhara(MBBS)</a></h3>
                            <h4> Neurologist</h4>
                            <h5>Days : MON , WED </h5>
                            <h5>Time : 3pm - 8pm </h5>
                            <h5>Fees : 400 Rs</h5>

                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_department">
                        <div class="department_thumb">
                            <img src="img/department/1.png" alt="">
                        </div>
                        <div class="department_content">
                            <h3><a href="#">Rakesh Mondal(MBBS,MD)</a></h3>
                            <h4> child specialist </h4>
                            <h5>Days : MON , WED , FRI </h5>
                            <h5>Time : 3pm - 8pm </h5>
                            <h5>Fees : 400 Rs</h5>

                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_department">
                        <div class="department_thumb">
                            <img src="img/department/1.png" alt="">
                        </div>
                        <div class="department_content">
                            <h3><a href="#">Rakesh Mondal(MBBS,MD)</a></h3>
                            <h4> child specialist </h4>
                            <h5>Days : MON , WED , FRI </h5>
                            <h5>Time : 3pm - 8pm </h5>
                            <h5>Fees : 400 Rs</h5>

                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_department">
                        <div class="department_thumb">
                            <img src="img/department/1.png" alt="">
                        </div>
                        <div class="department_content">
                            <h3><a href="#">Rakesh Mondal(MBBS,MD)</a></h3>
                            <h4> child specialist </h4>
                            <h5>Days : MON , WED , FRI </h5>
                            <h5>Time : 3pm - 8pm </h5>
                            <h5>Fees : 400 Rs</h5>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- doctors list end  -->
    <!--  -->
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
                            <a href="#" class="boxed-btn3-white"> +91 9382139976</a>
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
