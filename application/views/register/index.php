<!DOCTYPE html>
<html>

<head>
    <title>Regístrate</title>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/login.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>" />
</head>

<body>
    <div class="wrapper">
        <div class="containerLogin mt-5">
            <div class="col-left">
                <div class="login-text">
                    <h2>Registrar-se</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget eros dapibus, ultricies tellus vitae, consectetur tortor. Etiam rutrum placerat
                    </p>
                    <a class="btn btn-outline-info" href="">Leer más</a>
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
                    <h2 class="ml-4">Regístrate</h2>
                    <form method="post" action="<?php echo base_url('create_user'); ?>">
                        <p>
                            Campos requeridos (*)
                        </p>
                        <p>
                            <input type="text" name="username" placeholder="Usuario*" required>
                        </p>
                        <p>
                            <input type="text" name="last_name" placeholder="Apellido*" required>
                        </p>
                        <p>
                            <input type="email" name="email" placeholder="Correo electrónico*" required>
                        </p>
                        <p>
                            <input type="text" name="phone" placeholder="Teléfono">
                        </p>
                        <p>
                            <input type="password" name="password" placeholder="Contraseña*" required>
                        </p>
                        <p>
                            <input type="password" name="password_confirm" placeholder="Repite la contraseña*" required>
                        </p>
                        <p>
                            <label for="aceptar">Acepto</label>
                            <input type="checkbox" class="checkbox" id="aceptar" required>
                        </p>
                        <p>
                            <input class="btn" type="submit" value="Sing In" />
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