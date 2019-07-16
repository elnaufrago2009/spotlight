<?php
/**
 * Template part for displaying footer posts section.
 *
 * @package Spotlight
 */

do_action( 'csco_footer_posts_before' );

$ids = csco_get_footer_posts_ids();

if ( $ids ) {
	$args = array(
		'ignore_sticky_posts' => true,
		'post__in'            => $ids,
		'posts_per_page'      => count( $ids ),
		'post_type'           => array( 'post', 'page' ),
		'orderby'             => 'post__in',
	);

	$the_query = new WP_Query( $args );
}

// Determines whether there are more posts available in the loop.
if ( $ids && $the_query->have_posts() ) {
?>

<div class="section-footer-posts">

	<?php do_action( 'csco_footer_posts_start' ); ?>

		<div class="cs-container">

			<div class="cs-footer-posts-wrap">

				<div class="cs-footer-posts cs-featured-posts cs-featured-type-4">
					<?php
					set_query_var( 'csco_featured', 'footer_featured_posts' );
					set_query_var( 'csco_featured_query', $the_query );
					set_query_var( 'csco_featured_thumb_attr', array() );

					csco_get_featured_posts( array(
						'featured-grid',
						'featured-grid',
						'featured-grid',
						'featured-grid',
					) );
					?>
				</div>

				<?php wp_reset_postdata(); ?>

			</div>

		</div>

	<?php do_action( 'csco_footer_posts_end' ); ?>

</div>

<?php
}

do_action( 'csco_footer_posts_after' );
