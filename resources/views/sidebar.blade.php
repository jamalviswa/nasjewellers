<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>
                <li>
                    <a href="{{ route('dashboards.index') }}">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="box"></i>
                        <span data-key="t-pages">Gold</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('instocks.index') }}" data-key="t-starter-page">Instock Details</a></li>
                        <li><a href="{{ route('outstocks.index') }}" data-key="t-maintenance">Outstock Details</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="package"></i>
                        <span data-key="t-pages">Silver</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('billings.index') }}" data-key="t-starter-page">Instock Details</a></li>
                        <li><a href="{{ route('nonbillings.index') }}" data-key="t-maintenance">Outstock Details</a></li>
                    </ul>
                </li>
                <!-- <li>
                    <a href="{{ route('jewelries.index') }}">
                        <i data-feather="sliders"></i>
                        <span data-key="t-dashboard">Jewelries Types</span>
                    </a>
                </li> -->
                <li>
                    <a href="{{ route('items.index') }}">
                        <i data-feather="sliders"></i>
                        <span data-key="t-dashboard">Gold Item List</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dealers.index') }}">
                        <i data-feather="sliders"></i>
                        <span data-key="t-dashboard">Dealers Details</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('adminusers.logout') }}">
                        <i data-feather="power"></i>
                        <span data-key="t-dashboard">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- ========== Left Sidebar End ========== -->