<header class="site-header">
    <div class="header-wrapper">
        <div class="me-auto flex-grow-1 d-flex align-items-center">
            <ul class="list-unstyled header-menu-nav">
                <li class="hdr-itm mob-hamburger">
                    <a class="app-head-link" href="#!" id="mobile-collapse">
                    <div class="hamburger hamburger-arrowturn">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div></a>
                </li>
            </ul>
            <div class="d-none d-md-none d-lg-block header-search ms-3">
                <form action="#">
                    <div class="input-group">
                        <input class="form-control rounded-3" id="searchInput" placeholder="Search" type="search" value="">
                        <div class="search-btn">
                            <button class="btn p-0 rounded-0 rounded-end" type="button"><i data-feather="search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <nav class="ms-auto">
            <ul class="header-menu-nav list-unstyled">
                <li class="hdr-itm dropdown ntf-dropdown">
                    <a aria-expanded="false" aria-haspopup="false" class="app-head-link dropdown-toggle no-caret" data-bs-toggle="dropdown" href="javascript:void();" role="button">
                        <i class="ti ti-bell"></i>
                        <span class="bg-danger h-dots"></span>
                    </a>
                </li>
                <li class="hdr-itm dropdown user-dropdown">
                    <a aria-expanded="false" aria-haspopup="false" class="app-head-link dropdown-toggle no-caret me-0" data-bs-toggle="dropdown" href="#" role="button">
                        <span class="avtar">
                            <img alt="" src="{{  asset('assets/back/images/user/avatar-2.jpg') }}">
                        </span>
                    </a>
                    <div class="dropdown-menu header-dropdown">
                        <ul class="p-0">
                            <li class="dropdown-item">
                                <a class="drp-link" href="javascript:void();">{{ Auth::user()->name }}</a>
                            </li>
                            <li class="dropdown-item">
                                <a class="drp-link" href="javascript:void();">Edit Profile</a>
                            </li>
                            <li class="dropdown-item">
                                <a class="drp-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('form').submit();"><i data-feather="log-out"></i> <span>Logout</span></a>
                                <form action="{{ route('logout') }}" id="form" class="d-none" method="post">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</header>
