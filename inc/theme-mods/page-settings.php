<?php
/**
 * Page Settings
 *
 * @package Spotlight
 */

CSCO_Kirki::add_section(
	'page_settings', array(
		'title'    => esc_html__( 'Page Settings', 'spotlight' ),
		'priority' => 50,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'radio',
		'settings' => 'page_sidebar',
		'label'    => esc_html__( 'Default Sidebar', 'spotlight' ),
		'section'  => 'page_settings',
		'default'  => 'right',
		'priority' => 10,
		'choices'  => array(
			'right'    => esc_attr__( 'Right Sidebar', 'spotlight' ),
			'left'     => esc_attr__( 'Left Sidebar', 'spotlight' ),
			'disabled' => esc_attr__( 'No Sidebar', 'spotlight' ),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'radio',
		'settings' => 'page_header_type',
		'label'    => esc_html__( 'Page Header Type', 'spotlight' ),
		'section'  => 'page_settings',
		'default'  => 'standard',
		'priority' => 10,
		'choices'  => array(
			'none'     => esc_attr__( 'None', 'spotlight' ),
			'standard' => esc_attr__( 'Standard', 'spotlight' ),
			'large'    => esc_attr__( 'Large', 'spotlight' ),
			'wide'     => esc_attr__( 'Wide', 'spotlight' ),
			'title'    => esc_attr__( 'Page Title Only', 'spotlight' ),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'radio',
		'settings'        => 'page_media_preview',
		'label'           => esc_html__( 'Standard Page Header Preview', 'spotlight' ),
		'section'         => 'page_settings',
		'default'         => 'cropped',
		'priority'        => 10,
		'choices'         => array(
			'cropped'   => esc_attr__( 'Display Cropped Image', 'spotlight' ),
			'uncropped' => esc_attr__( 'Display Preview in Original Ratio', 'spotlight' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'page_header_type',
				'operator' => '==',
				'value'    => 'standard',
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'checkbox',
		'settings' => 'page_excerpt',
		'label'    => esc_html__( 'Display excerpts', 'spotlight' ),
		'section'  => 'page_settings',
		'default'  => true,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'checkbox',
		'settings' => 'page_comments_simple',
		'label'    => esc_html__( 'Display comments without the View Comments button', 'spotlight' ),
		'section'  => 'page_settings',
		'default'  => false,
		'priority' => 10,
	)
);
