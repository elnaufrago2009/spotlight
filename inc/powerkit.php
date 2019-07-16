<?php
/**
 * Powerkit Filters
 *
 * @package Spotlight
 */

/**
 * Deregister Post Content
 *
 * @param array $locations List of Locations.
 */
function csco_share_buttons_post_content( $locations = array() ) {

	if ( isset( $locations['after-content'] ) ) {
		unset( $locations['after-content'] );
	}

	return $locations;
}
add_filter( 'powerkit_share_buttons_locations', 'csco_share_buttons_post_content' );

/**
 * Register Post Archive Share Buttons Location
 *
 * @param array $locations List of Locations.
 */
function csco_share_buttons_post_meta( $locations = array() ) {

	$locations['post_meta'] = array(
		'shares'         => array( 'facebook', 'twitter', 'pinterest' ),
		'name'           => esc_html__( 'Post Meta', 'spotlight' ),
		'location'       => 'post_meta',
		'mode'           => 'cached',
		'before'         => '',
		'after'          => '',
		'display'        => true,
		'meta'           => array(
			'icons'  => true,
			'titles' => false,
			'labels' => false,
		),
		// Display only the specified layouts and color schemes.
		'fields'         => array(
			'layouts'         => array( 'simple' ),
			'schemes'         => array( 'default', 'bold' ),
			'count_locations' => array( 'inside' ),
		),
		'display_total'  => false,
		'layout'         => 'simple',
		'scheme'         => 'default',
		'count_location' => 'inside',
	);

	return $locations;
}
add_filter( 'powerkit_share_buttons_locations', 'csco_share_buttons_post_meta' );

/**
 * Register Post Header Share Buttons Location
 *
 * @param array $locations List of Locations.
 */
function csco_share_buttons_post_header( $locations = array() ) {

	$locations['post_header'] = array(
		'shares'         => array( 'facebook', 'twitter', 'pinterest' ),
		'name'           => esc_html__( 'Post Header', 'spotlight' ),
		'location'       => 'post_header',
		'mode'           => 'mixed',
		'before'         => '',
		'after'          => '',
		'display'        => true,
		'meta'           => array(
			'icons'  => true,
			'titles' => false,
			'labels' => true,
		),
		// Display only the specified layouts and color schemes.
		'fields'         => array(
			'display_total'   => true,
			'display_count'   => true,
			'layouts'         => array( 'default' ),
			'schemes'         => array( 'default', 'bold' ),
			'count_locations' => array( 'inside' ),
		),
		'layout'         => 'default',
		'scheme'         => 'default',
		'count_location' => 'inside',
	);

	return $locations;
}
add_filter( 'powerkit_share_buttons_locations', 'csco_share_buttons_post_header' );


/**
 * Register Floated Share Buttons Location
 *
 * @param array $locations List of Locations.
 */
function csco_share_buttons_post_sidebar( $locations = array() ) {

	$locations['post_sidebar'] = array(
		'shares'         => array( 'facebook', 'twitter', 'pinterest', 'mail' ),
		'name'           => esc_html__( 'Entry Sidebar', 'spotlight' ),
		'location'       => 'post_sidebar',
		'mode'           => 'mixed',
		'before'         => '',
		'after'          => '',
		'display'        => true,
		'meta'           => array(
			'icons'  => true,
			'titles' => true,
			'labels' => false,
		),
		// Display only the specified layouts and color schemes.
		'fields'         => array(
			'display_total'   => true,
			'display_count'   => true,
			'layouts'         => array( 'simple' ),
			'schemes'         => array( 'default', 'bold' ),
			'count_locations' => array( 'inside' ),
		),
		'layout'         => 'simple',
		'scheme'         => 'default',
		'count_location' => 'inside',
	);

	unset( $locations['before-content'] );

	return $locations;
}
add_filter( 'powerkit_share_buttons_locations', 'csco_share_buttons_post_sidebar' );

/**
 * Change Total Output of Floated Share Buttons
 *
 * @param bool   $output  The output.
 * @param string $class   The class.
 * @param int    $count   The count.
 */
function csco_powerkit_share_buttons_total_output( $output, $class, $count ) {

	if ( false !== strpos( $class, 'pk-share-buttons-post_sidebar' ) ) {
		ob_start();
		?>
		<div class="pk-share-buttons-caption cs-font-secondary">
			<?php esc_html_e( 'The post has been shared by', 'spotlight' ); ?>
			<span class="pk-share-buttons-count"> <?php echo esc_html( $count ); ?> </span>
			<?php esc_html_e( 'people.', 'spotlight' ); ?>
		</div>
		<?php
		$output = ob_get_clean();
	}

	return $output;
}
add_filter( 'powerkit_share_buttons_total_output', 'csco_powerkit_share_buttons_total_output', 10, 3 );

/**
 * Register Floated Share Buttons Location
 */
function csco_powerkit_widget_author_image_size() {
	return 'csco-thumbnail-uncropped';
}
add_filter( 'powerkit_widget_author_image_size', 'csco_powerkit_widget_author_image_size' );

/**
 * Change Contributors widget post author description length.
 */
function csco_powerkit_widget_contributors_description_length() {
	return 80;
}
add_filter( 'powerkit_widget_contributors_description_length', 'csco_powerkit_widget_contributors_description_length' );

/**
 * Change thumbnail size for widget featured posts.
 *
 * @param array $thumbnail_size Thumbnail size.
 * @param array $params         Array of params.
 * @param array $instance       Widget instance.
 */
function csco_powerkit_widget_featured_posts_size( $thumbnail_size, $params, $instance ) {
	if ( 'large' === $params['template'] ) {
		$thumbnail_size = 'csco-intermediate-alternative';
	}
	return $thumbnail_size;
}
add_filter( 'powerkit_widget_featured_posts_size', 'csco_powerkit_widget_featured_posts_size', 10, 3 );

/**
 * Add new image selector for Lightbox
 *
 * @param string $selectors List selectors.
 */
function csco_powerkit_lightbox_image_selector( $selectors ) {
	$selectors[] = '.single .post-media img';

	return $selectors;
}

add_filter( 'powerkit_lightbox_image_selectors', 'csco_powerkit_lightbox_image_selector' );

/**
 * Exclude Inline Posts posts from related posts block
 *
 * @param array $args Array of WP_Query args.
 */
function csco_related_posts_args( $args ) {
	global $powerkit_inline_posts;
	if ( ! $powerkit_inline_posts ) {
		return $args;
	}
	$post__not_in         = $args['post__not_in'];
	$post__not_in         = array_unique( array_merge( $post__not_in, $powerkit_inline_posts ) );
	$args['post__not_in'] = $post__not_in;
	return $args;
}

add_filter( 'csco_related_posts_args', 'csco_related_posts_args' );

/**
 * Remove Default Styles
 */
add_action( 'wp_enqueue_scripts', function() {
	wp_dequeue_style( 'powerkit-widget-posts' );
} );
