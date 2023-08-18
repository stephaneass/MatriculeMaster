<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{asset('admin/images/logo-sm.png')}}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{asset('admin/images/logo-dark.png')}}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light mt-2">
            <span class="logo-sm">
                <img src="{{asset('images/logo.png')}}" alt="" height="85">
            </span>
            <span class="logo-lg">
                <img src="{{asset('images/logo.png')}}" alt="" height="85">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar" style="margin-top: -20px">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <x-sidebar_menu title="Tableau de Board" :route="route('admin.dashboard')" icon="ri-honour-line" />
                <hr>
                
                <x-sidebar_menu title="Déconnexion" :route="route('logout')" icon="ri-logout-box-r-line" />
                {{-- profil and logout --}}
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>