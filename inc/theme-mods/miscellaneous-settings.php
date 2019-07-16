<?php
/**
 * Miscellaneous Settings
 *
 * @package Spotlight
 */

CSCO_Kirki::add_section(
	'miscellaneous', array(
		'title'    => esc_html__( 'Miscellaneous Settings', 'spotlight' ),
		'priority' => 60,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'checkbox',
		'settings' => 'display_published_date',
		'label'    => esc_html__( 'Display published date instead of modified date', 'spotlight' ),
		'section'  => 'miscellaneous',
		'default'  => true,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'text',
		'settings' => 'search_placeholder',
		'label'    => esc_html__( 'Search Form Placeholder', 'spotlight' ),
		'section'  => 'miscellaneous',
		'default'  => esc_html__( 'Enter your search topic', 'spotlight' ),
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'text',
		'settings' => 'label_readmore',
		'label'    => esc_html__( '"View Post" Button Label', 'spotlight' ),
		'section'  => 'miscellaneous',
		'default'  => esc_html__( 'View Post', 'spotlight' ),
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'radio',
		'settings' => 'classic_gallery_alignment',
		'label'    => esc_html__( 'Alignment of Galleries in Classic Block', 'spotlight' ),
		'section'  => 'miscellaneous',
		'default'  => 'default',
		'priority' => 10,
		'choices'  => array(
			'default' => esc_html__( 'Default', 'spotlight' ),
			'wide'    => esc_html__( 'Wide', 'spotlight' ),
			'large'   => esc_html__( 'Large', 'spotlight' ),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'checkbox',
		'settings' => 'sticky_sidebar',
		'label'    => esc_html__( 'Sticky Sidebar', 'spotlight' ),
		'section'  => 'miscellaneous',
		'default'  => true,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'radio',
		'settings'        => 'sticky_sidebar_method',
		'label'           => esc_html__( 'Sticky Method', 'spotlight' ),
		'section'         => 'miscellaneous',
		'default'         => 'stick-to-top',
		'priority'        => 10,
		'choices'         => array(
			'stick-to-top'    => esc_html__( 'Sidebar top edge', 'spotlight' ),
			'stick-to-bottom' => esc_html__( 'Sidebar bottom edge', 'spotlight' ),
			'stick-last'      => esc_html__( 'Last widget top edge', 'spotlight' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'sticky_sidebar',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'        => 'radio',
		'settings'    => 'webfonts_load_method',
		'label'       => esc_html__( 'Webfonts Load Method', 'spotlight' ),
		'description' => esc_html__( 'Please', 'spotlight' ) . ' <a href="' . add_query_arg( array( 'action' => 'kirki-reset-cache' ), get_site_url() ) . '" target="_blank">' . esc_html__( 'reset font cache', 'overflow' ) . '</a> ' . esc_html__( 'after saving.', 'overflow' ),
		'section'     => 'miscellaneous',
		'default'     => 'async',
		'priority'    => 10,
		'choices'     => array(
			'async' => esc_html__( 'Asynchronous', 'spotlight' ),
			'link'  => esc_html__( 'Render-Blocking', 'spotlight' ),
		),
	)
);
