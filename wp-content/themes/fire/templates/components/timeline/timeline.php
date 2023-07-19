<?php
  $heading = get_sub_field('heading');
  $tag = get_sub_field('tag');
  $style = get_sub_field('style') ? get_sub_field('style') : '';
  $section->add_classes([
    'py-10 md:py-20'
  ]);
?>

<?php $section->start(); ?>
<div x-data="timeline<?php echo $section->count;?>()">
  <?php if($heading): ?>
    <?php new Fire_Heading($tag, $heading, $style.' text-center text-blue-2 mb-12') ?>
  <?php endif; ?>

  <div class="flex flex-nowrap overflow-x-scroll pb-3 hide-scroll-bar h-full items-stretch" x-ref="slides" @resize.window="init()">
    <?php if( have_rows('timeline_events') ):?>
      <?php while ( have_rows('timeline_events') ) : the_row();
        $year = get_sub_field('year');
        $title = get_sub_field('title');
        $copy = get_sub_field('copy');?>
        <div class="slide mx-4 flex h-full first:md:ml-20 last:md:mr-20 shrink-0 rounded-md odd:bg-blue-2 even:bg-orange-2">
          <div class="py-8 px-6 w-full max-w-md">
            <h3 class="kicker text-white text-[14px] md:text-[18px] mb-1"><?php echo $year;?></h3>
            <p class="heading-4 mb-3 text-white"><?php echo $title;?></p>
            <div class="wizzy text-white text-[16px]"><?php echo $copy;?></div>
          </div>
        </div>
      <?php endwhile;?>
    <?php endif; ?>
  </div>
  <script>
    function timeline<?php echo $section->count;?>(){
      return {
        init(){
          const slides = document.querySelectorAll('[x-ref="slides"] .slide');
          // make all slides the same height as the tallest slide
          let maxHeight = 0;
          slides.forEach(slide => {
            if(slide.offsetHeight > maxHeight){
              maxHeight = slide.offsetHeight;
            }
          });
          slides.forEach(slide => {
            slide.style.height = maxHeight+'px';
          });
        }
      }
    }
  </script>

</div>

<?php $section->end(); ?>
