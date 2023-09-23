@php
    // $setting = DB::table('settings')->first();
@endphp
<aside class="app-sidebar app-light-sidebar">
    <div class="app-navbar-wrapper">
        <div class="brand-link brand-logo">
            <h2 class="h3"><a href="javascript:void();" class="b-brand text-decoration-none">
                {{ Auth::user()->name }}
            </a></h2>
        </div>
        <div class="navbar-content">

            <ul class="app-navbar">

                <li class="nav-item nav-hasmenu">
                    <a href="{{ route('dashboard') }}" class="nav-link"><span class="nav-icon"><i class="ti ti-home"></i></span><span
                            class="nav-text">Dashboard</span></a>
                </li>
                @role('superadmin')
                <li class="nav-item nav-hasmenu">
                    <a href="javascript:void();" class="nav-link"><span class="nav-icon"><i class="ti ti-layout-2"></i></span><span
                            class="nav-text">Roles & Permission</span><span class="nav-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="nav-submenu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('role.create') }}">Role</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('permission.create') }}">Permission</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-hasmenu">
                    <a href="javascript:void();" class="nav-link"><span class="nav-icon"><i class="ti ti-users"></i></span><span
                            class="nav-text">User</span><span class="nav-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="nav-submenu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.create') }}">Add User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.index') }}">View User</a>
                        </li>
                    </ul>
                </li>
                @endrole
                {{--
                <li class="nav-item nav-hasmenu">
                    <a href="javascript:void();" class="nav-link"><span class="nav-icon"><i class="ti ti-layout-2"></i></span><span
                            class="nav-text">Blog</span><span class="nav-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="nav-submenu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('blog.create') }}">Add Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('blog.index') }}">View Blog</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-hasmenu">
                    <a href="javascript:void();" class="nav-link"><span class="nav-icon"><i class="ti ti-share"></i></span><span
                            class="nav-text">Seo</span><span class="nav-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="nav-submenu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('seo.create') }}">Add Seo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('seo.index') }}">View Seo</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-hasmenu">
                    <a href="javascript:void();" class="nav-link"><span class="nav-icon"><i class="ti ti-social"></i></span><span
                            class="nav-text">Social Media</span><span class="nav-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="nav-submenu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('social.create') }}">Add Social Media</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('social.index') }}">View Social Media</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-hasmenu">
                    <a href="javascript:void();" class="nav-link"><span class="nav-icon"><i class="ti ti-users"></i></span><span
                            class="nav-text">User</span><span class="nav-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="nav-submenu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.create') }}">Add User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.index') }}">View User</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-hasmenu">
                    <a href="javascript:void();" class="nav-link"><span class="nav-icon"><i class="ti ti-adjustments-horizontal"></i></span><span
                            class="nav-text">Supportfaq</span><span class="nav-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="nav-submenu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('supportfaq.create') }}">Add Supportfaq</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('supportfaq.index') }}">View Supportfaq</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-hasmenu">
                    <a href="javascript:void();" class="nav-link"><span class="nav-icon"><i class="ti ti-page-break"></i></span><span
                            class="nav-text">Staticpage</span><span class="nav-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="nav-submenu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('staticpage.create') }}">Add Staticpage</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('staticpage.index') }}">View Staticpage</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-hasmenu">
                    <a href="{{ route('media.index') }}" class="nav-link"><span class="nav-icon"><i class="ti ti-camera"></i></span><span
                            class="nav-text">Media</span></a>
                </li>
                <li class="nav-item nav-hasmenu">
                    <a href="{{ route('code.index') }}" class="nav-link"><span class="nav-icon"><i class="ti ti-code"></i></span><span
                            class="nav-text">Code</span></a>
                </li>
                <li class="nav-item nav-hasmenu">
                    <a href="{{ route('setting.index') }}" class="nav-link"><span class="nav-icon"><i class="ti ti-settings-automation"></i></span>
                        <span class="nav-text">Setting</span></a>
                </li> --}}
                <li class="nav-item nav-hasmenu">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('form').submit();" class="nav-link">
                        <span class="nav-icon"><i class="ti ti-logout"></i></span>
                        <span class="nav-text">Logout</span>
                    </a>
                    <form class="d-none" action="{{ route('logout') }}" method="post" id="form">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</aside>
