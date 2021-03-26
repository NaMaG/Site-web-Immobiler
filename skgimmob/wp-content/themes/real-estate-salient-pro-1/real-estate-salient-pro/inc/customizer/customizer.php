<?php

/**
* Personal customizer setup
* @package real estate salient
*/


#####---==========================--- #####
#####---=== Customizer setting ===--- #####
#####---==========================--- #####

if ( class_exists( 'Kirki' ) ) {
    add_action( 'init', 'real_estate_salient_pro_kirki_customize_init', 500 );
    function real_estate_salient_pro_kirki_customize_init() {

        #####---=== create General setting panel ===--- #####
        //real_estate_salient_pro_kirki::add_panel( 'real_estate_salient_pro_general', array(
        //    'priority'    => 1,
        //    'title'       => esc_html__( 'General settings', 'kirki' ),
        //    'description' => esc_html__( 'General settings', 'kirki' ),
        //) );

        #####---=== create Header setting panel ===--- #####
        real_estate_salient_pro_kirki::add_panel( 'real_estate_salient_pro_header', array(
            'priority'    => 2,
            'title'       => esc_html__( 'Header settings', 'kirki' ),
            'description' => esc_html__( 'Header settings', 'kirki' ),
        ) );

        #####---=== Typography setting panel ===--- #####
        real_estate_salient_pro_kirki::add_panel( 'real_estate_salient_pro_typography', array(
            'priority'    => 3,
            'title'       => esc_html__( 'Typography settings', 'kirki' ),
            'description' => esc_html__( 'Typography settings', 'kirki' ),
        ) );

        #####---=== Homepage setting panel ===--- #####
        real_estate_salient_pro_kirki::add_panel( 'real_estate_salient_pro_home', array(
            'priority'    => 4,
            'title'       => esc_html__( 'Homepage settings', 'kirki' ),
            'description' => esc_html__( 'Homepage settings', 'kirki' ),
        ) );

        #####---=== Add customizer settings for general & homepage templates ===--- #####
        require get_template_directory() . '/inc/customizer/customizer-general.php';
        require get_template_directory() . '/inc/customizer/customizer-header.php';
        require get_template_directory() . '/inc/customizer/customizer-home.php';
        require get_template_directory() . '/inc/customizer/customizer-search.php';
        require get_template_directory() . '/inc/customizer/customizer-recent.php';
        require get_template_directory() . '/inc/customizer/customizer-offer.php';
        require get_template_directory() . '/inc/customizer/customizer-area.php';
        require get_template_directory() . '/inc/customizer/customizer-counter.php';
        require get_template_directory() . '/inc/customizer/customizer-agent.php';
        require get_template_directory() . '/inc/customizer/customizer-post.php';
        //require get_template_directory() . '/inc/customizer/customizer-typography.php';    
    }
}