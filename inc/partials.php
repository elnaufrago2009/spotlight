<?php
/**
 * These functions are used to load template parts (partials) or actions when used within action hooks,
 * and they probably should never be updated or modified.
 *
 * @package Spotlight
 */

if ( ! function_exists( 'csco_singular_post_type_before' ) ) {
	/**
	 * Add Before Singular Hooks for specific post type.
	 */
	function csco_singular_post_type_before() {
		if ( 'post' === get_post_type() ) {
			do_action( 'csco_post_content_before' );
		}
		if ( 'page' === get_post_type() ) {
			do_action( 'csco_page_content_before' );
		}
	}
}

if ( ! function_exists( 'csco_singular_post_type_after' ) ) {
	/**
	 * Add After Singular Hooks for specific post type.
	 */
	function csco_singular_post_type_after() {
		if ( 'post' === get_post_type() ) {
			do_action( 'csco_post_content_after' );
		}
		if ( 'page' === get_post_type() ) {
			do_action( 'csco_page_content_after' );
		}
	}
}

if ( ! function_exists( 'csco_singular_post_type_start' ) ) {
	/**
	 * Add Start Singular Hooks for specific post type.
	 */
	function csco_singular_post_type_start() {
		if ( 'post' === get_post_type() ) {
			do_action( 'csco_post_content_start' );
		}
		if ( 'page' === get_post_type() ) {
			do_action( 'csco_page_content_start' );
		}
	}
}

if ( ! function_exists( 'csco_singular_post_type_end' ) ) {
	/**
	 * Add End Singular Hooks for specific post type.
	 */
	function csco_singular_post_type_end() {
		if ( 'post' === get_post_type() ) {
			do_action( 'csco_post_content_end' );
		}
		if ( 'page' === get_post_type() ) {
			do_action( 'csco_page_content_end' );
		}
	}
}

if ( ! function_exists( 'csco_offcanvas' ) ) {
	/**
	 * Off-canvas
	 */
	function csco_offcanvas() {
		get_template_part( 'template-parts/offcanvas' );
	}
}

if ( ! function_exists( 'csco_header_offcanvas_button' ) ) {
	/**
	 * Header Offcanvas Button
	 */
	function csco_header_offcanvas_button() {
		if ( csco_offcanvas_exists() ) {

			$class = sprintf( 'toggle-offcanvas-%s', get_theme_mod( 'header_offcanvas', true ) ? 'show' : 'hide' );

			if ( ! is_active_sidebar( 'sidebar-offcanvas' ) ) {
				$class = ' cs-d-lg-none';
			}
		?>
		<button type="button" class="navbar-toggle-offcanvas toggle-offcanvas <?php echo esc_attr( $class ); ?>">
			<i class="cs-icon cs-icon-menu"></i>
		</button>
		<?php
		}
	}
}

if ( ! function_exists( 'csco_header_logo' ) ) {
	/**
	 * Header Logo
	 */
	function csco_header_logo() {
		$logo_id = get_theme_mod( 'logo' );

		if ( $logo_id ) {
			?>
			<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php csco_get_retina_image( $logo_id, array( 'alt' => get_bloginfo( 'name' ) ) ); ?>
			</a>
			<?php
		} else {
			?>
			<a class="navbar-brand site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			<?php
		}
	}
}

if ( ! function_exists( 'csco_navbar_nav_menu' ) ) {
	/**
	 * Header Nav Menu
	 */
	function csco_navbar_nav_menu() {
		if ( has_nav_menu( 'primary' ) ) {
			$submenu_scheme = csco_light_or_dark( get_theme_mod( 'color_navbar_submenu', '#000000' ), null, ' cs-navbar-nav-submenu-dark' );

			wp_nav_menu( array(
				'menu_class'      => sprintf( 'navbar-nav %s', $submenu_scheme ),
				'theme_location'  => 'primary',
				'container'       => '',
				'container_class' => '',
			) );
		}
	}
}

