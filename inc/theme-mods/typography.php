<?php
/**
 * Typography
 *
 * @package Spotlight
 */

CSCO_Kirki::add_panel(
	'typography', array(
		'title'    => esc_html__( 'Typography', 'spotlight' ),
		'priority' => 30,
	)
);

CSCO_Kirki::add_section(
	'typography_general', array(
		'title'    => esc_html__( 'General', 'spotlight' ),
		'panel'    => 'typography',
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'typography',
		'settings' => 'font_base',
		'label'    => esc_html__( 'Base Font', 'spotlight' ),
		'section'  => 'typography_general',
		'default'  => array(
			'font-family'    => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif',
			'variant'        => 'regular',
			'subsets'        => array( 'latin' ),
			'font-size'      => '1rem',
			'letter-spacing' => '0',
		),
		'choices'  => apply_filters( 'powerkit_fonts_choices', array(
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
		) ),
		'priority' => 10,
		'output'   => apply_filters( 'csco_font_base', array(
			array(
				'element' => 'body',
			),
		) ),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'        => 'typography',
		'settings'    => 'font_primary',
		'label'       => esc_html__( 'Primary Font', 'spotlight' ),
		'description' => esc_html__( 'Used for buttons, categories and tags, post meta links and other actionable elements.', 'spotlight' ),
		'section'     => 'typography_general',
		'default'     => array(
			'font-family'    => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif',
			'variant'        => '700',
			'subsets'        => array( 'latin' ),
			'font-size'      => '0.875rem',
			'letter-spacing' => '-0.037em',
			'text-transform' => 'none',
		),
		'choices'     => apply_filters( 'powerkit_fonts_choices', array() ),
		'priority'    => 10,
		'output'      => apply_filters( 'csco_font_primary', array(
			array(
				'element' => '.cs-font-primary, button, .button, input[type="button"], input[type="reset"], input[type="submit"], .no-comments, .text-action, .cs-link-more, .share-total, .nav-links, .comment-reply-link, .post-tags a, .post-sidebar-tags a, .tagcloud a, .read-more, .navigation.pagination .nav-links > span, .navigation.pagination .nav-links > a, .pk-font-primary, .navbar-dropdown-btn-follow',
			),
		) ),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'        => 'typography',
		'settings'    => 'font_secondary',
		'label'       => esc_html__( 'Secondary Font', 'spotlight' ),
		'description' => esc_html__( 'Used for post meta, image captions and other secondary elements.', 'spotlight' ),
		'section'     => 'typography_general',
		'default'     => array(
			'font-family'    => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif',
			'subsets'        => array( 'latin' ),
			'variant'        => '400',
			'font-size'      => '0.8125rem',
			'letter-spacing' => '0',
			'text-transform' => 'none',
		),
		'choices'     => apply_filters( 'powerkit_fonts_choices', array() ),
		'priority'    => 10,
		'output'      => apply_filters( 'csco_font_secondary', array(
			array(
				'element' => 'label, .cs-font-secondary, .post-meta, .archive-count, .page-subtitle, .site-description, figcaption, .wp-block-image figcaption, .wp-block-audio figcaption, .wp-block-embed figcaption, .wp-block-pullquote cite, .wp-block-pullquote footer, .wp-block-pullquote .wp-block-pullquote__citation, .wp-block-quote cite, .post-format-icon, .comment-metadata, .says, .logged-in-as, .must-log-in, .wp-caption-text, .widget_rss ul li .rss-date, blockquote cite, div[class*="meta-"], span[class*="meta-"], small, .post-sidebar-shares .total-shares, .cs-breadcrumbs, .cs-homepage-category-count, .pk-font-secondary',
			),
		) ),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'typography',
		'settings' => 'font_post_content',
		'label'    => esc_html__( 'Post Content', 'spotlight' ),
		'section'  => 'typography_general',
		'default'  => array(
			'font-family'    => 'inherit',
			'variant'        => 'inherit',
			'subsets'        => array( 'latin' ),
			'font-size'      => 'inherit',
			'letter-spacing' => 'inherit',
		),
		'choices'  => apply_filters( 'powerkit_fonts_choices', array(
			'variant' => array(
				'regular',
				'italic',
				'700',
				'700italic',
			),
		) ),
		'priority' => 10,
		'output'   => apply_filters( 'csco_font_post_content', array(
			array(
				'element' => '.entry-content',
			),
		) ),
	)
);

