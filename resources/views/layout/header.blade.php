<header>
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-lg-2">
                        <div class="logo">
                            <a href="{{ url('/') }}">
                                <img style="width: 150px; height:50px" src="img/easydocloog.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class=" col-xl-6 col-lg-8">
                        <div class="main-menu  d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a class="active" href="{{ url('/') }}">home</a></li>
                                    <li><a href="{{ url('/about') }}">About Us</a></li>
                                    <li><a href="{{ url('/doctors') }}">Doctors</a></li>
                                    <li><a href="{{ url('/contact') }}">Contact</a></li>
                                    <li><a href="{{ url('/profile') }}">Profile</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="dropdown show">
                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Log in
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item popup-with-form" href="#login-form">Patient's Login</a>
                            <a class="dropdown-item" href="{{ url('/doctors') }}">Doctor's Login</a>
                            <a class="dropdown-item" href="{{ url('/admin') }}">Administrator Login</a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