if ( ! function_exists( 'csco_header_dropdown_follow' ) ) {
	/**
	 * Header Dropdown Follow
	 */
	function csco_header_dropdown_follow() {

		if ( ! get_theme_mod( 'header_social_links', false ) && ! get_theme_mod( 'header_subscribe_section', false ) ) {
			return;
		}

		// Dropdown Content.
		ob_start();
		if ( csco_powerkit_module_enabled( 'social_links' ) && get_theme_mod( 'header_social_links', false ) ) {
			// Check exists Social Links.
			if ( powerkit_social_links_exists() || current_user_can( 'administrator' ) ) {
				$scheme  = get_theme_mod( 'header_social_links_scheme', 'light' );
				$maximum = get_theme_mod( 'header_social_links_maximum', 4 );
				$counts  = get_theme_mod( 'header_social_links_counts', true );

				powerkit_social_links( false, false, $counts, 'col-' . esc_attr( $maximum ), $scheme, 'mixed', $maximum );
			}
		}

		if ( csco_powerkit_module_enabled( 'opt_in_forms' ) && get_theme_mod( 'header_subscribe_section', false ) ) {
			// Check exists Mailchimp.
			if ( powerkit_mailchimp_form_exists() || current_user_can( 'administrator' ) ) {
			?>
				<div class="navbar-subscribe">
					<?php
						$title = get_theme_mod( 'header_subscribe_title', esc_html__( 'Sign Up for Our Newsletters', 'spotlight' ) );
						$text  = get_theme_mod( 'header_subscribe_text', esc_html__( 'Get notified of the best deals on our WordPress themes.', 'spotlight' ) );
						$name  = get_theme_mod( 'header_subscribe_name', false );

						$shortcode = sprintf( '[powerkit_subscription_form title="%s" text="%s" display_name="%s"]', $title, $text, $name );

						echo do_shortcode( apply_filters( 'csco_subscribe_shortcode', $shortcode, 'header', $text, $title, null ) );
					?>
				</div>
			<?php
			}
		}
		$content = ob_get_clean();

		// Dropdown Output.
		if ( $content ) {
			$bg_scheme = csco_light_or_dark( get_theme_mod( 'color_navbar_submenu', '#000000' ), null, ' cs-bg-dark' );
			?>
			<div class="navbar-dropdown-follow">
				<span class="navbar-dropdown-btn-follow"><?php echo esc_html( get_theme_mod( 'header_dropdown_title', esc_html__( 'Follow', 'spotlight' ) ) ); ?></span>

				<div class="navbar-dropdown-container <?php echo esc_attr( $bg_scheme ); ?>">
					<?php echo (string) $content; // XSS. ?>
				</div>
			</div>
			<?php
		}
	}
}

if ( ! function_exists( 'csco_header_search_button' ) ) {
	/**
	 * Header Social Links
	 */
	function csco_header_search_button() {
		if ( ! get_theme_mod( 'header_search_button', true ) ) {
			return;
		}
		?>
		<button type="button" class="navbar-toggle-search toggle-search">
			<i class="cs-icon cs-icon-search"></i>
		</button>
		<?php
	}
}

if ( ! function_exists( 'csco_single_subscribe' ) ) {
	/**
	 * Post Subscribe
	 */
	function csco_single_subscribe() {
		if ( false === get_theme_mod( 'post_subscribe', false ) ) {
			return;
		}

		if ( csco_powerkit_module_enabled( 'opt_in_forms' ) ) {

			if ( ! is_singular( 'post' ) ) {
				return;
			}

			get_template_part( 'template-parts/post-subscribe' );
		}
	}
}

if ( ! function_exists( 'csco_comments' ) ) {
	/**
	 * Post Comments
	 */
	function csco_comments() {
		if ( post_password_required() ) {
			return;
		}

		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	}
}

if ( ! function_exists( 'csco_site_search' ) ) {
	/**
	 * Site Search
	 */
	function csco_site_search() {
		get_template_part( 'template-parts/site-search' );
	}
}

if ( ! function_exists( 'csco_post_header' ) ) {
	/**
	 * Post Header
	 */
	function csco_post_header() {
		if ( ! is_singular() ) {
			return;
		}
		if ( 'none' === csco_get_page_header_type() ) {
			return;
		}
		get_template_part( 'template-parts/post-header' );
	}
}

if ( ! function_exists( 'csco_page_header' ) ) {
	/**
	 * Page Header
	 */
	function csco_page_header() {
		if ( ! ( is_home() || is_archive() || is_search() || is_404() ) ) {
			return;
		}
		get_template_part( 'template-parts/page-header' );
	}
}

if ( ! function_exists( 'csco_breadcrumbs' ) ) {
	/**
	 * SEO Breadcrumbs
	 *
	 * @param bool $is_singular Display the breadcrumbs in full post.
	 */
	function csco_breadcrumbs( $is_singular = false ) {
		if ( is_front_page() || is_category() ) {
			return;
		}

		if ( ( is_singular( 'post' ) || is_singular( 'page' ) ) && ! $is_singular ) {
			return;
		}

		if ( apply_filters( 'csco_breadcrumbs', true ) ) {
			if ( ! function_exists( 'yoast_breadcrumb' ) ) {
				return;
			}
			yoast_breadcrumb( '<section class="cs-breadcrumbs" id="breadcrumbs">', '</section>' );
		}
	}
}

