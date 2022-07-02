<!-- leftbar-tab-menu -->
<div class="left-sidebar">
    <!-- LOGO -->
    <div class="brand">
        <a href="index.html" class="logo">
            <span>
                <img src="/assets/images/logo-sm.png" alt="logo-small" class="logo-sm">
            </span>
            <span>
                <img src="/assets/images/logo.png" alt="logo-large" class="logo-lg logo-light">
                <img src="/assets/images/logo-dark.png" alt="logo-large" class="logo-lg logo-dark">
            </span>
        </a>
    </div>
    <div class="sidebar-user-pro media border-end">
        <div class="position-relative mx-auto">
            <img src="/assets/images/users/user-4.jpg" alt="user" class="rounded-circle thumb-md">
            <span class="online-icon position-absolute end-0"><i class="mdi mdi-record text-success"></i></span>
        </div>
        <div class="media-body ms-2 user-detail align-self-center">
            <h5 class="font-14 m-0 fw-bold">{{ Auth::user()->name }}</h5>
            <p class="opacity-50 mb-0">{{ Auth::user()->email }}</p>
        </div>
    </div>
    <!-- Tab panes -->

    <!--end logo-->
    <div class="menu-content h-100" data-simplebar>
        <div class="menu-body navbar-vertical">
            <div class="collapse navbar-collapse tab-content" id="sidebarCollapse">
                <!-- Navigation -->
                <ul class="navbar-nav tab-pane active" id="Main" role="tabpanel">
                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarAnalytics" data-bs-toggle="collapse" role="button"
                            aria-expanded="{{ Request::is('admin/user/*') ||  Request::is('admin/user') ? 'true' : 'false' }}" aria-controls="sidebarAnalytics">
                            <i class="fas fa-users menu-icon"></i>
                            <span>{{ __('Users') }}</span>
                        </a>
                        <div class="collapse {{ Request::is('admin/user/*') ||  Request::is('admin/user') ? 'show' : 'hide' }}" id="sidebarAnalytics">
                            <ul class="nav flex-column">
                                <li class="nav-item  {{ Request::is('admin/user') ? 'menuitem-active' : '' }}">
                                    <a href="{{ route('admin.user.index') }}" class="nav-link {{ Request::is('admin/user') ? 'active' : '' }}">{{ __('List User') }}</a>
                                </li><!--end nav-item-->
                                <li class="nav-item {{ Request::is('admin/user/create') ? 'menuitem-active' : '' }}">
                                    <a class="nav-link {{ Request::is('admin/user/create') ? 'active' : '' }}" href="{{ route('admin.user.create') }}">{{ __('Create user') }}</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a href="analytics-reports.html" class="nav-link ">{{ __('List Role') }}</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a href="analytics-reports.html" class="nav-link ">{{ __('List Permision') }}</a>
                                </li>
                            </ul><!--end nav-->
                        </div><!--end sidebarAnalytics-->
                    </li><!--end nav-item-->
                </ul>
            </div><!--end sidebarCollapse-->
        </div>
    </div>
</div>
<!-- end left-sidenav-->
