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
            <i class="nav-icon fas fa-user-shield"></i>
            <p>
              Administrar
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo site_url('adminUsuarios') ?>" class="nav-link">
                <i class="far fa-user nav-icon"></i>
                <p>Usuarios</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('user_groups') ?>" class="nav-link">
                <i class="fas fa-users nav-icon"></i>
                <p>Grupos de usuarios</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('groups') ?>" class="nav-link">
                <i class="fas fa-users-cog nav-icon"></i>
                <p>Grupos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('incidencia') ?>" class="nav-link">
                <i class="fas fa-tools nav-icon"></i>
                <p>Incidencias</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('tipoConsulta') ?>" class="nav-link">
                <i class="fas fa-inbox nav-icon"></i>
                <p>Tipo de consulta (Contáctanos)</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('homeinfo') ?>" class="nav-link">
                <i class="fas fa-info nav-icon"></i>
                <p>Información publica</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fas fa-id-badge"></i>
            <p>
              Perfiles
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="<?php echo site_url('todasLasIncidencias') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Gestor</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Consultas y Noticias
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo site_url('consulta') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Consultas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('noticias') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Noticias</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-envelope"></i>
            <p>
            <p>Mensajeria&nbsp;&nbsp;<span class="badge badge-light"><?php echo $badgeMail ?></span></p>
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo site_url('mensajeriaClient') ?>" class="nav-link">
                <i class="far fa-paper-plane nav-icon"></i>
                <p>Enviar mensaje</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo site_url('myMessages') ?>" class="nav-link">
                <i class="fas fa-inbox nav-icon"></i>
                <p>Mensajes&nbsp;&nbsp;<span class="badge badge-light"><?php echo $badgeMail ?></p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>


    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<div class="content-wrapper">