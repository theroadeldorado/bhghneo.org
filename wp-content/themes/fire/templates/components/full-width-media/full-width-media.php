<?php
  $image = get_sub_field('image');

  $section->add_classes([
    ''
  ]);
?>

<?php $section->start(); ?>
  <?php if($image):?>
    <div class="container py-10 md:py-20">
      <?php new Fire_Picture($image['url'], $image['alt'], [[2000,null],[900,null],[800,null]], 'w-full h-auto');?>
    </div>
  <?php endif;?>
<?php $section->end(); ?>
