<?php
  $copy = get_sub_field('copy');
  $full_width = get_sub_field('full_width');
  $section->add_classes([
    'py-10 md:py-20'
  ]);
?>

<?php $section->start(); ?>

  <?php if($copy) : ?>
    <div class="wizzy container <?php echo $full_width ? '' : 'max-w-2xl lg:max-w-4xl';?>">
      <?php echo $copy; ?>
    </div>
  <?php endif; ?>

<?php $section->end(); ?>
