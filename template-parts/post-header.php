<?php
/**
 * The template part for displaying post header section.
 *
 * @package Spotlight
 */

$page_header = csco_get_page_header_type();

$class = sprintf( 'entry-single-header entry-header-%s', $page_header );

// Check if post has an image attached.
if ( has_post_thumbnail() ) {
	$class .= ' entry-header-thumbnail';
}

// Check if page header is wide.
if ( 'wide' === $page_header ) {
	$class .= ' cs-overlay cs-overlay-no-hover cs-overlay-ratio cs-bg-dark';
}
?>

<section class="entry-header <?php echo esc_attr( $class ); ?>">

	<?php do_action( 'csco_singular_entry_header_start' ); ?>

	<?php if ( 'large' === $page_header ) { ?>
		<div class="cs-overlay cs-overlay-simple cs-overlay-ratio cs-ratio-large">
			<div class="cs-overlay-background">				
				<?php //the_post_thumbnail( 'csco-extra-large', array( 'class' => 'pk-lazyload-disabled', ) );?>
				<img src="https://s3-us-west-2.amazonaws.com/monases/<?php echo get_the_date('Y/m') ?>/<?php echo the_ID()?>_1.jpg" class="pk-lazyload-disabled wp-post-image">
			</div>
		</div>
	<?php } ?>


	<div class="cs-container">

		<?php if ( 'wide' === $page_header ) { ?>
			<div class="cs-overlay-background">
				<img src="https://s3-us-west-2.amazonaws.com/monases/<?php echo get_the_date('Y/m') ?>/<?php echo the_ID()?>_1.jpg" class="pk-lazyload-disabled wp-post-image">	
				<?php					
					//the_post_thumbnail( 'csco-extra-large', array('class' => 'pk-lazyload-disabled',) );
				?>
			</div>
			<div class="cs-overlay-content">
		<?php } ?>

		<?php csco_breadcrumbs( true ); ?>

		<?php if ( is_singular( 'post' ) ) { ?>
			<div class="entry-inline-meta">
				<?php csco_get_post_meta( 'category', false, true, 'post_meta' ); ?>
			</div>
		<?php } ?>

		<?php
		the_title( '<h1 class="entry-title">', '</h1>' );

		if ( 'page' === get_post_type() ) {
			$excerpt_enabled = get_theme_mod( 'page_excerpt', true ) && has_excerpt();
		} else {
			$excerpt_enabled = get_theme_mod( 'post_excerpt', true ) && has_excerpt();
		}

		if ( $excerpt_enabled ) {
			?>
			<div class="post-excerpt"><?php the_excerpt(); ?></div>
			<?php
		}
		?>

		<?php
		if ( is_singular( 'post' ) ) {
			if ( csco_has_post_meta( 'views' ) || csco_has_post_meta( 'comments' ) || csco_has_post_meta( 'reading_time' ) || csco_has_post_meta( 'shares' ) ) {
			?>
				<div class="entry-meta-details">
					<?php
					csco_get_post_meta( array( 'views', 'comments', 'reading_time' ), false, true, 'post_meta' );

					if ( csco_powerkit_module_enabled( 'share_buttons' ) ) {
						powerkit_share_buttons_location( 'post_header' );
					}
					?>
				</div>
			<?php
			}
		}
		?>

		<?php if ( 'wide' === $page_header ) { ?>
			</div>
		<?php } ?>

	</div>

	<?php do_action( 'csco_singular_entry_header_end' ); ?>

</section>
