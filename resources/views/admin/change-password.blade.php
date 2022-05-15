@extends('admin.layout.app')

@section('title', 'Change Password')

@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('admin.change-password') }}" method="POST">
                @csrf
                <x-error-alert></x-error-alert>
                <x-success-alert></x-success-alert>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" class="form-control form-control-user" placeholder="Enter new password..."
                                name="password" autocomplete="new-password" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control form-control-user"
                                placeholder="Enter confirm password..." name="password_confirmation"
                                autocomplete="new-password" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary btn-user btn-block" type="submit">
                            Update Password
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
