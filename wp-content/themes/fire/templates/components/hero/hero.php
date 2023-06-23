<?php
  $image = get_sub_field('image');
  $copy = get_sub_field('copy');

  $section->add_classes([
    ''
  ]);
?>

<?php $section->start(); ?>

  <?php if($image): ?>
    <?php new Fire_Picture($image['url'], $image['alt'], [[1920,null],[768,null],[480,null]], 'object-cover w-full h-full');?>
  <?php endif; ?>

  <?php if($copy) : ?>
    <?php print $copy; ?>
  <?php endif; ?>

<?php $section->end(); ?>
