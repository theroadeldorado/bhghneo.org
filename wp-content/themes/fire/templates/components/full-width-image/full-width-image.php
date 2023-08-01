<?php
  $image = get_sub_field('image');
  $scroll = get_sub_field('scroll');
  $classes = $scroll ? 'mx-auto w-auto min-w-full max-w-[120vw] min-h-[200px] md:min-h-[300px] lg:min-h-[800px]' : 'w-full h-auto rounded-md overflow-hidden';
  $section->add_classes([
    ''
  ]);
?>

<?php $section->start(); ?>
  <?php if($image):?>
    <div class="py-5 md:py-10">
      <div class="<?php echo $scroll ? 'flex items-start pb-4 overflow-scroll' : 'container';?>">
        <?php new Fire_Picture($image['url'], $image['alt'], [[2000,null],[1200,null],[1000,null]], $classes );?>
      </div>
    </div>
  <?php endif;?>
<?php $section->end(); ?>
