<?php
  $kicker = get_sub_field('kicker');
  $copy = get_sub_field('copy');
  $heading = get_sub_field('heading');
  $image = get_sub_field('image');
  $video = get_sub_field('video');
  $tag = get_sub_field('tag');
  $style = get_sub_field('style') ? get_sub_field('style') : '';
  $style .= ' mt-2 mb-4';


  $section->add_classes([
    'relative py-20 md:py-40 bg-orange-2 flex items-center justify-center',
    $video ? 'min-h-[400px] md:min-h-[500px] xl:min-h-[600px]':'',

  ]);
?>

<?php $section->start(); ?>

  <?php if($image && !$video): ?>
    <?php new Fire_Picture($image['url'], $image['alt'], [[1920,null],[768,null],[480,null]], 'object-cover w-full opacity-50 h-full absolute inset-0');?>
  <?php endif; ?>
  <?php if($video): ?>
    <video
      class="absolute inset-0 object-cover w-full h-full opacity-50"
      allowfullscreen="true"
      muted="muted"
      autoplay="autoplay"
      playsinline="playsinline"
      loop="loop"
    >
      <source src="<?php echo $video['url']; ?>" type="video/mp4">
    </video>
  <?php endif; ?>

  <div class="container relative z-[2] text-white">
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
          $button = get_sub_field('button');?>
          <?php if($button):?>
            <a href="<?php echo $button['url'];?>" target="<?php echo $button['target'];?>" class="button-white-outline"><?php echo $button['title'];?></a>
          <?php endif;?>
        <?php endwhile;?>
      <?php endif; ?>
    </div>
  </div>

<?php $section->end(); ?>
