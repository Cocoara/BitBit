
<?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
 
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
 
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<style>
    .mt100{
        margin-top:150px;
    }

    .mt50{
        margin-top:50px;
        margin-bottom:50px;

    }
    
</style>

<div class="container-fluid mt100">    
<?php 
echo $output; 
?>
<a  href="<?php echo base_url(''); ?>"><button class="btn btn-primary mt50">Volver al menú principal</button></a>
</div>
