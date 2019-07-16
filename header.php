<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package Spotlight
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-77264662-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
	  gtag('config', 'UA-77264662-1');
	</script>

	<!-- Codigo Ads -->
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<script>
		 (adsbygoogle = window.adsbygoogle || []).push({
			  google_ad_client: "ca-pub-5852042324891789",
			  enable_page_level_ads: true
		 });
	</script>	
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'csco_site_before' ); ?>

<div id="page" class="site">

	<?php do_action( 'csco_site_start' ); ?>

	<div class="site-inner">

		<?php do_action( 'csco_header_before' ); ?>

		<header id="masthead" class="site-header">

			<?php do_action( 'csco_header_start' ); ?>

			<?php
			if ( 'large' === get_theme_mod( 'header_layout', 'default' ) ) {
				get_template_part( 'template-parts/headers/header-large' );
			} else {
				get_template_part( 'template-parts/headers/header-default' );
			}
			?>

			<?php do_action( 'csco_header_end' ); ?>

		</header><!-- #masthead -->

		<?php do_action( 'csco_header_after' ); ?>

		<?php do_action( 'csco_site_content_before' ); ?>

		<div <?php csco_site_content_class(); ?>>

			<?php do_action( 'csco_site_content_start' ); ?>

			<div class="cs-container">

				<?php do_action( 'csco_main_content_before' ); ?>

				<div id="content" class="main-content">

					<?php do_action( 'csco_main_content_start' ); ?>
