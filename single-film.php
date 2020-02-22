<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$container   = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="single-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

    <!-- Do the left sidebar check -->
    <?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

    <main class="site-main" id="main">

      <?php

      while ( have_posts() ) : the_post();

        the_title( '<h1 class="entry-title">', '</h1>' );

        $this_director = do_shortcode('[film_director]');
        $this_director = (string) $this_director;

        $this_year = do_shortcode('[film_year]');
        $this_year = (string) $this_year;

        $this_length = do_shortcode('[film_length]');
        $this_length = (string) $this_length;

        $this_format = do_shortcode('[film_format]');
        $this_format = (string) $this_format;

        $this_showtimes = do_shortcode('[film_showtimes]');

        print '<div>';
        print $this_director;
        if ($this_director && $this_year) { print ' | '; }
        print $this_year;
        print '</div>';

        print '<div>';
        print $this_length;
        if ($this_length && $this_format) { print ' | '; }
        print $this_format;
        print '</div>';

        // understrap_posted_on();

        the_content();

        print '<div>';
        print $this_showtimes;
        print '</div>';

        echo do_shortcode('[film_poster]');

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
          comments_template();
        endif;

      endwhile; // end of the loop.

      ?>

    </main><!-- #main -->

		<!-- Do the right sidebar check -->
		<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

  </div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