CSCO_Kirki::add_section(
	'typography_headings', array(
		'title'    => esc_html__( 'Headings', 'spotlight' ),
		'panel'    => 'typography',
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'typography',
		'settings' => 'font_headings',
		'label'    => esc_html__( 'Headings', 'spotlight' ),
		'section'  => 'typography_headings',
		'default'  => array(
			'font-family'    => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif',
			'variant'        => '700',
			'subsets'        => array( 'latin' ),
			'letter-spacing' => '-0.063em',
			'text-transform' => 'none',
		),
		'choices'  => apply_filters( 'powerkit_fonts_choices', array() ),
		'priority' => 10,
		'output'   => apply_filters( 'csco_font_headings', array(
			array(
				'element' => 'h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6, .site-title, .comment-author .fn, blockquote, .wp-block-quote, .wp-block-cover .wp-block-cover-image-text, .wp-block-cover .wp-block-cover-text, .wp-block-cover h2, .wp-block-cover-image .wp-block-cover-image-text, .wp-block-cover-image .wp-block-cover-text, .wp-block-cover-image h2, .wp-block-pullquote p, p.has-drop-cap:not(:focus):first-letter, .pk-font-heading, .post-sidebar-date .reader-text',
			),
		) ),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'        => 'typography',
		'settings'    => 'font_title_block',
		'label'       => esc_html__( 'Section Titles', 'spotlight' ),
		'description' => esc_html__( 'Used for widget, related posts and other sections\' titles.', 'spotlight' ),
		'section'     => 'typography_headings',
		'default'     => array(
			'font-family'    => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif',
			'variant'        => '400',
			'subsets'        => array( 'latin' ),
			'font-size'      => '0.75rem',
			'letter-spacing' => '0',
			'text-transform' => 'uppercase',
			'color'          => '#000000',
		),
		'choices'     => apply_filters( 'powerkit_fonts_choices', array() ),
		'priority'    => 10,
		'output'      => apply_filters( 'csco_font_title_block', array(
			array(
				'element' => '.title-block, .pk-font-block',
			),
		) ),
	)
);

CSCO_Kirki::add_section(
	'typography_navigation', array(
		'title'    => esc_html__( 'Navigation', 'spotlight' ),
		'panel'    => 'typography',
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'        => 'typography',
		'settings'    => 'font_menu',
		'label'       => esc_html__( 'Menu Font', 'spotlight' ),
		'description' => esc_html__( 'Used for main top level menu elements.', 'spotlight' ),
		'section'     => 'typography_navigation',
		'default'     => array(
			'font-family'    => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif',
			'variant'        => '400',
			'subsets'        => array( 'latin' ),
			'font-size'      => '0.8125rem',
			'letter-spacing' => '0',
			'text-transform' => 'none',
		),
		'choices'     => apply_filters( 'powerkit_fonts_choices', array() ),
		'priority'    => 10,
		'output'      => apply_filters( 'csco_font_menu', array(
			array(
				'element' => '.navbar-nav > li > a, .cs-mega-menu-child > a, .widget_archive li, .widget_categories li, .widget_meta li a, .widget_nav_menu .menu > li > a, .widget_pages .page_item a',
			),
		) ),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'        => 'typography',
		'settings'    => 'font_submenu',
		'label'       => esc_html__( 'Submenu Font', 'spotlight' ),
		'description' => esc_html__( 'Used for submenu elements.', 'spotlight' ),
		'section'     => 'typography_navigation',
		'default'     => array(
			'font-family'    => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif',
			'subsets'        => array( 'latin' ),
			'variant'        => '400',
			'font-size'      => '0.8125rem',
			'letter-spacing' => '0',
			'text-transform' => 'none',
		),
		'choices'     => apply_filters( 'powerkit_fonts_choices', array() ),
		'priority'    => 10,
		'output'      => apply_filters( 'csco_font_submenu', array(
			array(
				'element' => '.navbar-nav .sub-menu > li > a, .widget_categories .children li a, .widget_nav_menu .sub-menu > li > a',
			),
		) ),
	)
);
