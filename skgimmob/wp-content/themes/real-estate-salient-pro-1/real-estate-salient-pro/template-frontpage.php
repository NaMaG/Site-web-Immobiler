<?php 

/**
 * Template Name: Home page
 * @package real-estate-salient-pro
 */

//Header
get_header(); 
//slider
do_action( 'real_estate_salient_pro_slider' );
//Search
do_action( 'real_estate_salient_pro_homepage_search' );
//recent properties
do_action( 'real_estate_salient_pro_recent_properties' );
//Offer block
do_action( 'real_estate_salient_pro_homepage_offer' );
//browse by type block
do_action( 'real_estate_salient_pro_homepage_area' );
//Couter block
do_action( 'real_estate_salient_pro_homepage_counter' );
//Agent block
do_action( 'real_estate_salient_pro_homepage_agent' );
//post block
do_action( 'real_estate_salient_pro_homepage_post' );
//footer
get_footer();