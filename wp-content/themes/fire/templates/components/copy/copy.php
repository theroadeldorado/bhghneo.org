<?php
  $copy = get_sub_field('copy');
  $section->add_classes([
    'py-10 md:py-20'
  ]);
?>

<?php $section->start(); ?>

  <?php if($copy) : ?>
    <div class="wizzy container max-w-xl lg:max-w-3xl">
      <?php echo $copy; ?>
    </div>
  <?php endif; ?>

<?php $section->end(); ?>
