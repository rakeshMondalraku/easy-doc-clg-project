@extends('admin.layout.app')

@section('title', 'Profile')

@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('admin.profile') }}" method="POST">
                @csrf
                <x-error-alert></x-error-alert>
                <x-success-alert></x-success-alert>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control form-control-user" placeholder="Enter name..."
                                value="{{ $user->name }}" name="name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control form-control-user" placeholder="Enter email..."
                                value="{{ $user->email }}" name="email" required>
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
