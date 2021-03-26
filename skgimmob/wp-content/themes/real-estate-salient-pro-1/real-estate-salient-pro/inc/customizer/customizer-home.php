<?php
#####---=== Home page => Slider settings ===--- #####
#####------------------------------------------ #####

//Home page settings -> Custom home page
real_estate_salient_pro_kirki::add_section( 'real_estate_salient_pro_home_page', array(
    'title'          => esc_html__( 'Custom Home page', 'kirki' ),
    'description'    => esc_html__( '', 'kirki' ),
    'panel'          => 'real_estate_salient_pro_home',
    'priority'       => 1,
) );

// Description on top of home page settings
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_home_desc', [
    'type'        => 'custom',
    'settings'    => 'home_desc',
    'section'     => 'real_estate_salient_pro_home_page',
    'default'     => '<p>You can choose what’s displayed on the homepage of your site. It can be posts in reverse chronological order (classic blog), or a fixed/static page. To set a static homepage, you first need to create two Pages. One will become the homepage, and the other will be where your posts are displayed.</p>',
    'priority'    => 1,
] );

//moving home page settings 
function real_estate_salient_pro_customize_home_move_init( $wp_customize ){
    $wp_customize->get_control ('show_on_front')->section = 'real_estate_salient_pro_home_page';
    $wp_customize->get_control ('page_on_front')->section = 'real_estate_salient_pro_home_page';
    $wp_customize->get_control ('page_for_posts')->section = 'real_estate_salient_pro_home_page'; 
}
add_action( 'customize_register', 'real_estate_salient_pro_customize_home_move_init' );

//Home page settings -> Slider
real_estate_salient_pro_kirki::add_section( 'real_estate_salient_pro_home_slider', array(
    'title'          => esc_html__( 'Slider', 'kirki' ),
    'description'    => esc_html__( '', 'kirki' ),
    'panel'          => 'real_estate_salient_pro_home',
    'priority'       => 3,
) );

// Slider on off
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_home_slider_enable', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'slider_enable',
    'label'       => __( 'Slider on / off', 'my_textdomain' ),
    'description' => esc_attr__( 'Do you wish to show slider on homepage?', 'kirki-demo' ),
    'section'     => 'real_estate_salient_pro_home_slider',
    'default'     => 'enable',
    'priority'    => 1,
    'choices'     => array(
        'enable'   => esc_attr__( 'Enable', 'my_textdomain' ),
        'disable' => esc_attr__( 'Disable', 'my_textdomain' ),
    ),
) );

// seperator
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_home_slide_sepertor', [
    'type'        => 'custom',
    'settings'    => 'slide_seperator_one',
    'section'     => 'real_estate_salient_pro_home_slider',
    'default'     => '<hr>',
    'priority'    => 2,
    'active_callback'  => [
        [
            'setting'  => 'slider_enable',
            'operator' => '===',
            'value'    => 'enable',
        ]
    ],
] );

// Slider Slider type
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_home_slider_type', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'slider_type',
    'label'       => __( 'Slider type', 'my_textdomain' ),
    'description' => esc_attr__( 'Slider or search box over an static image?', 'kirki-demo' ),
    'section'     => 'real_estate_salient_pro_home_slider',
    'default'     => 'slider',
    'priority'    => 3,
    'choices'     => array(
        'slider'   => esc_attr__( 'Slider', 'my_textdomain' ),
        'image' => esc_attr__( 'Image', 'my_textdomain' ),
        'map' => esc_attr__( 'Map', 'my_textdomain' ),
    ),
    'active_callback'  => [
        [
            'setting'  => 'slider_enable',
            'operator' => '===',
            'value'    => 'enable',
        ]
    ],
) );

