<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fire
 */

$title = get_field('title', 'site_settings');
$address = get_field('address', 'site_settings');
$email = get_field('email', 'site_settings');
$phone_number = get_field('phone_number', 'site_settings');
$bugherd_api_key = get_field('bugherd_api_key', 'site_settings');
$bugherd_enabled = get_field('bugherd_enabled', 'site_settings');
?>

  <footer class="py-10 bg-blue-2">
    <div class="container">
      <div class="flex flex-wrap items-center justify-between">
        <div class="w-full lg:w-auto mb-8 shrink-0 lg:mb-0 flex justify-center lg:block">
          <div class="flex flex-col justify-center md:flex-row md:justify-start items-center gap-6 mb-2">
            <a class="text-2xl leading-none text-gray-600 shrink-0" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
              <span class="w-20 h-20 md:w-24 md:h-24 flex items-center justify-center bg-white border-4 border-white rounded-full"><?php new Fire_SVG('logo'); ?></span>
              <span class="sr-only"><?php bloginfo( 'name' ); ?></span>
            </a>
            <div class="text-center md:text-left">
              <?php if($title) : ?>
                <h4 class="mb-1 heading-4 text-white"><?php echo $title;?></h4>
              <?php endif; ?>
              <?php if($address) : ?>
                <div class="text-sm text-white">
                  <?php echo $address;?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="flex flex-wrap items-center justify-center w-full lg:w-auto grow lg:justify-end">
          <?php
            wp_nav_menu(
              array(
                'container'       => false,
                'depth'           => 1,
                'theme_location'  => 'footer',
                'menu_class'      => 'inline-flex justify-center lg:justify-end gap-x-6 gap-y-2 flex-wrap w-full mb-6 lg:w-auto lg:mb-0 lg:mr-12',
                'link_class'      => 'text-sm text-white font-medium hover:text-orange-1',
                'sub_link_class' => 'sub_link_class',
                'sub_menu_class' => 'sub_menu_class',
              )
            );
          ?>
        </div>
      </div>

      <div class="flex items-center justify-center space-x-4 mt-8">
        <?php require get_template_directory() . '/templates/components/social-links/social-links.php';?>
      </div>

      <p class="my-4 text-xs text-center flex justify-center items-center flex-wrap gap-4 gap-x-2 lg:gap-8">
        <?php if($email) : ?>
          <a href="mailto:<?php echo $email;?>" class="text-sm font-medium text-white hover:text-orange-1"><?php echo $email;?></a>
        <?php endif; ?>
        <?php if($phone_number) : ?>
          <a href="tel:<?php echo $phone_number;?>" class="text-sm font-medium text-white hover:text-orange-1"><?php echo $phone_number;?></a>
        <?php endif; ?>
      </p>
      <p class="text-xs text-center text-gray-100"><?php _e('©' . date('Y') .' Boys Hope Girls Hope of Northeastern Ohio All Rights Reserved', 'fire'); ?></p>
    </div>
  </footer>
</div><!-- #page -->

<?php if ($bugherd_api_key && $bugherd_enabled) :?>
  <script src="https://www.bugherd.com/sidebarv2.js?apikey=<?php print $bugherd_api_key; ?>" async="true"></script>
<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>
