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
  <script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>

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

    <nav class="main-header navbar navbar-expand navbar-dark">

      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" style="display: inline;" data-widget="pushmenu" href="#"><i class="fas fa-bars fa-2x mr-3"></i></a>
        </li>
      </ul>
      <ul class="nav-item navbar-nav ml-auto">


        <li class="nav-item">
          <a class="nav-link" style="display: inline;" href="<?php echo site_url('logout') ?>"><img src="<?php echo base_url("assets/img/logout.png") ?>" style="width: 30px" /> Cerrar Sessión</a>
        </li>
      </ul>
    </nav>