// Slider option
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_home_slider_type_option', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'slider_type_option',
    'label'       => __( 'Slider style', 'my_textdomain' ),
    'description' => esc_attr__( 'Cycle or FlexSlider?', 'kirki-demo' ),
    'section'     => 'real_estate_salient_pro_home_slider',
    'default'     => 'cycle',
    'priority'    => 3,
    'choices'     => array(
        'cycle'   => esc_attr__( 'Cycle', 'my_textdomain' ),
        'flex' => esc_attr__( 'FlexSlider', 'my_textdomain' ),
    ),
    'active_callback'  => [
        [
            'setting'  => 'slider_enable',
            'operator' => '===',
            'value'    => 'enable',
        ],
        [
            'setting'  => 'slider_type',
            'operator' => '===',
            'value'    => 'slider',
        ]
    ],
) );

// Slider option
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_home_slider_type_option_post', [
    'type'        => 'radio',
    'settings'    => 'slider_content_option',
    'label'       => esc_html__( 'What to show on slider?', 'kirki' ),
    'section'     => 'real_estate_salient_pro_home_slider',
    'default'     => 'properties',
    'priority'    => 4,
    'choices'     => [
        'properties'   => esc_html__( 'Properties', 'kirki' ),
        'post' => esc_html__( 'Posts', 'kirki' ),
    ],
    'active_callback'  => [
        [
            'setting'  => 'slider_enable',
            'operator' => '===',
            'value'    => 'enable',
        ],
        [
            'setting'  => 'slider_type',
            'operator' => '===',
            'value'    => 'slider',
        ]
    ],
] );

// slider selection properties
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_home_slider_type_properties_select', [
    'type'        => 'radio',
    'settings'    => 'slider_property_select',
    'label'       => esc_html__( 'Recent or Custom properties?', 'kirki' ),
    'description' => esc_html__( 'Recent will fetch recently published properties automatically. select = choose yourself.', 'kirki-demo' ),
    'section'     => 'real_estate_salient_pro_home_slider',
    'default'     => 'recent',
    'priority'    => 5,
    'choices'     => [
        'recent'   => esc_html__( 'Recent properties', 'kirki' ),
        'custom' => esc_html__( 'Select properties', 'kirki' ),
    ],
    'active_callback'  => [
        [
            'setting'  => 'slider_enable',
            'operator' => '===',
            'value'    => 'enable',
        ],
        [
            'setting'  => 'slider_type',
            'operator' => '===',
            'value'    => 'slider',
        ],
        [
            'setting'  => 'slider_content_option',
            'operator' => '===',
            'value'    => 'properties',
        ],
    ],
] );

// slider selection posts
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_home_slider_type_post_select', [
    'type'        => 'radio',
    'settings'    => 'slider_post_select',
    'label'       => esc_html__( 'Content to show on slide?', 'kirki' ),
    'description' => esc_html__( 'Recent = Will fetch recently published posts automatically. Custom = choose yourself.', 'kirki-demo' ),
    'section'     => 'real_estate_salient_pro_home_slider',
    'default'     => 'recent',
    'priority'    => 6,
    'choices'     => [
        'recent'   => esc_html__( 'Recent posts', 'kirki' ),
        'custom' => esc_html__( 'Select posts', 'kirki' ),
    ],
    'active_callback'  => [
        [
            'setting'  => 'slider_enable',
            'operator' => '===',
            'value'    => 'enable',
        ],
        [
            'setting'  => 'slider_type',
            'operator' => '===',
            'value'    => 'slider',
        ],
        [
            'setting'  => 'slider_content_option',
            'operator' => '===',
            'value'    => 'post',
        ],
    ],
] );

