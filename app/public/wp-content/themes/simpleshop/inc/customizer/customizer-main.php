<?php

define('SIMPLESHOP_CUSTOMIZER_CONFIG_ID','simpleshop_customizer_settings');
define('SIMPLESHOP_CUSTOMIZER_PANEL_ID','simpleshop_customizer_panel');

if(class_exists('Kirki')){
    Kirki::add_config( SIMPLESHOP_CUSTOMIZER_CONFIG_ID, array(
        'capability'    => 'edit_theme_options',
        'option_type'   => 'theme_mod',
    ) );

    Kirki::add_panel( SIMPLESHOP_CUSTOMIZER_PANEL_ID, array(
        'priority'    => 220,
        'title'       => esc_html__( 'SimpleShop Kirki Customizer', 'simpleshop' ),
        'description' => esc_html__( 'SimpleShop Settings', 'simpleshop' ),
    ) );

    Kirki::add_section( 'simpleshop_homepage', array(
        'title'          => esc_html__( 'Homepage Settings', 'simpleshop' ),
        'panel'          => SIMPLESHOP_CUSTOMIZER_PANEL_ID,
        'priority'       => 160,
        
    ) );

    Kirki::add_field( SIMPLESHOP_CUSTOMIZER_CONFIG_ID, [
        'type'     => 'text',
        'settings' => 'my_setting',
        'label'    => esc_html__( 'Text Control', 'simpleshop' ),
        'section'  => 'simpleshop_homepage',
        'default'  => esc_html__( 'This is a default value', 'simpleshop' ),
        'priority' => 10,
    ] );
}
