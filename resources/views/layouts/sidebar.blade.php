<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <div class="sidebar-brand-text mx-3">FixIt <sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
         Data
    </div>

    <!-- Nav Item - users -->
    <li class="nav-item">
        <a class="nav-link" href="admin">
            <i class="fas fa-fw fa-table"></i>
            <span>Data Pengguna</span></a>
    </li>

    <!-- Nav Item - problem -->
    <li class="nav-item {{ request()->is('reports') ? 'active' : '' }}">
        <a class="nav-link" href="report">
            <i class="fas fa-fw fa-table"></i>
            <span>Problem type</span></a>
    </li>

    <!-- Nav Item - company -->
    <li class="nav-item">
        <a class="nav-link" href="companie">
            <i class="fas fa-fw fa-table"></i>
            <span>Company</span></a>
    </li>
    

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>    

</ul>