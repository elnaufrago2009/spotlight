<?php
/**
 * The template part for displaying post sidebar next section.
 *
 * @package Spotlight
 */

$tag = apply_filters( 'csco_post_next_title_tag', 'h5' );

global $post;

$next_post = get_next_post();

if ( $next_post ) {
	$post = $next_post;

	setup_postdata( $post );
	?>
		<div class="entry-post-next cs-d-none cs-d-lg-block">
			<<?php echo esc_html( $tag ); ?> class="title-block">
				<?php esc_html_e( 'Up next', 'spotlight' ); ?>
			</<?php echo esc_html( $tag ); ?>>

			<article>
				<?php //if ( has_post_thumbnail() ) { ?>
        <?php if ( true ) { ?>
					<div class="entry-thumbnail">
						<div class="cs-overlay cs-overlay-simple cs-overlay-ratio cs-ratio-landscape cs-bg-dark">
							<div class="cs-overlay-background">
								<?php //the_post_thumbnail( 'csco-intermediate' ); ?>
                <img width="200" height="110" src="https://s3-us-west-2.amazonaws.com/monases/<?php echo get_the_date('Y/m')?>/<?php echo the_ID()?>_1.jpg" class="attachment-csco-intermediate size-csco-intermediate wp-post-image" alt="">
							</div>
							<div class="cs-overlay-content">
								<?php csco_the_post_format_icon(); ?>
							</div>
							<a href="<?php the_permalink(); ?>" class="cs-overlay-link"></a>
						</div>
					</div>
				<?php } ?>
				<header class="entry-header">
					<h6 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
					<?php csco_get_post_meta( array( 'shares' ), false, true, 'archive_post_meta' ); ?>
				</header>
				</div>
		</section>
	<?php
	wp_reset_postdata();
}
