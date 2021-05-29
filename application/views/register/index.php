<!DOCTYPE html>
<html>

<head>
    <title>Regístrate</title>
</head>

<body>
    <div class="container-fluid register-page">
        <div class="register-box">
            <!-- <div class="register-logo">
                <a href="../../index2.html"><b>Admin</b>LTE</a>
            </div> -->

            <div class="card ">
                <div class="card-body register-card-body">
                    <p class="login-box-msg ">Registrar-se</p>

                    <form method="post" action="<?php echo base_url('create_user'); ?>">
                        <div class="input-group mb-3">
                            <input type="text" name="username" value="<?php echo set_value('username'); ?>" class="form-control" placeholder="Usuario*" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="last_name" value="<?php echo set_value('last_name'); ?>" class="form-control" placeholder="Apellido*" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control" placeholder="Correo electrónico*" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="phone" value="<?php echo set_value('phone'); ?>" class="form-control" placeholder="Teléfono">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-phone"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Contraseña*" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" name="password_confirm" class="form-control" placeholder="Repite la contraseña*" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="switch1">
                                    <label class="custom-control-label"  id="switch1Label" for="switch1"> He leído los <a data-toggle="modal" data-target="#exampleModal" href="#">términos</a></label>
                                </div>
                            </div>


                            <!-- /.col -->
                            <div class="col-12 text-center mt-3">
                                <input class="btn btn-primary " type="submit" class="form-control" value="Registrar-se" />
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    <a href="<?php echo site_url('login') ?>" class="text-center">Ya tengo una cuenta</a>
                </div>

            </div>



            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Política de privacidad</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            BITBIT, S.L., como Responsable del Tratamiento, le informa que, según lo dispuesto en el Reglamento (UE) 2016/679, de 27 de abril, (RGPD) y en la L.O. 3/2018, de 5 de diciembre, de protección de datos y garantía de los derechos digitales (LOPDGDD), trataremos su datos tal y como reflejamos en la presente Política de Privacidad.

                            En esta Política de Privacidad describimos cómo recogemos sus datos personales y por qué los recogemos, qué hacemos con ellos, con quién los compartimos, cómo los protegemos y sus opciones en cuanto al tratamiento de sus datos personales.

                            Esta Política se aplica al tratamiento de sus datos personales recogidos por la empresa para la prestación de sus servicios. Si acepta las medidas de esta Política, acepta que tratemos sus datos personales como se define en esta Política.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


            <?php
            if ($this->session->flashdata('error')) {
            ?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php }

            unset($_SESSION['error']);

            ?>
        </div>
    </div>
    <script type="text/javascript">
        $('form').submit(function() {
            if (document.getElementById('switch1').checked) {
                return true;
            } else {
                $("#switch1Label").after('<p style="color: #aa2828;">Lea los términos antes de continuar</p>');
                return false;
            }
            
        });
    </script>