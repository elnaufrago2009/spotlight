<?php
/**
 * Theme Demos
 *
 * @package Spotlight
 */

/**
 * Theme Demos
 */
function csco_theme_demos() {
	$demos = array(
		// Theme mods imported with every demo.
		'common_mods' => array(),
		// Specific demos.
		'demos' => array(
			'spotlight' => array(
				'name' => 'Spotlight',
				'preview_image_url' => '/images/theme-demos/spotlight.jpg',
				'mods' => array(
					'color_footer_bg' => '#ffffff',
					'color_navbar_bg' => '#ffffff',
					'color_navbar_submenu' => '#0a0a0a',
					'featured_posts' => true,
					'featured_posts_exclude' => true,
					'featured_posts_meta' => array(
						0 => 'shares',
						1 => 'views',
					),
					'featured_posts_orderby' => 'date',
					'featured_posts_type' => 'type-1',
					'font_base' => array(
						'font-family' => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif',
						'variant' => 'regular',
						'subsets' =>
						array(
							'latin',
						),
						'font-size' => '1rem',
						'letter-spacing' => '0px',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),

					'footer_featured_posts' => true,
					'footer_social_links_maximum' => '4',
					'footer_social_links_scheme' => 'light',
					'header_dropdown_follow' => true,
					'header_layout' => 'default',
					'header_social_links_scheme' => 'light',
					'header_subscribe_section' => true,
					'home_layout' => 'list-alternative',
					'home_post_meta' => array(
						0 => 'category',
						1 => 'author',
						2 => 'date',
						3 => 'shares',
						4 => 'views',
					),
					'home_summary' => 'excerpt',
					'post_header_type' => 'standard',
					'post_subscribe' => true,
				),
				'mods_typekit' => array(
					'font_headings' => array(
						'font-family' => 'aktiv-grotesk',
						'variant' => '700',
						'subsets' =>
						array(
							'latin',
						),
						'letter-spacing' => '-0.025em',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 700,
						'font-style' => 'normal',
					),
					'font_menu' => array(
						'font-family' => 'aktiv-grotesk',
						'variant' => 'regular',
						'subsets' =>
						array(
							'latin',
						),
						'font-size' => '0.875rem',
						'letter-spacing' => '0px',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_primary' => array(
						'font-family' => 'aktiv-grotesk',
						'variant' => '700',
						'subsets' =>
						array(
							'latin',
						),
						'font-size' => '0.875rem',
						'letter-spacing' => '-0.025em',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 700,
						'font-style' => 'normal',
					),
					'font_secondary' => array(
						'font-family' => 'aktiv-grotesk',
						'subsets' =>
						array(
							'latin',
						),
						'variant' => 'regular',
						'font-size' => '0.75rem',
						'letter-spacing' => '0px',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_submenu' => array(
						'font-family' => 'aktiv-grotesk',
						'subsets' =>
						array(
							'latin',
						),
						'variant' => 'regular',
						'font-size' => '0.875rem',
						'letter-spacing' => '0px',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_title_block' => array(
						'font-family' => 'aktiv-grotesk',
						'variant' => 'regular',
						'subsets' =>
						array(
							'latin',
						),
						'font-size' => '0.75rem',
						'letter-spacing' => '0px',
						'text-transform' => 'uppercase',
						'color' => '#000000',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
				),
			),
			'crush' => array(
				'name' => 'Crush',
				'preview_image_url' => '/images/theme-demos/crush.jpg',
				'mods' => array(
					'archive_layout' => 'list',
					'color_footer_bg' => '#ffffff',
					'color_navbar_bg' => '#ffffff',
					'color_navbar_submenu' => '#f9f9f9',
					'color_primary' => '#dd3333',
					'featured_posts' => true,
					'featured_posts_exclude' => true,
					'featured_posts_meta' => array(
						0 => 'shares',
						1 => 'views',
					),
					'featured_posts_type' => 'type-2',
					'font_base' => array(
						'font-family' => 'Lora',
						'variant' => 'regular',
						'subsets' =>
						array(
							'latin',
						),
						'font-size' => '1rem',
						'letter-spacing' => '0px',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'footer_featured_posts' => true,
					'footer_social_links_maximum' => '4',
					'footer_social_links_scheme' => 'bold-rounded',
					'header_layout' => 'large',
					'header_offcanvas' => true,
					'header_search_button' => true,
					'header_social_links_scheme' => 'bold',
					'header_subscribe_section' => true,
					'home_layout' => 'list',
					'home_pagination_type' => 'infinite',
					'home_post_meta' => array(
						0 => 'category',
						1 => 'author',
						2 => 'date',
						3 => 'shares',
						4 => 'views',
					),
					'navbar_sticky' => false,
					'post_header_type' => 'wide',
					'post_subscribe' => true,
				),
				'mods_typekit' => array(
					'font_headings' => array(
						'font-family' => 'futura-pt',
						'variant' => '700',
						'subsets' =>
						array(
							'latin',
						),
						'letter-spacing' => '-0.025em',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 700,
						'font-style' => 'normal',
					),
					'font_menu' => array(
						'font-family' => 'futura-pt',
						'variant' => '500',
						'subsets' =>
						array(
							'latin',
						),
						'font-size' => '0.875rem',
						'letter-spacing' => '0.025em',
						'text-transform' => 'uppercase',
						'font-backup' => '',
						'font-weight' => 500,
						'font-style' => 'normal',
					),
					'font_primary' => array(
						'font-family' => 'futura-pt',
						'variant' => '500',
						'subsets' =>
						array(
							'latin',
						),
						'font-size' => '1rem',
						'letter-spacing' => '-0.0125em',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 500,
						'font-style' => 'normal',
					),
					'font_secondary' => array(
						'font-family' => 'futura-pt',
						'subsets' =>
						array(
							'latin',
						),
						'variant' => 'regular',
						'font-size' => '0.875rem',
						'letter-spacing' => '-0.0125em',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_submenu' => array(
						'font-family' => 'futura-pt',
						'subsets' =>
						array(
							'latin',
						),
						'variant' => 'regular',
						'font-size' => '0.875rem',
						'letter-spacing' => '0px',
						'text-transform' => 'uppercase',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_title_block' => array(
						'font-family' => 'futura-pt',
						'variant' => '500',
						'subsets' =>
						array(
							'latin',
						),
						'font-size' => '0.875rem',
						'letter-spacing' => '0.125em',
						'text-transform' => 'uppercase',
						'color' => '#0a0101',
						'font-backup' => '',
						'font-weight' => 500,
						'font-style' => 'normal',
					),
				),
			),
			'supercharged' => array(
				'name' => 'Supercharged',
				'preview_image_url' => '/images/theme-demos/supercharged.jpg',
				'mods' => array(
					'color_navbar_bg' => '#0a0a0a',
					'color_navbar_submenu' => '#1c1e21',
					'color_overlay' => 'rgba(10,10,10,0.56)',
					'color_primary' => '#3ed493',
					'effects_navbar_scroll' => false,
					'featured_posts' => true,
					'featured_posts_exclude' => true,
					'featured_posts_meta' => array(
						0 => 'shares',
						1 => 'views',
					),
					'featured_posts_type' => 'type-3',
					'footer_featured_posts' => true,
					'footer_social_links_maximum' => '4',
					'header_search_button' => true,
					'header_subscribe_section' => true,
					'home_post_meta' => array(
						0 => 'category',
						1 => 'author',
						2 => 'date',
						3 => 'shares',
						4 => 'views',
					),
					'home_sidebar' => 'right',
					'home_summary' => 'excerpt',
					'post_header_type' => 'standard',
					'post_subscribe' => true,
				),
				'mods_typekit' => array(
					'font_base' => array(
						'font-family' => 'pragmatica-web',
						'variant' => 'regular',
						'subsets' =>
						array(
							'latin',
						),
						'font-size' => '1rem',
						'letter-spacing' => '0px',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_headings' => array(
						'font-family' => 'pragmatica-web',
						'variant' => '700',
						'subsets' =>
						array(
							'latin',
						),
						'letter-spacing' => '-0.05em',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 700,
						'font-style' => 'normal',
					),
					'font_menu' => array(
						'font-family' => 'pragmatica-web',
						'variant' => 'regular',
						'subsets' =>
						array(
							'latin',
						),
						'font-size' => '0.75rem',
						'letter-spacing' => '0.075em',
						'text-transform' => 'uppercase',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_primary' => array(
						'font-family' => 'pragmatica-web',
						'variant' => '700',
						'subsets' =>
						array(
							'latin',
						),
						'font-size' => '0.75rem',
						'letter-spacing' => '-0.025em',
						'text-transform' => 'uppercase',
						'font-backup' => '',
						'font-weight' => 700,
						'font-style' => 'normal',
					),
					'font_secondary' => array(
						'font-family' => 'pragmatica-web',
						'subsets' =>
						array(
							'latin',
						),
						'variant' => 'regular',
						'font-size' => '0.875rem',
						'letter-spacing' => '0px',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_submenu' => array(
						'font-family' => 'pragmatica-web',
						'subsets' =>
						array(
							'latin',
						),
						'variant' => 'regular',
						'font-size' => '0.875rem',
						'letter-spacing' => '0px',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_title_block' => array(
						'font-family' => 'pragmatica-web',
						'variant' => 'regular',
						'subsets' =>
						array(
							'latin',
						),
						'font-size' => '.75rem',
						'letter-spacing' => '0px',
						'text-transform' => 'uppercase',
						'color' => '#474747',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
				),
			),
			'quickstack' => array(
				'name' => 'QuickStack',
				'preview_image_url' => '/images/theme-demos/quickstack.jpg',
				'mods' => array(
					'color_navbar_bg' => '#ffffff',
					'color_primary' => '#0a45db',
					'featured_posts' => true,
					'featured_posts_exclude' => true,
					'featured_posts_meta' =>
					array(
						0 => 'shares',
						1 => 'views',
					),
					'featured_posts_type' => 'type-4',
					'font_base' => array(
						'font-family' => 'Lato',
						'variant' => 'regular',
						'subsets' =>
						array(
							'latin',
						),
						'font-size' => '1rem',
						'letter-spacing' => '0px',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'footer_featured_posts' => true,
					'footer_social_links_maximum' => '4',
					'footer_social_links_scheme' => 'light',
					'header_search_button' => false,
					'header_subscribe_section' => true,
					'home_layout' => 'list-alternative',
					'home_pagination_type' => 'load-more',
					'home_post_meta' => array(
						0 => 'category',
						1 => 'author',
						2 => 'date',
						3 => 'shares',
						4 => 'views',
					),
					'post_header_type' => 'standard',
					'post_subscribe' => true,
				),
				'mods_typekit' => array(
					'font_headings' => array(
						'font-family' => 'objektiv-mk1',
						'variant' => '800',
						'subsets' =>
						array(
							'latin',
						),
						'letter-spacing' => '-0.025em',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 800,
						'font-style' => 'normal',
					),
					'font_menu' => array(
						'font-family' => 'objektiv-mk1',
						'variant' => 'regular',
						'subsets' =>
						array(
							'latin',
						),
						'font-size' => '0.875rem',
						'letter-spacing' => '-0.025em',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_primary' => array(
						'font-family' => 'objektiv-mk1',
						'variant' => '700',
						'subsets' =>
						array(
							'latin',
						),
						'font-size' => '0.875rem',
						'letter-spacing' => '-0.025em',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 700,
						'font-style' => 'normal',
					),
					'font_secondary' => array(
						'font-family' => 'objektiv-mk1',
						'subsets' =>
						array(
							'latin',
						),
						'variant' => 'regular',
						'font-size' => '0.75rem',
						'letter-spacing' => '0px',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_submenu' => array(
						'font-family' => 'objektiv-mk1',
						'subsets' =>
						array(
							'latin',
						),
						'variant' => 'regular',
						'font-size' => '0.75rem',
						'letter-spacing' => '-0.025em',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_title_block' => array(
						'font-family' => 'objektiv-mk1',
						'variant' => 'regular',
						'subsets' =>
						array(
							'latin',
						),
						'font-size' => '.875rem',
						'letter-spacing' => '-0.025em',
						'text-transform' => 'capitalize',
						'color' => '#000000',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
				),
			),
			'dailygraph' => array(
				'name' => 'The DailyGraph',
				'preview_image_url' => '/images/theme-demos/dailygraph.jpg',
				'mods' => array(
					0 => false,
					'archive_layout' => 'list-alternative',
					'color_footer_bg' => '#ffffff',
					'color_navbar_bg' => '#ffffff',
					'color_navbar_submenu' => '#0a0a0a',
					'color_primary' => '#333333',
					'effects_navbar_scroll' => false,
					'featured_posts' => true,
					'featured_posts_exclude' => true,
					'featured_posts_meta' => array(
						0 => 'date',
						1 => 'views',
					),
					'font_base' => array(
						'font-family' => 'Lora',
						'variant' => 'regular',
						'subsets' =>
						array(
							'latin',
						),
						'font-size' => '1rem',
						'letter-spacing' => '0px',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'footer_featured_posts' => true,
					'footer_social_links_maximum' => '4',
					'footer_social_links_scheme' => 'light',
					'header_layout' => 'large',
					'header_subscribe_section' => true,
					'home_layout' => 'list-alternative',
					'home_pagination_type' => 'load-more',
					'home_post_meta' => array(
						0 => 'category',
						1 => 'author',
						2 => 'date',
						3 => 'shares',
						4 => 'views',
					),
					'post_header_type' => 'standard',
					'post_subscribe' => true,
				),
				'mods_typekit' => array(
					'font_headings' => array(
						'font-family' => 'freight-display-pro',
						'variant' => '500',
						'subsets' =>
						array(
							'latin',
						),
						'letter-spacing' => '-0.0125em',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 500,
						'font-style' => 'normal',
					),
					'font_menu' => array(
						'font-family' => 'brandon-grotesque',
						'variant' => 'regular',
						'subsets' =>
						array(
							'latin',
						),
						'font-size' => '0.75rem',
						'letter-spacing' => '-0.0125em',
						'text-transform' => 'uppercase',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_primary' => array(
						'font-family' => 'brandon-grotesque',
						'variant' => '700',
						'subsets' =>
						array(
							'latin',
						),
						'font-size' => '0.725rem',
						'letter-spacing' => '0.075em',
						'text-transform' => 'uppercase',
						'font-backup' => '',
						'font-weight' => 700,
						'font-style' => 'normal',
					),
					'font_secondary' => array(
						'font-family' => 'brandon-grotesque',
						'subsets' =>
						array(
							'latin',
						),
						'variant' => 'regular',
						'font-size' => '0.75rem',
						'letter-spacing' => '0px',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_submenu' => array(
						'font-family' => 'brandon-grotesque',
						'subsets' =>
						array(
							'latin',
						),
						'variant' => 'regular',
						'font-size' => '0.875rem',
						'letter-spacing' => '0px',
						'text-transform' => 'none',
						'font-backup' => '',
						'font-weight' => 400,
						'font-style' => 'normal',
					),
					'font_title_block' => array(
						'font-family' => 'brandon-grotesque',
						'variant' => '500',
						'subsets' =>
						array(
							'latin',
						),
						'font-size' => '0.75rem',
						'letter-spacing' => '0.125em',
						'text-transform' => 'uppercase',
						'color' => '#000000',
						'font-backup' => '',
						'font-weight' => 500,
						'font-style' => 'normal',
					),
				),
			),
		),
	);
	return $demos;
}
add_filter( 'csco_theme_demos', 'csco_theme_demos' );
