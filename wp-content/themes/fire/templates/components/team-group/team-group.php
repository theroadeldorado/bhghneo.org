<?php
  $heading = get_sub_field('heading');
  $tag = get_sub_field('tag');
  $style = get_sub_field('style') ? get_sub_field('style') : '';
  $style .= ' mb-10 text-blue-2 text-center';

  $section->add_classes([
    'py-5'
  ]);
?>

<?php $section->start(); ?>

  <div class="container">
    <?php if($heading): ?>
      <?php new Fire_Heading($tag, $heading, $style) ?>
    <?php endif; ?>

    <?php if( have_rows('team_members') ):?>
      <div class="flex gap-3 md:gap-6 justify-center flex-wrap">
        <?php while ( have_rows('team_members') ) : the_row();
          $name = get_sub_field('name');
          $title = get_sub_field('title');
          $email = get_sub_field('email');
          $phone_number_extension = get_sub_field('phone_number_extension');?>
          <div class="w-[calc(50%-12px)] md:w-[265px] shrink-0">
            <div class="flex items-center flex-col gap-0.5 md:gap-1 text-center rounded-md bg-gray-50 shadow-md py-3 md:py-6 px-2">
              <?php if($name):?>
                <h3 class="font-bold md:heading-7 text-blue-2"><?php echo $name;?></h3>
              <?php endif;?>
              <?php if($title):?>
                <p class="text-[12px] md:text-sm"><?php echo $title;?></p>
              <?php endif;?>
              <?php if($phone_number_extension):?>
                <span class="flex flex-col text-[11px] md:text-sm items-center justify-center"><?php echo $phone_number_extension;?></span>
              <?php endif;?>
              <?php if($email):?>
                <a href="mailto:<?php echo $email;?>" class="flex flex-col text-[11px] md:text-sm items-center justify-center text-orange-2 hover:underline"><?php echo $email;?></a>
              <?php endif;?>
            </div>
          </div>
        <?php endwhile;?>
      </div>
    <?php endif; ?>
  </div>

<?php $section->end(); ?>
