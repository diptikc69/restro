<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Yummy</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider">

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('restaurants.index') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Restaurant</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('categories.index') }}">
            <i class="fas fa-fw fa-camera"></i>
            <span>Category</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('menus.index') }}">
            <i class="fas fa-fw fa-book-open"></i>
            <span>Menu</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Charts -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('tables.index') }}">
            <i class="fas fa-fw fa-chair"></i>
            <span>Table</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

</ul>
