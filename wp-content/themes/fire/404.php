<?php
  /**
   * The template for displaying 404 pages (not found)
   *
   * @link https://codex.wordpress.org/Creating_an_Error_404_Page
   */
?>

<?php get_header(); ?>

  <main id="primary" class="py-10 bg-blue-2 site-main text-center flex flex-col items-center justify-center h-full">
    <div class="container">
      <h1 class="page-title heading-1 mb-2 text-white">404 Error</h1>
      <p class="heading-5 text-white"><?php _e( 'Oops! That page can&rsquo;t be found.', 'fire' ); ?></p>
      <a class="mt-8 button button-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php _e('Back Home', 'fire'); ?></a>
    </div>
  </main>

<?php get_footer(); ?>