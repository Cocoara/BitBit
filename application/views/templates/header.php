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
      <!-- <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="<?php echo base_url("assets/img/favicon.ico") ?>" alt="BitBit cargando..." height="60" width="60">
      </div> -->

      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-dark">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars fa-2x mr-3"></i></a>
          </li>
          <li class="nav-item ">
            <a type="button" href="<?php echo site_url('') ?>" class="btn btn-outline-secondary mr-3">Inicio</a>
          </li>
          <li class="nav-item">
            <a type="button" href="<?php echo site_url('Contactanos') ?>" class="btn btn-outline-secondary mr-3">Contáctanos</a>
          </li>
          <li class="nav-item">
            <a type="button" href="<?php echo site_url('Nosotros') ?>" class="btn btn-outline-secondary mr-3">Sobre nosotros</a>
          </li>

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



      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

          <!-- <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="<?php echo site_url('') ?>"><img src="<?php echo base_url("assets/img/favicon.png") ?>" /> </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a type="button" href="<?php echo site_url('') ?>" class="btn btn-outline-secondary mr-3">Inicio</a>
          </li>
          <li class="nav-item">
            <a type="button" href="<?php echo site_url('Contactanos') ?>" class="btn btn-outline-success mr-3">Contáctanos</a>
          </li>
          <li class="nav-item">
            <a type="button" href="<?php echo site_url('Nosotros') ?>" class="btn btn-outline-warning mr-3">Sobre nosotros</a>
          </li>
          
        </ul>
       
            <a type="button" href="<?php echo site_url('login') ?>" class="btn btn-outline-info mr-3 ">Inicar sesión</a>
       
      </div>
    </nav>
  </header> -->