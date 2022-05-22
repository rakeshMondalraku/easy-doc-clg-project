<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text mx-3">Doctor Panel</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('doctor.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Appointments
    </div>

    <li class="nav-item {{ request()->routeIs('doctor.appointments.pending') ? 'active' : '' }}">
        <a class=" nav-link" href="{{ route('doctor.appointments.pending') }}">
            <i class="fas fa-spinner"></i>
            <span>Pending Appointments</span>
        </a>
    </li>

    <li class="nav-item {{ request()->routeIs('doctor.appointments.approved') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('doctor.appointments.approved') }}">
            <i class="fas fa-fw fa-calendar-check"></i>
            <span>Approved Appointments</span>
        </a>
    </li>

    <li class="nav-item {{ request()->routeIs('doctor.appointments.completed') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('doctor.appointments.completed') }}">
            <i class="fas fa-calendar-check"></i>
            <span>Completed Appointments</span>
        </a>
    </li>

    <li class="nav-item {{ request()->routeIs('doctor.appointments.canceled') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('doctor.appointments.canceled') }}">
            <i class="fas fa-fw fa-calendar-times"></i>
            <span>Canceled Appointments</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Management
    </div>

    <li class="nav-item {{ request()->routeIs('doctor.offices*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('doctor.offices.index') }}">
            <i class="fas fa-building"></i>
            <span>Offices</span>
        </a>
    </li>
    <li class="nav-item {{ request()->routeIs('doctor.availabilities*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('doctor.availabilities.index') }}">
            <i class="fas fa-clock"></i>
            <span>Availabilities</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
