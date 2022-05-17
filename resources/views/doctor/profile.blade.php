@extends('doctor.layout.app')

@section('title', 'Profile')

@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('doctor.profile') }}" method="POST">
                @csrf
                <x-error-alert></x-error-alert>
                <x-success-alert></x-success-alert>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Age</label>
                            <input type="text" class="form-control" name="age" value="{{ $user->age }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control" required>
                                <option value="" {{ !$user->gender ? 'selected' : '' }} disabled>Choose</option>
                                <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male
                                </option>
                                <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Qualification</label>
                            <input type="text" class="form-control" name="qualification"
                                value="{{ $user->qualification }}" placeholder="Ex: MBBS, BMBS" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Specialization</label>
                            <select name="specialization" class="form-control" required>
                                <option value="" {{ !$user->specialization_id ? 'selected' : '' }} disabled>Choose
                                </option>
                                @foreach ($specializations as $specialization)
                                    <option value="{{ $specialization->id }}"
                                        {{ $user->specialization_id == $specialization->id ? 'selected' : '' }}>
                                        {{ $specialization->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Experience</label>
                            <input type="text" class="form-control" name="experience" value="{{ $user->experience }}"
                                placeholder="Ex: 5 years" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" class="form-control" name="mobile" value="{{ $user->mobile }}" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Doctor Registration Number</label>
                            <input type="text" class="form-control" name="registration_number"
                                value="{{ $user->registration_number }}" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary btn-user btn-block" type="submit">
                            Update Profile
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
