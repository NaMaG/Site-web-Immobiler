<?php
#####---=== Topbar settings ===--- #####
#####------------------------------ #####

/*
//General settings -> Sidebar position
real_estate_salient_pro_kirki::add_section( 'real_estate_salient_pro_basic_header_settings', array(
    'title'          => esc_html__( 'Header style options', 'kirki' ),
    'description'    => esc_html__( '', 'kirki' ),
    'panel'          => 'real_estate_salient_pro_header',
    'priority'       => 1,
) );


//Sidebar positions
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_header', array(
    'type'        => 'radio-image',
    'settings'    => 'header-styles',
    'label'       => esc_attr__( 'Header style', 'kirki-demo' ),
    'description' => esc_attr__( 'Choose your preferred header style', 'kirki-demo' ),
    'section'     => 'real_estate_salient_pro_basic_header_settings',
    'default'     => 'one',
    'priority'    => 1,
    'choices'     => array(
        'one'  => get_template_directory_uri() . '/img/head-one.png',
        'two'  => get_template_directory_uri() . '/img/header-two.png',
        'three'  => get_template_directory_uri() . '/img/header-three.png',
    ),
    'input_attrs' => array(
        'style' => 'padding: 5px;',
    ),
 ) );

// Sticky header
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_sticky_header', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'sticky-header',
    'label'       => __( 'Sticky Header', 'my_textdomain' ),
    'description' => esc_attr__( 'Do you wish to show sticky header when scroll?', 'kirki-demo' ),
    'section'     => 'real_estate_salient_pro_basic_header_settings',
    'default'     => 'enable',
    'priority'    => 2,
    'choices'     => array(
        'enable'   => esc_attr__( 'Enable', 'my_textdomain' ),
        'disable' => esc_attr__( 'Disable', 'my_textdomain' ),
    ),
) );
*/


//Header settings -> Top bar
real_estate_salient_pro_kirki::add_section( 'real_estate_salient_pro_top_bar', array(
    'title'          => esc_html__( 'Top Bar Options', 'kirki' ),
    'description'    => esc_html__( '', 'kirki' ),
    'panel'          => 'real_estate_salient_pro_header',
    'priority'       => 2,
) );

// Show top bar?
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_top_bar_show', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'top-bar-enable',
    'label'       => __( 'Show Top Bar', 'my_textdomain' ),
    'description' => esc_attr__( 'Do you wish to show top bar?', 'kirki-demo' ),
    'section'     => 'real_estate_salient_pro_top_bar',
    'default'     => 'show',
    'priority'    => 1,
    'choices'     => array(
        'show'   => esc_attr__( 'Show', 'my_textdomain' ),
        'hide' => esc_attr__( 'Hide', 'my_textdomain' ),
    ),
) );

// seperator
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_top_bar_seperator', [
    'type'        => 'custom',
    'settings'    => 'email-seperator',
    'section'     => 'real_estate_salient_pro_top_bar',
    'default'     => '<hr>',
    'priority'    => 2,
    'active_callback'  => [
        [
            'setting'  => 'top-bar-enable',
            'operator' => '===',
            'value'    => 'show',
        ]
    ],
] );

//icon for email
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_top_bar_email_icon', array(
        'type'        => 'select',
        'settings'    => 'email-icon',
        'label'       => esc_attr__( 'Icon for Email id', 'test' ),
        'section'     => 'real_estate_salient_pro_top_bar',
        'default'     => 'fa-envelope',
        'priority'    => 3,
        'choices'     => array(
            'fa-envelope'               =>  esc_attr__( '<i class="fas fa-envelope"></i> Envelop', 'quick' ),
            'fa-envelope-open'          =>  esc_attr__( '<i class="fas fa-envelope-open"></i> Envelop Open', 'test' ),
            'fa-envelope-open-text'     =>  esc_attr__( '<i class="fas fa-envelope-open-text"></i> Envelop Open Text', 'test' ),            
        ),
        'active_callback'  => [
            [
                'setting'  => 'top-bar-enable',
                'operator' => '===',
                'value'    => 'show',
            ]
        ],
) );

//Email id
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_top_bar_email', [
    'type'     => 'text',
    'settings' => 'email_id',
    'label'    => esc_html__( 'Email Id', 'kirki' ),
    'section'  => 'real_estate_salient_pro_top_bar',
    'default'  =>  esc_html__('email@textdomain.com','real-estate-salient-pro'),
    'priority' => 4,
    'active_callback'  => [
        [
            'setting'  => 'top-bar-enable',
            'operator' => '===',
            'value'    => 'show',
        ]
    ],

] );

