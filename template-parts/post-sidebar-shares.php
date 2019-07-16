<?php
/**
 * The template part for displaying post sidebar shares section.
 *
 * @package Spotlight
 */

if ( csco_powerkit_module_enabled( 'share_buttons' ) ) {

	if ( powerkit_share_buttons_exists( 'post_sidebar' ) && csco_has_post_meta( 'shares' ) ) {

		$tag = apply_filters( 'csco_share_title_tag', 'h5' );
		?>
		<section class="post-section post-sidebar-shares">
			<div class="post-sidebar-inner">
				<<?php echo esc_html( $tag ); ?> class="title-block">
					<?php esc_html_e( 'Share article', 'spotlight' ); ?>
				</<?php echo esc_html( $tag ); ?>>

				<?php powerkit_share_buttons_location( 'post_sidebar' ); ?>
			</div>
		</section>
		<?php
	}

}
