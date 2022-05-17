<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Signup - Doctor Panel</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin-assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin-assets/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-8 col-lg-8 col-md-10">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Doctor Signup</h1>
                                    </div>
                                    <x-error-alert></x-error-alert>
                                    <form class="user" action="{{ route('doctor.signup') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control" name="name"
                                                        value="{{ old('name') }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Age</label>
                                                    <input type="text" class="form-control" name="age"
                                                        value="{{ old('age') }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <select name="gender" class="form-control" required>
                                                        <option value="" {{ !old('gender') ? 'selected' : '' }}
                                                            disabled>Choose</option>
                                                        <option value="male"
                                                            {{ old('gender') == 'male' ? 'selected' : '' }}>Male
                                                        </option>
                                                        <option value="female"
                                                            {{ old('gender') == 'female' ? 'selected' : '' }}>Female
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Qualification</label>
                                                    <input type="text" class="form-control" name="qualification"
                                                        value="{{ old('qualification') }}"
                                                        placeholder="Ex: MBBS, BMBS" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Specialization</label>
                                                    <select name="specialization" class="form-control" required>
                                                        <option value="" {{ !old('specialization') ? 'selected' : '' }}
                                                            disabled>Choose</option>
                                                        @foreach ($specializations as $specialization)
                                                            <option value="{{ $specialization->id }}"
                                                                {{ old('specialization') == $specialization->id ? 'selected' : '' }}>
                                                                {{ $specialization->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Experience</label>
                                                    <input type="text" class="form-control" name="experience"
                                                        value="{{ old('experience') }}" placeholder="Ex: 5 years"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" name="email"
                                                        value="{{ old('email') }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Mobile</label>
                                                    <input type="text" class="form-control" name="mobile"
                                                        value="{{ old('mobile') }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" class="form-control" name="password"
                                                        value="{{ old('password') }}" autocomplete="new-password"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Confirm Password</label>
                                                    <input type="password" class="form-control"
                                                        name="password_confirmation"
                                                        value="{{ old('password_confirmation') }}"
                                                        autocomplete="new-password" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Doctor Registration Number</label>
                                                    <input type="text" class="form-control" name="registration_number"
                                                        value="{{ old('registration_number') }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-block" type="submit">
                                            Signup
                                        </button>
                                        <p class="mt-4 mb-0 text-center">
                                            Already have an account?
                                            <a href="{{ route('doctor.login') }}" class="text-decoration-none ml-1">
                                                Login
                                            </a>
                                        </p>
                                        <p class="mt-4 mb-0 text-center">
                                            <a href="{{ url('/') }}" class="text-decoration-none">
                                                <i class="fas fa-arrow-left mr-2"></i>
                                                Go back to home
                                            </a>
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin-assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin-assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin-assets/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
