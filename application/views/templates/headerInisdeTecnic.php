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

  <style>

.secondnav {
    margin-top: 70px;
}

  </style>
  <title>Tecnic</title>
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
        </ul>
        <span class="text text-white mr-5"><img src="<?php echo base_url("assets/img/user.png") ?>" /> <?php echo $user->first_name; ?> </span>
        <a type="button" href="<?php echo site_url('logout') ?>" class="btn btn-danger mr-3 ">Cerrar sesión</a>

      </div>
    </nav>




    <nav class="navbar navbar-expand-lg fixed-top secondnav bg-dark bg-dark">
   
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a type="button" href="<?php echo site_url('adminUsuarios') ?>" class="btn btn-outline-warning mr-3">Usuarios</a>
          </li>
        
          <li class="nav-item ">
            <a type="button" href="<?php echo site_url('user_groups') ?>" class="btn btn-outline-warning mr-3">Grupos de usuarios</a>
          </li>
        
          <li class="nav-item ">
            <a type="button" href="<?php echo site_url('groups') ?>" class="btn btn-outline-warning mr-3">Grupos</a>
          </li>
        
          <li class="nav-item ">
            <a type="button" href="<?php echo site_url('incidencia') ?>" class="btn btn-outline-warning mr-3">Incidencias</a>
          </li>
      
          <li class="nav-item ">
            <a type="button" href="<?php echo site_url('infocontacto') ?>" class="btn btn-outline-warning mr-3">Información del contacto</a>
          </li>

          <li class="nav-item ">
            <a type="button" href="<?php echo site_url('mail') ?>" class="btn btn-outline-warning mr-3">Correos</a>
          </li>

          <li class="nav-item ">
            <a type="button" href="<?php echo site_url('material') ?>" class="btn btn-outline-warning mr-3">Material</a>
          </li>




        </ul>
      </div>

    </nav>
  </header>