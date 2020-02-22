<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cinema_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="site-container">

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'cinema_theme' ); ?></a>

	<header class="section-outer section-outer--site-header">
    <div class="section section--site-content">
      <div class="section-inner section-inner--site-header">

        <div class="content-layout content-layout--header">

          <div class="title-area">
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
<!--            <p class="site-description">--><?php //echo $cinema_theme_description; /* WPCS: xss ok. */ ?><!--</p>-->
          </div>

          <nav id="site-navigation" class="main-navigation">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'cinema_theme' ); ?></button>
            <?php
            wp_nav_menu( array(
              'theme_location' => 'menu-1',
              'menu_id'        => 'primary-menu',
            ) );
            ?>
          </nav><!-- #site-navigation -->

        </div>
      </div>
    </div>
	</header><!-- #masthead -->

  <div class="section-outer section-outer--site-content">
    <div class="section section--site-content">
      <div class="section-inner section-inner--site-content">
