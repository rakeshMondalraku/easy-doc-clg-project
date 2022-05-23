@extends('admin.layout.app')

@section('title', 'Edit Doctor')

@push('style')
    <style>
        .uploader-icon {
            position: absolute;
            bottom: 0;
            right: 48px;
            background: #fff;
            padding: 5px;
            border-radius: 50%;
            cursor: pointer;
        }

    </style>
@endpush

@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('admin.doctors.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <x-error-alert></x-error-alert>
                <x-success-alert></x-success-alert>
                <div class="row">
                    <div class="col-md-12 row d-flex justify-content-center mb-5">
                        <div class="col-md-2 d-flex justify-content-center" style="position: relative">
                            <img class="rounded-circle picture"
                                src="{{ $doctor->picture ? asset($doctor->picture) : asset('img/doctor-avatar.png') }}"
                                style="height: 100px;width:100px">
                            <input type="file" style="display: none" name="picture" accept="image/*" />
                            <i class="fas fa-camera uploader-icon"></i>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $doctor->name }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Age</label>
                            <input type="text" class="form-control" name="age" value="{{ $doctor->age }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control" required>
                                <option value="" {{ !$doctor->gender ? 'selected' : '' }} disabled>Choose</option>
                                <option value="male" {{ $doctor->gender == 'male' ? 'selected' : '' }}>Male
                                </option>
                                <option value="female" {{ $doctor->gender == 'female' ? 'selected' : '' }}>Female
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Qualification</label>
                            <input type="text" class="form-control" name="qualification"
                                value="{{ $doctor->qualification }}" placeholder="Ex: MBBS, BMBS" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Specialization</label>
                            <select name="specialization" class="form-control" required>
                                <option value="" {{ !$doctor->specialization_id ? 'selected' : '' }} disabled>Choose
                                </option>
                                @foreach ($specializations as $specialization)
                                    <option value="{{ $specialization->id }}"
                                        {{ $doctor->specialization_id == $specialization->id ? 'selected' : '' }}>
                                        {{ $specialization->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Experience</label>
                            <input type="text" class="form-control" name="experience" value="{{ $doctor->experience }}"
                                placeholder="Ex: 5 years" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $doctor->email }}"
                                required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" class="form-control" name="mobile" value="{{ $doctor->mobile }}"
                                required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Doctor Registration Number</label>
                            <input type="text" class="form-control" name="registration_number"
                                value="{{ $doctor->registration_number }}" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary btn-user btn-block" type="submit">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('.uploader-icon').click(function() {
                $('[name="picture"]').click();
            });
            $('[name="picture"]').change(function(e) {
                $('.picture').attr('src', window.URL.createObjectURL(e.target.files[0]));
            })
        });
    </script>
@endpush
