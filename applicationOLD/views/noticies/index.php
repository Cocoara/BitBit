<?php
if ($this->session->flashdata('success')) {
?>
    <div class="alert alert-success">
        <?php echo $this->session->flashdata('success'); ?>
    </div>
<?php } ?>

<?php
if ($this->session->flashdata('successDelete')) {
?>
    <div class="alert alert-success">
        <?php echo $this->session->flashdata('successDelete'); ?>
    </div>
<?php } ?>




<div class="container">
    <?php foreach ($noticies as $noticies_item) : ?>
        <div class="cards">
            <div class="card-item">

                <div class="btn-group">
                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opcions</button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <form class="formButtonHidden" method="POST" action="<?php echo site_url('noticies_controller/edit/' . $noticies_item['id']) ?>">
                            <input hidden type="text" name="title" value="<?php echo $noticies_item['title'] ?>">
                            <input hidden type="text" name="subtitle" value="<?php echo $noticies_item['subtitle'] ?>">
                            <input hidden type="text" name="content" value="<?php echo $noticies_item['content'] ?>">
                            <input hidden type="date" name="data" value="<?php echo $noticies_item['data'] ?>">
                            <button type="submit" class="dropdown-item"><span class="iconsEdit"><i class="far fa-edit"></i></span></button>
                        </form>

                        <a href="<?php echo site_url('noticies_controller/delete/' . $noticies_item['id']) ?>"><button class="dropdown-item" type="button"><span class="iconsDelete"><i class="fas fa-times"></i></span></button></a>
                    </div>
                </div>

                <div class="card-info">
                    <h2 class="card-title"><?php echo $noticies_item['title'] ?></h2>
                    <small><?php echo $noticies_item['subtitle'] ?></small>
                    <p><?php echo $noticies_item['content'] ?></p>
                    <small><?php echo $noticies_item['data'] ?></small>
                </div>

                <div class="card-info">
                    <a href="<?php echo site_url('Pdf_controller/index/'. $noticies_item['id']) ?>" >
                    <div class="flip-box">
                        <div class="flip-box-inner">
                            <div class="flip-box-front">
                            <img  style="width:48px" src="http://localhost/intranetCMS/assets/img/pdf.png" />
                            </div>
                            <div class="flip-box-back">
                            <img  style="width:48px" src="http://localhost/intranetCMS/assets/img/pdf.png" />
                            </div>
                        </div>
                    </div>
                    </a>
                </div>

            </div>
        </div>
    <?php endforeach; ?>
</div>

<div>
    <a href="<?php echo site_url('Noticies_controller/create') ?>"><span class="iconsYear"><i class="fas fa-plus"></i></span></a>
</div>

<div class="container">

</div>




<script type="text/javascript" xml="space">
    $().alert("close");

    $(".alert").delay(2000).slideUp(200, function() {
        $(this).alert('close');
    });
</script>