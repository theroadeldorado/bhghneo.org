<?php
  $kicker = get_sub_field('kicker');
  $copy = get_sub_field('copy');
  $heading = get_sub_field('heading');
  $tag = get_sub_field('tag');
  $style = get_sub_field('style') ? get_sub_field('style') : '';
  $style .= ' mt-2 mb-4 text-blue-2';

  $section->add_classes([
    'py-20'
  ]);
?>

<?php $section->start(); ?>

  <div class="container px-4 mx-auto">
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
        <?php while ( have_rows('buttons') ) : the_row();
          $button = get_sub_field('button');
          $button_type = get_sub_field('button_type');?>
          <?php if($button):?>
            <a href="<?php echo $button['url'];?>" target="<?php echo $button['target'];?>" class="<?php echo $button_type;?>"><?php echo $button['title'];?></a>
          <?php endif;?>
        <?php endwhile;?>
      <?php endif; ?>

      <div><a class="block px-5 py-3 mb-3 text-sm font-semibold text-white transition duration-200 bg-[#F36917] border border-[#F36917] rounded md:inline-block md:mr-3 md:mb-0 hover:bg-[#09395B] hover:border-[#09395B]" href="#">Donate</a><a class="block px-5 py-3 text-sm font-semibold text-[#F36917] transition duration-200 border border-[#F36917] rounded md:inline-block hover:text-white hover:bg-[#F36917] hover:border-[#09395B]" href="#">Events</a></div>
    </div>
  </div>

<?php $section->end(); ?>
