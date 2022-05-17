@extends('layout.app')

@section('title', 'Doctors')

@push('style')
    <style>
        .radio-box {
            height: 15px !important;
            width: 21px !important;
            margin-bottom: 10px !important;
        }

    </style>
@endpush

@section('content')
    <!-- bradcam_area_start  -->
    <div class="bradcam_area breadcam_bg_2 bradcam_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Doctors</h3>
                        <p><a href="{{ url('/') }}">Home /</a> Doctors</p>
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
                @foreach ($doctors as $doctor)
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="single_department">
                            <div class="department_thumb">
                                <img src="{{ $doctor->picture ? asset($doctor->picture) : asset('img/doctor-avatar.png') }}"
                                    alt="">
                            </div>
                            <div class="department_content">
                                <h3>{{ $doctor->name }}</h3>
                                <h4> {{ $doctor->specialization->name }} ({{ $doctor->qualification }}) </h4>
                                <h5>Days : {{ implode(', ', $doctor->availabilities->pluck('weekday')->toArray()) }} </h5>
                                @if (auth()->guard('patient')->user())
                                    <button class="boxed-btn3 popup-with-form" href="#appointment-form"
                                        onclick="openDialog({{ $doctor->id }})">Make An
                                        Appointment</button>
                                @else
                                    <button class="boxed-btn3 popup-with-form" href="#login-form">Make An
                                        Appointment</button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
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
                            <a href="{{ url('/doctors') }}" class="boxed-btn3-white">Make an Appointment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Emergency_contact end -->
    <form id="appointment-form" class="white-popup-block mfp-hide">
        <div class="popup_box ">
            <div class="popup_inner">
                <h3>Make an Appointment</h3>
                <div class="row">
                    <div class="col-md-12">
                        <h4 id="doctor-info" class="text-center"></h4>
                    </div>
                    <div class="col-md-12">
                        <p>Choose timing</p>
                    </div>
                    <div class="col-md-12" id="timings">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="boxed-btn3">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('script')
    <script>
        function openDialog(id) {
            $('#appointment-form .popup_inner').LoadingOverlay('show');
            $.ajax({
                url: `{{ route('patient.appointment.doctor-info') }}/${id}`,
                method: 'GET',
                success: function(res) {
                    $('#appointment-form .popup_inner').LoadingOverlay('hide');
                    $('#doctor-info').html(`${res.name} - ${res.specialization.name} - ${res.qualification}`);
                    let timings = '';
                    res.availabilities.forEach((availability, i) => {
                        timings += `
                        <div>
                            <input class="radio-box" type="radio" name="availability" id="availability${availability.id}" value="${availability.id}" ${i == 0 ? 'checked' : ''}>
                            <label for="availability${availability.id}">
                                ${availability.weekday} (${moment(availability.start, 'HH:mm:ss').format('HH:mm A')}-${moment(availability.end, 'HH:mm:ss').format('HH:mm A')}) - ${availability.office.address}, ${availability.office.city}, ${availability.office.state}, ${availability.office.zip} (₹ ${availability.office.fee})
                            </label>
                        </div>
                        `;
                    })
                    $('#timings').html(timings);
                },
                error: function() {
                    $('#appointment-form .popup_inner').LoadingOverlay('hide');
                }
            });
        }
    </script>
@endpush
