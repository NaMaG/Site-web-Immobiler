<?php
#####---=== Home page => offer settings ===--- #####
#####----------------------------------------- #####

//Home page settings -> Offer
real_estate_salient_pro_kirki::add_section( 'real_estate_salient_pro_home_search', array(
    'title'          => esc_html__( 'Search', 'real-estate-salient-pro' ),
    'description'    => esc_html__( '', 'real-estate-salient-pro' ),
    'panel'          => 'real_estate_salient_pro_home',
    'priority'       => 4,
) );

// Offer on off
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_search', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'search_enable',
    'label'       => __( 'search box on / off', 'real-estate-salient-pro' ),
    'description' => __( 'Do you wish to show search box on homepage?', 'real-estate-salient-pro' ),
    'section'     => 'real_estate_salient_pro_home_search',
    'default'     => 'enable',
    'priority'    => 1,
    'choices'     => array(
        'enable'   => esc_attr__( 'Enable', 'real-estate-salient-pro' ),
        'disable' => esc_attr__( 'Disable', 'real-estate-salient-pro' ),
    ),
) );