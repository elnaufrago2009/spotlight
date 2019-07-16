<?php
/**
 * Colors
 *
 * @package Spotlight
 */

CSCO_Kirki::add_section(
	'colors', array(
		'title'    => esc_html__( 'Colors', 'spotlight' ),
		'priority' => 20,
	)
);

/**
 * -------------------------------------------------------------------------
 * Base
 * -------------------------------------------------------------------------
 */

CSCO_Kirki::add_section(
	'colors_base', array(
		'title'    => esc_html__( 'Base', 'spotlight' ),
		'panel'    => 'colors',
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'      => 'color',
		'settings'  => 'color_primary',
		'label'     => esc_html__( 'Primary Color', 'spotlight' ),
		'section'   => 'colors',
		'priority'  => 10,
		'default'   => '#0ADEA9',
		'transport' => 'auto',
		'output'    => apply_filters( 'csco_color_primary', array(
			array(
				'element'  => 'a:hover, .entry-content a, .must-log-in a, blockquote:before, .cs-bg-dark .footer-title, .cs-bg-dark .pk-social-links-scheme-bold:not(.pk-social-links-scheme-light-rounded) .pk-social-links-link .pk-social-links-icon',
				'property' => 'color',
			),
			array(
				'element'  => '.wp-block-button .wp-block-button__link:not(.has-background), button, .button, input[type="button"], input[type="reset"], input[type="submit"], .cs-bg-dark .pk-social-links-scheme-light-rounded .pk-social-links-link:hover .pk-social-links-icon, article .cs-overlay .post-categories a:hover, .post-format-icon > a:hover, .cs-list-articles > li > a:hover:before, .pk-bg-primary, .pk-button-primary, .pk-badge-primary, h2.pk-heading-numbered:before, .pk-post-item .pk-post-thumbnail a:hover .pk-post-number, .post-comments-show button',
				'property' => 'background-color',
			),
		) ),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'      => 'color',
		'settings'  => 'color_overlay',
		'label'     => esc_html__( 'Overlay Color', 'spotlight' ),
		'section'   => 'colors',
		'priority'  => 10,
		'default'   => 'rgba(0,0,0,0.25)',
		'transport' => 'auto',
		'choices'   => array(
			'alpha' => true,
		),
		'output'    => apply_filters( 'csco_color_overlay', array(
			array(
				'element'  => '.pk-bg-overlay, .pk-zoom-icon-popup:after',
				'property' => 'background-color',
			),
		) ),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'color',
		'settings'        => 'color_large_header_bg',
		'label'           => esc_html__( 'Large Header background', 'spotlight' ),
		'section'         => 'colors',
		'default'         => '#FFFFFF',
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 'large',
			),
		),
		'output'          => array(
			array(
				'element'  => '.header-large .navbar-topbar, .header-large .offcanvas-header',
				'property' => 'background-color',
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'color',
		'settings' => 'color_navbar_bg',
		'label'    => esc_html__( 'Navigation Bar Background', 'spotlight' ),
		'section'  => 'colors',
		'default'  => '#FFFFFF',
		'priority' => 10,
		'output'   => array(
			array(
				'element'  => '.navbar-primary, .header-default .offcanvas-header',
				'property' => 'background-color',
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'color',
		'settings' => 'color_navbar_submenu',
		'label'    => esc_html__( 'Navigation Submenu Background', 'spotlight' ),
		'section'  => 'colors',
		'default'  => '#000000',
		'priority' => 10,
		'output'   => array(
			array(
				'element'  => '.navbar-nav .sub-menu, .navbar-nav .cs-mega-menu-has-categories .cs-mm-categories, .navbar-primary .navbar-dropdown-container',
				'property' => 'background-color',
			),
			array(
				'element'  => '.navbar-nav > li.menu-item-has-children > .sub-menu:after, .navbar-primary .navbar-dropdown-container:after',
				'property' => 'border-bottom-color',
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'color',
		'settings' => 'color_footer_bg',
		'label'    => esc_html__( 'Footer Background', 'spotlight' ),
		'section'  => 'colors',
		'default'  => '#000000',
		'priority' => 10,
		'output'   => array(
			array(
				'element'  => '.site-footer',
				'property' => 'background-color',
			),
		),
	)
);
