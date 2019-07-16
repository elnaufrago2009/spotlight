<?php
/**
 * Adding Custom Meta Boxes.
 *
 * @package Spotlight
 */

/**
 * ==================================
 * Layout Options
 * ==================================
 */

/**
 * Add new meta box
 */
function csco_meta_boxe_layout_options() {

	$function = sprintf( 'add_meta_%s', 'box' );

	$function( 'csco_mb_layout_options', esc_html__( 'Layout Options', 'spotlight' ), 'csco_mb_layout_options_callback', array( 'post', 'page', 'product' ), 'side' );
}
add_action( sprintf( 'add_meta_%s', 'boxes' ), 'csco_meta_boxe_layout_options' );

/**
 * Callback meta box
 *
 * @param object $post The post object.
 */
function csco_mb_layout_options_callback( $post ) {

	$page_static = array();

	// Add pages static.
	$page_static[] = get_option( 'page_on_front' );
	$page_static[] = get_option( 'page_for_posts' );

	wp_nonce_field( 'layout_options', 'csco_mb_layout_options' );

	$layout             = get_post_meta( $post->ID, 'csco_layout_in_loop', true );
	$sidebar            = get_post_meta( $post->ID, 'csco_singular_sidebar', true );
	$page_header_type   = get_post_meta( $post->ID, 'csco_page_header_type', true );
	$page_load_nextpost = get_post_meta( $post->ID, 'csco_page_load_nextpost', true );

	// Set Default.
	$layout             = $layout ? $layout : 'default';
	$sidebar            = $sidebar ? $sidebar : 'default';
	$page_header_type   = $page_header_type ? $page_header_type : 'default';
	$page_load_nextpost = $page_load_nextpost ? $page_load_nextpost : 'default';
	?>
		<?php if ( 'post' === $post->post_type ) { ?>
			<h4><label for="csco_layout_in_loop"><?php esc_html_e( 'Layout in Loop', 'spotlight' ); ?></label></h4>
			<select name="csco_layout_in_loop" id="csco_layout_in_loop" class="regular-text">
				<option value="default" <?php selected( 'default', $layout ); ?>><?php esc_html_e( 'Default', 'spotlight' ); ?></option>
				<option value="full" <?php selected( 'full', $layout ); ?>><?php esc_html_e( 'Full Post', 'spotlight' ); ?></option>
				<option value="list" <?php selected( 'list', $layout ); ?>><?php esc_html_e( 'List', 'spotlight' ); ?></option>
				<option value="list-alternative" <?php selected( 'list-alternative', $layout ); ?>><?php esc_html_e( 'List Alternative', 'spotlight' ); ?></option>
			</select>
		<?php } ?>

		<h4><?php esc_html_e( 'Sidebar', 'spotlight' ); ?></h4>
		<select name="csco_singular_sidebar" id="csco_singular_sidebar" class="regular-text">
			<option value="default" <?php selected( 'default', $sidebar ); ?>> <?php esc_html_e( 'Default', 'spotlight' ); ?></option>
			<option value="right" <?php selected( 'right', $sidebar ); ?>> <?php esc_html_e( 'Right Sidebar', 'spotlight' ); ?></option>
			<option value="left" <?php selected( 'left', $sidebar ); ?>> <?php esc_html_e( 'Left Sidebar', 'spotlight' ); ?></option>
			<option value="disabled" <?php selected( 'disabled', $sidebar ); ?>> <?php esc_html_e( 'No Sidebar', 'spotlight' ); ?></option>
		</select>

		<?php if ( ! in_array( (string) $post->ID, $page_static, true ) || 'posts' === get_option( 'show_on_front', 'posts' ) ) { ?>

			<?php if ( 'post' === $post->post_type || 'page' === $post->post_type ) { ?>
				<h4><?php esc_html_e( 'Page Header Type', 'spotlight' ); ?></h4>
				<select name="csco_page_header_type" id="csco_page_header_type" class="regular-text">
					<option value="default" <?php selected( 'default', $page_header_type ); ?>> <?php esc_html_e( 'Default', 'spotlight' ); ?></option>
					<option value="none" <?php selected( 'none', $page_header_type ); ?>> <?php esc_html_e( 'None', 'spotlight' ); ?></option>
					<option value="standard" <?php selected( 'standard', $page_header_type ); ?>> <?php esc_html_e( 'Standard', 'spotlight' ); ?></option>
					<option value="large" <?php selected( 'large', $page_header_type ); ?>> <?php esc_html_e( 'Large', 'spotlight' ); ?></option>
					<option value="wide" <?php selected( 'wide', $page_header_type ); ?>> <?php esc_html_e( 'Wide', 'spotlight' ); ?></option>
					<option value="title" <?php selected( 'title', $page_header_type ); ?>> <?php esc_html_e( 'Page Title Only', 'spotlight' ); ?></option>
				</select>
			<?php } ?>

			<?php if ( 'post' === $post->post_type ) { ?>
				<h4><?php esc_html_e( 'Auto Load Next Post', 'spotlight' ); ?></h4>
				<select name="csco_page_load_nextpost" id="csco_page_load_nextpost" class="regular-text">
					<option value="default" <?php selected( 'default', $page_load_nextpost ); ?>> <?php esc_html_e( 'Default', 'spotlight' ); ?></option>
					<option value="enabled" <?php selected( 'enabled', $page_load_nextpost ); ?>> <?php esc_html_e( 'Enabled', 'spotlight' ); ?></option>
					<option value="disabled" <?php selected( 'disabled', $page_load_nextpost ); ?>> <?php esc_html_e( 'Disabled', 'spotlight' ); ?></option>
				</select>
			<?php } ?>

		<?php } ?>
	<?php
}

