<?php
/**
 * Footer Settings
 *
 * @package Spotlight
 */

CSCO_Kirki::add_section(
	'footer', array(
		'title'    => esc_html__( 'Footer Settings', 'spotlight' ),
		'priority' => 40,
	)
);


CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'              => 'text',
		'settings'          => 'footer_title',
		'label'             => esc_attr__( 'Footer Title', 'spotlight' ),
		'section'           => 'footer',
		'default'           => get_bloginfo( 'name' ),
		'priority'          => 10,
		'sanitize_callback' => 'wp_kses_post',
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'              => 'textarea',
		'settings'          => 'footer_text',
		'label'             => esc_attr__( 'Footer Text', 'spotlight' ),
		'section'           => 'footer',
		/* translators: %s: Author name. */
		'default'           => sprintf( esc_html__( 'Designed & Developed by %s', 'spotlight' ), '<a href="https://codesupply.co/">Code Supply Co.</a>' ),
		'priority'          => 10,
		'sanitize_callback' => 'wp_kses_post',
	)
);

if ( csco_powerkit_module_enabled( 'social_links' ) ) {
	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'     => 'checkbox',
			'settings' => 'footer_social_links',
			'label'    => esc_html__( 'Display social links', 'spotlight' ),
			'section'  => 'footer',
			'default'  => false,
			'priority' => 10,
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'            => 'select',
			'settings'        => 'footer_social_links_scheme',
			'label'           => esc_html__( 'Color scheme', 'spotlight' ),
			'section'         => 'footer',
			'default'         => 'light-rounded',
			'priority'        => 10,
			'choices'         => array(
				'light'         => esc_html__( 'Light', 'spotlight' ),
				'bold'          => esc_html__( 'Bold', 'spotlight' ),
				'light-rounded' => esc_html__( 'Light Rounded', 'spotlight' ),
				'bold-rounded'  => esc_html__( 'Bold Rounded', 'spotlight' ),
			),
			'active_callback' => array(
				array(
					'setting'  => 'footer_social_links',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'            => 'number',
			'settings'        => 'footer_social_links_maximum',
			'label'           => esc_html__( 'Maximum Number of Social Links', 'spotlight' ),
			'section'         => 'footer',
			'default'         => 2,
			'priority'        => 10,
			'active_callback' => array(
				array(
					'setting'  => 'footer_social_links',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);
}

if ( csco_powerkit_module_enabled( 'opt_in_forms' ) ) {
	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'     => 'checkbox',
			'settings' => 'footer_subscribe',
			'label'    => esc_html__( 'Display subscribe section', 'spotlight' ),
			'section'  => 'footer',
			'default'  => true,
			'priority' => 10,
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'            => 'checkbox',
			'settings'        => 'footer_subscribe_name',
			'label'           => esc_html__( 'Display first name field', 'spotlight' ),
			'section'         => 'footer',
			'default'         => false,
			'priority'        => 10,
			'active_callback' => array(
				array(
					'setting'  => 'footer_subscribe',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'            => 'textarea',
			'settings'        => 'footer_subscribe_text',
			'label'           => esc_html__( 'Text', 'spotlight' ),
			'section'         => 'footer',
			'default'         => esc_html__( 'Get the recent Newsly updates to your mailbox.', 'spotlight' ),
			'priority'        => 10,
			'active_callback' => array(
				array(
					'setting'  => 'footer_subscribe',
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
		'settings' => 'footer_featured_posts',
		'label'    => esc_html__( 'Display featured posts', 'spotlight' ),
		'section'  => 'footer',
		'default'  => false,
		'priority' => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'multicheck',
		'settings'        => 'footer_featured_posts_meta',
		'label'           => esc_attr__( 'Post Meta', 'spotlight' ),
		'section'         => 'footer',
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
				'setting'  => 'footer_featured_posts',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'text',
		'settings'        => 'footer_featured_posts_filter_categories',
		'label'           => esc_html__( 'Filter by Categories', 'spotlight' ),
		'description'     => esc_html__( 'Add comma-separated list of category slugs. For example: &laquo;travel, lifestyle, food&raquo;. Leave empty for all categories.', 'spotlight' ),
		'section'         => 'footer',
		'default'         => '',
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'footer_featured_posts',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'text',
		'settings'        => 'footer_featured_posts_filter_tags',
		'label'           => esc_html__( 'Filter by Tags', 'spotlight' ),
		'description'     => esc_html__( 'Add comma-separated list of tag slugs. For example: &laquo;worth-reading, top-5, playlists&raquo;. Leave empty for all tags.', 'spotlight' ),
		'section'         => 'footer',
		'default'         => '',
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'footer_featured_posts',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'text',
		'settings'        => 'footer_featured_posts_filter_posts',
		'label'           => esc_html__( 'Filter by Posts', 'spotlight' ),
		'description'     => esc_html__( 'Add comma-separated list of post IDs. For example: 12, 34, 145. Leave empty for all posts.', 'spotlight' ),
		'section'         => 'footer',
		'default'         => '',
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'footer_featured_posts',
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
			'settings'        => 'footer_featured_posts_orderby',
			'label'           => esc_html__( 'Order posts by', 'spotlight' ),
			'section'         => 'footer',
			'default'         => 'date',
			'priority'        => 10,
			'choices'         => array(
				'date'       => esc_html__( 'Date', 'spotlight' ),
				'post_views' => esc_html__( 'Views', 'spotlight' ),
			),
			'active_callback' => array(
				array(
					'setting'  => 'footer_featured_posts',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'            => 'text',
			'settings'        => 'footer_featured_posts_time_frame',
			'label'           => esc_html__( 'Filter by Time Frame', 'spotlight' ),
			'description'     => esc_html__( 'Add period of posts in English. For example: &laquo;2 months&raquo;, &laquo;14 days&raquo; or even &laquo;1 year&raquo;', 'spotlight' ),
			'section'         => 'footer',
			'default'         => '',
			'priority'        => 10,
			'active_callback' => array(
				array(
					'setting'  => 'footer_featured_posts',
					'operator' => '==',
					'value'    => true,
				),
				array(
					'setting'  => 'footer_featured_posts_orderby',
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
		'settings'        => 'footer_featured_posts_avoid_duplicate',
		'label'           => esc_html__( 'Exclude duplicate posts from the footer posts', 'spotlight' ),
		'description'     => esc_html__( 'If enabled, posts from the featured posts section and post archive will not be shown in the footer section. The "Filter by Posts" option will override this option.', 'spotlight' ),
		'section'         => 'footer',
		'default'         => false,
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'footer_featured_posts',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);
