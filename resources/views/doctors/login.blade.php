<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.ico">
  <title>Doctor's Panel||Login</title>
  <!-- Simple bar CSS -->
  <link rel="stylesheet" href="{{ asset('doctors-assets/css/simplebar.css') }}">
  <!-- Fonts CSS -->
  <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <!-- Icons CSS -->
  <link rel="stylesheet" href="{{ asset('doctors-assets/css/feather.css') }}">
  <!-- Date Range Picker CSS -->
  <link rel="stylesheet" href="{{ asset('doctors-assets/css/daterangepicker.css') }}">
  <!-- App CSS -->
  <link rel="stylesheet" href="{{ asset('doctors-assets/css/app-light.css') }}" id="lightTheme" disabled>
  <link rel="stylesheet" href="{{ asset('doctors-assets/css/app-dark.css') }}" id="darkTheme">
</head>

<body class="dark ">

  <div class="wrapper vh-100">
    <div class="row align-items-center h-100">

      <form class="col-lg-3 col-md-4 col-10 mx-auto text-center" id="myform" method="POST" action="">
        <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{ url('/doctors/login') }}">
          <img src="{{ asset('doctors-assets/img/final.png') }}" alt="Easy Doc" style="width:100px; height:100px;">
        </a>
        <div class="form-group">
          <label for="login_email" class="sr-only">Email address</label>
          <input type="email" name="login_email" class="form-control form-control-lg" placeholder="Email address" required="" autofocus="">
        </div>
        <div class="form-group">
          <label for="login_password" class="sr-only">Password</label>
          <input type="password" name="login_password" class="form-control form-control-lg" placeholder="Password" required="">
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" id="loginBtn" name="login">Let me in</button>
        <!-- <p class="mt-5 mb-3 text-muted">© 2020</p> -->
        <div class="signin">
          <p>Don't have an account? <a href="#" data-toggle="modal" data-target=".modal-full">Sign Up</a></p>
        </div>


        <!-- Fullscreen modal -->
        <div class="modal fade modal-full" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
          <button aria-label="" type="button" class="close px-2" data-dismiss="modal" aria-hidden="true">
            <span aria-hidden="true">×</span>
          </button>
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-body text-center">
                <div class="wrapper vh-100">
                  <div class="row align-items-center h-100">
                    <h2 style="text-align:center; width:100%">Registration Form</h2>
                    <!-- start of sign up form  -->
                    <form class="col-lg-6 col-md-8 col-10 mx-auto" action="welcome.php" method="POST" enctype="">
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="name">Name</label>
                          <input type="test" class="form-control" id="name">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="age">Age</label>
                          <input type="text" id="age" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="gender">Gender</label>
                          <input type="text" id="gender" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="qualification">Qualification</label>
                          <input type="text" id="qualification" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="specialization">Specialization</label>
                          <input type="text" id="specialization" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="exprience">Exprience</label>
                          <input type="text" class="form-control" id="exprience">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" id="email">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="mobile_no">Mobile No</label>
                          <input type="tel" class="form-control" id="mobile_no">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="password">New Password</label>
                          <input type="password" class="form-control" id="password">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="password">Confirm Password</label>
                          <input type="password" class="form-control" id="password">
                        </div>
                        <div class="form-group col-md-12">
                          <label for="clinic_timing">Clinic Timings</label>
                          <input type="text" class="form-control" id="clinic_timing">
                        </div>
                        <div class="form-group col-md-12">
                          <label for="clinic_address">Clinic Address</label>
                          <textarea class="form-control" id="clinic_address" rows="4"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="file">Doctor's Certificate</label>
                          <input type="file" class="" id="file">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="img">Your Image</label>
                          <input type="file" class="" id="img">
                        </div>
                      </div>
                      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
                    </form>
                    <!-- end of sign up form  -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- small modal -->
      </form>
    </div>
  </div>



  <script src="{{ asset('doctors-assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('doctors-assets/js/popper.min.js') }}"></script>
  <script src="{{ asset('doctors-assets/js/moment.min.js') }}"></script>
  <script src="{{ asset('doctors-assets/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('doctors-assets/js/simplebar.min.js') }}"></script>
  <script src="{{ asset('doctors-assets/js/daterangepicker.js') }}"></script>
  <script src="{{ asset('doctors-assets/js/jquery.stickOnScroll.js') }}"></script>
  <script src="{{ asset('doctors-assets/js/tinycolor-min.js') }}"></script>
  <script src="{{ asset('doctors-assets/js/config.js') }}"></script>
  <script src="{{ asset('doctors-assets/js/apps.js') }}"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-56159088-1');
  </script>
</body>

</html>
</body>

</html>