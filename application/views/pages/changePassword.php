<!DOCTYPE html>
<html>

<head>
    <title>Cambio de contraseña</title>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/login.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>" />
</head>

<body>
    <div class="wrapper">
        <div class="containerLogin mt-5">
            <div class="col-left">
                <div class="login-text">
                    
                    <?php
                    if ($this->session->flashdata('error')) {
                    ?>
                        <div class="alert alert-danger mt-5">
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php } 
                    
                    unset($_SESSION['error']);
                    
                    ?>
                </div>
            </div>
            <div class="col-right">

                <div class="login-form">
                    <h2 class="ml-4">Actualizar cuenta</h2> 
                    <small class="ml-4">Completa los campos que quieras actualizar</small>
                    <form method="post" action="<?php echo base_url('updatePassword'); ?>">

                        <p>
                            <input type="text" name="first_name" placeholder="Primer nombre" >
                        </p>
                        <p>
                            <input type="text" name="last_name" placeholder="Apellido" >
                        </p>
                        <p>
                            <input type="number" maxlength="9" name="phone" placeholder="Teléfono" >
                        </p>
                        <p>
                            <input type="email" name="email" placeholder="email" >
                        </p>
                        <p>
                            <input type="password" name="password" placeholder="Contraseña" >
                        </p>
                        <p>
                            <input type="password" name="password_confirm" placeholder="Repite la contraseña" >
                        </p>
                        <p>
                            <input class="btn" type="submit" value="Cambiar" />
                        </p>

                    </form>
                   
                </div>
            </div>
        </div>

    </div>
  

</body>

</html>
<script>
    $().alert("close");

    $(".alert").delay(2000).slideUp(200, function() {
        $(this).alert('close');
    });
</script>