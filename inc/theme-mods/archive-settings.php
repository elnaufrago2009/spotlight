<?php
/**
 * Archive Settings
 *
 * @package Spotlight
 */

CSCO_Kirki::add_section(
	'archive_settings', array(
		'title'    => esc_html__( 'Archive Settings', 'spotlight' ),
		'priority' => 50,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'radio',
		'settings' => 'archive_layout',
		'label'    => esc_html__( 'Layout', 'spotlight' ),
		'section'  => 'archive_settings',
		'default'  => 'full',
		'priority' => 10,
		'choices'  => array(
			'full'             => esc_html__( 'Full Post', 'spotlight' ),
			'list'             => esc_html__( 'List', 'spotlight' ),
			'list-alternative' => esc_html__( 'List Alternative', 'spotlight' ),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'radio',
		'settings' => 'archive_sidebar',
		'label'    => esc_html__( 'Sidebar', 'spotlight' ),
		'section'  => 'archive_settings',
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
		'type'     => 'multicheck',
		'settings' => 'archive_post_meta',
		'label'    => esc_attr__( 'Post Meta', 'spotlight' ),
		'section'  => 'archive_settings',
		'default'  => array( 'category', 'author', 'date' ),
		'priority' => 10,
		'choices'  => apply_filters( 'csco_post_meta_choices', array(
			'category'     => esc_html__( 'Category', 'spotlight' ),
			'author'       => esc_html__( 'Author', 'spotlight' ),
			'date'         => esc_html__( 'Date', 'spotlight' ),
			'shares'       => esc_html__( 'Shares', 'spotlight' ),
			'views'        => esc_html__( 'Views', 'spotlight' ),
			'comments'     => esc_html__( 'Comments', 'spotlight' ),
			'reading_time' => esc_html__( 'Reading Time', 'spotlight' ),
		) ),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'radio',
		'settings' => 'archive_media_preview',
		'label'    => esc_html__( 'Full Post Preview', 'spotlight' ),
		'section'  => 'archive_settings',
		'default'  => 'cropped',
		'priority' => 10,
		'choices'  => array(
			'cropped'   => esc_attr__( 'Display Cropped Image', 'spotlight' ),
			'uncropped' => esc_attr__( 'Display Preview in Original Ratio', 'spotlight' ),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'radio',
		'settings' => 'archive_summary',
		'label'    => esc_html__( 'Full Post Summary', 'spotlight' ),
		'section'  => 'archive_settings',
		'default'  => 'excerpt',
		'priority' => 10,
		'choices'  => array(
			'excerpt' => esc_html__( 'Use Excerpts', 'spotlight' ),
			'content' => esc_html__( 'Use Read More Tag', 'spotlight' ),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'radio',
		'settings' => 'archive_pagination_type',
		'label'    => esc_html__( 'Pagination', 'spotlight' ),
		'section'  => 'archive_settings',
		'default'  => 'load-more',
		'priority' => 10,
		'choices'  => array(
			'standard'  => esc_html__( 'Standard', 'spotlight' ),
			'load-more' => esc_html__( 'Load More Button', 'spotlight' ),
			'infinite'  => esc_html__( 'Infinite Load', 'spotlight' ),
		),
	)
);
