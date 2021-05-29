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
                <p class="login-box-msg ">Contactanos</p>
                <div class="col-right">
                    <small class="ml-4">Contacta con nosotros y resolveremos sus dudas</small>
                    <form method="post" action="<?php echo base_url('contactanosPeticion'); ?>">

                        <div class="input-group mb-3">
                            <input type="text" name="first_name" class="form-control" required placeholder="Primer nombre">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" name="last_name" class="form-control" required placeholder="Apellido">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="number" maxlength="9" class="form-control" required name="phone" placeholder="Teléfono">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-phone"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control" required placeholder="email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">

                            <label for="tipo" class="form-control">Tema:</label>

                            <select name="tipo" class="form-control" id="tipo">
                                <?php foreach($tipoConsulta as $estado){?>
                                    <option value="<?php echo $estado['id']?>"><?php echo $estado['tipoConsulta'] ?></option>
                                <?php }?>
                                
                            </select>

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>


                        <div class="input-group mb-3">
                            <textarea name="mensaje" rows="6" class="form-control" required placeholder="Mensaje"></textarea>
                        </div>



                        <div class="row text-center">


                            <div class="col-6 text-center">
                                <input type="submit" class="btn btn-primary" class="form-control" value="Enviar petición"></input>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
            
            <?php
                    if ($this->session->flashdata('success')) {
                    ?>
                        <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php }
                    unset($_SESSION['success']);
                    ?>
        </div>
    </div>
</div>