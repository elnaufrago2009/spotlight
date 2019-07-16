<?php
/**
 * Category Settings
 *
 * @package Spotlight
 */

CSCO_Kirki::add_section(
	'category_settings', array(
		'title'    => esc_html__( 'Category Settings', 'spotlight' ),
		'priority' => 50,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'checkbox',
		'settings' => 'category_featured_posts',
		'label'    => esc_html__( 'Display featured posts', 'spotlight' ),
		'section'  => 'category_settings',
		'default'  => false,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'radio',
		'settings'        => 'category_featured_posts_type',
		'label'           => esc_html__( 'Type featured posts', 'spotlight' ),
		'section'         => 'category_settings',
		'default'         => 'type-2',
		'priority'        => 10,
		'choices'         => array(
			'type-1' => esc_html__( 'Type 1', 'spotlight' ),
			'type-2' => esc_html__( 'Type 2', 'spotlight' ),
			'type-3' => esc_html__( 'Type 3', 'spotlight' ),
			'type-4' => esc_html__( 'Type 4', 'spotlight' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'category_featured_posts',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'multicheck',
		'settings'        => 'category_featured_posts_meta',
		'label'           => esc_attr__( 'Post Meta', 'spotlight' ),
		'section'         => 'category_settings',
		'default'         => array( 'category', 'author', 'date' ),
		'priority'        => 10,
		'choices'         => apply_filters( 'csco_post_meta_choices', array(
			'category'     => esc_html__( 'Category', 'spotlight' ),
			'author'       => esc_html__( 'Author', 'spotlight' ),
			'date'         => esc_html__( 'Date', 'spotlight' ),
			'shares'       => esc_html__( 'Shares', 'spotlight' ),
			'views'        => esc_html__( 'Views', 'spotlight' ),
			'comments'     => esc_html__( 'Comments', 'spotlight' ),
			'reading_time' => esc_html__( 'Reading Time', 'spotlight' ),
		) ),
		'active_callback' => array(
			array(
				'setting'  => 'category_featured_posts',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'text',
		'settings'        => 'category_featured_posts_filter_tags',
		'label'           => esc_html__( 'Filter by Tags', 'spotlight' ),
		'description'     => esc_html__( 'Add comma-separated list of tag slugs. For example: &laquo;worth-reading, top-5, playlists&raquo;. Leave empty for all tags.', 'spotlight' ),
		'section'         => 'category_settings',
		'default'         => '',
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'category_featured_posts',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'text',
		'settings'        => 'category_featured_posts_filter_posts',
		'label'           => esc_html__( 'Filter by Posts', 'spotlight' ),
		'description'     => esc_html__( 'Add comma-separated list of post IDs. For example: 12, 34, 145. Leave empty for all posts.', 'spotlight' ),
		'section'         => 'category_settings',
		'default'         => '',
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'category_featured_posts',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

if ( class_exists( 'Post_Views_Counter' ) ) {

	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'            => 'radio',
			'settings'        => 'category_featured_posts_orderby',
			'label'           => esc_html__( 'Order posts by', 'spotlight' ),
			'section'         => 'category_settings',
			'default'         => 'date',
			'priority'        => 10,
			'choices'         => array(
				'date'       => esc_html__( 'Date', 'spotlight' ),
				'post_views' => esc_html__( 'Views', 'spotlight' ),
			),
			'active_callback' => array(
				array(
					'setting'  => 'category_featured_posts',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'            => 'text',
			'settings'        => 'category_featured_posts_time_frame',
			'label'           => esc_html__( 'Filter by Time Frame', 'spotlight' ),
			'description'     => esc_html__( 'Add period of posts in English. For example: &laquo;2 months&raquo;, &laquo;14 days&raquo; or even &laquo;1 year&raquo;', 'spotlight' ),
			'section'         => 'category_settings',
			'default'         => '',
			'priority'        => 10,
			'active_callback' => array(
				array(
					'setting'  => 'category_featured_posts',
					'operator' => '==',
					'value'    => true,
				),
				array(
					'setting'  => 'category_featured_posts_orderby',
					'operator' => '==',
					'value'    => 'post_views',
				),
			),
		)
	);

}

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'checkbox',
		'settings'        => 'category_featured_posts_exclude',
		'label'           => esc_html__( 'Exclude featured posts from the category archive', 'spotlight' ),
		'section'         => 'category_settings',
		'default'         => false,
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'category_featured_posts',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'checkbox',
		'settings' => 'category_subcategories',
		'label'    => esc_html__( 'Display subcategory filter', 'spotlight' ),
		'section'  => 'category_settings',
		'default'  => false,
		'priority' => 10,
	)
);
