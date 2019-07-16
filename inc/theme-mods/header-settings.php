<?php
/**
 * Header Settings
 *
 * @package Spotlight
 */

CSCO_Kirki::add_section(
	'header', array(
		'title'    => esc_html__( 'Header Settings', 'spotlight' ),
		'priority' => 40,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'radio',
		'settings' => 'header_layout',
		'label'    => esc_html__( 'Header Layout', 'spotlight' ),
		'section'  => 'header',
		'default'  => 'default',
		'priority' => 10,
		'choices'  => array(
			'default' => esc_html__( 'Compact (Default)', 'spotlight' ),
			'large'   => esc_html__( 'Large', 'spotlight' ),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'        => 'checkbox',
		'settings'    => 'navbar_sticky',
		'label'       => esc_html__( 'Make navigation bar sticky', 'spotlight' ),
		'description' => esc_html__( 'Enabling this option will make navigation bar visible when scrolling.', 'spotlight' ),
		'section'     => 'header',
		'default'     => true,
		'priority'    => 10,
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'            => 'checkbox',
		'settings'        => 'effects_navbar_scroll',
		'label'           => esc_html__( 'Enable the smart sticky feature', 'spotlight' ),
		'description'     => esc_html__( 'Enabling this option will reveal navigation bar when scrolling up and hide it when scrolling down.', 'spotlight' ),
		'section'         => 'header',
		'default'         => true,
		'priority'        => 10,
		'active_callback' => array(
			array(
				'setting'  => 'navbar_sticky',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'checkbox',
		'settings' => 'header_offcanvas',
		'label'    => esc_html__( 'Display offcanvas toggle button', 'spotlight' ),
		'section'  => 'header',
		'default'  => true,
		'priority' => 10,
	)
);

if ( csco_powerkit_module_enabled( 'social_links' ) || csco_powerkit_module_enabled( 'opt_in_forms' ) ) {

	CSCO_Kirki::add_field(
		'csco_theme_mod', array(
			'type'     => 'text',
			'settings' => 'header_dropdown_title',
			'label'    => esc_html__( 'Dropdown Title', 'spotlight' ),
			'section'  => 'header',
			'default'  => esc_html__( 'Follow', 'spotlight' ),
			'priority' => 10,
		)
	);

	if ( csco_powerkit_module_enabled( 'social_links' ) ) {
		CSCO_Kirki::add_field(
			'csco_theme_mod', array(
				'type'     => 'checkbox',
				'settings' => 'header_social_links',
				'label'    => esc_html__( 'Display social links', 'spotlight' ),
				'section'  => 'header',
				'default'  => false,
				'priority' => 10,
			)
		);

		CSCO_Kirki::add_field(
			'csco_theme_mod', array(
				'type'            => 'select',
				'settings'        => 'header_social_links_scheme',
				'label'           => esc_html__( 'Color scheme', 'spotlight' ),
				'section'         => 'header',
				'default'         => 'light',
				'priority'        => 10,
				'choices'         => array(
					'light'        => esc_html__( 'Light', 'spotlight' ),
					'bold'         => esc_html__( 'Bold', 'spotlight' ),
					'bold-rounded' => esc_html__( 'Bold Rounded', 'spotlight' ),
				),
				'active_callback' => array(
					array(
						'setting'  => 'header_social_links',
						'operator' => '==',
						'value'    => true,
					),
				),
			)
		);

		CSCO_Kirki::add_field(
			'csco_theme_mod', array(
				'type'            => 'number',
				'settings'        => 'header_social_links_maximum',
				'label'           => esc_html__( 'Maximum Number of Social Links', 'spotlight' ),
				'section'         => 'header',
				'default'         => 4,
				'priority'        => 10,
				'choices'         => array(
					'min'  => 2,
					'max'  => 6,
					'step' => 1,
				),
				'active_callback' => array(
					array(
						'setting'  => 'header_social_links',
						'operator' => '==',
						'value'    => true,
					),
				),
			)
		);

		CSCO_Kirki::add_field(
			'csco_theme_mod', array(
				'type'            => 'checkbox',
				'settings'        => 'header_social_links_counts',
				'label'           => esc_html__( 'Display social counts', 'spotlight' ),
				'section'         => 'header',
				'default'         => true,
				'priority'        => 10,
				'active_callback' => array(
					array(
						'setting'  => 'header_social_links',
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
				'settings' => 'header_subscribe_section',
				'label'    => esc_html__( 'Display subscribe section', 'spotlight' ),
				'section'  => 'header',
				'default'  => false,
				'priority' => 10,
			)
		);

		CSCO_Kirki::add_field(
			'csco_theme_mod', array(
				'type'            => 'checkbox',
				'settings'        => 'header_subscribe_name',
				'label'           => esc_html__( 'Display first name field', 'spotlight' ),
				'section'         => 'header',
				'default'         => false,
				'priority'        => 10,
				'active_callback' => array(
					array(
						'setting'  => 'header_subscribe_section',
						'operator' => '==',
						'value'    => true,
					),
				),
			)
		);

		CSCO_Kirki::add_field(
			'csco_theme_mod', array(
				'type'            => 'text',
				'settings'        => 'header_subscribe_title',
				'label'           => esc_html__( 'Title', 'spotlight' ),
				'section'         => 'header',
				'default'         => esc_html__( 'Sign Up for Our Newsletters', 'spotlight' ),
				'priority'        => 10,
				'active_callback' => array(
					array(
						'setting'  => 'header_subscribe_section',
						'operator' => '==',
						'value'    => true,
					),
				),
			)
		);

		CSCO_Kirki::add_field(
			'csco_theme_mod', array(
				'type'            => 'textarea',
				'settings'        => 'header_subscribe_text',
				'label'           => esc_html__( 'Text', 'spotlight' ),
				'section'         => 'header',
				'default'         => esc_html__( 'Get notified of the best deals on our WordPress themes.', 'spotlight' ),
				'priority'        => 10,
				'active_callback' => array(
					array(
						'setting'  => 'header_subscribe_section',
						'operator' => '==',
						'value'    => true,
					),
				),
			)
		);
	}

}

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'     => 'checkbox',
		'settings' => 'header_search_button',
		'label'    => esc_html__( 'Display search button', 'spotlight' ),
		'section'  => 'header',
		'default'  => true,
		'priority' => 10,
	)
);