//phone number icon
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_top_bar_phone_icon', array(
        'type'        => 'select',
        'settings'    => 'phone_icon',
        'label'       => esc_attr__( 'Icon for phone #', 'test' ),
        'section'     => 'real_estate_salient_pro_top_bar',
        'default'     => 'fa-phone-alt',
        'priority'    => 5,
        'choices'     => array(
            'fa-phone-alt'          =>  esc_attr__( '<i class="fas fa-phone-alt"></i> Phone', 'quick' ),
            'fa-phone-square-alt'   =>  esc_attr__( '<i class="fas fa-phone-square-alt"></i> Phone square', 'test' ),
            'fa-phone-volume'       =>  esc_attr__( '<i class="fas fa-phone-volume"></i> Phone volume', 'test' ),
            'fa-mobile'             =>  esc_attr__( '<i class="fas fa-mobile"></i> Mobile', 'test' ),
            'fa-mobile-alt'         =>  esc_attr__( '<i class="fas fa-mobile-alt"></i> Mobile Alt', 'test' ),
        ),
        'active_callback'  => [
            [
                'setting'  => 'top-bar-enable',
                'operator' => '===',
                'value'    => 'show',
            ]
        ],
) );

//Phone #
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_top_bar_phone_number', [
    'type'     => 'text',
    'settings' => 'phone_number',
    'label'    => esc_html__( 'Phone number', 'kirki' ),
    'section'  => 'real_estate_salient_pro_top_bar',
    'default'  =>  esc_html__('123-456-7890','real-estate-salient-pro'),
    'priority' => 6,
    'active_callback'  => [
        [
            'setting'  => 'top-bar-enable',
            'operator' => '===',
            'value'    => 'show',
        ]
    ],
] );

// seperator
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_top_bar_seperator-two', [
    'type'        => 'custom',
    'settings'    => 'social-seperator',
    'section'     => 'real_estate_salient_pro_top_bar',
    'default'     => '<hr>',
    'priority'    => 7,
    'active_callback'  => [
        [
            'setting'  => 'top-bar-enable',
            'operator' => '===',
            'value'    => 'show',
        ]
    ],
] );

real_estate_salient_pro_kirki::add_field( 'gangster_demo', array(
    'type'        => 'repeater',
    'label'       => esc_attr__( 'Social Buttons', 'chup' ),
    'description' => esc_html__( 'Choose social icones, no more than 3 please.', 'real-estate-salient-pro' ),
    'section'     => 'real_estate_salient_pro_top_bar',
    'priority'    => 8,
    'row_label' => array(
        'type' => 'field',
        'value' => esc_attr__('social icon', 'chup' ),
        'field' => 'social_icon',
    ),
    'active_callback'  => [
            [
                'setting'  => 'top-bar-enable',
                'operator' => '===',
                'value'    => 'show',
            ]
        ],
    'settings'    => 'socials',
    'fields' => array(
        'social_icon' => array(
            'type'        => 'select',
            'label'       => esc_attr__( 'Social media', 'chup' ),
            'default'     => 'facebook',
            'choices'     => array(
                'facebook'      =>  esc_html__( 'Facebook', 'quick' ),
                'twitter'       =>  esc_html__( 'Twitter', 'quick' ),
                'linkedin'      =>  esc_html__( 'LinkedIn', 'quick' ),
                'pinterest'     =>  esc_html__( 'Pinterest', 'quick' ),
                'skype'         =>  esc_html__( 'Skype', 'quick' ),
                'telegram'      =>  esc_html__( 'Telegram', 'quick' ),                
            ),
        ),
        'social_url' => array(
            'type'        => 'text',
            'label'       => esc_attr__( 'Social icon url', 'chup' ),
            'default'     => esc_html__( 'https://www.facebook.com/', 'real-estate-salient-pro' ),
        )       
    ),  
) );

// seperator
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_top_bar_seperator-three', [
    'type'        => 'custom',
    'settings'    => 'login-seperator',
    'section'     => 'real_estate_salient_pro_top_bar',
    'default'     => '<hr>',
    'priority'    => 9,
    'active_callback'  => [
        [
            'setting'  => 'top-bar-enable',
            'operator' => '===',
            'value'    => 'show',
        ]
    ],
] );

// Show login or register?
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_top_bar_login_show', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'login-enable',
    'label'       => __( 'Show login link?', 'my_textdomain' ),
    'description' => esc_html__( 'Do you wish to show login or register link?', 'kirki-demo' ),
    'section'     => 'real_estate_salient_pro_top_bar',
    'default'     => 'show',
    'priority'    => 10,
    'choices'     => array(
        'show'   => esc_attr__( 'Show', 'my_textdomain' ),
        'hide' => esc_attr__( 'Hide', 'my_textdomain' ),
    ),
    'active_callback'  => [
        [
            'setting'  => 'top-bar-enable',
            'operator' => '===',
            'value'    => 'show',
        ]
    ],
) );

