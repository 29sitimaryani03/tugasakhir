<aside class="main-sidebar sidebar-dark-primary elevation-4 bg-slate-900">
    <!-- Brand Logo -->
    <a href="#" class="brand-link flex items-center justify-center">
      <span class="brand-text font-weight-light">SIAMPLANG</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar ">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ url('public') }}/lte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Siti Maryani</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <x-com-admin.sidebar-item href="{{ url('admin/dashboard') }}" icons="speedometer" title="Dashboard" />
            <x-com-admin.sidebar-item href="{{ url('admin/produk') }}" icons="box-seam" title="Data Produk" />
            <x-com-admin.sidebar-item href="{{ url('admin/konsumen') }}" icons="person" title="Data Konsumen" />
            <x-com-admin.sidebar-item href="{{ url('admin/keranjang') }}" icons="bag-check" title="Data Keranjang" />
            <x-com-admin.sidebar-item href="{{ url('admin/transaksi') }}" icons="currency-dollar" title="Data Transaksi" />
            <x-com-admin.sidebar-item href="{{ url('admin/user') }}" icons="person" title="Data User" />

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
