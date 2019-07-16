<?php
/**
 * Post Settings
 *
 * @package Spotlight
 */

CSCO_Kirki::add_section(
	'post_settings', array(
		'title'    => esc_html__( 'Post Settings', 'spotlight' ),
		'priority' => 50,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'radio',
		'settings' => 'post_sidebar',
		'label'    => esc_html__( 'Default Sidebar', 'spotlight' ),
		'section'  => 'post_settings',
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
		'settings' => 'post_meta',
		'label'    => esc_attr__( 'Post Meta', 'spotlight' ),
		'section'  => 'post_settings',
		'default'  => array( 'category', 'date', 'author', 'shares', 'views', 'comments', 'reading_time' ),
		'priority' => 10,
		'choices'  => apply_filters( 'csco_post_meta_choices', array(
			'category'     => esc_html__( 'Category', 'spotlight' ),
			'date'         => esc_html__( 'Published Date', 'spotlight' ),
			'updated_date' => esc_html__( 'Updated Date', 'spotlight' ),
			'time'         => esc_html__( 'Time', 'spotlight' ),
			'author'       => esc_html__( 'Author', 'spotlight' ),
			'shares'       => esc_html__( 'Shares', 'spotlight' ),
			'views'        => esc_html__( 'Views', 'spotlight' ),
			'comments'     => esc_html__( 'Comments', 'spotlight' ),
			'reading_time' => esc_html__( 'Reading Time', 'spotlight' ),
		) ),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'checkbox',
		'settings' => 'post_date_format',
		'label'    => esc_html__( 'Use the default WordPress date format', 'spotlight' ),
		'section'  => 'post_settings',
		'default'  => false,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'radio',
		'settings' => 'post_header_type',
		'label'    => esc_html__( 'Default Page Header Type', 'spotlight' ),
		'section'  => 'post_settings',
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
		'settings'        => 'post_media_preview',
		'label'           => esc_html__( 'Standard Page Header Preview', 'spotlight' ),
		'section'         => 'post_settings',
		'default'         => 'cropped',
		'priority'        => 10,
		'choices'         => array(
			'cropped'   => esc_attr__( 'Display Cropped Image', 'spotlight' ),
			'uncropped' => esc_attr__( 'Display Preview in Original Ratio', 'spotlight' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'post_header_type',
				'operator' => '==',
				'value'    => 'standard',
			),
		),
	)
);

if ( csco_powerkit_module_enabled( 'opt_in_forms' ) ) {
	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'     => 'checkbox',
			'settings' => 'post_subscribe',
			'label'    => esc_html__( 'Display subscribe section', 'spotlight' ),
			'section'  => 'post_settings',
			'default'  => false,
			'priority' => 10,
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'            => 'image',
			'settings'        => 'post_subscribe_background_image',
			'label'           => esc_html__( 'Background Image', 'spotlight' ),
			'section'         => 'post_settings',
			'priority'        => 10,
			'choices'         => array(
				'save_as' => 'id',
			),
			'active_callback' => array(
				array(
					'setting'  => 'post_subscribe',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'            => 'checkbox',
			'settings'        => 'post_subscribe_name',
			'label'           => esc_html__( 'Display first name field', 'spotlight' ),
			'section'         => 'post_settings',
			'default'         => false,
			'priority'        => 10,
			'active_callback' => array(
				array(
					'setting'  => 'post_subscribe',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'            => 'text',
			'settings'        => 'post_subscribe_title',
			'label'           => esc_html__( 'Title', 'spotlight' ),
			'section'         => 'post_settings',
			'default'         => esc_html__( 'Sign Up for Our Newsletters', 'spotlight' ),
			'priority'        => 10,
			'active_callback' => array(
				array(
					'setting'  => 'post_subscribe',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'            => 'textarea',
			'settings'        => 'post_subscribe_text',
			'label'           => esc_html__( 'Text', 'spotlight' ),
			'section'         => 'post_settings',
			'default'         => esc_html__( 'Get notified of the best deals on our WordPress themes.', 'spotlight' ),
			'priority'        => 10,
			'active_callback' => array(
				array(
					'setting'  => 'post_subscribe',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);
}

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'checkbox',
		'settings' => 'post_tags',
		'label'    => esc_html__( 'Display tags', 'spotlight' ),
		'section'  => 'post_settings',
		'default'  => true,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'checkbox',
		'settings' => 'post_excerpt',
		'label'    => esc_html__( 'Display excerpts', 'spotlight' ),
		'section'  => 'post_settings',
		'default'  => true,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'checkbox',
		'settings' => 'post_comments_simple',
		'label'    => esc_html__( 'Display comments without the View Comments button', 'spotlight' ),
		'section'  => 'post_settings',
		'default'  => false,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'checkbox',
		'settings' => 'related',
		'label'    => esc_html__( 'Display related section', 'spotlight' ),
		'section'  => 'post_settings',
		'default'  => true,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'radio',
		'settings'        => 'related_layout',
		'label'           => esc_html__( 'Related Post Layout', 'spotlight' ),
		'section'         => 'post_settings',
		'default'         => 'list',
		'priority'        => 10,
		'choices'         => array(
			'list'             => esc_html__( 'List', 'spotlight' ),
			'list-alternative' => esc_html__( 'List Alternative', 'spotlight' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'related',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'number',
		'settings'        => 'related_number',
		'label'           => esc_html__( 'Maximum Number of Related Posts', 'spotlight' ),
		'section'         => 'post_settings',
		'default'         => 4,
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'related',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'text',
		'settings'        => 'related_time_frame',
		'label'           => esc_html__( 'Time Frame', 'spotlight' ),
		'description'     => esc_html__( 'Add period of posts in English. For example: &laquo;2 months&raquo;, &laquo;14 days&raquo; or even &laquo;1 year&raquo;', 'spotlight' ),
		'section'         => 'post_settings',
		'default'         => '',
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'related',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'checkbox',
		'settings' => 'post_load_nextpost',
		'label'    => esc_html__( 'Enable the Auto Load Next Post feature', 'spotlight' ),
		'section'  => 'post_settings',
		'default'  => false,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'checkbox',
		'settings'        => 'post_load_nextpost_same_category',
		'label'           => esc_html__( 'Auto load posts from the same category only', 'spotlight' ),
		'section'         => 'post_settings',
		'default'         => false,
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'post_load_nextpost',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'checkbox',
		'settings'        => 'post_load_nextpost_reverse',
		'label'           => esc_html__( 'Auto load previous posts instead of next ones', 'spotlight' ),
		'section'         => 'post_settings',
		'default'         => false,
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'post_load_nextpost',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);
