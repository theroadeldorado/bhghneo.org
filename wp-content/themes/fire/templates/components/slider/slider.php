<?php
  $images = get_sub_field('gallery');
  $section->add_classes([
    'py-10 md:py-20'
  ]);
  $index = 1;
  $total = 0;

  if ($images) :
    $total = count($images);
  endif;
?>

<?php $section->start(); ?>
<div class="container">
  <div x-data="imageSlideshow<?php echo $section->count;?>()">
    <div id="image-slideshow-<?php echo $section->count;?>-arialive" class="sr-only" aria-live="polite">
      <?php _e('Slide ', 'fire'); ?><span x-text="current"></span><?php _e(' of ', 'fire'); ?><span x-text="total"></span>
    </div>

    <?php if ($images) : ?>
      <div class="relative grid grid-cols-1 grid-rows-1 bg-black">
        <?php foreach ($images as $image) : ?>
          <div :id="'image-slideshow-<?php echo $section->count;?>-' + current" class="col-span-1 col-start-1 row-span-1 row-start-1 transition-opacity duration-500 ease-in-out" :class="current == <?php echo $index; ?> ? 'opacity-100' : 'opacity-0 pointer-events-none'" :aria-current="current == <?php echo $index; ?> ? 'true' : 'false'" x-ref="slide<?php echo $index; ?>">
            <?php new Fire_Picture($image['url'], $image['alt'], [[1400, 700], [700, 350], [600, 300]], 'object-cover w-full h-full', false); ?>
          </div>
        <?php $index++;
        endforeach; ?>
      </div>

      <!-- Num Nav w/ Arrows -->
      <div class="flex justify-center">
        <div class="flex md:items-center gap-5 px-4 md:px-8 xl:px-[72px] relative top-[-2px] md:top-0 my-5">
          <button type="button" @click="prev()" class="flex items-center justify-center w-6 h-6 text-blue-2 rotate-180 hover:text-orange-2 focus-visible:text-black relative top-[2px]" @keyup.enter="focusSlide($event, current);">
            <span class="block w-3 h-3 -rotate-90" aria-hidden="true"><?php new Fire_SVG('icon--chevron-down'); ?></span>
            <span class="sr-only"><?php _e('Previous Slide', 'fire'); ?></span>
          </button>
          <div class="font-sans-serif font-bold text-blue-2 text-[14px] leading-[19px] gap-2 flex md:items-center relative top-1 md:top-px">
            <span class="block" x-text="current"></span>
            <span class="block" aria-hidden="true"><?php _e('/', 'fire'); ?></span>
            <span class="block" x-text="total"></span>
          </div>
          <button type="button" @click="next()" class="flex items-center justify-center w-6 h-6 text-blue-2 hover:text-orange-2 focus-visible:text-black" @keyup.enter="focusSlide($event, current);">
            <span class="block w-3 h-3 -rotate-90" aria-hidden="true"><?php new Fire_SVG('icon--chevron-down'); ?></span>
            <span class="sr-only"><?php _e('Next Slide', 'fire'); ?></span>
          </button>
        </div>
      </div>

    <?php endif; ?>

    <script>
      function imageSlideshow<?php echo $section->count;?>() {
        return {
          total: <?php echo $total; ?>,
          current: 1,
          interval: null,
          duration: 5000,
          autoplay: true,
          focusSlide(e, currentSlide) {
            e.preventDefault();
            const activeSlide = this.$refs[`slide${currentSlide}`];
            activeSlide?.focus();
          },
          next() {
            this.current = this.current < this.total ? this.current + 1 : 1;
            this.initSlideshow();
          },
          prev() {
            this.current = this.current > 1 ? this.current - 1 : this.total;
            this.initSlideshow();
          },
          goTo(index) {
            this.current = index;
            this.initSlideshow();
          },
          initSlideshow() {
            if (this.autoplay) {
              clearInterval(this.interval);
              this.interval = setInterval(() => {
                this.next();
              }, this.duration);
            }
          },
          init() {
            this.initSlideshow();
          }
        }
      }
    </script>
  </div>
</div>
<?php $section->end(); ?>
