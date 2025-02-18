<?php

function load_scripts () {
    // wp_enqueue_style('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js');
    // wp_enqueue_style('bootstrap-css','https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');
    wp_enqueue_style('template', get_template_directory_uri() . '/css/template.css', array(), '1.0', 'all');
}

add_action('wp_enqueue_scripts', 'load_scripts');

function thumbnail_suport() {
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'thumbnail_suport');

function registrar_menus() {
    register_nav_menus(
        array(
            'my_main_menu' => 'Main Menu',
            'my_secondary_menu' => 'Secondary Menu'
        )
    );
}
add_action( 'init', 'registrar_menus' );

function customize_menu($wp_customize) {
    $wp_customize->add_section('menu_settings', array(
        'title' => "Menu Config",
        'priority' => 30
    ));
    $wp_customize-> add_setting('selected_menu', array(
        'default' => 'my_main_menu',
        'transport' => 'refresh'
    ));
    $wp_customize-> add_control('selected_menu', array(
        'label' => 'Choose Menu',
        'section' => 'menu_settings',
        'type' => 'radio',
        'choices' => array(
            'my_main_menu' => 'Main Menu',
            'my_secondary_menu' => 'Secondary Menu',
        )
    ));
}
add_action('customize_register', 'customize_menu');