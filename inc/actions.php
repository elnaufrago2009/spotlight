<?php
/**
 * All core theme actions.
 *
 * Please do not modify this file directly.
 * You may remove actions in your child theme by using remove_action().
 *
 * Please see /inc/partials.php for the list of partials,
 * added to actions.
 *
 * @package Spotlight
 */

/**
 * Body
 */

add_action( 'csco_site_before', 'csco_offcanvas' );

/**
 * Header
 */

// Default Layout.
add_action( 'csco_navbar_content', 'csco_header_offcanvas_button', 10 );
add_action( 'csco_navbar_content', 'csco_header_logo', 20 );
add_action( 'csco_navbar_content', 'csco_navbar_nav_menu', 30 );
add_action( 'csco_navbar_content', 'csco_header_dropdown_follow', 40 );
add_action( 'csco_navbar_content', 'csco_header_search_button', 50 );

// Large Layout.
add_action( 'csco_navbar_large_topbar', 'csco_header_logo', 10 );
add_action( 'csco_navbar_large_bottombar', 'csco_header_offcanvas_button', 10 );
add_action( 'csco_navbar_large_bottombar', 'csco_header_logo', 20 );
add_action( 'csco_navbar_large_bottombar', 'csco_navbar_nav_menu', 30 );
add_action( 'csco_navbar_large_bottombar', 'csco_header_dropdown_follow', 40 );
add_action( 'csco_navbar_large_bottombar', 'csco_header_search_button', 50 );

// Site search.
add_action( 'csco_navbar_end', 'csco_site_search' );

/**
 * Homepage
 */

add_action( 'csco_site_content_before', 'csco_homepage_posts', 5 );

/**
 * Main
 */
add_action( 'csco_site_content_start', 'csco_post_header', 100 );
add_action( 'csco_main_start', 'csco_page_header', 100 );

/**
 * Main Content
 */

add_action( 'csco_main_content_before', 'csco_breadcrumbs' );

/**
 * Category
 */

add_action( 'csco_site_content_before', 'csco_category_posts', 10 );
add_action( 'csco_page_header_after', 'csco_subcategories', 10 );

/**
 * Singular
 */

add_action( 'csco_singular_content_before', 'csco_post_media', 10 );

add_action( 'csco_singular_content_before', 'csco_singular_post_type_before', 999 );
add_action( 'csco_singular_content_after', 'csco_singular_post_type_after', 999 );
add_action( 'csco_singular_content_start', 'csco_singular_post_type_start', 999 );
add_action( 'csco_singular_content_end', 'csco_singular_post_type_end', 999 );

/**
 * Post
 */
add_action( 'csco_post_sidebar_details', 'csco_post_sidebar_date', 10 );
add_action( 'csco_post_sidebar_details', 'csco_post_sidebar_author', 20 );
add_action( 'csco_post_sidebar_details', 'csco_post_sidebar_tags', 30 );
add_action( 'csco_post_sidebar_details', 'csco_post_sidebar_shares', 40 );
add_action( 'csco_post_content_before', 'csco_wrap_entry_content', 10 );
add_action( 'csco_post_content_after', 'csco_wrap_entry_content', 10 );

add_action( 'csco_post_content_end', 'csco_page_pagination', 10 );
add_action( 'csco_post_content_end', 'csco_comments', 20 );

add_action( 'csco_post_after', 'csco_single_subscribe', 10 );
add_action( 'csco_post_after', 'csco_related_posts', 20 );

/**
 * Page
 */

add_action( 'csco_page_content_end', 'csco_page_pagination', 10 );
add_action( 'csco_page_content_end', 'csco_comments', 20 );

/**
 * Template Page
 */
add_action( 'csco_singular_content_after', 'csco_meet_team', 10 );


/**
 * Footer
 */

add_action( 'csco_footer_before', 'csco_footer_posts' );