if ( ! function_exists( 'csco_subcategories' ) ) {
	/**
	 * Subcategories
	 */
	function csco_subcategories() {

		if ( false === get_theme_mod( 'category_subcategories', false ) ) {
			return;
		}

		if ( ! is_category() ) {
			return;
		}

		$args = apply_filters( 'csco_subcategories_args', array(
			'parent' => get_query_var( 'cat' ),
		) );

		$categories = get_categories( $args );

		if ( $categories ) {
		?>
		<section class="subcategories">
			<?php $tag = apply_filters( 'csco_section_title_tag', 'h5' ); ?>
			<<?php echo esc_html( $tag ); ?> class="title-block"><?php esc_html_e( 'Subcategories', 'spotlight' ); ?></<?php echo esc_html( $tag ); ?>>
			<ul class="cs-nav cs-nav-pills">
			<?php
			foreach ( $categories as $category ) {
				// Translators: category name.
				$title = sprintf( esc_html__( 'View all posts in %s', 'spotlight' ), $category->name );
				$link  = get_category_link( $category->term_id )
				?>
					<li class="cs-nav-item">
						<a class="cs-nav-link" data-toggle="pill" href="<?php echo esc_url( $link ); ?>" title="<?php echo esc_attr( $title ); ?>">
							<?php echo esc_html( $category->name ); ?>
						</a>
					</li>
				<?php
			}
			?>
			</ul>
		</section>
		<?php
		}
	}
}

if ( ! function_exists( 'csco_homepage_posts' ) ) {
	/**
	 * Homepage Posts Section
	 */
	function csco_homepage_posts() {

		if ( false === get_theme_mod( 'featured_posts', false ) ) {
			return;
		}

		if ( ! ( is_front_page() || is_home() ) ) {
			return;
		}

		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

		if ( 1 !== $paged ) {
			return;
		}

		if ( is_front_page() && 'page' === get_option( 'show_on_front', 'posts' ) && 'home' === get_theme_mod( 'featured_posts_location', 'front_page' ) ) {
			return;
		}

		if ( is_home() && 'page' === get_option( 'show_on_front', 'posts' ) && 'front_page' === get_theme_mod( 'featured_posts_location', 'front_page' ) ) {
			return;
		}

		get_template_part( 'template-parts/homepage-posts' );
	}
}

if ( ! function_exists( 'csco_category_posts' ) ) {
	/**
	 * Category Posts Section
	 */
	function csco_category_posts() {

		if ( false === get_theme_mod( 'category_featured_posts', false ) ) {
			return;
		}

		if ( ! is_category() ) {
			return;
		}

		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

		if ( 1 !== $paged ) {
			return;
		}

		get_template_part( 'template-parts/category-posts' );
	}
}

if ( ! function_exists( 'csco_footer_posts' ) ) {
	/**
	 * Footer Posts Section
	 */
	function csco_footer_posts() {

		if ( false === get_theme_mod( 'footer_featured_posts', false ) ) {
			return;
		}

		get_template_part( 'template-parts/footer-posts' );
	}
}

if ( ! function_exists( 'csco_related_posts' ) ) {
	/**
	 * Related Posts
	 */
	function csco_related_posts() {
		if ( ! is_singular( 'post' ) ) {
			return;
		}
		if ( false === get_theme_mod( 'related', true ) ) {
			return;
		}
		get_template_part( 'template-parts/related-posts' );
	}
}

if ( ! function_exists( 'csco_post_sidebar_date' ) ) {
	/**
	 * Post Sidebar Date
	 */
	function csco_post_sidebar_date() {
		if ( csco_has_post_meta( 'date' ) || csco_has_post_meta( 'updated_date', false ) ) {
			get_template_part( 'template-parts/post-sidebar-date' );
		}
	}
}

if ( ! function_exists( 'csco_post_sidebar_author' ) ) {
	/**
	 * Post Sidebar Author
	 */
	function csco_post_sidebar_author() {
		if ( ! csco_has_post_meta( 'author' ) ) {
			return;
		}
		get_template_part( 'template-parts/post-sidebar-author' );
	}
}

if ( ! function_exists( 'csco_post_sidebar_tags' ) ) {
	/**
	 * Post Sidebar Tags
	 */
	function csco_post_sidebar_tags() {
		if ( get_theme_mod( 'post_tags', true ) ) {
			$tag = apply_filters( 'csco_section_title_tag', 'h5' );
			the_tags( '<section class="post-section post-sidebar-tags"><' . esc_html( $tag ) . ' class="title-block title-tags">' . esc_html__( 'Tags', 'spotlight' ) . '</' . esc_html( $tag ) . '><ul><li>', ',</li><li>', '</li></ul></section>' );
		}
	}
}

if ( ! function_exists( 'csco_post_sidebar_shares' ) ) {
	/**
	 * Post Sidebar Shares
	 */
	function csco_post_sidebar_shares() {
		if ( ! csco_has_post_meta( 'shares' ) ) {
			return;
		}
		get_template_part( 'template-parts/post-sidebar-shares' );
	}
}

if ( ! function_exists( 'csco_meet_team' ) ) {
	/**
	 * Meet Team
	 */
	function csco_meet_team() {
		if ( is_page_template( 'template-meet-team.php' ) ) {
			get_template_part( 'template-parts/meet-team' );
		}
	}
}
