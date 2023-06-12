<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="/AdminLTE/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Portal Telkom</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/profile" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @can('admin')
          <li class="nav-header">Tamu</li>
          <li class="nav-item">
            <a href="{{ route('bukuTamu') }}" class="nav-link {{ ($active === 'bukuTamu') ? 'active': ''}}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Buku Tamu
              </p>
            </a>
          </li>

          <li class="nav-header">Undangan</li>
          <li class="nav-item">
            <a href="{{ route('tamuUndangan') }}" class="nav-link {{ ($active === 'tamuUndangan') ? 'active': ''}}">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Tamu Undangan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('scanBarcode') }}" class="nav-link {{ ($active === 'scanBarcode') ? 'active': ''}}">
              <i class="nav-icon fas fa-qrcode"></i>
              <p>
                Scan Undangan
              </p>
            </a>
          </li>
          @endcan

          @can('superadmin')
          <li class="nav-header">SuperAdmin</li>
          <li class="nav-item">
            <a href="{{ route('makeUser') }}" class="nav-link {{ ($active === 'makeUser') ? 'active': ''}}">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>
                Buat User Baru
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('setting') }}" class="nav-link {{ ($active === 'setting') ? 'active': ''}}">
              <i class="nav-icon fas fa-gear"></i>
              <p>
                Web Setting
              </p>
            </a>
          </li>

          @endcan

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>