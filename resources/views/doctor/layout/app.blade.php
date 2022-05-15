<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/swapnil_logo.ico">
    <title>@yield('title') - {{ env('APP_NAME') }}</title>
    @include('doctor.layout.css')

    @stack('style')
  </head>
  <body class="vertical  dark  ">
  <div class="wrapper">
     @include('doctor.layout.uppernav') 

     @include('doctor.layout.sidenav') 

     @yield('content')
  </div>
    @include('doctor.layout.script')

    @stack('script')
  </body>

</html>