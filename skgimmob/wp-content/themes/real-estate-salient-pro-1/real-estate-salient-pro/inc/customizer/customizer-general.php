<?php
#####---=== General settings ===--- #####
#####------------------------------ #####

//General settings -> Sidebar position
real_estate_salient_pro_kirki::add_section( 'real_estate_salient_pro_sidebar_position', array(
    'title'          => esc_html__( 'Sidebar', 'kirki' ),
    'description'    => esc_html__( '', 'kirki' ),
    'panel'          => 'real_estate_salient_pro_general',
    'priority'       => 1,
) );


//Sidebar positions
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_sidebar', array(
    'type'        => 'radio-image',
    'settings'    => 'sidebar-positions',
    'label'       => esc_attr__( 'Sidebar option', 'kirki-demo' ),
    'description' => esc_attr__( 'Choose sidebar position', 'kirki-demo' ),
    'section'     => 'real_estate_salient_pro_sidebar_position',
    'default'     => 'right',
    'priority'    => 1,
    'choices'     => array(
        'left'  => get_template_directory_uri() . '/img/left.png',
        'right'  => get_template_directory_uri() . '/img/right.png',
    ),
    'input_attrs' => array(
        'style' => 'padding: 5px;',
    ),
 ) );

//General settings -> Sidebar position
real_estate_salient_pro_kirki::add_section( 'real_estate_salient_pro_website_layout', array(
    'title'          => esc_html__( 'Layout', 'kirki' ),
    'description'    => esc_html__( '', 'kirki' ),
    'panel'          => 'real_estate_salient_pro_general',
    'priority'       => 2,
) );

//Website Layout
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_layout', array(
    'type'        => 'radio-image',
    'settings'    => 'website-layout',
    'label'       => esc_attr__( 'Website layout', 'kirki-demo' ),
    'description' => esc_attr__( 'Fullwidth will stretch the layout, boxed layout will show a background image or text', 'kirki-demo' ),
    'section'     => 'real_estate_salient_pro_website_layout',
    'default'     => 'full',
    'priority'    => 1,
    'choices'     => array(
        'full'  => get_template_directory_uri() . '/img/fullwidth.png',
        'box'  => get_template_directory_uri() . '/img/boxed.png',
    ),
    'input_attrs' => array(
        'style' => 'padding: 5px;',
    ),
) );

//Background color or image?
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_background', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'background-type',
    'label'       => __( 'Background option', 'my_textdomain' ),
    'description' => esc_attr__( 'What do you prefer on the background? image or just plain?', 'kirki-demo' ),
    'section'     => 'real_estate_salient_pro_website_layout',
    'default'     => 'color',
    'priority'    => 2,
    'choices'     => array(
        'color'   => esc_attr__( 'Colour', 'my_textdomain' ),
        'image' => esc_attr__( 'Image', 'my_textdomain' ),
    ),
    'active_callback'  => [
        [
            'setting'  => 'website-layout',
            'operator' => '===',
            'value'    => 'box',
        ]
    ],    
) );

// Background colour
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_background_color', array(
    'type'        => 'color',
    'settings'    => 'body-background-color',
    'description' => esc_attr__( 'Background colour.', 'kirki-demo' ),
    'label'       => __( 'Background colour', 'kirki-demo' ),
    'description' => esc_attr__( 'Choose the desired background colour for website, default is #eeeeee', 'kirki-demo' ),
    'section'     => 'real_estate_salient_pro_website_layout',
    'default'     => '#eeeeee',
    'priority'    => 3,
    'transport'   => 'auto',
    'choices'     => array(
        'alpha' => true,
    ),
    'output' => array(
        array(
            'element'  => '.body',
            'property' => 'background-color',
        ),
    ),
    'active_callback'  => [
        [
            'setting'  => 'background-type',
            'operator' => '===',
            'value'    => 'color',
        ],
        [
            'setting'  => 'website-layout',
            'operator' => '===',
            'value'    => 'box',
        ]
    ],
) );

// Background image
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_background_image', array(
    'type'            => 'image',
    'settings'        => 'body-background-image',
    'label'           => __( 'Background Image', 'kirki-demo' ),
    'tooltip'         => __( 'Upload or choose an image as background image.', 'kirki-demo' ),
    'section'         => 'real_estate_salient_pro_website_layout',
    'default'         => '',
    'transport'       => 'postMessage',
    'active_callback'  => [
        [
            'setting'  => 'background-type',
            'operator' => '===',
            'value'    => 'image',
        ],
        [
            'setting'  => 'website-layout',
            'operator' => '===',
            'value'    => 'box',
        ]
    ],
) );

//General settings -> other settings
real_estate_salient_pro_kirki::add_section( 'real_estate_salient_pro_website_general_other', array(
    'title'          => esc_html__( 'Other settings', 'kirki' ),
    'description'    => esc_html__( '', 'kirki' ),
    'panel'          => 'real_estate_salient_pro_general',
    'priority'       => 3,
) );

// Show go to Top button
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_goto_top', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'goto-top',
    'label'       => __( 'Go to Top button', 'my_textdomain' ),
    'description' => esc_attr__( 'Do you wish to show go to top button on footer?', 'kirki-demo' ),
    'section'     => 'real_estate_salient_pro_website_general_other',
    'default'     => 'enable',
    'priority'    => 1,
    'choices'     => array(
        'enable'   => esc_attr__( 'Enable', 'my_textdomain' ),
        'disable' => esc_attr__( 'Disable', 'my_textdomain' ),
    ),
) );