// Text for Login link
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_top_bar_login_text', [
    'type'              => 'text',
    'settings'          => 'login_text',
    'label'             => esc_html__( 'Login or Register', 'kirki' ),
    'section'           => 'real_estate_salient_pro_top_bar',
    'description'       => esc_html__( 'Text for login link', 'real-estate-salient-pro' ),
    'default'           =>  esc_html__( 'Login or Register', 'real-estate-salient-pro' ),
    'priority'          => 11,
    'active_callback'   => [
        [
            'setting'  => 'top-bar-enable',
            'operator' => '===',
            'value'    => 'show',
        ],
        [
            'setting'  => 'login-enable',
            'operator' => '===',
            'value'    => 'show',
        ]
    ],
] );

// seperator
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_top_bar_seperator-four', [
    'type'        => 'custom',
    'settings'    => 'submit-seperator',
    'section'     => 'real_estate_salient_pro_top_bar',
    'default'     => '<hr>',
    'priority'    => 12,
    'active_callback'  => [
        [
            'setting'  => 'top-bar-enable',
            'operator' => '===',
            'value'    => 'show',
        ]
    ],
] );

/* Commented due to submit property available under login
// Show submit button?
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_top_bar_submit_show', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'submit-enable',
    'label'       => __( 'Show submit property link?', 'my_textdomain' ),
    'description' => esc_html__( 'Do you wish to show submit property link to viewers?', 'kirki-demo' ),
    'section'     => 'real_estate_salient_pro_top_bar',
    'default'     => 'show',
    'priority'    => 13,
    'choices'     => array(
        'show'   => esc_attr__( 'Show', 'my_textdomain' ),
        'hide' => esc_attr__( 'Hide', 'my_textdomain' ),
    ),
    'active_callback'  => [
        [
            'setting'  => 'top-bar-enable',
            'operator' => '===',
            'value'    => 'show',
        ]
    ],
) );

// Submit property page
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_top_bar_submit_page', [
    'type'        => 'dropdown-pages',
    'settings'    => 'submit_page',
    'label'       => esc_html__( 'Submit property page', 'kirki' ),
    'section'     => 'real_estate_salient_pro_top_bar',
    'priority'    => 14,
    'active_callback'   => [
        [
            'setting'  => 'top-bar-enable',
            'operator' => '===',
            'value'    => 'show',
        ],
        [
            'setting'  => 'submit-enable',
            'operator' => '===',
            'value'    => 'show',
        ]
    ],
] );

// Text for submit property
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_top_bar_login_text', [
    'type'              => 'text',
    'settings'          => 'submit_text',
    'label'             => esc_html__( 'Submit property text', 'kirki' ),
    'section'           => 'real_estate_salient_pro_top_bar',
    'default'           =>  esc_html__( 'Submit property', 'real-estate-salient-pro' ),
    'priority'          => 15,
    'active_callback'   => [
        [
            'setting'  => 'top-bar-enable',
            'operator' => '===',
            'value'    => 'show',
        ],
        [
            'setting'  => 'submit-enable',
            'operator' => '===',
            'value'    => 'show',
        ]
    ],
] );
end of comment*/

//Header settings -> Site Logo
real_estate_salient_pro_kirki::add_section( 'real_estate_salient_pro_basic_header_logo', array(
    'title'          => esc_html__( 'Website Logo', 'kirki' ),
    'description'    => esc_html__( '', 'kirki' ),
    'panel'          => 'real_estate_salient_pro_header',
    'priority'       => 3,
) );

//moving site logo section here
function real_estate_salient_pro_customize_logo_register_init( $wp_customize ){
    $wp_customize->get_control ('custom_logo')->section = 'real_estate_salient_pro_basic_header_logo';
    $wp_customize->get_control ('blogname')->section = 'real_estate_salient_pro_basic_header_logo';
    $wp_customize->get_control ('blogdescription')->section = 'real_estate_salient_pro_basic_header_logo';
    $wp_customize->get_control ('header_text')->section = 'real_estate_salient_pro_basic_header_logo';
    $wp_customize->get_control ('site_icon')->section = 'real_estate_salient_pro_basic_header_logo';
    $wp_customize->get_control ('custom_logo')->section = 'real_estate_salient_pro_basic_header_logo'; 
}
add_action( 'customize_register', 'real_estate_salient_pro_customize_logo_register_init' );