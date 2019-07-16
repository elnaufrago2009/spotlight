<?php
/**
 * WooCommerce compatibility functions.
 *
 * @package Spotlight
 */

if ( class_exists( 'WooCommerce' ) ) {

	/**
	 * Add support WooCommerce.
	 */
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	/**
	 * Remove footer posts for WooCommerce.
	 */
	add_action( 'template_redirect', function() {
		if ( is_woocommerce() || is_product_category() || is_product_tag() || is_cart() || is_checkout() ) {
			remove_action( 'csco_footer_before', 'csco_footer_posts' );
		}
	});

	/**
	 * Disable shop page title.
	 */
	add_filter( 'woocommerce_show_page_title', function( $default ) {
		return is_shop() ? false : $default;
	} );

	/**
	 * Add css selectors to output of kirki.
	 */
	add_filter( 'csco_color_primary', function( $rules ) {
		array_push( $rules, array(
			'element'  => csco_implode( array(
				'.woocommerce div.product form.cart button[name="add-to-cart"]',
				'.woocommerce div.product form.cart button[type="submit"]',
				'.woocommerce .widget_shopping_cart .buttons a',
				'.woocommerce .wc-proceed-to-checkout a.checkout-button.alt',
				'.woocommerce ul.products li.product .onsale',
				'.woocommerce #respond input#submit',
				'.woocommerce span.onsale',
				'.woocommerce-cart .return-to-shop a.button',
				'.woocommerce-checkout #payment .button.alt',
			) ),
			'property' => 'background-color',
		) );
		return $rules;
	} );

	add_filter( 'csco_color_primary', function( $rules ) {
		array_push( $rules, array(
			'element'  => csco_implode( array(
				'.woocommerce .woocommerce-pagination .page-numbers li > a:hover',
				'.woocommerce li.product .price a:hover',
				'.woocommerce .star-rating',
			) ),
			'property' => 'color',
		) );
		return $rules;
	} );

	add_filter( 'csco_font_headings', function( $rules ) {
		array_push( $rules, array(
			'element' => csco_implode( array(
				'.woocommerce ul.cart_list li a',
				'.woocommerce ul.product_list_widget li a',
				'.woocommerce div.product .woocommerce-tabs ul.tabs li',
				'.woocommerce.widget_products span.product-title',
				'.woocommerce.widget_recently_viewed_products span.product-title',
				'.woocommerce.widget_recent_reviews span.product-title',
				'.woocommerce.widget_top_rated_products span.product-title',
				'.woocommerce-loop-product__title',
				'.woocommerce table.shop_table th',
				'.woocommerce-tabs .panel h2',
				'.related.products > h2',
				'.upsells.products > h2',
			) ),
		) );
		return $rules;
	} );

	add_filter( 'csco_font_secondary', function( $rules ) {
		array_push( $rules, array(
			'element' => csco_implode( array(
				'.navbar-cart .cart-quantity',
				'.widget_shopping_cart .quantity',
				'.woocommerce .widget_layered_nav_filters ul li a',
				'.woocommerce.widget_layered_nav_filters ul li a',
				'.woocommerce.widget_products ul.product_list_widget li',
				'.woocommerce.widget_recently_viewed_products ul.product_list_widget li',
				'.woocommerce.widget_recent_reviews ul.product_list_widget li',
				'.woocommerce.widget_top_rated_products ul.product_list_widget li',
				'.woocommerce .widget_price_filter .price_slider_amount',
				'.woocommerce .woocommerce-result-count',
				'.woocommerce ul.products li.product .price',
				'.woocommerce .woocommerce-breadcrumb',
				'.woocommerce .product_meta',
				'.woocommerce span.onsale',
				'.woocommerce-page .woocommerce-breadcrumb',
				'.woocommerce-mini-cart__total total',
				'.woocommerce-input-wrapper .select2-selection__rendered',
				'.woocommerce table.shop_table.woocommerce-checkout-review-order-table th',
				'.woocommerce table.shop_table.woocommerce-checkout-review-order-table td',
			) ),
		) );
		return $rules;
	} );

	add_filter( 'csco_font_primary', function( $rules ) {
		array_push( $rules, array(
			'element' => csco_implode( array(
				'.woocommerce #respond input#submit',
				'.woocommerce a.button',
				'.woocommerce button.button',
				'.woocommerce input.button',
				'.woocommerce #respond input#submit.alt',
				'.woocommerce a.button.alt',
				'.woocommerce button.button.alt',
				'.woocommerce input.button.alt',
				'.woocommerce-pagination',
				'.woocommerce nav.woocommerce-pagination .page-numbers li > span',
				'.woocommerce nav.woocommerce-pagination .page-numbers li > a',
				'.woocommerce ul.products li.product .button',
				'.woocommerce li.product .price',
				'.woocommerce div.product .woocommerce-tabs ul.tabs li a',
				'.woocommerce-form__label-for-checkbox span',
				'.wc_payment_method.payment_method_bacs label',
				'.wc_payment_method.payment_method_cheque label',
			) ),
		) );
		return $rules;
	} );

	add_filter( 'csco_font_post_content', function( $rules ) {
		array_push( $rules, array(
			'element' => csco_implode( array(
				'.woocommerce-tabs .entry-content',
			) ),
		) );
		return $rules;
	} );

	add_filter( 'csco_font_title_block', function( $rules ) {
		array_push( $rules, array(
			'element' => csco_implode( array(
				'.woocommerce .woocommerce-tabs .panel h2',
				'.woocommerce .related.products > h2',
				'.woocommerce .upsells.products > h2 ',
				'.woocommerce ul.order_details li',
				'.woocommerce-order-details .woocommerce-order-details__title',
				'.woocommerce-customer-details .woocommerce-column__title',
				'.woocommerce-account .addresses .title h3',
				'.woocommerce-checkout h3',
				'.woocommerce-EditAccountForm legend',
				'.cross-sells > h2',
				'.cart_totals > h2',
			) ),
		) );
		return $rules;
	} );

	/**
	 * Add fields to WooCommerce.
	 */
	function csco_wc_add_fields_customizer() {
		CSCO_Kirki::add_field(
			'csco_theme_mod', array(
				'type'     => 'checkbox',
				'settings' => 'woocommerce_product_catalog_cart',
				'label'    => esc_html__( 'Display add to cart buttom', 'spotlight' ),
				'section'  => 'woocommerce_product_catalog',
				'default'  => false,
				'priority' => 10,
			)
		);

		CSCO_Kirki::add_section(
			'woocommerce_product_page', array(
				'title'    => esc_html__( 'Product Page', 'spotlight' ),
				'panel'    => 'woocommerce',
				'priority' => 30,
			)
		);

		CSCO_Kirki::add_field(
			'csco_theme_mod', array(
				'type'     => 'radio',
				'settings' => 'woocommerce_product_page_sidebar',
				'label'    => esc_html__( 'Default Sidebar', 'spotlight' ),
				'section'  => 'woocommerce_product_page',
				'default'  => 'right',
				'priority' => 5,
				'choices'  => array(
					'right'    => esc_attr__( 'Right Sidebar', 'spotlight' ),
					'left'     => esc_attr__( 'Left Sidebar', 'spotlight' ),
					'disabled' => esc_attr__( 'No Sidebar', 'spotlight' ),
				),
			)
		);

		CSCO_Kirki::add_section(
			'woocommerce_product_misc', array(
				'title'    => esc_html__( 'Miscellaneous', 'spotlight' ),
				'panel'    => 'woocommerce',
				'priority' => 50,
			)
		);

		CSCO_Kirki::add_field(
			'csco_theme_mod', array(
				'type'     => 'checkbox',
				'settings' => 'woocommerce_header_hide_icon',
				'label'    => esc_html__( 'Hide Cart Icon in Header', 'spotlight' ),
				'section'  => 'woocommerce_product_misc',
				'default'  => false,
				'priority' => 10,
			)
		);
	}
	add_action( 'init', 'csco_wc_add_fields_customizer' );

	/**
	 * Woocommerce loop add to cart
	 */
	function csco_wc_shop_loop_item() {
		if ( ! get_theme_mod( 'woocommerce_product_catalog_cart', false ) ) {
			remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
		}
	}
	add_action( 'template_redirect', 'csco_wc_shop_loop_item' );

	/**
	 * Woocommerce gallery image width
	 */
	function csco_wc_gallery_thumbnail_image_width() {
		add_theme_support( 'woocommerce', array( 'gallery_thumbnail_image_width' => 300 ) );
	}
	add_action( 'template_redirect', 'csco_wc_gallery_thumbnail_image_width' );

	/**
	 * Enqueues WooCommerce assets.
	 */
	function csco_wc_enqueue_scripts() {
		$theme = wp_get_theme();

		$version = $theme->get( 'Version' );

		// Register WooCommerce styles.
		wp_register_style( 'csco_css_wc', csco_style( get_template_directory_uri() . '/css/woocommerce.css' ), array(), $version );

		// Enqueue WooCommerce styles.
		wp_enqueue_style( 'csco_css_wc' );

		// Add RTL support.
		wp_style_add_data( 'csco_css_wc', 'rtl', 'replace' );
	}
	add_action( 'wp_enqueue_scripts', 'csco_wc_enqueue_scripts' );

	/**
	 * PinIt exclude selectors
	 *
	 * @param string $selectors List selectors.
	 */
	function csco_wc_pinit_exclude_selectors( $selectors ) {
		$selectors[] = '.woocommerce .products img';
		$selectors[] = '.woocommerce-product-gallery img';
		$selectors[] = '.woocommerce-cart-form .product-thumbnail img';

		return $selectors;
	}
	add_filter( 'powerkit_pinit_exclude_selectors', 'csco_wc_pinit_exclude_selectors' );

	/**
	 * Get Page Sidebar
	 *
	 * @param string $sidebar Page sidebar.
	 */
	function csco_wc_get_page_sidebar( $sidebar ) {

		if ( is_woocommerce() || is_product_category() || is_product_tag() || is_cart() || is_checkout() ) {

			global $post;

			if ( is_shop() ) {
				$post_id = wc_get_page_id( 'shop' );
			} else {
				$post_id = $post->ID;
			}

			// Get sidebar for current post.
			$sidebar = get_post_meta( $post_id, 'csco_singular_sidebar', true );

			if ( ! $sidebar || 'default' === $sidebar ) {

				$sidebar = get_theme_mod( 'page_sidebar', 'disabled' );

				if ( is_product() ) {
					$sidebar = get_theme_mod( 'woocommerce_product_page_sidebar', 'right' );
				}
			}
		} elseif ( is_account_page() ) {

			$sidebar = get_theme_mod( 'page_sidebar', 'disabled' );

		}

		return $sidebar;

	}
	add_filter( 'csco_page_sidebar', 'csco_wc_get_page_sidebar' );

	/**
	 * Register WooCommerce Sidebar
	 */
	function csco_wc_widgets_init() {

		$tag = apply_filters( 'csco_section_title_tag', 'h5' );

		register_sidebar(
			array(
				'name'          => esc_html__( 'WooCommerce', 'spotlight' ),
				'id'            => 'sidebar-woocommerce',
				'before_widget' => '<div class="widget %1$s %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<' . $tag . ' class="title-block title-widget">',
				'after_title'   => '</' . $tag . '>',
			)
		);
	}
	add_action( 'widgets_init', 'csco_wc_widgets_init' );

	/**
	 * Overwrite Default Sidebar
	 *
	 * @param string $sidebar Sidebar slug.
	 */
	function csco_wc_sidebar( $sidebar ) {
		if ( is_woocommerce() || is_cart() || is_checkout() || is_account_page() ) {
			return 'sidebar-woocommerce';
		}
		return $sidebar;
	}

	add_filter( 'csco_sidebar', 'csco_wc_sidebar' );

	/**
	 * Add cart to header
	 */
	function csco_wc_nav_cart() {
		if ( ! get_theme_mod( 'woocommerce_header_hide_icon', false ) ) {

			$quantity = intval( WC()->cart->get_cart_contents_count() );
			?>
			<a class="navbar-cart" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_html_e( 'View your shopping cart', 'spotlight' ); ?>">
				<i class="cs-icon cs-icon-bag"></i>
				<?php if ( $quantity ) { ?>
					<span class="cart-quantity"><?php echo esc_html( $quantity ); ?></span>
				<?php } ?>
			</a>
			<?php
		}
	}
	add_action( 'csco_navbar_content', 'csco_wc_nav_cart', 45 );
	add_action( 'csco_navbar_large_bottombar', 'csco_wc_nav_cart', 25 );


	/**
	 * Add location for update nav cart
	 *
	 * @param array $fragments The cart fragments.
	 */
	function csco_wc_update_nav_cart( $fragments ) {

		ob_start();

		csco_wc_nav_cart();

		$fragments['a.navbar-cart'] = ob_get_clean();

		return $fragments;

	}
	add_filter( 'woocommerce_add_to_cart_fragments', 'csco_wc_update_nav_cart', 10, 1 );

	/**
	 * Toc exclude selectors.
	 *
	 * @param string $selectors The selectors.
	 */
	function csco_wc_toc_exclude( $selectors ) {
		$selectors .= '|.woocommerce-loop-product__title';

		return $selectors;
	}
	add_filter( 'pk_toc_exclude', 'csco_wc_toc_exclude' );

	/**
	 * WC Breadcrumbs
	 */
	function csco_wc_breadcrumbs() {
		$display_options = get_option( 'wpseo_titles' );

		if ( ! isset( $display_options['breadcrumbs-enable'] ) ) {
			$display_options['breadcrumbs-enable'] = false;
		}

		if ( function_exists( 'yoast_breadcrumb' ) && $display_options['breadcrumbs-enable'] ) {
			yoast_breadcrumb( '<section class="cs-breadcrumbs" id="breadcrumbs">', '</section>' );
		} else {
			woocommerce_breadcrumb();
		}
	}

	/**
	 * WC Change Theme Breadcrumbs
	 *
	 * @param bool $enabled The enabled breadcrumbs.
	 */
	function csco_wc_theme_breadcrumbs( $enabled ) {
		if ( is_product_taxonomy() || is_product() || is_cart() || is_checkout() || is_account_page() ) {
			csco_wc_breadcrumbs();
			return false;
		}
		if ( is_shop() ) {
			return false;
		}
		return $enabled;
	}
	add_filter( 'csco_breadcrumbs', 'csco_wc_theme_breadcrumbs' );

	/**
	 * Remove default breadcrumbs
	 */
	function csco_wc_remove_breadcrumbs() {
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
	}
	add_action( 'template_redirect', 'csco_wc_remove_breadcrumbs' );

	/**
	 * Remove default post header
	 */
	function csco_wc_remove_post_header() {
		if ( is_product() ) {
			remove_action( 'csco_site_content_start', 'csco_post_header', 100 );
		}
	}
	add_action( 'template_redirect', 'csco_wc_remove_post_header' );

	/**
	 * WooCommerce page header.
	 */
	function csco_wc_page_header() {
		if ( is_shop() ) {
			$shop_id = wc_get_page_id( 'shop' );

			$allow = array( 'none', 'standard', 'large', 'wide', 'title' );

			$page_header = get_post_meta( $shop_id, 'csco_page_header_type', true );

			if ( ! in_array( $page_header, $allow, true ) || 'default' === $page_header ) {
				$page_header = get_theme_mod( 'page_header_type', 'standard' );
			}

			$page_header = apply_filters( 'csco_page_header_type', $page_header );

			if ( 'none' === $page_header ) {
				return;
			}

			$no_paged = in_array( absint( get_query_var( 'paged' ) ), array( 0, 1 ), true );

			if ( ! $no_paged ) {
				$page_header = 'standard';
			}

			if ( ! ( 'standard' === $page_header || 'title' === $page_header ) && 'woocommerce_before_main_content' === current_filter() ) {
				return;
			}

			if ( ( 'standard' === $page_header || 'title' === $page_header ) && 'csco_site_content_before' === current_filter() ) {
				return;
			}

			$class = sprintf( 'entry-header-%s', $page_header );

			if ( has_post_thumbnail() ) {
				$class .= ' entry-header-thumbnail';
			}

			if ( 'wide' === $page_header ) {
				$class .= ' cs-overlay cs-overlay-no-hover cs-overlay-ratio cs-bg-dark';
			}

			$image_size = 'csco-medium';

			if ( 'disabled' === csco_get_page_sidebar() ) {
				$image_size = 'csco-large';
			}

			if ( 'uncropped' === get_theme_mod( 'page_media_preview', 'cropped' ) ) {
				$image_size = sprintf( '%s-uncropped', $image_size );
			}

			if ( 'large' === $page_header || 'wide' === $page_header ) {
				$image_size = 'csco-extra-large';
			}
			?>
			<header class="entry-header <?php echo esc_attr( $class ); ?>">

				<?php if ( 'large' === $page_header && has_post_thumbnail( $shop_id ) ) { ?>
					<div class="cs-overlay cs-overlay-simple cs-overlay-ratio cs-ratio-large">
						<div class="cs-overlay-background">
						<?php
						echo get_the_post_thumbnail( $shop_id, $image_size, array(
							'class' => 'pk-lazyload-disabled',
						) );
						?>
						</div>
					</div>
				<?php } ?>

				<div class="cs-container">
					<?php
					if ( has_post_thumbnail( $shop_id ) && 'standard' === $page_header ) {
						$thumbnail_enabled = true;
					} elseif ( 'wide' === $page_header ) {
						$thumbnail_enabled = true;
					} else {
						$thumbnail_enabled = false;
					}

					if ( $thumbnail_enabled && $no_paged ) {
						?>
						<div class="<?php echo ( 'wide' === $page_header ) ? 'cs-overlay-background' : 'entry-header-thumbnail'; ?>">
							<?php
							echo get_the_post_thumbnail( $shop_id, $image_size, array(
								'class' => 'pk-lazyload-disabled',
							) );
							?>
						</div>
					<?php } ?>

					<div class="<?php echo ( 'wide' === $page_header ) ? 'cs-overlay-content' : 'entry-header-content'; ?>">
						<?php csco_wc_breadcrumbs(); ?>

						<h1 class="entry-title">
							<?php echo get_the_title( $shop_id ); ?>
						</h1>
					</div>
				</div>
			</header>
			<?php
		}
	}
	add_action( 'csco_site_content_before', 'csco_wc_page_header' );
	add_action( 'woocommerce_before_main_content', 'csco_wc_page_header' );

	// Remove default wrappers.
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

	/**
	 * Wrapper Start
	 */
	function csco_wc_wrapper_start() {
		?>
		<div id="primary" class="content-area">
			<div class="woocommerce-area">
		<?php
	}
	add_action( 'woocommerce_before_main_content', 'csco_wc_wrapper_start', 1 );

	/**
	 * Wrapper End
	 */
	function csco_wc_wrapper_end() {
		?>
			</div>
		</div>
		<?php
	}
	add_action( 'woocommerce_after_main_content', 'csco_wc_wrapper_end', 999 );
}
