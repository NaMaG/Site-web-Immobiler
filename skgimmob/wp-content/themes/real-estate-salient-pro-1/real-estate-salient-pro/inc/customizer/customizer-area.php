<?php
#####---=== Home page => Property by area settings ===--- #####
#####----------------------------------------------------- #####

//Home page settings -> Custom home page
real_estate_salient_pro_kirki::add_section( 'real_estate_salient_pro_home_area', array(
    'title'          => esc_html__( 'Properties type', 'real-estate-salient-pro' ),
    'description'    => esc_html__( '', 'real-estate-salient-pro' ),
    'panel'          => 'real_estate_salient_pro_home',
    'priority'       => 7,
) );

// Recent properties on off
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_area', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'area_properties_enable',
    'label'       => __( 'Properties by type on / off', 'real-estate-salient-pro' ),
    'description' => __( 'Do you wish to show properties by type?', 'real-estate-salient-pro' ),
    'section'     => 'real_estate_salient_pro_home_area',
    'default'     => 'enable',
    'priority'    => 1,
    'choices'     => array(
        'enable'   => esc_attr__( 'Enable', 'real-estate-salient-pro' ),
        'disable' => esc_attr__( 'Disable', 'real-estate-salient-pro' ),
    ),
) );

//Recent properties title
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_area_title', [
    'type'     => 'text',
    'settings' => 'area_properties_title',
    'label'    => __( 'Title', 'real-estate-salient-pro' ),
    'section'  => 'real_estate_salient_pro_home_area',
    'default'  => __('Browse Properties','real-estate-salient-pro'),
    'priority' => 2,
    'active_callback'  => [
        [
            'setting'  => 'area_properties_enable',
            'operator' => '===',
            'value'    => 'enable',
        ]
    ],
] );

//Recent properties title description
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_area_title_description', [
    'type'     => 'textarea',
    'settings' => 'area_properties_title_desc',
    'label'    => __( 'Decription under title', 'real-estate-salient-pro' ),
    'section'  => 'real_estate_salient_pro_home_area',
    'default'  => __('Lorem Ipsum is simply dummy text of the printing and typesetting industry','real-estate-salient-pro'),
    'priority' => 3,
    'active_callback'  => [
        [
            'setting'  => 'area_properties_enable',
            'operator' => '===',
            'value'    => 'enable',
        ]
    ],
] );


/* recent post layout
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_area_layout', array(
    'type'        => 'radio-image',
    'settings'    => 'area_properties_layout',
    'label'       => esc_attr__( 'Layout style', 'real-estate-salient-pro' ),
    'description' => esc_attr__( 'Choose your preferred style, it is for home page only', 'real-estate-salient-pro' ),
    'section'     => 'real_estate_salient_pro_home_area',
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
            'setting'  => 'area_properties_enable',
            'operator' => '===',
            'value'    => 'enable',
        ]
    ],
 ) );
*/
 
// seperator
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_area_seperator', [
    'type'        => 'custom',
    'settings'    => 'area_seperate_one',
    'section'     => 'real_estate_salient_pro_home_area',
    'default'     => '<hr>',
    'priority'    => 5,
    'active_callback'  => [
        [
            'setting'  => 'area_properties_enable',
            'operator' => '===',
            'value'    => 'enable',
        ]
    ],
] );


// slider properties select
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_home_area_select', array(
    'type'        => 'repeater',
    'label'       => esc_attr__( 'Select property type', 'real-estate-salient-pro' ),
    //'description' => wp_kses( __( 'Multiply of 2 will give good look on home page. Choose 4 or 6 properties. Please make sure you have added thumbnail picture for every property type <a href="'.admin_url().'edit-tags.php?taxonomy=property-type&post_type=property" target="_blank">here</a>. It is neccessary', 'real-estate-salient-pro' ), array(
    //    'a' => array(
    //      'target' => array(),
    //      'href' => array(),
    //    ),
    //  ) ),
    'section'     => 'real_estate_salient_pro_home_area',
    'priority'    => 6,
    'row_label' => array(
        'type' => 'field',
        'value' => esc_attr__('property type', 'real-estate-salient-pro' ),
        'field' => 'area_custom_property',
    ),
    'active_callback'  => [
        [
            'setting'  => 'area_properties_enable',
            'operator' => '===',
            'value'    => 'enable',
        ],
    ],
    'choices' => [
        'limit' => 4
    ],
    'settings'    => 'area_property_types',
    'fields' => array(
        'area_custom_property' => array(
            'type'        => 'select',
            'label'       => esc_attr__( 'Property Type', 'real-estate-salient-pro' ),
            'choices'     => Kirki_Helper::get_terms( array('taxonomy' => 'property-type') ),           
        ),
        'area_image' => array(
            'type'        => 'image',
            'label'       => esc_html__( 'Property type image', 'real-estate-salient-pro' ),
            'default'     => '',
        ),
    ),  
) );