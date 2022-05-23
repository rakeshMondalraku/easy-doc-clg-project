@extends('admin.layout.app')

@section('title', 'Edit Patient')

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
            <form action="{{ route('admin.patients.update', $patient->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <x-error-alert></x-error-alert>
                <x-success-alert></x-success-alert>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $patient->name }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $patient->email }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" class="form-control" name="mobile" value="{{ $patient->mobile }}"
                                required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Age</label>
                            <input type="text" class="form-control" name="age" value="{{ $patient->age }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control" required>
                                <option value="" {{ !$patient->gender ? 'selected' : '' }} disabled>Choose</option>
                                <option value="male" {{ $patient->gender == 'male' ? 'selected' : '' }}>Male
                                </option>
                                <option value="female" {{ $patient->gender == 'female' ? 'selected' : '' }}>Female
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" name="address" value="{{ $patient->address }}"
                                required>
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
