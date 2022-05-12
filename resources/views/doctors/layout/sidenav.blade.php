<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar >
  <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
    <i class="fe fe-x"><span class="sr-only"></span></i>
  </a>
  <nav class="vertnav navbar navbar-light">
    <!-- nav bar -->
    <div class="w-100 mb-4 d-flex">
      <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{ url('/doctors/welcome')}}">
      <img src="{{ asset('doctors-assets/img/final.png') }}" alt="Easy DOC" style="width:57px; height:57px;" > 
      </a>
    </div>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item dropdown">
        <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
          <i class="fe fe-home fe-16"></i>
          <span class="ml-3 item-text">DOCTOR'S PANEL</span><span class="sr-only">(current)</span>
        </a>
        <ul class="collapse list-unstyled pl-4 w-100" id="dashboard">
          <li class="nav-item active">
            <a class="nav-link pl-3" href="{{ url('/doctors/welcome')}}"><span class="ml-1 item-text">Welcome</span></a>
          </li>
        </ul>
      </li>
    </ul>
    <p class="text-muted nav-heading mt-4 mb-1">
      <span>DASHBOARD</span>
    </p>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <!-- Appointment area start -->
      <li class="nav-item dropdown">
        <a href="#index" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
          <i class="fe fe-box fe-16"></i>
          <span class="ml-3 item-text">Your Appointments</span>
        </a>
        <ul class="collapse list-unstyled pl-4 w-100" id="index">
          <li class="nav-item">
            <a class="nav-link pl-3" href="{{ url('/doctors/appointments') }}"><span class="ml-1 item-text">Manage Appointments</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link pl-3" href="{{ url('/doctors/approved_appointments') }}"><span class="ml-1 item-text">Approved Appointments</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- Appointment area end -->
      <!-- Profile area start -->
      <li class="nav-item dropdown">
              <a href="#profile" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-user fe-16"></i>
                <span class="ml-3 item-text">Profile</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="profile">
                <a class="nav-link pl-3" href="{{ url('doctors/profile') }}"><span class="ml-1">Your Profile</span></a>
              </ul>
            </li>
        <!-- profile area end  -->
    </ul>
  </nav>
</aside>