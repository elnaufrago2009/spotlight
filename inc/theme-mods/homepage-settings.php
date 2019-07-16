<?php
/**
 * Homepage Settings
 *
 * @package Spotlight
 */

/**
 * Removes default WordPress Static Front Page section
 * and re-adds it in our own panel with the same parameters.
 *
 * @param object $wp_customize Instance of the WP_Customize_Manager class.
 */
function csco_reorder_customizer_settings( $wp_customize ) {

	// Get current front page section parameters.
	$static_front_page = $wp_customize->get_section( 'static_front_page' );

	// Remove existing section, so that we can later re-add it to our panel.
	$wp_customize->remove_section( 'static_front_page' );

	// Re-add static front page section with a new name, but same description.
	$wp_customize->add_section( 'static_front_page', array(
		'title'           => esc_html__( 'Static Front Page', 'spotlight' ),
		'priority'        => 20,
		'description'     => $static_front_page->description,
		'panel'           => 'homepage_settings',
		'active_callback' => $static_front_page->active_callback,
	) );
}
add_action( 'customize_register', 'csco_reorder_customizer_settings' );

CSCO_Kirki::add_panel(
	'homepage_settings', array(
		'title'    => esc_html__( 'Homepage Settings', 'spotlight' ),
		'priority' => 50,
	)
);

CSCO_Kirki::add_section(
	'homepage_layout', array(
		'title'    => esc_html__( 'Homepage Layout', 'spotlight' ),
		'priority' => 15,
		'panel'    => 'homepage_settings',
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'radio',
		'settings' => 'home_layout',
		'label'    => esc_html__( 'Layout', 'spotlight' ),
		'section'  => 'homepage_layout',
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
		'settings' => 'home_sidebar',
		'label'    => esc_html__( 'Sidebar', 'spotlight' ),
		'section'  => 'homepage_layout',
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
		'settings' => 'home_post_meta',
		'label'    => esc_attr__( 'Post Meta', 'spotlight' ),
		'section'  => 'homepage_layout',
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
		'settings' => 'homepage_media_preview',
		'label'    => esc_html__( 'Full Post Preview', 'spotlight' ),
		'section'  => 'homepage_layout',
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
		'settings' => 'home_summary',
		'label'    => esc_html__( 'Full Post Summary', 'spotlight' ),
		'section'  => 'homepage_layout',
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
		'settings' => 'home_pagination_type',
		'label'    => esc_html__( 'Pagination', 'spotlight' ),
		'section'  => 'homepage_layout',
		'default'  => 'load-more',
		'priority' => 10,
		'choices'  => array(
			'standard'  => esc_html__( 'Standard', 'spotlight' ),
			'load-more' => esc_html__( 'Load More Button', 'spotlight' ),
			'infinite'  => esc_html__( 'Infinite Load', 'spotlight' ),
		),
	)
);

CSCO_Kirki::add_section(
	'featured_posts', array(
		'title'    => esc_html__( 'Featured Posts', 'spotlight' ),
		'panel'    => 'homepage_settings',
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'checkbox',
		'settings' => 'featured_posts',
		'label'    => esc_html__( 'Display featured posts', 'spotlight' ),
		'section'  => 'featured_posts',
		'default'  => false,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'radio',
		'settings'        => 'featured_posts_type',
		'label'           => esc_html__( 'Type featured posts', 'spotlight' ),
		'section'         => 'featured_posts',
		'default'         => 'type-1',
		'priority'        => 10,
		'choices'         => array(
			'type-1' => esc_html__( 'Type 1', 'spotlight' ),
			'type-2' => esc_html__( 'Type 2', 'spotlight' ),
			'type-3' => esc_html__( 'Type 3', 'spotlight' ),
			'type-4' => esc_html__( 'Type 4', 'spotlight' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'featured_posts',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'radio',
		'settings'        => 'featured_posts_location',
		'label'           => esc_html__( 'Display Location', 'spotlight' ),
		'section'         => 'featured_posts',
		'default'         => 'front_page',
		'priority'        => 10,
		'choices'         => array(
			'front_page' => esc_html__( 'Homepage', 'spotlight' ),
			'home'       => esc_html__( 'Posts page', 'spotlight' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'featured_posts',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'show_on_front',
				'operator' => '==',
				'value'    => 'page',
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'multicheck',
		'settings'        => 'featured_posts_meta',
		'label'           => esc_attr__( 'Post Meta', 'spotlight' ),
		'section'         => 'featured_posts',
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
				'setting'  => 'featured_posts',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'text',
		'settings'        => 'featured_posts_filter_categories',
		'label'           => esc_html__( 'Filter by Categories', 'spotlight' ),
		'description'     => esc_html__( 'Add comma-separated list of category slugs. For example: &laquo;travel, lifestyle, food&raquo;. Leave empty for all categories.', 'spotlight' ),
		'section'         => 'featured_posts',
		'default'         => '',
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'featured_posts',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'text',
		'settings'        => 'featured_posts_filter_tags',
		'label'           => esc_html__( 'Filter by Tags', 'spotlight' ),
		'description'     => esc_html__( 'Add comma-separated list of tag slugs. For example: &laquo;worth-reading, top-5, playlists&raquo;. Leave empty for all tags.', 'spotlight' ),
		'section'         => 'featured_posts',
		'default'         => '',
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'featured_posts',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'text',
		'settings'        => 'featured_posts_filter_posts',
		'label'           => esc_html__( 'Filter by Posts', 'spotlight' ),
		'description'     => esc_html__( 'Add comma-separated list of post IDs. For example: 12, 34, 145. Leave empty for all posts.', 'spotlight' ),
		'section'         => 'featured_posts',
		'default'         => '',
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'featured_posts',
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
			'settings'        => 'featured_posts_orderby',
			'label'           => esc_html__( 'Order posts by', 'spotlight' ),
			'section'         => 'featured_posts',
			'default'         => 'date',
			'priority'        => 10,
			'choices'         => array(
				'date'       => esc_html__( 'Date', 'spotlight' ),
				'post_views' => esc_html__( 'Views', 'spotlight' ),
			),
			'active_callback' => array(
				array(
					'setting'  => 'featured_posts',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'            => 'text',
			'settings'        => 'featured_posts_time_frame',
			'label'           => esc_html__( 'Filter by Time Frame', 'spotlight' ),
			'description'     => esc_html__( 'Add period of posts in English. For example: &laquo;2 months&raquo;, &laquo;14 days&raquo; or even &laquo;1 year&raquo;', 'spotlight' ),
			'section'         => 'featured_posts',
			'default'         => '',
			'priority'        => 10,
			'active_callback' => array(
				array(
					'setting'  => 'featured_posts',
					'operator' => '==',
					'value'    => true,
				),
				array(
					'setting'  => 'featured_posts_orderby',
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
		'settings'        => 'featured_posts_exclude',
		'label'           => esc_html__( 'Exclude featured posts from the main archive', 'spotlight' ),
		'section'         => 'featured_posts',
		'default'         => false,
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'featured_posts',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);