/**
 * Save meta box
 *
 * @param int $post_id The post id.
 */
function csco_mb_layout_options_save( $post_id ) {

	// Bail if we're doing an auto save.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// if our nonce isn't there, or we can't verify it, bail.
	if ( ! isset( $_POST['csco_mb_layout_options'] ) || ! wp_verify_nonce( $_POST['csco_mb_layout_options'], 'layout_options' ) ) { // Input var ok; sanitization ok.
		return;
	}

	if ( isset( $_POST['csco_layout_in_loop'] ) ) { // Input var ok; sanitization ok.
		$layout = sanitize_text_field( $_POST['csco_layout_in_loop'] ); // Input var ok; sanitization ok.

		update_post_meta( $post_id, 'csco_layout_in_loop', $layout );
	}

	if ( isset( $_POST['csco_singular_sidebar'] ) ) { // Input var ok; sanitization ok.
		$sidebar = sanitize_text_field( $_POST['csco_singular_sidebar'] ); // Input var ok; sanitization ok.

		update_post_meta( $post_id, 'csco_singular_sidebar', $sidebar );
	}

	if ( isset( $_POST['csco_page_header_type'] ) ) { // Input var ok; sanitization ok.
		$page_header_type = sanitize_text_field( $_POST['csco_page_header_type'] ); // Input var ok; sanitization ok.

		update_post_meta( $post_id, 'csco_page_header_type', $page_header_type );
	}

	if ( isset( $_POST['csco_page_load_nextpost'] ) ) { // Input var ok; sanitization ok.
		$page_load_nextpost = sanitize_text_field( $_POST['csco_page_load_nextpost'] ); // Input var ok; sanitization ok.

		update_post_meta( $post_id, 'csco_page_load_nextpost', $page_load_nextpost );
	}
}
add_action( 'save_post', 'csco_mb_layout_options_save' );

/**
 * ==================================
 * Category Options
 * ==================================
 */

/**
 * Add fields to Category
 *
 * @param string $taxonomy The taxonomy slug.
 */
function csco_mb_category_options_add( $taxonomy ) {
	wp_nonce_field( 'mb_category', 'mb_category' );
	?>
		<h2><?php esc_html_e( 'Category Options', 'spotlight' ); ?></h2>
		<div class="form-field">
			<label for="csco_layout"><?php esc_html_e( 'Layout', 'spotlight' ); ?></label>
			<select name="csco_layout" id="csco_layout" class="regular-text">
				<option value="default"><?php esc_html_e( 'Default', 'spotlight' ); ?></option>
				<option value="full"><?php esc_html_e( 'Full Post', 'spotlight' ); ?></option>
				<option value="list"><?php esc_html_e( 'List', 'spotlight' ); ?></option>
				<option value="list-alternative"><?php esc_html_e( 'List Alternative', 'spotlight' ); ?></option>
			</select>
		</div>
	<?php
}
add_action( 'category_add_form_fields', 'csco_mb_category_options_add', 10 );

/**
 * Edit fields from Category
 *
 * @param object $tag      Current taxonomy term object.
 * @param string $taxonomy Current taxonomy slug.
 */
function csco_mb_category_options_edit( $tag, $taxonomy ) {
	wp_nonce_field( 'mb_category', 'mb_category' );
	$layout = get_term_meta( $tag->term_id, 'csco_layout', true );
	?>
	<tr class="form-field">
		<th scope="row" valign="top"><label for="csco_layout"><?php esc_html_e( 'Layout', 'spotlight' ); ?></label></th>
		<td>
			<select name="csco_layout" id="csco_layout" class="regular-text">
				<option value="default" <?php selected( 'default', $layout ); ?>><?php esc_html_e( 'Default', 'spotlight' ); ?></option>
				<option value="full" <?php selected( 'full', $layout ); ?>><?php esc_html_e( 'Full Post', 'spotlight' ); ?></option>
				<option value="list" <?php selected( 'list', $layout ); ?>><?php esc_html_e( 'List', 'spotlight' ); ?></option>
				<option value="list-alternative" <?php selected( 'list-alternative', $layout ); ?>><?php esc_html_e( 'List Alternative', 'spotlight' ); ?></option>
			</select>
		</td>
	</tr>
	<?php
}
add_action( 'category_edit_form_fields', 'csco_mb_category_options_edit', 10, 2 );

/**
 * Save meta box
 *
 * @param int    $term_id  ID of the term about to be edited.
 * @param string $taxonomy Taxonomy slug of the related term.
 */
function csco_mb_category_options_save( $term_id, $taxonomy ) {

	// Bail if we're doing an auto save.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// if our nonce isn't there, or we can't verify it, bail.
	if ( ! isset( $_POST['mb_category'] ) || ! wp_verify_nonce( $_POST['mb_category'], 'mb_category' ) ) { // Input var ok; sanitization ok.
		return;
	}

	if ( isset( $_POST['csco_layout'] ) ) { // Input var ok; sanitization ok.
		$layout = sanitize_text_field( $_POST['csco_layout'] ); // Input var ok; sanitization ok.

		update_term_meta( $term_id, 'csco_layout', $layout );
	}
}
add_action( 'created_category', 'csco_mb_category_options_save', 10, 2 );
add_action( 'edited_category', 'csco_mb_category_options_save', 10, 2 );
