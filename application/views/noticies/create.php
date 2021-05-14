<?php echo validation_errors(); ?>
<span><?php echo $msg; ?></span>

<?php echo form_open('Noticies_controller/create'); ?>
<div class="form-group">

    <input type="text" hidden id="id" value="0">
    <input type="text" hidden id="data" value="0">
    <input type="text" hidden id="title" value="0">
    <input type="text" hidden id="subtitle" value="0">
    <input type="text" hidden id="content" value="0">

    <div class="container">
        <div class="cards">
            <div class="card-item">

                <div class="card-info">
                    <h2 class="card-title"><input class="form-control" value="<?php echo set_value('title'); ?>" placeholder="Titol" name="title" /></h2>
                    <small><input class="form-control" value="<?php echo set_value('subtitle'); ?>" placeholder="Subtitol" name="subtitle" style="margin-bottom:5px" /></small>
                    <p><input class="form-control" value="<?php echo set_value('content'); ?>" placeholder="Contigut" name="content" /></p>
                    <small><input class="form-control" value="<?php echo set_value('data'); ?>" placeholder="Data" name="data" /></small>
                </div>

            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-success">Crear</button>
</div>
</form>



<script>
    $().alert("close");

    $(".alert").delay(4000).slideUp(200, function() {
        $(this).alert('close');
    });
</script>