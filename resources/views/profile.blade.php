@extends('layout.app')

@section('title', 'Profile')

@section('content')
    <!-- bradcam_area_start  -->
    <div class="bradcam_area breadcam_bg_2 bradcam_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>{{ $user->name }}</h3>
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
                                <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Profile</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#appointments" id="appointments-tab"
                                    role="tab">My
                                    Appointments</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div class="container">
            <div class="border_bottom">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="profile" role="tabpanel">
                        <div class="card text-center">
                            <div class="card-header">
                                {{ $user->name }}
                            </div>
                            <div class="card-body">
                                <form action="#">

                                    <div class="mt-10">
                                        <input type="email" name="EMAIL" value="{{ $user->email }}"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'"
                                            required class="single-input">
                                    </div>
                                    <div class="mt-10">
                                        <input type="text" name="sex" value="{{ $user->gender }}"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'"
                                            required class="single-input">
                                    </div>
                                    <div class="mt-10">
                                        <input type="text" name="mobile" value="{{ $user->mobile }}"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'"
                                            required class="single-input">
                                    </div>
                                    <div class="input-group-icon mt-10">
                                        <div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i>
                                        </div>
                                        <input type="text" name="address" placeholder="Address"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'" required
                                            class="single-input" value="{{ $user->address }}">
                                    </div>

                                </form>

                                <a class="btn btn-primary popup-with-form" href="#update-form">Edit</a>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="appointments" role="tabpanel">
                        <!-- Appointments section start  -->
                        <div class="row"
                            style="display:flex; align-items:center; justify-content:space-between;">
                            @if (count($appointments) == 0)
                                <div class="col-md-12">
                                    <h4 class="text-center">You haven't booked any appointment</h4>
                                </div>
                            @endif
                            @foreach ($appointments as $appointment)
                                <div class="card shadow mb-4" style="width: 32%;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row align-items-center my-3">
                                                    <div class="col">
                                                        <strong>Patient's Problem : {{ $appointment->problem }}</strong>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center my-3">
                                                    <div class="col">
                                                        <strong>Doctor's Name : {{ $appointment->doctor->name }}</strong>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center my-3">
                                                    <div class="col">
                                                        <strong>Clinic Location :
                                                            {{ $appointment->availability->office->address }}
                                                        </strong>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center my-3">
                                                    <div class="col">
                                                        <strong>Appointment Time :
                                                            {{ $appointment->availability->weekday }}
                                                            {{ \Carbon\Carbon::parse($appointment->availability->start)->format('H:i A') }}
                                                            -
                                                            {{ \Carbon\Carbon::parse($appointment->availability->end)->format('H:i A') }}</strong>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center my-3">
                                                    <div class="col">
                                                        <strong>Appointment Status : {{ $appointment->status }}</strong>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center my-3">
                                                    <div class="col-auto">
                                                        @if ($appointment->status == 'pending' || $appointment->status == 'approved')
                                                            <form action="{{ route('patient.appointment.cancel') }}"
                                                                method="POST"
                                                                onSubmit="return confirm('Are you sure you want to cancel the appointment?') ">
                                                                @csrf
                                                                <input type="hidden" value="{{ $appointment->id }}"
                                                                    name="appointment" />
                                                                <button type="submit" class="btn mb-2 btn-danger"
                                                                    data-dismiss="modal">Cancel</button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- .row -->
                                    </div> <!-- .card-body -->
                                </div>
                            @endforeach

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
                            <a href="#test-form" class="boxed-btn3-white popup-with-form">Make an Appointment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Emergency_contact end -->
    <!--sign in  form itself end-->
    <form id="update-form" class="white-popup-block mfp-hide" method="post" action="">
        <div class="popup_box " id="update-modal">
            <div class="popup_inner">
                <h3>Update</h3>
                <form action="#">
                    <div class="row">

                        <div class="col-xl-12">
                            <input type="email" placeholder="Email" value="{{ $user->email }}" name="email">
                        </div>
                        <div class="col-xl-6">
                            <input type="text" placeholder="Name" value="{{ $user->name }}" name="name">
                        </div>
                        <div class="col-xl-6">
                            <input type="text" placeholder="Phone no." value="{{ $user->mobile }}" name="mobile">
                        </div>
                        <div class="col-xl-6">
                            <input type="text" placeholder="Sex" value="{{ $user->gender }}" name="gender">
                        </div>
                        <div class="col-xl-6">
                            <input type="text" placeholder="Age" value="{{ $user->age }}" name="age">
                        </div>
                        <div class="col-xl-12">
                            <input type="text" placeholder="Address" value="{{ $user->address }}" name="address">
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

@push('script')
    <script>
        $('#update-form').ajaxForm({
            resetForm: true,
            beforeSubmit: function() {
                $('#add-error-message').html('');
                $('#update-modal').LoadingOverlay('show');
            },
            success: function(response) {
                location.href = "{{ route('patient.profile') }}";
            },
            error: function(response) {
                $('#update-modal').LoadingOverlay('hide');
                const errors = response.responseJSON;
                let errorsHtml = '<div class="alert alert-danger"><ul>';

                if (response.status == 422) {
                    $.each(errors.errors, function(k, v) {
                        errorsHtml += '<li>' + v + '</li>';
                    });
                } else {
                    errorsHtml += '<li>' + errors.message + '</li>';
                }

                errorsHtml += '</ul></di>';

                $('#add-error-message').html(errorsHtml);
            },
        });

        $(document).ready(function() {
            if (location.hash == '#appointments') {
                $('#appointments-tab').click();
            }
        });
    </script>
@endpush
