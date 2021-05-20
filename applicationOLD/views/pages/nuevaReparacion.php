<!DOCTYPE html>
<html>

<head>
    <title>Nueva reparación</title>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/login.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>" />
</head>

<body>
<div class="wrapper">
        <div class="containerLogin">
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
                    <h2 class="ml-4">Incidencias</h2>
                    <form method="POST" action="<?php echo base_url("anadirnuevareparacion") ?>">
                        <p>
                            <input class="form-control" name="uuid" type="textarea" placeholder="UUID" required/>
                        </p>
                        <p>
                            <input class="btn" type="submit" value="Hacer seguimiento" />
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