<?php
#####---=== Home page => Agents block settings ===--- #####
#####----------------------------------------------------- #####

//Home page settings -> Agent
real_estate_salient_pro_kirki::add_section( 'real_estate_salient_pro_home_agent', array(
    'title'          => esc_html__( 'Agents', 'real-estate-salient-pro' ),
    'description'    => esc_html__( '', 'real-estate-salient-pro' ),
    'panel'          => 'real_estate_salient_pro_home',
    'priority'       => 9,
) );

// Agent section on off
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_agent', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'agent_enable',
    'label'       => __( 'Agents block on / off', 'real-estate-salient-pro' ),
    'description' => __( 'Do you wish to show agents on homepage?', 'real-estate-salient-pro' ),
    'section'     => 'real_estate_salient_pro_home_agent',
    'default'     => 'enable',
    'priority'    => 1,
    'choices'     => array(
        'enable'   => esc_attr__( 'Enable', 'real-estate-salient-pro' ),
        'disable' => esc_attr__( 'Disable', 'real-estate-salient-pro' ),
    ),
) );

// Agent section title
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_agent_title', [
    'type'     => 'text',
    'settings' => 'agent_title',
    'label'    => __( 'Title', 'real-estate-salient-pro' ),
    'section'  => 'real_estate_salient_pro_home_agent',
    'default'  => __('Best Agents','real-estate-salient-pro'),
    'priority' => 2,
    'active_callback'  => [
        [
            'setting'  => 'agent_enable',
            'operator' => '===',
            'value'    => 'enable',
        ]
    ],
] );

// Agent section description
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_agent_title_description', [
    'type'     => 'textarea',
    'settings' => 'agent_title_desc',
    'label'    => __( 'Decription under title', 'real-estate-salient-pro' ),
    'section'  => 'real_estate_salient_pro_home_agent',
    'default'  => __('Lorem Ipsum is simply dummy text of the printing and typesetting industry','real-estate-salient-pro'),
    'priority' => 3,
    'active_callback'  => [
        [
            'setting'  => 'agent_enable',
            'operator' => '===',
            'value'    => 'enable',
        ]
    ],
] );

// Agent layout
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_agent_layout', array(
    'type'        => 'radio-image',
    'settings'    => 'agent_layout',
    'label'       => esc_attr__( 'Layout style', 'real-estate-salient-pro' ),
    'description' => esc_attr__( 'Choose your preferred style, it is for home page only', 'real-estate-salient-pro' ),
    'section'     => 'real_estate_salient_pro_home_agent',
    'default'     => 'one',
    'priority'    => 4,
    'choices'     => array(
        'one'     => get_template_directory_uri() . '/img/agentone.png',
        'two'     => get_template_directory_uri() . '/img/agenttwo.png',
    ),
    'input_attrs' => array(
        'style'   => 'padding: 5px;',
    ),
    'active_callback'  => [
        [
            'setting'  => 'agent_enable',
            'operator' => '===',
            'value'    => 'enable',
        ]
    ],
 ) );

// seperator
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_agent_layout_seperator', [
    'type'        => 'custom',
    'settings'    => 'agent_seperate_one',
    'section'     => 'real_estate_salient_pro_home_agent',
    'default'     => '<hr>',
    'priority'    => 5,
    'active_callback'  => [
        [
            'setting'  => 'agent_enable',
            'operator' => '===',
            'value'    => 'enable',
        ]
    ],
] );

// Agent type
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_agent_type', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'agent_type',
    'label'       => __( 'Agents select', 'real-estate-salient-pro' ),
    'section'     => 'real_estate_salient_pro_home_agent',
    'default'     => 'recent',
    'priority'    => 6,
    'choices'     => array(
        'recent'  => esc_attr__( 'Recent', 'real-estate-salient-pro' ),
        'custom'  => esc_attr__( 'custom', 'real-estate-salient-pro' ),
    ),
    'active_callback'  => [
        [
            'setting'  => 'agent_enable',
            'operator' => '===',
            'value'    => 'enable',
        ]
    ],
) );

// Number of agents
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_home_agent_count', [
    'type'        => 'number',
    'settings'    => 'agent_count',
    'label'       => esc_html__( 'Number of Agents', 'real-estate-salient-pro' ),
    'section'     => 'real_estate_salient_pro_home_agent',
    'default'     => 4,
    'priority'    => 7,
    'choices'     => [
        'min'  => 4,
        'max'  => 16,
        'step' => 4,
    ],
    'active_callback'  => [
        [
            'setting'  => 'agent_type',
            'operator' => '!==',
            'value'    => 'custom',
        ],
        [
            'setting'  => 'agent_enable',
            'operator' => '===',
            'value'    => 'enable',
        ],
    ],
] );

// Agent custom select
real_estate_salient_pro_kirki::add_field( 'real_estate_salient_pro_home_agent_select', array(
    'type'        => 'repeater',
    'label'       => esc_attr__( 'Select Agents', 'real-estate-salient-pro' ),
    'description' => esc_html__( 'Multiply of 4 will give good look on home page. Choose 3 or 6 agents ', 'real-estate-salient-pro' ),
    'section'     => 'real_estate_salient_pro_home_agent',
    'priority'    => 8,
    'row_label' => array(
        'type' => 'field',
        'value' => esc_attr__('Agent', 'real-estate-salient-pro' ),
        'field' => 'custom_agent',
    ),
    'active_callback'  => [
        [
            'setting'  => 'agent_type',
            'operator' => '===',
            'value'    => 'custom',
        ],
        [
            'setting'  => 'agent_enable',
            'operator' => '===',
            'value'    => 'enable',
        ],
    ],
    'choices' => [
        'limit' => 8
    ],
    'settings'    => 'agent_custom',
    'fields' => array(
        'custom_agent' => array(
            'type'        => 'select',
            'label'       => esc_attr__( 'Choose Agent', 'real-estate-salient-pro' ),
            'choices'     => Kirki_Helper::get_posts( array( 'numberposts' => -1, 'post_type' => array( 'agent', 'real-estate-salient-pro' ) ) ),
        ),
    ),  
) );