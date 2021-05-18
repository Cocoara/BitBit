<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?php echo site_url('') ?>" class="brand-link elevation-4">
    <img src="<?php echo base_url("assets/img/favicon.ico") ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">BitBit</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar ">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo base_url("assets/img/user.png") ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info text-white">
        <?php echo $user->first_name; ?>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Administrar
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo site_url('editarReparacion')?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Incidencias</p>
              </a>
            </li>
          </ul>
        </li>

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?php echo base_url("assets/img/config.png") ?>" style="width:30px">
          </div>
          <div class="info text-white">
            <a href="<?php echo site_url("passwdchange") ?>">Opciones</a>
          </div>
        </div>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<div class="content-wrapper">