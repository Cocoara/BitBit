<head>
    <title>Iniciar sesión</title>

</head>
<div class="container-fluid login-page">
    <div class="login-box">

        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body badge-dark">

                <p class="login-box-msg"><img style="width:60px;" src="<?php echo base_url("assets/img/enter.png") ?>" /></p>
                <p class="login-box-msg">Iniciar sesión para poder acceder a todas las funcionalidades</p>

                <form method="POST" action="<?php echo base_url("login") ?>">
                    <div class="input-group mb-3">
                        <input name="username" type="text" class="form-control" placeholder="Usuario" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="password" type="password" class="form-control" placeholder="Contraseña" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center">

                        <!-- /.col -->
                        <div class="col-6 text-center">
                            <input type="submit" class="btn btn-primary" class="form-control" value="Iniciar Sessión "></input>
                        </div>
                        <!-- /.col -->
                    </div>
                    <?php
                    if ($this->session->flashdata('error')) {
                    ?>
                        <div class="alert alert-danger mt-5">
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php }
                    unset($_SESSION['error']);
                    ?>
                </form>

                <p class="mb-0">
                    <a href="<?php echo site_url('register'); ?>" class="text-center text-warning">Registrar-me</a>
                </p>
            </div>

            <!-- /.login-card-body -->
        </div>
    </div>
</div>

</html>