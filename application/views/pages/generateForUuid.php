<head>
    <title>Generar ficha </title>
</head>

<div class="container-fluid register-page">
    <div class="register-box">

        <div class="card ">
            <div class="card-body register-card-body">
                <p class="login-box-msg ">Generar ficha de averia a partir de un UUID</p>
                <div class="col-right">
                    <!-- <small class="ml-4">Contacta con nosotros y resolveremos sus dudas</small> -->
                    <form method="post" action="<?php echo base_url('fichaUUID'); ?>">
                    
                    <input hidden type="text" name="id_usuari" value="<?php echo $user->id; ?>">
                        <div class="input-group mb-3">
                            <input type="text" name="uuid" class="form-control" required placeholder="UUID">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <img src="<?php echo base_url("assets/img/pdf.png") ?>" width="20">
                                </div>
                            </div>
                        </div>

                     

                        <div class="row text-center">


                            <div class="col-6 text-center">
                                <input type="submit" class="btn btn-primary" class="form-control" value="Generar ficha"></input>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>

        <?php
                    if ($this->session->flashdata('error')) {
                    ?>
                        <div class="alert alert-danger ">
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php }
                    unset($_SESSION['error']);
                    ?>
    </div>
</div>