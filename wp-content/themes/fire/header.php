<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fire
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php
    $gtm = get_field('gtm', 'site_settings');
    $google_tag_manager_enabled = $gtm ? get_field('gtm', 'site_settings')['enable_gtm'] : null;
    $google_tag_manager_id = $gtm ? get_field('gtm', 'site_settings')['gtm_id'] : null;

    if ($google_tag_manager_enabled && $google_tag_manager_id) :
  ?>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','<?php print $google_tag_manager_id; ?>');</script>
    <!-- End Google Tag Manager -->
  <?php endif; ?>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php print $google_tag_manager_id; ?>"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php wp_body_open(); ?>
<div id="page" class="site">
  <a class="sr-only skip-link focus:not-sr-only" href="#primary"><?php esc_html_e( 'Skip to content', 'fire' ); ?></a>

  <header
    x-data="header"
    @scroll.window="scroll()"
    class="site-header w-full fixed bg-orange-2 shadow-[0_-2px_15px_rgba(0,0,0,0.1)] duration-500 lg:sticky z-[1001] transition-all ease-in-out <?php echo is_user_logged_in() ? 'top-0 lg:top-8' : 'top-0'; ?>"
    :class="{ '-translate-y-full': hideHeader }"
  >

    <div class="container relative z-[1]">
      <nav class="flex items-center justify-between py-3">
        <a class="text-2xl leading-none relative z-[1002]" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
          <span class="w-14 lg:w-20 h-14 lg:h-20 flex items-center justify-center bg-white border-4 border-white rounded-full"><?php new Fire_SVG('logo'); ?></span>
          <span class="sr-only"><?php bloginfo( 'name' ); ?></span>
        </a>
        <div class="lg:hidden">
          <button class="ml-2 w-7 h-[22px] lg:hidden group relative z-[1002]" @click="navOpen = ! navOpen">
            <span class="sr-only"><?php _e('Toggle navigation', 'fire'); ?></span>
            <span
              class="w-full duration-150 transition h-[4px] rounded-full bg-white absolute top-1/2 left-1/2 -translate-x-1/2 ease-in-out translate-y-[-11px]"
              :class="{'rotate-45 translate-y-0': navOpen, 'translate-y-[-11px]': !navOpen}"
            ></span>
            <span
              class="duration-150 transition h-[4px] rounded-full bg-white absolute top-1/2 left-1/2 -translate-x-1/2 ease-in-out translate-y-[-1px] w-full"
              :class="{'rotate-45 w-0 translate-y-0': navOpen, 'translate-y-[-1px] w-full': !navOpen}"
            ></span>
            <span
              class="w-full duration-150 transition h-[4px] rounded-full bg-white absolute top-1/2 left-1/2 -translate-x-1/2 ease-in-out translate-y-[9px]"
              :class="{'-rotate-45 translate-y-0': navOpen, 'translate-y-[9px] ': !navOpen}"
            ></span>
          </button>
          <div
            x-cloak
            x-trap.noscroll="navOpen"
            class="fixed flex items-start w-screen h-screen duration-200 ease-in-out transition-opacity z-[1001] inset-0 main-navigation lg:hidden bg-orange-2"
            :class="{'opacity-0 pointer-events-none': !navOpen}"
          >
            <nav class="w-full max-h-screen pt-40 pb-24 overflow-y-auto no-scrollbar">
              <div class="container">
                <?php
                  wp_nav_menu(
                    array(
                      'container'       => false,
                      'depth'           => 2,
                      'theme_location'  => 'primary',
                      'menu_class'      => 'list-none [&>li]:text-center [&>li]:w-full [&>li]:lg:w-auto flex flex-col lg:flex-row items-center lg:items-center gap-4 lg:gap-[60px] delay-400',
                      'link_class'      => 'block text-white font-medium text-[40px] tracking-[0.02em] w-full',
                      'sub_link_class' => 'sub_link_class',
                      'sub_menu_class' => 'sub_menu_class',
                    )
                  );
                ?>
              </div>
            </nav>
          </div>
        </div>

        <?php
          wp_nav_menu(
            array(
              'container'       => false,
              'depth'           => 2,
              'theme_location'  => 'primary',
              'menu_class'      => 'items-center hidden w-auto ml-auto space-x-8 lg:flex',
              'link_class'      => 'text-sm font-medium text-white hover:text-blue-2',
              'sub_link_class' => 'sub_link_class',
              'sub_menu_class' => 'sub_menu_class',
            )
          );
        ?>
      </nav>

    </div>


    <script>
      function header() {
        return {
          navOpen:false,
          hideHeader: false,
          lastScrollTop: 0,
          showBg: false,
          delta: 60,
          scroll() {
            const st = window.scrollY;
            if (st > 300) {
              this.showBg = true;
            } else {
              this.showBg = false;
            }
            if (Math.abs(this.lastScrollTop - st) <= this.delta) return;
            if (st > this.lastScrollTop && st > 0) {
              this.hideHeader = true;
            } else {
              if (st + window.innerHeight < document.body.offsetHeight) {
                this.hideHeader = false;
              }
            }
            this.lastScrollTop = st;
          },
        }
      }
    </script>

  </header>