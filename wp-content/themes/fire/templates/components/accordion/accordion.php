<?php
  $section->add_classes([
    'py-10 md:py-20',
  ]);
?>

<?php $section->start(); ?>

<?php if( have_rows('accordion_items') ): $counter = 0;?>
  <div class="container" x-data="{ activeAccordion: 0 }">
    <?php while ( have_rows('accordion_items') ) : the_row();
      $title = get_sub_field('title');
      $content = get_sub_field('description');
      $color = get_sub_field('color');
      ?>
      <?php if($title && $content):?>
        <div class="flex flex-col items-start justify-start group">
          <button @click="activeAccordion = <?php echo $counter;?>" class="p-3  hover:opacity-75 <?php echo $color;?> heading-6 cursor-pointer z-10 flex gap-4 w-full text-left justify-between items-center <?php echo $color === 'bg-yellow' ? 'text-blue-2' : 'text-white';?>">
            <span><?php echo $title; ?></span>
            <div class="w-5 h-5 shrink-0 rounded-full bg-white relative transition-all duration-300 ease-in-out" :class="{'rotate-90': activeAccordion === <?php echo $counter; ?>}">
              <span class="w-4 h-0.5 absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 rotate-90 <?php echo $color;?>"></span>
              <span class="transition-all duration-300 ease-in-out w-4 h-0.5 absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 <?php echo $color;?>" :class="{'opacity-0': activeAccordion === <?php echo $counter; ?>}"></span>
              <span class="sr-only">Toggle Accordion</span>
            </div>
          </button>
          <div class="relative w-full overflow-hidden group-last:border-b <?php echo $color === 'bg-yellow' ? 'border-yellow' : '';?> <?php echo $color === 'bg-blue-2' ? 'border-blue-2' : '';?> <?php echo $color === 'bg-orange-2' ? 'border-orange-2' : '';?>" x-show="activeAccordion === <?php echo $counter; ?>" x-collapse>
            <div  class="p-6 w-full body-md wizzy">
              <?php echo $content; ?>
            </div>
          </div>
        </div>
      <?php endif; ?>

    <?php $counter++;
    endwhile;?>
  </div>
<?php endif; ?>

<?php $section->end(); ?>
