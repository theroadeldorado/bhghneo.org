<?php
  function fire_register_options_page() {
    if( function_exists('acf_add_options_page') ) {
      /*
      * Creates options page for global settings
      */
      acf_add_options_page(array(
        'page_title' => 'Site Settings',
        'menu_title' => 'Site Settings',
        'position' => '2',
        'post_id' => 'site_settings'
      ));

    }
  }
  add_action('acf/init', 'fire_register_options_page', 10);


function skycatchfire_set_default_admin_color( $user_id ) {
  $args = array(
    'ID' => $user_id,
    'admin_color' => 'skycatchfire'
  );
  wp_update_user( $args );
}
add_action( 'user_register', 'skycatchfire_set_default_admin_color' );


// remove default post type from admin menu
function remove_menus(){
  remove_menu_page( 'edit.php' );                   //Posts
  remove_menu_page( 'edit-comments.php' );          //Comments
}
add_action( 'admin_menu', 'remove_menus' );

// remove default post type from admin bar
function remove_admin_bar_links() {
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('new-post');
}
add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );


?>
