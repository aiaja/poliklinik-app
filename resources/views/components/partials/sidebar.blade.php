<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <!-- <img src="https://www.gravatar.com/avatar/2c7d9f6f281ecd3bd65ab915bca6dd57s=250" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
    <span class="brand-text font-weight-light">Poliklinik</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="https://www.gravatar.com/avatar/2c7d9f6f281ecd3bd65ab915bca6dd57s=100" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Halo! {{ Auth::user()->nama }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- ROLE ADMIN -->
        @if (request()->is('admin*'))
          <li class="nav-item">
            <a href="/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard Admin
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
  <a href="{{ route('poli.index') }}"
    class="nav-link {{ request()->routeIs('poli.*') ? 'active' : '' }}">
    <i class="nav-icon fas fa-user-md"></i>
    <p>Manajemen Poli</p>
  </a>
</li>
          </li>
          <li class="nav-item">
  <a href="{{ route('dokter.index') }}"
    class="nav-link {{ request()->routeIs('dokter.*') ? 'active' : '' }}">
    <i class="nav-icon fas fa-user-md"></i>
    <p>Manajemen Dokter</p>
  </a>
</li>
          <li class="nav-item">
  <a href="{{ route('pasien.index') }}"
    class="nav-link {{ request()->routeIs('pasien.*') ? 'active' : '' }}">
    <i class="nav-icon fas fa-user-md"></i>
    <p>Manajemen Pasien</p>
  </a>
</li>
          <li class="nav-item">
  <a href="{{ route('obat.index') }}"
    class="nav-link {{ request()->routeIs('obat.*') ? 'active' : '' }}">
    <i class="nav-icon fas fa-user-md"></i>
    <p>Manajemen Obat</p>
  </a>
</li>

        @endif

        <!-- ROLE PASIEN -->
        @if (request()->is('pasien*'))
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-injured"></i>
              <p>
                Dashboard Pasien
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('pasien.dashboard') }}" class="nav-link {{ request()->routeIs('pasien.dashboard') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
            </ul>
          </li>
        @endif

        <!-- ROLE DOKTER -->
        @if (request()->is('dokter*'))
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-md"></i>
              <p>
                Dashboard Dokter
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('dokter.dashboard') }}" class="nav-link {{ request()->routeIs('dokter.dashboard') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
  <a href="{{ route('jadwal-periksa.index') }}"
    class="nav-link {{ request()->routeIs('jadwal-periksa.*') ? 'active' : '' }}">
    <i class="nav-icon fas fa-user-md"></i>
    <p>Jadwal Periksa</p>
  </a>
</li>

        @endif
      </ul>
    </nav>
  </div>
</aside>
