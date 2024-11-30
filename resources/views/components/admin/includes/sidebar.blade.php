<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" style="background-color: white !important;">

    <!-- ! Hide app brand if navbar-full -->
    <div class="app-brand demo">
        <a href="{{ url('/') }}" class="app-brand-link">

            <span class="app-brand-text demo menu-text fw-semibold ms-2">Admin MATRIX</span>
        </a>

    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item ">
            <a href="{{ route('admin.dashboard') }}" class="menu-link "
                style="background-color:{{ request()->is('admin') ? 'rgba(58, 53, 65, 0.04) !important;' : '' }};">
                <!-- Money Icon -->
                <i class="menu-icon tf-icons mdi mdi mdi-cart"></i>
                <div>Dashboard</div>
            </a>
        </li>
        <li class="menu-item ">
            <a href="{{ route('admin.orders') }}" class="menu-link "
                style="background-color:{{ request()->is('admin/orders') ? 'rgba(58, 53, 65, 0.04) !important;' : '' }};">
                <!-- Money Icon -->
                <i class="menu-icon tf-icons mdi mdi mdi-cart"></i>
                <div>Orders</div>
            </a>
        </li>

    </ul>

</aside>
