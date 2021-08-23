        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-people-arrows"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Persona Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

            <!-- Nav Item - User -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/user') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>User</span></a>
            </li>

            <!-- Nav Item - Perusahaan -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/perusahaan') }}">
                    <i class="fas fa-fw fa-industry"></i>
                    <span>Perusahaan</span></a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>MBTI</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Edit MBTI:</h6>
                        <a class="collapse-item" href="{{ route('mbti.question') }}">Soal</a>
                        <a class="collapse-item" href="{{ route('mbti.interpres') }}">Interprestation</a>
                        <a class="collapse-item" href="{{ route('mbti.characteristic') }}">Karakteristik</a>
                        <a class="collapse-item" href="{{ route('mbti.development') }}">Saran Pengembangan</a>
                        <a class="collapse-item" href="{{ route('mbti.carrier') }}">Saran Karir</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
