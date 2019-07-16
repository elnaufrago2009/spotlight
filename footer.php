<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Spotlight
 */

?>

					<?php do_action( 'csco_main_content_end' ); ?>

				</div><!-- .main-content -->

				<?php do_action( 'csco_main_content_after' ); ?>

			</div><!-- .cs-container -->

			<?php do_action( 'csco_site_content_end' ); ?>

		</div><!-- .site-content -->

		<?php do_action( 'csco_site_content_after' ); ?>

		<?php do_action( 'csco_footer_before' ); ?>

		<?php $scheme = csco_light_or_dark( get_theme_mod( 'color_footer_bg', '#000000' ), null, 'cs-bg-dark' ); ?>

		<footer id="colophon" class="site-footer <?php echo esc_attr( $scheme ); ?>">

			<div class="site-info">

				<?php
				$subscription_form = get_theme_mod( 'footer_subscribe', true );
				if ( $subscription_form ) {
					?>
					<div class="footer-aside">
						<?php
						if ( shortcode_exists( 'powerkit_subscription_form' ) && $subscription_form ) {
							$text = get_theme_mod( 'footer_subscribe_text', esc_html__( 'Get the recent Newsly updates to your mailbox.', 'spotlight' ) );
							$name = get_theme_mod( 'footer_subscribe_name', false );

							$shortcode = sprintf( '[powerkit_subscription_form text="%s" display_name="%s"]', $text, $name );

							echo do_shortcode( apply_filters( 'csco_subscribe_shortcode', $shortcode, 'footer', $text, null, null ) );
						}
						?>
					</div>
				<?php } ?>

				<div class="footer-content">
					<?php
					$footer_title = get_theme_mod( 'footer_title', get_bloginfo( 'desription' ) );
					if ( $footer_title ) {
						?>
						<h5 class="site-title footer-title"><?php echo wp_kses_post( $footer_title ); ?></h5>
						<?php
					}

					$social_in_footer = get_theme_mod( 'footer_social_links', false );
					if ( csco_powerkit_module_enabled( 'social_links' ) && $social_in_footer ) {
						$scheme  = get_theme_mod( 'footer_social_links_scheme', 'light-rounded' );
						$maximum = get_theme_mod( 'footer_social_links_maximum', 2 );

						powerkit_social_links( false, false, true, 'nav', $scheme, 'mixed', $maximum );
					}
					?>

					<?php
					if ( has_nav_menu( 'footer' ) ) {
						wp_nav_menu(
							array(
								'theme_location'  => 'footer',
								'menu_class'      => 'navbar-nav',
								'container'       => 'nav',
								'container_class' => 'navbar-footer',
								'depth'           => 1,
							)
						);
					}
					?>

					<?php
					/* translators: %s: Author name. */
					$footer_text = get_theme_mod( 'footer_text', sprintf( esc_html__( 'Designed & Developed by %s', 'spotlight' ), '<a href="https://codesupply.co/">Code Supply Co.</a>' ) );
					if ( $footer_text ) {
						?>
						<div class="footer-copyright">
							<?php echo do_shortcode( $footer_text ); ?>
						</div>
						<?php
					}
					?>
				</div>
			</div><!-- .site-info -->

		</footer>

		<?php do_action( 'csco_footer_after' ); ?>

	</div><!-- .site-inner -->

	<?php do_action( 'csco_site_end' ); ?>

</div><!-- .site -->

<?php do_action( 'csco_site_after' ); ?>

<?php wp_footer(); ?>
</body>
</html>