// Number of properties / post
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_home_slider_property_count', [
    'type'        => 'number',
    'settings'    => 'slider_property_count',
    'label'       => esc_html__( 'Number of properties to show', 'kirki' ),
    'section'     => 'real_estate_salient_pro_home_slider',
    'default'     => 3,
    'priority'    => 7,
    'choices'     => [
        'min'  => 1,
        'max'  => 8,
        'step' => 1,
    ],
    'active_callback'  => [
        [
            'setting'  => 'slider_enable',
            'operator' => '===',
            'value'    => 'enable',
        ],
        [
            'setting'  => 'slider_type',
            'operator' => '===',
            'value'    => 'slider',
        ],
        [
            'setting'  => 'slider_property_select',
            'operator' => '===',
            'value'    => 'recent',
        ],
        [
            'setting'  => 'slider_content_option',
            'operator' => '===',
            'value'    => 'properties',
        ],
    ],
] );

// slider properties select
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_home_slider_property_select', array(
    'type'        => 'repeater',
    'label'       => esc_attr__( 'Select properties', 'real-estate-salient-pro' ),
    'description' => esc_html__( 'Choose properties to show on slider', 'real-estate-salient-pro' ),
    'section'     => 'real_estate_salient_pro_home_slider',
    'priority'    => 9,
    'row_label' => array(
        'type' => 'field',
        'value' => esc_attr__('Slider property', 'eal-estate-salient-pro' ),
        'field' => 'slider_property',
    ),
    'active_callback'  => [
        [
            'setting'  => 'slider_enable',
            'operator' => '===',
            'value'    => 'enable',
        ],
        [
            'setting'  => 'slider_type',
            'operator' => '===',
            'value'    => 'slider',
        ],
        [
            'setting'  => 'slider_content_option',
            'operator' => '===',
            'value'    => 'properties',
        ],
        [
            'setting'  => 'slider_property_select',
            'operator' => '===',
            'value'    => 'custom',
        ],
    ],
    'settings'    => 'slider_property_custom',
    'fields' => array(
        'slider_property' => array(
            'type'        => 'select',
            'label'       => esc_attr__( 'Property', 'real-estate-salient-pro' ),
            'default'     => '',
            'choices'     => Kirki_Helper::get_posts( array( 'numberposts' => -1, 'post_type' => array( 'property', 'real-estate-salient-pro' ) ) ),
        ),
    ),  
) );

// seperator
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_home_slide_sepertor', [
    'type'        => 'custom',
    'settings'    => 'slide_seperator_two',
    'section'     => 'real_estate_salient_pro_home_slider',
    'default'     => '<hr>',
    'priority'    => 10,
    'active_callback'  => [
        [
            'setting'  => 'slider_enable',
            'operator' => '===',
            'value'    => 'enable',
        ],
        [
            'setting'  => 'slider_type',
            'operator' => '===',
            'value'    => 'slider',
        ],
        [
            'setting'  => 'slider_type_option',
            'operator' => '===',
            'value'    => 'cycle',
        ],
    ],
] );

// slider selection posts
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_home_slider_transit_select', [
    'type'        => 'select',
    'settings'    => 'slider_transit',
    'label'       => esc_html__( 'Slider transition style?', 'kirki' ),
    'description' => esc_html__( 'Choose slider transition style', 'real-estate-salient-pro' ),
    'section'     => 'real_estate_salient_pro_home_slider',
    'default'     => 'tileSlide',
    'priority'    => 11,
    'choices'     => [
        'tileSlide'   => esc_html__( 'Tile Slide', 'kirki' ),
        'tileBlind' => esc_html__( 'Tile Blind', 'kirki' ),
        'flipHorz' => esc_html__( 'Horizontal Flip', 'kirki' ),
        'flipVert' => esc_html__( 'Vertical Flip', 'kirki' ),
    ],
    'active_callback'  => [
        [
            'setting'  => 'slider_enable',
            'operator' => '===',
            'value'    => 'enable',
        ],
        [
            'setting'  => 'slider_type',
            'operator' => '===',
            'value'    => 'slider',
        ],
        [
            'setting'  => 'slider_type_option',
            'operator' => '===',
            'value'    => 'cycle',
        ],
    ],
] );

