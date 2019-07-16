<?php
/**
 * Template Tags
 *
 * Functions that are called directly from template parts or within actions.
 *
 * @package Spotlight
 */

if ( ! function_exists( 'csco_page_pagination' ) ) {
	/**
	 * Post Pagination
	 */
	function csco_page_pagination() {
		if ( ! is_singular() ) {
			return;
		}

		do_action( 'csco_pagination_before' );

		wp_link_pages(
			array(
				'before'           => '<div class="navigation pagination"><div class="nav-links">',
				'after'            => '</div></div>',
				'link_before'      => '<span class="page-number">',
				'link_after'       => '</span>',
				'next_or_number'   => 'next_and_number',
				'separator'        => ' ',
				'nextpagelink'     => esc_html__( 'Next page', 'spotlight' ),
				'previouspagelink' => esc_html__( 'Previous page', 'spotlight' ),
			)
		);

		do_action( 'csco_pagination_after' );
	}
}

if ( ! function_exists( 'csco_the_post_format_icon' ) ) {
	/**
	 * Post Format Icon
	 *
	 * @param string $content After content.
	 */
	function csco_the_post_format_icon( $content = null ) {
		$post_format = get_post_format();

		if ( 'gallery' === $post_format ) {
			$attachments = count( (array) get_children( array(
				'post_parent' => get_the_ID(),
				'post_type'   => 'attachment',
			) ) );

			$content = $attachments ? sprintf( '<span>%s</span>', $attachments ) : '';
		}

		if ( $post_format ) {
			?>
			<span class="post-format-icon">
				<a class="cs-format-<?php echo esc_attr( $post_format ); ?>" href="<?php the_permalink(); ?>">
					<?php echo wp_kses( $content, 'post' ); ?>
				</a>
			</span>
			<?php
		}
	}
}

if ( ! function_exists( 'csco_archive_post_description' ) ) {
	/**
	 * Post Description in Archive Pages
	 */
	function csco_archive_post_description() {
		$description = get_the_archive_description();
		if ( $description ) {
			?>
			<div class="archive-description">
				<?php echo do_shortcode( $description ); ?>
			</div>
			<?php
		}
	}
}

if ( ! function_exists( 'csco_archive_post_count' ) ) {
	/**
	 * Post Count in Archive Pages
	 */
	function csco_archive_post_count() {
		global $wp_query;
		$found_posts = $wp_query->found_posts;
		?>
		<div class="archive-count">
			<?php
			/* translators: 1: Singular, 2: Plural. */
			echo esc_html( apply_filters( 'csco_article_full_count', sprintf( _n( '%s post', '%s posts', $found_posts, 'spotlight' ), $found_posts ), $found_posts ) );
			?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'csco_post_media' ) ) {
	/**
	 * Post Media
	 */
	function csco_post_media() {

		if ( is_singular() && 'standard' !== csco_get_page_header_type() ) {
			return;
		}

		// if ( ! has_post_thumbnail() ) {
		// 	return;
		// }

		do_action( 'csco_post_media_before' );

		$caption = get_the_post_thumbnail_caption();

		$image_size = 'csco-medium';

		if ( 'disabled' === csco_get_page_sidebar() ) {
			$image_size = 'csco-large';
		}

		if ( 'uncropped' === csco_get_page_preview() ) {
			$image_size = sprintf( '%s-uncropped', $image_size );
		}

		if ( is_singular() ) {

			$full_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
			?>
			<div class="post-media">
				<figure <?php echo (string) $caption ? 'class="wp-caption"' : ''; ?>>
					<!-- <a href="<?php echo esc_url( $full_image[0] ); ?>"> -->
						<img src="https://s3-us-west-2.amazonaws.com/monases/<?php echo get_the_date('Y/m')?>/<?php echo the_ID()?>_1.jpg" class="pk-lazyload-disabled wp-post-image">
						<?php //the_post_thumbnail( $image_size, array('class' => 'pk-lazyload-disabled', ) ); ?>
					<!-- </a> -->
					<?php if ( $caption ) { ?>
						<figcaption class="wp-caption-text"><?php the_post_thumbnail_caption(); ?></figcaption>
					<?php } ?>
				</figure>
			</div>
			<?php
		} else {
			?>
			<div class="post-media">
				<figure>
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail( $image_size ); ?>
					</a>
				</figure>
			</div>
			<?php

		}
		do_action( 'csco_post_media_after' );
	}
}

if ( ! function_exists( 'csco_post_author' ) ) {
	/**
	 * Post Author Details
	 *
	 * @param int $id Author ID.
	 */
	function csco_post_author( $id = null ) {
		if ( ! $id ) {
			$id = get_the_author_meta( 'ID' );
		}

		$tag = apply_filters( 'csco_section_title_tag', 'h5' );
		?>
		<div class="author-wrap">
			<div class="author">
				<div class="author-description">
					<<?php echo esc_html( $tag ); ?> class="title-author">
						<span class="fn">
							<a href="<?php echo esc_url( get_author_posts_url( $id ) ); ?>" rel="author">
								<?php the_author_meta( 'display_name', $id ); ?>
							</a>
						</span>
					</<?php echo esc_html( $tag ); ?>>
					<?php
					if ( csco_powerkit_module_enabled( 'social_links' ) ) {
						powerkit_author_social_links( $id );
					}
					?>
				</div>
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'csco_wrap_entry_content' ) ) {
	/**
	 * Wrap .entry-content content in div with a class.
	 *
	 * Used for floated share buttons on single posts.
	 */
	function csco_wrap_entry_content() {
		if ( 'post' !== get_post_type() ) {
			return;
		}

		if ( 'csco_post_content_before' === current_filter() ) {
			?>
			<div class="entry-container">
				<?php
				$check_mod_date = get_the_time( 'U' ) !== get_the_modified_time( 'U' );

				if ( is_singular( 'post' ) && ( csco_has_post_meta( 'author' ) || csco_has_post_meta( 'date' ) || csco_has_post_meta( 'shares' )
					|| ( csco_has_post_meta( 'updated_date', false ) && $check_mod_date ) || get_the_tag_list() ) ) {
				?>
					<div class="entry-sidebar-wrap">
						<?php
							get_template_part( 'template-parts/post-sidebar-next' );
						?>
						<div class="entry-sidebar">
							<?php do_action( 'csco_post_sidebar_details' ); ?>
						</div>
					</div>
				<?php } ?>
			<?php
		} else {
			?>
			</div>
			<?php
		}
	}
}
