<?php
#####---=== Home page => Recent properties settings ===--- #####
#####----------------------------------------------------- #####

//Home page settings -> Custom home page
real_estate_salient_pro_kirki::add_section( 'real_estate_salient_pro_home_recent', array(
    'title'          => esc_html__( 'Recent properties', 'real-estate-salient-pro' ),
    'description'    => esc_html__( '', 'real-estate-salient-pro' ),
    'panel'          => 'real_estate_salient_pro_home',
    'priority'       => 5,
) );

// Recent properties on off
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_recent', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'recent_properties_enable',
    'label'       => __( 'Recent properties on / off', 'real-estate-salient-pro' ),
    'description' => __( 'Do you wish to show recent properties on homepage?', 'real-estate-salient-pro' ),
    'section'     => 'real_estate_salient_pro_home_recent',
    'default'     => 'enable',
    'priority'    => 1,
    'choices'     => array(
        'enable'   => esc_attr__( 'Enable', 'real-estate-salient-pro' ),
        'disable' => esc_attr__( 'Disable', 'real-estate-salient-pro' ),
    ),
) );

//Recent properties title
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_recent_title', [
    'type'     => 'text',
    'settings' => 'recent_properties_title',
    'label'    => __( 'Title', 'real-estate-salient-pro' ),
    'section'  => 'real_estate_salient_pro_home_recent',
    'default'  => __('Recent Properties','real-estate-salient-pro'),
    'priority' => 2,
    'active_callback'  => [
        [
            'setting'  => 'recent_properties_enable',
            'operator' => '===',
            'value'    => 'enable',
        ]
    ],
] );

//Recent properties title description
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_recent_title_description', [
    'type'     => 'textarea',
    'settings' => 'recent_properties_title_desc',
    'label'    => __( 'Decription under title', 'real-estate-salient-pro' ),
    'section'  => 'real_estate_salient_pro_home_recent',
    'default'  => __('Lorem Ipsum is simply dummy text of the printing and typesetting industry','real-estate-salient-pro'),
    'priority' => 3,
    'active_callback'  => [
        [
            'setting'  => 'recent_properties_enable',
            'operator' => '===',
            'value'    => 'enable',
        ]
    ],
] );

//recent post layout
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_recent_layout', array(
    'type'        => 'radio-image',
    'settings'    => 'recent_properties_layout',
    'label'       => esc_attr__( 'Layout style', 'real-estate-salient-pro' ),
    'description' => esc_attr__( 'Choose your preferred style, it is for home page only', 'real-estate-salient-pro' ),
    'section'     => 'real_estate_salient_pro_home_recent',
    'default'     => 'one',
    'priority'    => 4,
    'choices'     => array(
        'one'     => get_template_directory_uri() . '/img/styleone.png',
        'two'     => get_template_directory_uri() . '/img/styletwo.png',
    ),
    'input_attrs' => array(
        'style'   => 'padding: 5px;',
    ),
    'active_callback'  => [
        [
            'setting'  => 'recent_properties_enable',
            'operator' => '===',
            'value'    => 'enable',
        ]
    ],
 ) );

// seperator
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_recent_layout_seperator', [
    'type'        => 'custom',
    'settings'    => 'recent_seperate_one',
    'section'     => 'real_estate_salient_pro_home_recent',
    'default'     => '<hr>',
    'priority'    => 5,
    'active_callback'  => [
        [
            'setting'  => 'recent_properties_enable',
            'operator' => '===',
            'value'    => 'enable',
        ]
    ],
] );

// Recent properties type
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_recent_type', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'recent_properties_type',
    'label'       => __( 'Properties select', 'real-estate-salient-pro' ),
    'section'     => 'real_estate_salient_pro_home_recent',
    'default'     => 'recent',
    'priority'    => 6,
    'choices'     => array(
        'recent'   => esc_attr__( 'Recent', 'real-estate-salient-pro' ),
        'featured' => esc_attr__( 'Featured', 'real-estate-salient-pro' ),
        'custom' => esc_attr__( 'custom', 'real-estate-salient-pro' ),
    ),
    'active_callback'  => [
        [
            'setting'  => 'recent_properties_enable',
            'operator' => '===',
            'value'    => 'enable',
        ]
    ],
) );

// Number of properties / post
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_home_recent_property_count', [
    'type'        => 'number',
    'settings'    => 'recent_properties_count',
    'label'       => esc_html__( 'Number of properties', 'real-estate-salient-pro' ),
    'section'     => 'real_estate_salient_pro_home_recent',
    'default'     => 3,
    'priority'    => 7,
    'choices'     => [
        'min'  => 3,
        'max'  => 15,
        'step' => 3,
    ],
    'active_callback'  => [
        [
            'setting'  => 'recent_properties_type',
            'operator' => '!==',
            'value'    => 'custom',
        ],
        [
            'setting'  => 'recent_properties_enable',
            'operator' => '===',
            'value'    => 'enable',
        ],
    ],
] );

// slider properties select
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_home_recent_property_select', array(
    'type'        => 'repeater',
    'label'       => esc_attr__( 'Select properties', 'real-estate-salient-pro' ),
    'description' => esc_html__( 'Multiply of 3 will give good look on home page. Choose 3 or 6 properties ', 'real-estate-salient-pro' ),
    'section'     => 'real_estate_salient_pro_home_recent',
    'priority'    => 8,
    'row_label' => array(
        'type' => 'field',
        'value' => esc_attr__('Slider property', 'eal-estate-salient-pro' ),
        'field' => 'recent_custom_property',
    ),
    'active_callback'  => [
        [
            'setting'  => 'recent_properties_type',
            'operator' => '===',
            'value'    => 'custom',
        ],
        [
            'setting'  => 'recent_properties_enable',
            'operator' => '===',
            'value'    => 'enable',
        ],
    ],
    'settings'    => 'recent_property_custom',
    'fields' => array(
        'recent_custom_property' => array(
            'type'        => 'select',
            'label'       => esc_attr__( 'Property', 'real-estate-salient-pro' ),
            'choices'     => Kirki_Helper::get_posts( array( 'numberposts' => -1, 'post_type' => array( 'property', 'real-estate-salient-pro' ) ) ),
        ),
    ),  
) );