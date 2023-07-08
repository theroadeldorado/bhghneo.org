<?php
  $copy = get_sub_field('copy');
  $image = get_sub_field('image');
  $image_on_right = get_sub_field('image_on_right');

  $section->add_classes([
    'py-10 md:py-20'
  ]);
?>

<?php $section->start(); ?>

  <div class="container">
    <div class="grid md:grid-cols-2 gap-10 md:gap-20">
      <div class="row-start-1 md:row-start-1 <?php echo $image_on_right ? 'md:col-start-2' : 'md:col-start-1';?>">
        <?php if($image): ?>
          <div class="h-full w-full overflow-hidden rounded-md relative ">
            <?php new Fire_Picture($image['url'], $image['alt'], [[900,600],[900,600],[900,600]], 'object-cover w-full h-full absolute inset-0');?>
          </div>
        <?php endif; ?>
      </div>
      <?php if($copy) : ?>
        <div class="row-start-2 mb-12 md:mb-0 md:row-start-1 <?php echo $image_on_right ? 'md:col-start-1' : 'md:col-start-2';?>">
          <div class="lg:max-w-md mx-auto wizzy py-10">
            <?php echo $copy; ?>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
<?php $section->end(); ?>
