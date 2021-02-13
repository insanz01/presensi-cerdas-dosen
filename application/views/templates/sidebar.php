<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('app/index') ?>" class="brand-link">
      <img src="<?= base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">KOPERASI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin Pusat</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <!-- tambah class menu-open untuk secara otomatis membuka -->
          <li class="nav-item">
            <a href="<?= base_url('app/index') ?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
          </li>
          
          <li class="nav-header">KELAS AREA</li>
          <li class="nav-item">
            <a href="<?= base_url('app/kelas') ?>" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Kelas
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
          </li>

          <li class="nav-header">AKSI</li>
           <!-- tambah class menu-open untuk secara otomatis membuka -->  	
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Transaksi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('app/simpan') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Simpan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('app/pinjam') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pinjam</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('app/withdraw') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Withdraw</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('app/angsuran') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Angsuran</p>
                </a>
              </li>
            </ul>
          </li> -->

          <li class="nav-header">LABELS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Important</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Warning</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Informational</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>