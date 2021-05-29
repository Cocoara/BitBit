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
    body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .content-wrapper, body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-footer, body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-header {
    transition: margin-left .3s ease-in-out;
    margin-left: 0px!important;
}
  </style>
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
          <a href="<?php echo site_url(''); ?>">
          <img class="mr-3" src="<?php echo base_url("assets/img/favicon.ico") ?>">
          </a>
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
              <a class="nav-link" href="<?php echo site_url('login') ?>"><img src="<?php echo base_url("assets/img/enter.png") ?>" style="width: 30px" /> Iniciar sessión</a>
            </li>
          </ul>



        

      </nav>



      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header" style="padding:0px">

