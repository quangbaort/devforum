<!-- leftbar-tab-menu -->
<div class="left-sidebar">
    <div class="brand">
        <a href="{{ route('admin.dashboard') }}" class="logo">
            <span>
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="logo-small" class="logo-sm">
            </span>
            <span>
                <img src="{{ asset('assets/images/logo.png') }}" alt="logo-large" class="logo-lg logo-light">
                <img src="{{ asset('assets/images/logo-dark.png') }}" alt="logo-large" class="logo-lg logo-dark">
            </span>
        </a>
    </div>
    <div class="sidebar-user-pro media border-end">
        <div class="position-relative mx-auto">
            <img src="{{ asset('assets/images/users/user-4.jpg') }}" alt="user" class="rounded-circle thumb-md">
            <span class="online-icon position-absolute end-0">
                <i class="mdi mdi-record text-success"></i>
            </span>
        </div>
        <div class="media-body ms-2 user-detail align-self-center">
            <h5 class="font-14 m-0 fw-bold">{{ Auth::user()->name }}</h5>
            <p class="opacity-50 mb-0">{{ Auth::user()->email }}</p>
        </div>
    </div>

    <div class="menu-content h-100" data-simplebar>
        <div class="menu-body navbar-vertical">
            <div class="collapse navbar-collapse tab-content" id="sidebarCollapse">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">
                        <i class="ti ti-dashboard menu-icon"></i>
                        <span>@lang('Dashboard')</span>
                    </a>
                </li>
                <ul class="navbar-nav tab-pane active" id="Main" role="tabpanel">
                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarAnalytics" data-bs-toggle="collapse" role="button"
                           aria-expanded="{{ Request::is('admin/users/*') ||  Request::is('admin/users') ? 'true' : 'false' }}" aria-controls="sidebarAnalytics">
                            <i class="fas fa-users menu-icon"></i>
                            <span>{{ __('Users') }}</span>
                        </a>
                        <div class="collapse {{ Request::is('admin/users/*') ||  Request::is('admin/users') ? 'show' : 'hide' }}" id="sidebarAnalytics">
                            <ul class="nav flex-column">
                                <li class="nav-item  {{ Request::is('admin/users') ? 'menuitem-active' : '' }}">
                                    <a href="{{ route('admin.users.index') }}" class="nav-link {{ Request::is('admin/users') ? 'active' : '' }}">@lang('User list')</a>
                                </li>
                                <li class="nav-item {{ Request::is('admin/users/create') ? 'menuitem-active' : '' }}">
                                    <a class="nav-link {{ Request::is('admin/users/create') ? 'active' : '' }}" href="{{ route('admin.users.create') }}">@lang('Create user')</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.roles.index') }}" class="nav-link ">@lang('Role List')</a>
                                </li>
                                <li class="nav-item">
                                    <a href="analytics-reports.html" class="nav-link ">@lang('Permission List')</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- end leftbar-tab-menu -->
