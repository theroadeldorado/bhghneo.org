<?php
  $title = get_sub_field('title');
  $link = get_sub_field('link');
  $color = get_sub_field('color');
  $section->add_classes([
    $color
  ]);
?>

<?php $section->start(); ?>

  <?php if($title) : ?>
    <div class="container">
      <div class="mx-auto flex flex-col text-center md:text-left justify-center md:flex-row items-center md:justify-between gap-5 md:gap-10 max-w-2xl lg:max-w-5xl rounded-md p-5">
        <h3 class="heading-4 text-white"><?php echo $title; ?></h3>
        <?php if($link):?>
          <a class="button-white-outline shrink-0" href="<?php echo $link['url'];?>" target="<?php echo $link['target'];?>"><?php echo $link['title'];?></a>
        <?php endif;?>
      </div>
    </div>
  <?php endif; ?>

<?php $section->end(); ?>
