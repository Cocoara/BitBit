<!DOCTYPE html>
<html>

<head>
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/login.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>" />
</head>

<body>

    <div class="wrapper">
        <div class="containerLogin">
            <div class="col-left">
                <div class="login-text">
                    <img style="width:60px;" class="mb-5" src="<?php echo base_url("assets/img/login.png") ?>" />
                    <br>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget eros dapibus, ultricies tellus vitae, consectetur tortor. Etiam rutrum placerat
                    </p>
                    <a class="btn btn-outline-info" href="<?php echo site_url('register'); ?>">Regístrate</a>

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
                    <h2 class="ml-4">Iniciar sesión</h2>
                    <form method="POST" action="<?php echo base_url("login") ?>">
                        <p>
                            <input name="username" type="text" placeholder="Usuario" required>
                        </p>
                        <p>
                            <input name="password" type="password" placeholder="Contraseña" required>
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