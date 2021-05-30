<head>
    <title>Cambio de contraseña</title>
</head>

<div class="container-fluid register-page">
    <div class="register-box">
        <!-- <div class="register-logo">
                <a href="../../index2.html"><b>Admin</b>LTE</a>
            </div> -->

        <div class="card ">
            <div class="card-body register-card-body">
                <h1 class="login-box-msg ">Actualizar datos</h1>
                <div class="col-right">
                    <p>Completa los campos que quieras actualizar</p>
                    <form method="post" action="<?php echo base_url('updatePassword'); ?>">

                        <legend>Nombre
                            <div class="input-group mb-3">
                                <input type="text" name="first_name" class="form-control" placeholder="<?php echo $user->first_name; ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                        </legend>

                        <legend>Apellido
                            <div class="input-group mb-3">
                                <input type="text" name="last_name" class="form-control" placeholder="<?php echo $user->last_name; ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                        </legend>

                        <legend>Número
                        <div class="input-group mb-3">
                            <input type="number" maxlength="9" class="form-control" name="phone" placeholder="<?php echo $user->phone; ?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-phone"></span>
                                </div>
                            </div>
                        </div>
                        </legend>

                        <legend>Email
                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="<?php echo $user->email; ?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        </legend>

                        <legend>Contraseña
                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        </legend>

                        <legend>Repite la contraseña
                        <div class="input-group mb-3">
                            <input type="password" name="password_confirm" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        </legend>
                        <div class="row text-center">


                            <div class="col-6 text-center">
                                <input type="submit" class="btn btn-primary" class="form-control" value="Actualizar datos "></input>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>