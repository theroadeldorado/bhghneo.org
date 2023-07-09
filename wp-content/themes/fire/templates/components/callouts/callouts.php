<?php
  $callout_count = get_sub_field('callouts') ? count(get_sub_field('callouts')) : 0;
  $link = get_sub_field('link');
  $section->add_classes([
    'py-10 bg-orange-2'
  ]);
?>

<?php $section->start(); ?>
  <?php if( have_rows('callouts') ):?>
    <div class="grid md:gap-6 container <?php echo $callout_count === 3 ? 'md:grid-cols-3' : '';?> <?php echo $callout_count === 2 ? 'md:grid-cols-2' : '';?> <?php echo $callout_count === 1 ? 'md:grid-cols-1' : '';?>">
      <?php while ( have_rows('callouts') ) : the_row();
        $icon = get_sub_field('icon');
        $title = get_sub_field('title');
        $description = get_sub_field('description');
        $link_card = get_sub_field('link_card');
        ?>
        <?php if($link_card):?>
          <a class="w-full flex flex-col h-full lg:flex-1 no-underline hover:no-underline group" href="<?php echo $link_card['url'];?>" target="<?php echo $link_card['target'];?>">
        <?php else:?>
          <div class="w-full flex flex-col h-full lg:flex-1">
        <?php endif;?>

          <span class="flex items-center justify-center w-20 h-20 p-5 mx-auto bg-white duration-300 ease-out transition group-hover:scale-105 rounded-full relative z-[1] border-orange-2 border-2">
           <?php new Fire_Picture($icon['url'], $icon['alt'], [[80,null],[80,null],[80,null]], 'w-full object-contain');?>
          </span>
          <div class="bg-white group-hover:scale-105 group-hover:bg-gray-200 duration-300 ease-out transition grow rounded-md px-4 text-center pt-14 pb-7 -translate-y-10">
            <?php if($title):?>
              <h3 class="mb-3 heading-6  text-blue-2"><?php echo $title;?></h3>
            <?php endif;?>
            <?php if($description):?>
              <div class="text-blue-2 px-2"><?php echo $description;?></div>
            <?php endif;?>
          </div>
        <?php if($link_card):?>
          </a>
        <?php else:?>
          </div>
        <?php endif;?>
      <?php endwhile;?>
    </div>
  <?php endif; ?>
  <?php if($link):?>
    <div class="container">
      <div class="mx-auto flex items-center justify-center">
        <a class="button-white-outline shrink-0" href="<?php echo $link['url'];?>" target="<?php echo $link['target'];?>"><?php echo $link['title'];?></a>
      </div>
    </div>
  <?php endif;?>
<?php $section->end(); ?>
