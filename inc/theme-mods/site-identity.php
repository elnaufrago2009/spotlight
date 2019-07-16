<?php
/**
 * Site Identity
 *
 * @package Spotlight
 */

CSCO_Kirki::add_field(
	'csco_theme_mod', array(
		'type'        => 'image',
		'settings'    => 'logo',
		'label'       => esc_html__( 'Logo', 'spotlight' ),
		'description' => esc_html__( 'The main logo of your website. Logo image will be displayed in its original image dimensions. For support of Retina screens, please upload the 2x version of your logo via Media Library with ', 'spotlight' ) . '<code>@2x</code>' . esc_html__( ' suffix. For example.', 'spotlight' ) . '<code>logo@2x.png</code>',
		'section'     => 'title_tagline',
		'default'     => '',
		'priority'    => 0,
		'choices'     => array(
			'save_as' => 'id',
		),
	)
);
