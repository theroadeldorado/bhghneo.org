<?php
  $kicker = get_sub_field('kicker');
  $copy = get_sub_field('copy');
  $heading = get_sub_field('heading');
  $tag = get_sub_field('tag');
  $style = get_sub_field('style') ? get_sub_field('style') : '';
  $style .= ' mt-2 mb-4 text-blue-2';

  $section->add_classes([
    'py-10 md:py-20'
  ]);
?>

<?php $section->start(); ?>

  <div class="container">
    <div class="max-w-xl mx-auto text-center lg:max-w-3xl">
      <?php if($kicker): ?>
        <p class="kicker"><?php echo $kicker;?></p>
      <?php endif; ?>
      <?php if($heading): ?>
        <?php new Fire_Heading($tag, $heading, $style) ?>
      <?php endif; ?>
      <?php if($copy): ?>
        <div class="body-lg mb-8">
          <?php echo $copy;?>
        </div>
      <?php endif; ?>

      <?php if( have_rows('buttons') ):?>
        <div class="flex flex-wrap justify-center gap-5">
        <?php while ( have_rows('buttons') ) : the_row();
          $button = get_sub_field('button');
          $button_type = get_sub_field('button_type');?>
          <?php if($button):?>
            <a href="<?php echo $button['url'];?>" target="<?php echo $button['target'];?>" class="<?php echo $button_type;?>"><?php echo $button['title'];?></a>
          <?php endif;?>
        <?php endwhile;?>
      <?php endif; ?>
    </div>
  </div>

<?php $section->end(); ?>