// Slider time delay
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_home_slider_transiit delay', [
    'type'        => 'number',
    'settings'    => 'slider_translit_delay',
    'label'       => esc_html__( 'Slide period', 'kirki' ),
    'section'     => 'real_estate_salient_pro_home_slider',
    'description' => esc_html__( 'How long a slide to show before moving next? Time in microseconds', 'real-estate-salient-pro' ),
    'default'     => 3000,
    'priority'    => 12,
    'choices'     => [
        'min'  => 2000,
        'max'  => 6000,
        'step' => 100,
    ],
    'active_callback'  => [
        [
            'setting'  => 'slider_enable',
            'operator' => '===',
            'value'    => 'enable',
        ],
        [
            'setting'  => 'slider_type',
            'operator' => '===',
            'value'    => 'slider',
        ],
        [
            'setting'  => 'slider_type_option',
            'operator' => '===',
            'value'    => 'cycle',
        ],
    ],
] );

// Number of post
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_home_slider_post_count', [
    'type'        => 'number',
    'settings'    => 'slider_post_count',
    'label'       => esc_html__( 'Number of posts to show', 'kirki' ),
    'section'     => 'real_estate_salient_pro_home_slider',
    'default'     => 3,
    'priority'    => 13,
    'choices'     => [
        'min'  => 1,
        'max'  => 8,
        'step' => 1,
    ],
    'active_callback'  => [
        [
            'setting'  => 'slider_enable',
            'operator' => '===',
            'value'    => 'enable',
        ],
        [
            'setting'  => 'slider_type',
            'operator' => '===',
            'value'    => 'slider',
        ],
        [
            'setting'  => 'slider_post_select',
            'operator' => '===',
            'value'    => 'recent',
        ],
        [
            'setting'  => 'slider_content_option',
            'operator' => '===',
            'value'    => 'post',
        ],
    ],
] );

// slider properties select
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_home_slider_post_select', array(
    'type'        => 'repeater',
    'label'       => esc_attr__( 'Select posts', 'real-estate-salient-pro' ),
    'description' => esc_html__( 'Choose posts to show on slider', 'real-estate-salient-pro' ),
    'section'     => 'real_estate_salient_pro_home_slider',
    'priority'    => 9,
    'row_label' => array(
        'type' => 'field',
        'value' => esc_attr__('Slider post', 'eal-estate-salient-pro' ),
        'field' => 'slider_post',
    ),
    'active_callback'  => [
        [
            'setting'  => 'slider_enable',
            'operator' => '===',
            'value'    => 'enable',
        ],
        [
            'setting'  => 'slider_type',
            'operator' => '===',
            'value'    => 'slider',
        ],
        [
            'setting'  => 'slider_content_option',
            'operator' => '===',
            'value'    => 'post',
        ],
        [
            'setting'  => 'slider_post_select',
            'operator' => '===',
            'value'    => 'custom',
        ],
    ],
    'settings'    => 'slider_post_custom',
    'fields' => array(
        'slider_post' => array(
            'type'        => 'select',
            'label'       => esc_attr__( 'Post', 'real-estate-salient-pro' ),
            'default'     => '',
            'choices'     => Kirki_Helper::get_posts( array( 'numberposts' => -1, 'post_type' => array( 'post', 'real-estate-salient-pro' ) ) ),
        ),
    ),  
) );

real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_home_slider_image_upload', [
    'type'        => 'image',
    'settings'    => 'slider_image_upload',
    'label'       => esc_html__( 'Image for background', 'kirki' ),
    'description' => esc_html__( 'Search box will be over the image.', 'kirki' ),
    'section'     => 'real_estate_salient_pro_home_slider',
    'default'     => get_template_directory_uri(). '/img/image.jpg',
    'active_callback'  => [
        [
            'setting'  => 'slider_enable',
            'operator' => '===',
            'value'    => 'enable',
        ],
        [
            'setting'  => 'slider_type',
            'operator' => '===',
            'value'    => 'image',
        ],
    ],
] );