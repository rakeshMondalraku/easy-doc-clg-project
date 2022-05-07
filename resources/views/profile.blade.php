@extends('layout.app')

@section('title', 'Contact')

@section('content')
    <!-- bradcam_area_start  -->
    <div class="bradcam_area breadcam_bg_2 bradcam_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Rakesh Mondal</h3>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->
    <!-- business_expert_area_start  -->
    <div class="business_expert_area">
        <div class="business_tabs_area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <ul class="nav" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">Details</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                    aria-controls="profile" aria-selected="false">My Appointments</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div class="container">
            <div class="border_bottom">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card text-center">
                            <div class="card-header">
                                Rakesh Mondal
                            </div>
                            <div class="card-body">
                                <form action="#">

                                    <div class="mt-10">
                                        <input type="email" name="EMAIL" value="rakeshm@gmail.com"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'"
                                            required class="single-input">
                                    </div>
                                    <div class="mt-10">
                                        <input type="text" name="sex" value="MALE" onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Email address'" required class="single-input">
                                    </div>
                                    <div class="mt-10">
                                        <input type="text" name="mobile" value="9382139976" onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Email address'" required class="single-input">
                                    </div>
                                    <div class="input-group-icon mt-10">
                                        <div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i>
                                        </div>
                                        <input type="text" name="address" placeholder="Address"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'" required
                                            class="single-input" value="Daharkundu,Arambagh,Hooghly,712617">
                                    </div>

                                </form>

                                <a class="btn btn-primary popup-with-form" href="#update-form">Edit</a>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <!-- Appointments section start  -->
                        <div class="row"
                            style="display:flex; align-items:center; justify-content:space-between;">
                            <div class="card shadow mb-4" style="width: 32%;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row align-items-center my-3">
                                                <div class="col">
                                                    <strong>Patient's Name</strong>
                                                </div>
                                                <div class="col-auto text-right">
                                                    <strong>Rakesh Mondal</strong>
                                                </div>
                                            </div>
                                            <div class="row align-items-center my-3">
                                                <div class="col">
                                                    <strong>Patient's Sex</strong>
                                                </div>
                                                <div class="col-auto text-right">
                                                    <strong>Male</strong>
                                                </div>
                                            </div>
                                            <div class="row align-items-center my-3">
                                                <div class="col">
                                                    <strong>Patient's Age</strong>
                                                </div>
                                                <div class="col-auto text-right">
                                                    <strong>22 years</strong>
                                                </div>
                                            </div>
                                            <div class="row align-items-center my-3">
                                                <div class="col">
                                                    <strong>Patient's Issue</strong>
                                                </div>
                                                <div class="col-auto text-right">
                                                    <strong>Eye Problem</strong>
                                                </div>
                                            </div>
                                            <div class="row align-items-center my-3">
                                                <div class="col">
                                                    <strong>Doctor's Name</strong>
                                                </div>
                                                <div class="col-auto text-right">
                                                    <strong>Pritam Dhara</strong>
                                                </div>
                                            </div>
                                            <div class="row align-items-center my-3">
                                                <div class="col">
                                                    <strong>Clinic Location</strong>
                                                </div>
                                                <div class="col-auto text-right">
                                                    <strong>Barrackpore</strong>
                                                </div>
                                            </div>
                                            <div class="row align-items-center my-3">
                                                <div class="col">
                                                    <strong>Appointment Date</strong>
                                                </div>
                                                <div class="col-auto text-right">
                                                    <strong>12/05/2022</strong>
                                                </div>
                                            </div>
                                            <div class="row align-items-center my-3">
                                                <div class="col">
                                                    <strong>Appointment Time</strong>
                                                </div>
                                                <div class="col-auto text-right">
                                                    <strong>11:45 AM</strong>
                                                </div>
                                            </div>
                                            <div class="row align-items-center my-3">
                                                <div class="col">
                                                    <button type="button" class="btn mb-2 btn-warning disabled"
                                                        data-dismiss="modal">Pending</button>
                                                </div>
                                                <div class="col-auto">
                                                    <button type="button" class="btn mb-2 btn-danger"
                                                        data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div> <!-- .col-md-12 -->
                                    </div> <!-- .row -->
                                </div> <!-- .card-body -->
                            </div>

                        </div>

                        <!-- Appointments section end  -->
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- business_expert_area_end  -->
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
                            <a href="#" class="boxed-btn3-white"> +91 123456789</a>
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
                            <a href="#test-form" class="boxed-btn3-white popup-with-form">Make an Appointment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Emergency_contact end -->
    <!--sign in  form itself end-->
    <form id="update-form" class="white-popup-block mfp-hide">
        <div class="popup_box ">
            <div class="popup_inner">
                <h3>Update</h3>
                <form action="#">
                    <div class="row">

                        <div class="col-xl-12">
                            <input type="email" placeholder="Email">
                        </div>
                        <div class="col-xl-6">
                            <input type="text" placeholder="Name">
                        </div>
                        <div class="col-xl-6">
                            <input type="text" placeholder="Phone no.">
                        </div>
                        <div class="col-xl-6">
                            <input type="text" placeholder="Sex">
                        </div>
                        <div class="col-xl-6">
                            <input type="text" placeholder="Age">
                        </div>
                        <div class="col-xl-12">
                            <input type="text" placeholder="Address">
                        </div>



                        <div class="col-xl-12">
                            <button type="submit" class="boxed-btn3">UPDATE</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </form>
    <!--sign in form itself end -->
@endsection
