<?php
  $heading = get_sub_field('heading');
  $tag = get_sub_field('tag');
  $style = get_sub_field('style') ? get_sub_field('style') : '';
  $section->add_classes([
    'py-10 md:py-20'
  ]);
?>

<?php $section->start(); ?>
<div>
  <?php if($heading): ?>
    <?php new Fire_Heading($tag, $heading, $style.' text-center mb-12') ?>
  <?php endif; ?>

  <div class="flex flex-nowrap overflow-x-scroll pb-4 hide-scroll-bar">

    <?php if( have_rows('timeline_events') ):?>
      <?php while ( have_rows('timeline_events') ) : the_row();
        $year = get_sub_field('year');
        $title = get_sub_field('title');
        $copy = get_sub_field('copy');?>

        <div class="block px-4 first:md:pl-20 last:md:pr-20 shrink-0">
          <div class="py-8 px-6 w-full max-w-xs overflow-hidden rounded-md bg-orange-2">
            <h3 class="kicker text-white text-[14px] md:text-[18px] mb-1"><?php echo $year;?></h3>
            <p class="heading-4 mb-3 text-white"><?php echo $title;?></p>
            <div class="wizzy text-white text-[16px]"><?php echo $copy;?></div>
          </div>
        </div>
      <?php endwhile;?>
    <?php endif; ?>

  </div>
</div>

<?php $section->end(); ?>
