<head>
    <title>Cambio de contraseña</title>
    <style>
        .content-wrapper {
    background-color: #E9ECEF!important;
}
        </style>
</head>
<div class="container-fluid register-page">
    <div class="register-box">
        <!-- <div class="register-logo">
                <a href="../../index2.html"><b>Admin</b>LTE</a>
            </div> -->

        <div class="card ">
            <div class="card-body register-card-body">
                <h3>Mensajería</h3>
                <div class="col-right">
                    <form method="post" action="<?php echo base_url('setMensajeByClient'); ?>">

                        <input type="text" hidden value="<?php echo $user->username; ?>" name="from">
                        <div class="input-group mb-3">

                            <label for="to" class="form-control">Para:</label>

                            <select name="to" class="form-control" id="to">
                                <?php foreach ($users as $user) { ?>
                                    <option value="<?php echo $user['id'] ?>"><?php echo $user['username'] ?></option>
                                <?php } ?>

                            </select>

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" name="asunto" class="form-control" required placeholder="Asunto">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class=""></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <textarea name="mensaje" rows="6" class="form-control" required placeholder="Mensaje"></textarea>
                        </div>



                        <div class="row text-center">


                            <div class="col-6 text-center">
                                <input type="submit" class="btn btn-primary" class="form-control" value="Enviar mensaje"></input>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
        <?php
        if ($this->session->flashdata('success')) {
        ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php }
        unset($_SESSION['success']);
        ?>
    </div>

</div>

<div class="container container-flex">
<?php foreach ($mensajes as $mensaje) {?>
    <div class="card">
  <div class="card-header" id="deleteMensaje">
  <a href="#" onclick="delete_mensaje('<?php echo $mensaje['id'] ?>')"><span class="badge badge-danger float-right">X</span></a>
    <h3><?php  echo $mensaje['asunto']?></h3>
    <small><?php echo $mensaje['data']?> (Mensaje enviado por: <?php echo $mensaje['from']?>)</small>
  </div>
  <div class="card-body">
    <p class="card-text"><?php  echo $mensaje['mensaje']?></p>
  </div>
</div>
<?php } ?>
</div>

<script>
    function delete_mensaje(id) {
        if (confirm('¿Quieres eliminar el Mensaje?')) {
            console.log(id);
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('Mensajes_controller/delete_mensaje/') ?>" + id,
                data: {
                    id: id,
                },
                // dataType: "JSON",
                success: function(data) {},
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error deleting data');
                }
            });
        }
    }

    $(document).ready(function() {
        $('#deleteMensaje').click(function() {
            $(this).parent().remove();
            return false;
        });

    });
</script>