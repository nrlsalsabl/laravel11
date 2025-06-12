<aside class="sidebar sidebar-default sidebar-white sidebar-base navs-rounded-all ">
    <div class="sidebar-header d-flex align-items-center justify-content-start">
        <a href="../dashboard/index.html" class="navbar-brand">
            <!--Logo start-->
            <!--logo End-->

            <!--Logo start-->
            <div class="logo-main">
                <div class="logo-normal">
                    <svg class=" icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2"
                            transform="rotate(-45 -0.757324 19.2427)" fill="currentColor" />
                        <rect x="7.72803" y="27.728" width="28" height="4" rx="2"
                            transform="rotate(-45 7.72803 27.728)" fill="currentColor" />
                        <rect x="10.5366" y="16.3945" width="16" height="4" rx="2"
                            transform="rotate(45 10.5366 16.3945)" fill="currentColor" />
                        <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2"
                            transform="rotate(45 10.5562 -0.556152)" fill="currentColor" />
                    </svg>
                </div>
                <div class="logo-mini">
                    <svg class=" icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2"
                            transform="rotate(-45 -0.757324 19.2427)" fill="currentColor" />
                        <rect x="7.72803" y="27.728" width="28" height="4" rx="2"
                            transform="rotate(-45 7.72803 27.728)" fill="currentColor" />
                        <rect x="10.5366" y="16.3945" width="16" height="4" rx="2"
                            transform="rotate(45 10.5366 16.3945)" fill="currentColor" />
                        <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2"
                            transform="rotate(45 10.5562 -0.556152)" fill="currentColor" />
                    </svg>
                </div>
            </div>
            <!--logo End-->


            <h6 class="logo-title">Web Pengaduan</h6>
        </a>
        <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
            <i class="icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </i>
        </div>
    </div>
    <div class="sidebar-body pt-0 data-scrollbar">
        <div class="sidebar-list">
            <!-- Sidebar Menu Start -->
            <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#" tabindex="-1">
                        <span class="default-icon">Master</span>
                        <span class="mini-icon">-</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('admin.dashboard') }}">
                        @include('icons.home-icon')
                        <span class="item-name">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/resident*') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('admin.resident.index') }}">
                        @include('icons.user-icon')
                        <span class="item-name">Data Masyarakat</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/report-category*') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('admin.report-category.index') }}">
                        @include('icons.mark-icon')
                        <span class="item-name">Data Kategori</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/report*') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('admin.report.index') }}">
                        @include('icons.bill-icon')
                        <span class="item-name">Data Laporan</span>
                    </a>
                </li>

                <li>
                    <hr class="hr-horizontal">
                </li>
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#" tabindex="-1">
                        <span class="default-icon">Transaksi</span>
                        <span class="mini-icon">-</span>
                    </a>
                </li>

            </ul>
            <!-- Sidebar Menu End -->
        </div>
    </div>
    <div class="sidebar-footer"></div>
</aside>
