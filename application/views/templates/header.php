<html>

<head>
  <link rel="icon" href="<?php echo base_url("assets/img/favicon.ico") ?>" />



  <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-3.5.1.js"); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
  <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
  <link rel="stylesheet" href="<?php echo base_url("assets/css/neoumorphism.css"); ?>" />
  <link rel="stylesheet" href="<?php echo base_url("assets/css/css.css"); ?>" />
  <link rel="stylesheet" href="<?php echo base_url("assets/css/all.css"); ?>" />
  <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>" />
  <link rel="stylesheet" href="<?php echo base_url("assets/css/owl.theme.default.min.css"); ?>" />
  <link rel="stylesheet" href="<?php echo base_url("assets/css/owl.carrousel.min.css"); ?>" />
  <link rel="stylesheet" href="<?php echo base_url("assets/css/ionicons.min.css"); ?>" />
</head>

<body>


  <header>
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
  </header>


  <!-- <nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-fixed-top">
                <a href="<?php echo site_url('Home/index') ?>" class="navbar-brand">Intranet</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse float-right" id="navbarCollapse">
                        <div class="navbar-nav ml-auto"><a href="<?php echo site_url('Login_controller/index') ?>"><button class="btn btn-light">Login</button></a> &nbsp; <a href="<?php echo site_url('Register_controller/index') ?>"><button class="btn btn-light">Register</button></a></div>
                </div>
        </nav> -->
  <!-- final del header.php -->