<?php
/**
 * Header template
 * Displays all of the head element
 * @package real-estate-salient-pro
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open() ): ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>

<?php wp_head(); ?>
</head>
<body  <?php body_class(); ?>>
	<?php
	//wp_body_open hook from WordPress 5.2
	if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	}
	
	//Wrap open
	//inc/template-tags.php
	//function real_estate_salient_pro_wrap_open		
	do_action( 'real_estate_salient_pro_wrapopen' );