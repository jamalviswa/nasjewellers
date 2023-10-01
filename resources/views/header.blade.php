<!-- ========== Header Start ========== -->
<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ route('dashboards.index') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{URL::to('images/logo.png')}}" alt="NAS" height="45">
                    </span>
                    <span class="logo-lg">
                        <img src="{{URL::to('images/logo.png')}}" alt="NAS" height="75" width="85">
                    </span>
                </a>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>
        <div class="d-flex">
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item bg-soft-light border-start border-end" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{URL::to('images/avatar.jpg')}}" alt="NAS Jewellers">
                    <span class="d-none d-xl-inline-block ms-1 fw-medium">{{auth()->user()->username}}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="{{ route('adminusers.profile') }}"><i class="mdi mdi-face-profile font-size-16 align-middle me-1"></i> Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('adminusers.logout') }}"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</a>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- ========== Header End ========== -->