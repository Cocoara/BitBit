<div class="container container-flex" style="padding-top:30px">
    <?php foreach ($mensajes as $mensaje) { ?>
        <div class="card">
            <div class="card-header" id="deleteMensajeCard<?php echo $mensaje['id'] ?>">
                <a href="#" onclick="delete_mensaje('<?php echo $mensaje['id'] ?>')"><span class="badge badge-danger float-right">X</span></a>
                <h3><?php echo $mensaje['asunto'] ?></h3>
                <small><?php echo $mensaje['data'] ?> (Mensaje enviado por: <?php echo $mensaje['from'] ?>)</small>
            </div>
            <div class="card-body">
                <p class="card-text"><?php echo $mensaje['mensaje'] ?></p>
            </div>
        </div>
    <?php } ?>
</div>

<script>
    function delete_mensaje(id) {
        if (confirm('¿Quieres eliminar el Mensaje?')) {
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('Mensajes_controller/delete_mensaje/') ?>" + id,
                data: {
                    id: id,
                },
                success: function(data) {
                    console.log(id);
                    $('#deleteMensajeCard'+id).parent().remove();
                    return false;
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error deleting data');
                }
            });
        }
    }

</script>