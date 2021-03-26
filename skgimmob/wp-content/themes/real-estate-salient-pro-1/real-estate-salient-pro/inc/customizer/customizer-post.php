<?php
#####---=== Home page => post settings ===--- #####
#####---------------------------------------- #####

//Home page settings -> Custom home page
real_estate_salient_pro_kirki::add_section( 'real_estate_salient_pro_home_post', array(
    'title'          => esc_html__( 'Post carousel', 'real-estate-salient-pro' ),
    'description'    => esc_html__( '', 'real-estate-salient-pro' ),
    'panel'          => 'real_estate_salient_pro_home',
    'priority'       => 10,
) );

// Recent properties on off
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_post', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'post_enable',
    'label'       => __( 'Post carousel on / off', 'real-estate-salient-pro' ),
    'description' => __( 'Do you wish to show post carousel on homepage?', 'real-estate-salient-pro' ),
    'section'     => 'real_estate_salient_pro_home_post',
    'default'     => 'enable',
    'priority'    => 1,
    'choices'     => array(
        'enable'   => esc_attr__( 'Enable', 'real-estate-salient-pro' ),
        'disable' => esc_attr__( 'Disable', 'real-estate-salient-pro' ),
    ),
) );

//Recent properties title
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_post_title', [
    'type'     => 'text',
    'settings' => 'post_title',
    'label'    => __( 'Title', 'real-estate-salient-pro' ),
    'section'  => 'real_estate_salient_pro_home_post',
    'default'  => __('Recent Properties','real-estate-salient-pro'),
    'priority' => 2,
    'active_callback'  => [
        [
            'setting'  => 'post_enable',
            'operator' => '===',
            'value'    => 'enable',
        ]
    ],
] );

//Recent properties title description
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_post_title_description', [
    'type'     => 'textarea',
    'settings' => 'post_title_desc',
    'label'    => __( 'Decription under title', 'real-estate-salient-pro' ),
    'section'  => 'real_estate_salient_pro_home_post',
    'default'  => __('Lorem Ipsum is simply dummy text of the printing and typesetting industry','real-estate-salient-pro'),
    'priority' => 3,
    'active_callback'  => [
        [
            'setting'  => 'post_enable',
            'operator' => '===',
            'value'    => 'enable',
        ]
    ],
] );

// seperator
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_post_layout_seperator', [
    'type'        => 'custom',
    'settings'    => 'post_seperate_one',
    'section'     => 'real_estate_salient_pro_home_post',
    'default'     => '<hr>',
    'priority'    => 4,
    'active_callback'  => [
        [
            'setting'  => 'post_enable',
            'operator' => '===',
            'value'    => 'enable',
        ]
    ],
] );

// Recent properties type
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_post_type', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'post_type',
    'label'       => __( 'Post select', 'real-estate-salient-pro' ),
    'section'     => 'real_estate_salient_pro_home_post',
    'default'     => 'recent',
    'priority'    => 5,
    'choices'     => array(
        'recent'   => esc_attr__( 'Recent', 'real-estate-salient-pro' ),
        'custom' => esc_attr__( 'custom', 'real-estate-salient-pro' ),
    ),
    'active_callback'  => [
        [
            'setting'  => 'post_enable',
            'operator' => '===',
            'value'    => 'enable',
        ]
    ],
) );

// Number of properties / post
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_home_post_counter', [
    'type'        => 'number',
    'settings'    => 'post_number_count',
    'label'       => esc_html__( 'Number of post', 'real-estate-salient-pro' ),
    'section'     => 'real_estate_salient_pro_home_post',
    'default'     => 3,
    'priority'    => 6,
    'choices'     => [
        'min'  => 3,
        'max'  => 10,
        'step' => 1,
    ],
    'active_callback'  => [
        [
            'setting'  => 'post_type',
            'operator' => '===',
            'value'    => 'recent',
        ],
        [
            'setting'  => 'post_enable',
            'operator' => '===',
            'value'    => 'enable',
        ],
    ],
] );

// slider properties select
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_home_post_select', array(
    'type'        => 'repeater',
    'label'       => esc_attr__( 'Select posts', 'real-estate-salient-pro' ),
    'description' => esc_html__( 'Choose minimun 3 posts to show a carousel ', 'real-estate-salient-pro' ),
    'section'     => 'real_estate_salient_pro_home_post',
    'priority'    => 8,
    'row_label' => array(
        'type' => 'field',
        'value' => esc_attr__('Post', 'real-estate-salient-pro' ),
        'field' => 'custom_post',
    ),
    'active_callback'  => [
        [
            'setting'  => 'post_type',
            'operator' => '===',
            'value'    => 'custom',
        ],
        [
            'setting'  => 'post_enable',
            'operator' => '===',
            'value'    => 'enable',
        ],
    ],
    'settings'    => 'post_custom',
    'fields' => array(
        'custom_post' => array(
            'type'        => 'select',
            'label'       => esc_attr__( 'Post', 'real-estate-salient-pro' ),
            'choices'     => Kirki_Helper::get_posts( array( 'numberposts' => -1, 'post_type' => array( 'post', 'real-estate-salient-pro' ) ) ),
        ),
    ),  
) );