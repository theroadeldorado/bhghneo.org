<?php
  $heading = get_sub_field('heading');
  $image = get_sub_field('image');
  $tag = get_sub_field('tag');
  $copy = get_sub_field('copy');
  $style = get_sub_field('style') ? get_sub_field('style') : '';
  $stories = get_sub_field('stories');
  $counter = 0;

  $section->add_classes([
    'py-10 md:py-20 max-w-100vw overflow-hidden bg-gray-200'
  ]);
?>

<?php $section->start(); ?>
  <div class="container" x-data="success<?php echo $section->count;?>()">

    <?php if($heading): ?>
      <?php new Fire_Heading($tag, $heading, $style.' text-center text-orange-2 mb-8') ?>
    <?php endif; ?>

    <?php if($copy):?>
      <div class="mb-12 text-center max-w-2xl mx-auto text-xl font-medium"><?php echo $copy;?></div>
    <?php endif;?>

    <?php if( $stories ): ?>
      <div class="grid grid-cols-1 grid-rows-1">
        <?php foreach( $stories as $story ):
          $content = get_field( 'story', $story->ID );
          // strip tags from content
          $content_no_tags = strip_tags($content);
          $name = get_field( 'name', $story->ID );
          $subtitle = get_field( 'subtitle', $story->ID );
          $image = get_field( 'image', $story->ID );?>
          <div
            x-data="{open: false}"
            class="col-start-1 row-start-1 col-span-1 row-span-1 grid gap-10 md:gap-20 md:grid-cols-2"
            :class="active !== <?php echo $counter;?> && 'pointer-events-none'"
          >
            <div class="duration-1000 ease-in-out transition row-start-2 md:row-start-1" :class="active !== <?php echo $counter;?> && '-translate-x-20 opacity-0'">
              <?php if($name):?>
                <p class="text-2xl font-bold font-heading text-blue-2 <?php echo !$subtitle ? 'mb-6 lg:mb-10' : '';?>"><?php echo $name;?></p>
              <?php endif;?>
              <?php if($subtitle):?>
                <p class="mb-6 lg:mb-10 text-lg text-orange-2 font-medium"><?php echo $subtitle;?></p>
              <?php endif;?>
              <?php if($content_no_tags):?>
                <div class="mb-6 lg:mb-8 text-base leading-relaxed text-blue-2 line-clamp-5"><?php echo $content_no_tags;?></div>
              <?php endif;?>
              <button class="mb-3 button" @click="open = true">Read <?php echo $name;?>'s Story</button>
            </div>

            <div class="duration-1000 ease-in-out block transition row-start-1" :class="active !== <?php echo $counter;?> && 'translate-x-20 opacity-0'">
              <?php if($image): ?>
                <div class="aspect-w-7 aspect-h-5 w-full overflow-hidden rounded-md relative">
                  <?php new Fire_Picture($image['url'], $image['alt'], [[700,500],[700,500],[700,500]], 'object-cover w-full h-full absolute inset-0');?>
                </div>
              <?php endif; ?>
            </div>

            <div
              x-cloak
              x-trap.noscroll="open"
              class="fixed z-[1003] inset-0 flex items-center justify-center w-screen h-screen bg-orange-2/70 transition-all duration-200 lg:px-4"
              :class="{'opacity-0 pointer-events-none': !open}"
              @click="open = false"
            >
              <div class="container text-left lg:max-w-[600px] p-6 max-h-[100vh] lg:max-h-[80vh] overflow-y-scroll pb-20 bg-white overflow-hidden lg:rounded-md  border-2 border-orange-2 relative">
                <button @click="open = false" @click.prevent="open = false" class="absolute w-5 h-5 text-orange-2 cursor-pointer top-4 right-4 hover:text-blue-2">
                  <span class="flex items-center justify-center w-5 h-5">
                  <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 320 512" fill="currentColor"><path d="M312.1 375c9.369 9.369 9.369 24.57 0 33.94s-24.57 9.369-33.94 0L160 289.9l-119 119c-9.369 9.369-24.57 9.369-33.94 0s-9.369-24.57 0-33.94L126.1 256L7.027 136.1c-9.369-9.369-9.369-24.57 0-33.94s24.57-9.369 33.94 0L160 222.1l119-119c9.369-9.369 24.57-9.369 33.94 0s9.369 24.57 0 33.94L193.9 256L312.1 375z"/></svg>
                  </span>
                </button>

                <h3 class="pr-6 mb-1 heading-3"><?php echo $name;?></h3>
                <?php if($subtitle):?>
                  <p class="pr-6 text-orange-2"><?php echo $subtitle;?></p>
                <?php endif;?>
                <?php if($image): ?>
                  <div class="aspect-w-7 my-5 aspect-h-5 w-full overflow-hidden rounded-md ">
                    <?php new Fire_Picture($image['url'], $image['alt'], [[700,500],[700,500],[700,500]], 'object-cover w-full h-full absolute inset-0');?>
                  </div>
                <?php endif; ?>
                <?php if($content):?>
                  <div class="mt-3 wizzy">
                    <?php echo $content;?>
                  </div>
                <?php endif;?>
              </div>
            </div>

          </div>
          <?php $counter++;?>
        <?php endforeach; ?>
      </div>

      <?php if($counter > 1):?>
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
