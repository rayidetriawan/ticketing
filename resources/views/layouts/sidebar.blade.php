<div class="app-menu navbar-menu">
    <!-- LOGO -->
    

    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo-sm.png')}}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="https://themesbrand.com/velzon/html/default/assets/images/logo-light.png" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo-sm.png')}}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="https://themesbrand.com/velzon/html/default/assets/images/logo-light.png" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('/home')}}">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboard</span>
                    </a>
                </li>
                @can('isAdmin')
                <li class="nav-item">
                    <a class="nav-link menu-link @yield('nav_active_new_ticket')" href="{{ route('/home')}}">
                        <i class="ri-ticket-2-fill"></i> <span data-key="t-dashboards">New Ticket</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link @yield('nav_active_approval_ticket')" href="{{ route('/home')}}">
                        <i class="ri-check-double-line"></i> <span data-key="t-dashboards">Approval Ticket</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link @yield('nav_active_my_ticket')" href="{{ route('/home')}}">
                        <i class="ri-file-list-line"></i> <span data-key="t-dashboards">My Ticket</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link @yield('nav_active_assigment_ticket')" href="{{ route('/home')}}">
                        <i class="ri-todo-line"></i> <span data-key="t-dashboards">Assigment Ticket</span>
                    </a>
                </li>
                @endcan
                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Master Data</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('crudindex')}}">
                        <i class="mdi mdi-database-cog-outline"></i> <span data-key="t-landing">Test CRUD</span>
                        {{-- <span class="badge badge-pill bg-danger" data-key="t-new">New</span> --}}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link @yield('nav_active_karyawan')" href="{{ route('crudindex')}}">
                        <i class="mdi mdi-database-cog-outline"></i> <span data-key="t-landing">Karyawan</span>
                        {{-- <span class="badge badge-pill bg-danger" data-key="t-new">New</span> --}}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link @yield('nav_active_user')" href="{{ route('crudindex')}}">
                        <i class="mdi mdi-database-cog-outline"></i> <span data-key="t-landing">User</span>
                        {{-- <span class="badge badge-pill bg-danger" data-key="t-new">New</span> --}}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link @yield('nav_active_jabatan')" href="{{ route('crudindex')}}">
                        <i class="mdi mdi-database-cog-outline"></i> <span data-key="t-landing">Jabatan</span>
                        {{-- <span class="badge badge-pill bg-danger" data-key="t-new">New</span> --}}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link @yield('nav_active_branch')" href="{{ route('crudindex')}}">
                        <i class="mdi mdi-database-cog-outline"></i> <span data-key="t-landing">Branch</span>
                        {{-- <span class="badge badge-pill bg-danger" data-key="t-new">New</span> --}}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link @yield('nav_active_departemen')" href="{{ route('crudindex')}}">
                        <i class="mdi mdi-database-cog-outline"></i> <span data-key="t-landing">Departemen</span>
                        {{-- <span class="badge badge-pill bg-danger" data-key="t-new">New</span> --}}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link @yield('nav_active_bag_departemen')" href="{{ route('crudindex')}}">
                        <i class="mdi mdi-database-cog-outline"></i> <span data-key="t-landing">Bag. Departemen</span>
                        {{-- <span class="badge badge-pill bg-danger" data-key="t-new">New</span> --}}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link @yield('nav_active_kategori')" href="{{ route('kategori')}}">
                        <i class="mdi mdi-database-cog-outline"></i> <span data-key="t-landing">Kategori</span>
                        {{-- <span class="badge badge-pill bg-danger" data-key="t-new">New</span> --}}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link @yield('nav_active_sub_kategori')" href="{{ route('crudindex')}}">
                        <i class="mdi mdi-database-cog-outline"></i> <span data-key="t-landing">Sub. Kategori</span>
                        {{-- <span class="badge badge-pill bg-danger" data-key="t-new">New</span> --}}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link @yield('nav_active_teknisi')" href="{{ route('crudindex')}}">
                        <i class="mdi mdi-database-cog-outline"></i> <span data-key="t-landing">Teknisi</span>
                        {{-- <span class="badge badge-pill bg-danger" data-key="t-new">New</span> --}}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link @yield('nav_active_kondisi')" href="{{ route('kondisi')}}">
                        <i class="mdi mdi-database-cog-outline"></i> <span data-key="t-landing">Kondisi</span>
                        {{-- <span class="badge badge-pill bg-danger" data-key="t-new">New</span> --}}
                    </a>
                </li>

                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Report</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link @yield('report_teknisi')" href="{{ route('crudindex')}}">
                        <i class="ri ri-user-3-line"></i> <span data-key="t-landing">Teknisi</span>
                        {{-- <span class="badge badge-pill bg-danger" data-key="t-new">New</span> --}}
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>