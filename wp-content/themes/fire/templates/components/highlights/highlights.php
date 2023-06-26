<?php
  $intro_copy = get_sub_field('intro_copy');
  $section->add_classes([
    'py-20'
  ]);
?>

<?php $section->start(); ?>
   <div class="container" x-data="highlights<?php echo $section->count;?>()">
    <div class="flex flex-wrap -mx-4">
      <div class="w-full pl-4 pr-10 mb-12 lg:w-1/3 lg:mb-0">
        <?php if( have_rows('highlights') ): $counter = 0;?>
          <ul class="mb-10 hidden md:block">
            <?php while ( have_rows('highlights') ) : the_row();
              $title = get_sub_field('title');
              $optional_link = get_sub_field('optional_link');
              $classes = 'text-3xl font-bold text-blue-2 font-heading hover:text-orange-2 duration-300 ease-in-out transition';?>
              <li class="mb-2">
                <?php if($optional_link):?>
                  <a
                    class="<?php echo $classes;?>" href="<?php echo $optional_link['url'];?>" target="<?php echo $optional_link['target'];?>"
                    @mouseover="active = <?php echo $counter;?>"
                    :class="{'text-orange-2': active == <?php echo $counter;?>}"
                  >
                <?php else:?>
                  <span
                    @mouseover="active = <?php echo $counter;?>"
                    :class="{'text-orange-2': active == <?php echo $counter;?>}"
                    class="<?php echo $classes;?>"
                  >
                <?php endif;?>
                  <?php echo $title;?>
                <?php if($optional_link):?>
                  </a>
                <?php else:?>
                  </span>
                <?php endif;?>
              </li>
              <?php $counter++;?>
            <?php endwhile;?>
          </ul>
        <?php endif; ?>
        <?php if($intro_copy) : ?>
          <div class="wizzy text-blue-2 text-md">
            <?php echo $intro_copy; ?>
          </div>
        <?php endif; ?>
      </div>

      <?php if( have_rows('highlights') ): $image_counter = 0;?>
        <div class="w-full px-4 lg:w-2/3">
          <div class="flex flex-wrap -m-4 [&>*:nth-child(4n+1)]:md:w-1/3 [&>*:nth-child(4n+2)]:md:w-2/3 [&>*:nth-child(4n+3)]:md:w-2/3 [&>*:nth-child(4n+4)]:md:w-1/3">
            <?php while ( have_rows('highlights') ) : the_row();
              $title = get_sub_field('title');
              $image = get_sub_field('image');
              $optional_link = get_sub_field('optional_link');?>

              <?php if($optional_link):?>
                <a
                  class="w-full p-4 relative duration-300 ease-in-out transition"
                  @mouseover="active = <?php echo $image_counter;?>"
                  :class="{'lg:opacity-50': active !== <?php echo $image_counter;?>}"
                >
              <?php else:?>
                <div
                  class="w-full p-4 relative duration-300 ease-in-out transition"
                  @mouseover="active = <?php echo $image_counter;?>"
                  :class="{'lg:opacity-50': active !== <?php echo $image_counter;?>}"
                >
              <?php endif;?>
                  <div class="flex items-center justify-center absolute inset-4 z-[1] md:hidden bg-orange-1/50 rounded-lg">
                    <span class="heading-1 text-white"><?php echo $title;?></span>
                  </div>
                  <?php new Fire_Picture($image['url'], $image['alt'], [[348,800]], 'opacity-100 md:opacity-100 object-cover object-center w-full rounded-lg h-72 md:h-96');?>
              <?php if($optional_link):?>
                </a>
              <?php else:?>
                </div>
              <?php endif;?>
              <?php $image_counter++;?>
            <?php endwhile;?>
          </div>
        </div>
      <?php endif; ?>
    </div>

    <script>
      function highlights<?php echo $section->count;?>() {
        return {
          active: 0,
          interval: null,
          init() {
            // if is not a touch device, start the auto increment
            if(!('ontouchstart' in document.documentElement)) {
              // every 2 seconds, increment the active slide
              this.interval = setInterval(() => {
                this.active++;
                // if we're at the end, go back to the beginning
                if(this.active >= <?php echo $counter;?>) {
                  this.active = 0;
                }
              }, 2000);
            }

          },
          handleMouseover(index) {
            this.active = index;
            // stop the auto increment
            clearInterval(this.interval);
          }
        }
      }
    </script>
  </div>

<?php $section->end(); ?>
