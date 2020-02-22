<?php
/**
 * The template for displaying all single sample chapters
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-sample_chapter
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

$this_id = get_the_ID();

$search_value = $this_id; // whatever
$field_value = sprintf( '^%1$s$|s:%2$u:"%1$s";', $search_value, strlen( $search_value ) );

$args = array(
  'post_type' => 'book',
  'meta_query' => array(
    array(
      'key' => 'sample_chapters',
      'value' => $field_value,
      'compare' => 'REGEXP'
    )
  )
);

// query
$the_query = new WP_Query( $args );

?>

<?php if( $the_query->have_posts() ): ?>
    <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <a href="<?php the_permalink(); ?>"><?php the_title('Return to '); ?></a>
    <?php endwhile; ?>
  </ul>
<?php endif; ?>

<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>

<h2 class="page-title page-title--sample-chapter"><?php the_title(); ?></h2>

<div class="content-layout no-sidebar">

  <div class="main">

    <div class="content content--sample-chapter">

      <?php
      if ( have_posts() ) :
        while ( have_posts() ) : the_post();
          the_content();
        endwhile;
      endif;
      ?>

    </div>

  </div>

</div>

<?php
get_footer();
