<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
      <img src="/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Sales Admin</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin Demo</a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item {{ request()->routeIs('admin.categories.*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Quản lý Danh mục
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.categories.index') }}" class="nav-link {{ request()->routeIs('admin.categories.index') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Xem danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.categories.create') }}" class="nav-link {{ request()->routeIs('admin.categories.create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm mới</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ request()->routeIs('admin.products.*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-box"></i>
              <p>
                Quản lý Sản phẩm
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.products.index') }}" class="nav-link {{ request()->routeIs('admin.products.index') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Xem danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.products.create') }}" class="nav-link {{ request()->routeIs('admin.products.create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm mới</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="{{ route('shop.index') }}" class="nav-link" target="_blank">
              <i class="nav-icon fas fa-store"></i>
              <p>Xem trang khách hàng</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
</aside>
