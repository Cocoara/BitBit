<html>

<head>
  <link rel="icon" href="<?php echo base_url("assets/img/favicon.ico") ?>" />

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url("assets/plugins/fontawesome-free/css/all.min.css") ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url("assets/plugins/dist/css/adminlte.min.css") ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url("assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css") ?>">
  <script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js')?>"></script>

  <style>
    html {
      font-size: 14px !important;
    }

    .navbar {
      border-radius: 0px !important;
    }
  </style>
</head>

<body>


  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="<?php echo base_url("assets/img/favicon.ico") ?>" alt="BitBit cargando..." height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" style="display: inline;" data-widget="pushmenu" href="#"><i class="fas fa-bars fa-2x mr-3"></i></a>
        </li>

        <!-- <li class="nav-item ">
            <a type="button" href="<?php echo site_url('adminUsuarios') ?>" class="btn btn-outline-secondary mr-3">Usuarios</a>
          </li>

          <li class="nav-item ">
            <a type="button" href="<?php echo site_url('user_groups') ?>" class="btn btn-outline-secondary mr-3">Grupos de usuarios</a>
          </li>

          <li class="nav-item ">
            <a type="button" href="<?php echo site_url('groups') ?>" class="btn btn-outline-secondary mr-3">Grupos</a>
          </li>

          <li class="nav-item ">
            <a type="button" href="<?php echo site_url('incidencia') ?>" class="btn btn-outline-secondary mr-3">Incidencias</a>
          </li>

          <li class="nav-item ">
            <a type="button" href="<?php echo site_url('infocontacto') ?>" class="btn btn-outline-secondary mr-3">Información del contacto</a>
          </li>

          <li class="nav-item ">
            <a type="button" href="<?php echo site_url('mail') ?>" class="btn btn-outline-secondary mr-3">Correos</a>
          </li>

          <li class="nav-item ">
            <a type="button" href="<?php echo site_url('material') ?>" class="btn btn-outline-secondary mr-3">Material</a>
          </li> -->

      </ul>
      <!-- <span class="text text-white mr-5"><img src="<?php echo base_url("assets/img/user.png") ?>" /> <?php echo $user->first_name; ?> </span> -->
      <!-- <a type="button" href="<?php echo site_url('logout') ?>" class="btn btn-danger mr-3 ">Cerrar sesión</a> -->


      </ul>
      <ul class="nav-item navbar-nav ml-auto">


        <li class="nav-item">
          <a class="nav-link"  style="display: inline;" href="<?php echo site_url('logout') ?>"><img src="<?php echo base_url("assets/img/logout.png") ?>" style="width: 30px" /> Cerrar Sessión</a>
        </li>
      </ul>
    </nav>

    <!-- Preloader -->

    <!-- <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="<?php echo site_url('') ?>"><img src="<?php echo base_url("assets/img/favicon.png") ?>" /> </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a type="button" href="<?php echo site_url('') ?>" class="btn btn-outline-secondary mr-3">Inicio</a>
          </li>
        </ul>
        <a class="text text-white mr-5" href="<?php echo site_url('passwdchange') ?>" ><img src="<?php echo base_url("assets/img/config.png") ?>" />Configuración de la cuenta</a>
        <span class="text text-white mr-5"><img src="<?php echo base_url("assets/img/user.png") ?>" /> <?php echo $user->first_name; ?> </span>
        <a type="button" href="<?php echo site_url('logout') ?>" class="btn btn-danger mr-3 ">Cerrar sesión</a>

      </div>
    </nav> -->

