<nav class="topnav navbar navbar-light bg-white">
    <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
        <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>

    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
                <i class="fe fe-sun fe-16"></i>
            </a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink"
                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="fe fe-user fe-16"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{ route('admin.user.show', Auth::User()->id) }}">Perfil</a>
                <a class="dropdown-item" href="{{ route('admin.user.edit', Auth::user()->id) }}">Configurações</a>
                <a class="nav-link text-danger" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Terminar a Sessão
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
        </form>
    </ul>
</nav>

@if (null !== Auth::user())
    <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
            <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        <nav class="vertnav navbar navbar-light">
            <!-- nav bar -->
            <div class="w-100  d-flex">
                <a class="navbar-brand mx-auto mt-5 flex-fill text-center" href="{{ route('admin.home') }}">
                    <img rel="icon" src="/site/images/logo/logo-v.png" style="width:200px; margin:auto" />

                </a>
            </div>

            <ul class="navbar-nav flex-fill w-100 mb-2">
                <p class="text-muted nav-heading mt-4 mb-1">
                    <span>Areas</span>
                </p>
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item w-100">
                        <a class="nav-link" href="{{ route('admin.home') }}">
                            <i class="fe fe-home fe-16"></i>
                            <span class="ml-3 item-text">Dashboard</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item w-100">
                        <a class="nav-link" href="{{ route('site.home') }}" target="_blank">
                            <i class="fe fe-globe fe-16"></i>
                            <span class="ml-3 item-text">Registration Form</span>
                        </a>
                    </li>
                </ul>


                {{-- Menu Registration --}}
                <p class="text-muted nav-heading mt-2 mb-1">
                    <span> Participants </span>
                </p>
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item w-100">
                        <a class="nav-link" href="{{ route('admin.registration.index') }}">
                            <i class="fe fe-users fe-16"></i>
                            <span class="ml-3 item-text">Listed Participants</span>
                        </a>
                    </li>
                </ul>


                @if ('USP' == Auth::user()->level || 'Administrador' == Auth::user()->level)
                    {{-- Menu de Operational Teams --}}
                    <p class="text-muted nav-heading mt-2 mb-1">
                        <span> Operational Teams</span>
                    </p>
                    <li class="nav-item dropdown">
                        <a href="#team" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                            <i class="fe fe-user-plus fe-16"></i>
                            <span class="ml-3 item-text"> Operational Teams</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="team">

                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('admin.team.create') }}">
                                    <span class="ml-1 item-text">Create Operational Team</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('admin.team.index') }}">
                                    <span class="ml-1 item-text">List Operational Teams</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if ('Administrador' == Auth::user()->level)
                    {{-- Menu de Users --}}
                    <p class="text-muted nav-heading mt-2 mb-1">
                        <span> Users</span>
                    </p>
                    <li class="nav-item dropdown">
                        <a href="#user" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                            <i class="fe fe-user-plus fe-16"></i>
                            <span class="ml-3 item-text"> Users</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="user">

                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('register') }}">
                                    <span class="ml-1 item-text">Create User</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('admin.user.index') }}">
                                    <span class="ml-1 item-text">List Users</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif


            </ul>

        </nav>
    </aside>

@endif
