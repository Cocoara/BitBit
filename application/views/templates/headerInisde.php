
  <html>

<head>
  <link rel="icon" href="<?php echo base_url("assets/img/favicon.ico") ?>" />

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url("assets/plugins/fontawesome-free/css/all.min.css") ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url("assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css") ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url("assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css") ?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url("assets/plugins/jqvmap/jqvmap.min.css") ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url("assets/dist/css/adminlte.min.css") ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url("assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css") ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url("assets/plugins/daterangepicker/daterangepicker.css") ?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url("assets/plugins/summernote/summernote-bs4.min.css") ?>">



  <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
  <link rel="stylesheet" href="<?php echo base_url("assets/css/css.css"); ?>" />
  <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>" />

</head>

<body>

  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

      <!-- Preloader -->
      <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="<?php echo base_url("assets/img/favicon.ico") ?>" alt="BitBit cargando..." height="60" width="60">
      </div>

      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-dark">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
        <li class="nav-item ">
            <a type="button" href="<?php echo site_url('') ?>" class="btn btn-outline-secondary mr-3">Inicio</a>
          </li>

          <li class="nav-item ">
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
          </li>

        </ul>
        <span class="text text-white mr-5"><img src="<?php echo base_url("assets/img/user.png") ?>" /> <?php echo $user->first_name; ?> </span>
        <a type="button" href="<?php echo site_url('logout') ?>" class="btn btn-danger mr-3 ">Cerrar sesión</a>


          </ul>
          <ul class="nav-item navbar-nav ml-auto">
            <!-- <li class="nav-item">
              <a class="nav-link" href="#"><img src="<?php echo base_url("assets/img/user.png") ?>" style="width: 30px" /> Sign Up</a>
            </li> -->

            
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('login') ?>"><img src="<?php echo base_url("assets/img/enter.png") ?>" style="width: 30px" /> Login</a>
            </li>
          </ul>



        

      </nav>
