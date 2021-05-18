<?php 
  foreach ($css_files as $file) : ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
  <?php endforeach; ?>
<?php foreach($js_files as $file): ?>
 
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

<style>
  .margenes{
    margin-left: 10px;
    margin-right: 10px;
  }
</style>

<div class="margenes">

<?php 
echo $output; 
?>

</div>


