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

?>

  <footer class="text-white bg-gray-500">
    <div>
      <?php
        wp_nav_menu(
          array(
            'container'       => false,
            'depth'           => 2,
            'theme_location'  => 'footer',
            'menu_class'      => 'menu_class',
            'link_class'      => 'link_class',
            'sub_link_class' => 'sub_link_class',
            'sub_menu_class' => 'sub_menu_class',
          )
        );
      ?>
    </div>
    <?php _e('©' . date('Y') .' SKYCATCHFIRE', 'fire'); ?>
    <?php _e('Fire Theme', 'fire'); ?>
    <div class="flex items-center justify-start space-x-2">
      <?php require get_template_directory() . '/templates/components/social-links/social-links.php';?>
    </div>
  </footer>
</div><!-- #page -->

<?php
  $bugherd_api_key = get_field('bugherd_api_key', 'site_settings');
  $bugherd_enabled = get_field('bugherd_enabled', 'site_settings');

  if ($bugherd_api_key && $bugherd_enabled) :
?>
  <script src="https://www.bugherd.com/sidebarv2.js?apikey=<?php print $bugherd_api_key; ?>" async="true"></script>
<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>
