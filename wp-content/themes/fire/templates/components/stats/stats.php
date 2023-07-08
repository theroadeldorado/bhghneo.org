<?php
  $section->add_classes([
    'py-10 bg-orange-2'
  ]);
?>

<?php $section->start(); ?>
  <?php if( have_rows('stats') ):?>
    <div class="container flex flex-wrap">
      <?php while ( have_rows('stats') ) : the_row();
        $icon = get_sub_field('icon');
        $stat = get_sub_field('stat');
        $description = get_sub_field('description');?>
        <div class="w-full px-4 mb-4 text-center lg:w-1/3 lg:mb-0">
          <span class="flex items-center justify-center w-20 h-20 mb-3 p-5 mx-auto bg-white rounded-full">
           <?php new Fire_Picture($icon['url'], $icon['alt'], [[80,null],[80,null],[80,null]], 'w-full object-contain');?>
          </span>
          <?php if($stat):?>
            <h3 class="mb-3 text-xl font-bold text-white md:text-5xl font-heading"><?php echo $stat;?></h3>
          <?php endif;?>
          <?php if($description):?>
            <p class="max-w-md mx-auto text-lg text-white lg:px-12 balance-text"><?php echo $description;?></p>
          <?php endif;?>
        </div>
      <?php endwhile;?>
    </div>
  <?php endif; ?>
<?php $section->end(); ?>