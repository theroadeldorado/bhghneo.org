<?php
  $heading = get_sub_field('heading');
  $tag = get_sub_field('tag');
  $style = get_sub_field('style') ? get_sub_field('style') : '';
  $style .= ' mb-10 text-blue-2 text-center';

  $section->add_classes([
    'py-10 md:py-20'
  ]);
?>

<?php $section->start(); ?>

  <div class="container">
    <?php if($heading): ?>
      <?php new Fire_Heading($tag, $heading, $style) ?>
    <?php endif; ?>

    <?php if( have_rows('team_members') ):?>
      <div class="flex gap-6 justify-center flex-wrap">
        <?php while ( have_rows('team_members') ) : the_row();
          $name = get_sub_field('name');
          $title = get_sub_field('title');
          $email = get_sub_field('email');?>
          <div class="w-1/2 md:w-1/3 lg:w-[275px] shrink-0">
            <div class="flex items-center flex-col gap-1 rounded-md bg-gray-50 shadow-md py-6 px-4">
              <?php if($name):?>
                <h3 class="heading-6 text-blue-2"><?php echo $name;?></h3>
              <?php endif;?>
              <?php if($title):?>
                <p class="text-sm"><?php echo $title;?></p>
              <?php endif;?>
              <?php if($email):?>
                <a href="mailto:<?php echo $email;?>" class="flex flex-col text-sm items-center justify-center text-orange-2 hover:underline"><?php echo $email;?></a>
              <?php endif;?>
            </div>
          </div>
        <?php endwhile;?>
      </div>
    <?php endif; ?>
  </div>

<?php $section->end(); ?>
