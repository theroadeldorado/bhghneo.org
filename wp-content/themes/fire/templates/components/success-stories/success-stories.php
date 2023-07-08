<?php
  $heading = get_sub_field('heading');
  $image = get_sub_field('image');
  $tag = get_sub_field('tag');
  $style = get_sub_field('style') ? get_sub_field('style') : '';
  $stories = get_sub_field('stories');
  $counter = 0;

  $section->add_classes([
    'py-10 md:py-20 max-w-100vw overflow-hidden'
  ]);
?>

<?php $section->start(); ?>
  <div class="container" x-data="success<?php echo $section->count;?>()">

    <?php if($heading): ?>
      <?php new Fire_Heading($tag, $heading, $style.' text-center mb-12') ?>
    <?php endif; ?>

    <?php if( $stories ): ?>
      <div class="grid grid-cols-1">
        <?php foreach( $stories as $story ):
          $content = get_field( 'story', $story->ID );
          $name = get_field( 'name', $story->ID );
          $subtitle = get_field( 'subtitle', $story->ID );
          $image = get_field( 'image', $story->ID );?>
          <div class="grid gap-10 md:gap-20 md:grid-cols-2 row-start-1 col-start-1" :class="{'pointer-events-none': active !== <?php echo $counter;?>}">
            <div class="duration-1000 ease-in-out block transition row-start-2 md:row-start-1" :class="{'-translate-x-20 opacity-0': active !== <?php echo $counter;?>}">
              <?php if($name):?>
                <p class="text-2xl font-bold font-heading text-blue-2"><?php echo $name;?></p>
              <?php endif;?>
              <?php if($subtitle):?>
                <p class="mb-10 text-lg text-blue-1 font-medium"><?php echo $subtitle;?></p>
              <?php endif;?>
              <?php if($content):?>
                <div class="mb-8 text-base leading-relaxed text-blue-1 line-clamp-5 <?php echo !$subtitle ? 'mt-8' : '';?>"><?php echo $content;?></div>
              <?php endif;?>
              <a class="mb-3 button" href="#<?php echo $name;?>">Read <?php echo $name;?> Story</a>
            </div>
            <div class="duration-1000 ease-in-out block row-start-1 transition" :class="{'translate-x-20 opacity-0': active !== <?php echo $counter;?>}">
              <?php if($image): ?>
                <div class="aspect-w-7 aspect-h-5 w-full overflow-hidden rounded-md ">
                  <?php new Fire_Picture($image['url'], $image['alt'], [[700,500],[700,500],[700,500]], 'object-cover w-full h-full absolute inset-0');?>
                </div>
              <?php endif; ?>
            </div>
          </div>
          <?php $counter++;?>
        <?php endforeach; ?>
      </div>
      <div class="mt-6 flex items-center justify-center md:justify-start">
        <button @click="prev()" class="p-3 mr-3 rounded-full w-14 h-14 bg-orange-2 hover:bg-orange-2/40">
          <svg class="text-[#fff]" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
          </svg>
        </button>
        <button @click="next()" class="p-3 rounded-full w-14 h-14 bg-orange-2 hover:bg-orange-2/40">
          <svg class="text-[#fff]" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
          </svg>
        </button>
      </div>
    <?php endif; ?>

    <script>
      function success<?php echo $section->count;?>() {
        return {
          active: 0,
          prev() {
            if(this.active === 0) {
              this.active = <?php echo $counter;?> - 1;
            } else {
              this.active--;
            }
          },
          next() {
            if(this.active === <?php echo $counter;?> - 1) {
              this.active = 0;
            } else {
              this.active++;
            }
          }
        }
      }
    </script>

  </div>
<?php $section->end(); ?>