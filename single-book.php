<?php
/**
 * The template for displaying all single books
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-book
 *
 * @package Cinema_Theme
 */

get_header();

// check for a Featured Image and then assign it to a PHP variable for later use
if ( has_post_thumbnail() ) {
  $featured_image = get_the_post_thumbnail();
}

$my_amazon_link = get_post_meta( get_the_ID(), 'amazon_link', true);
$my_sample_chapters = get_post_meta( get_the_ID(), 'sample_chapters', true);
?>

<h2 class="page-title page-title--book"><?php the_title(); ?></h2>

<div class="content-layout right-sidebar">

  <main class="site-main">

    <div class="content content--book">

      <?php
      if ( have_posts() ) :
        while ( have_posts() ) : the_post();
          the_content();
        endwhile;
      endif;
      ?>

    </div>

  </div>

  <aside class="sidebar sidebar-right">

    <?php the_post_thumbnail(); ?>

    <?php

    if( ! empty( $my_amazon_link ) ) {
      echo '<div><a href="' . $my_amazon_link . '" target="_blank">Buy on Amazon</a></div>';
    }

    if( ! empty( $my_sample_chapters ) ) {
      echo '<div><h4>Read a Sample Chapter:</h4><ul>';
      $arrayLength = count($my_sample_chapters);
      $i = 0;
      while ($i < $arrayLength)
      {
        $this_post = get_post( $my_sample_chapters[$i] );
        $this_permalink = get_permalink( $my_sample_chapters[$i] );
        $this_title = $this_post->post_title;
        echo '<li><a href="'.$this_permalink.'">'.$this_title.'</a></li>';
        $i++;
      }
      echo '</ul>';
    }

    ?>

  </aside>

</div>

<?php
get_footer();
