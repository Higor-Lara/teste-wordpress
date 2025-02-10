<?php

function load_scripts () {
    // wp_enqueue_style('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js');
    // wp_enqueue_style('bootstrap-css','https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');
    wp_enqueue_style('template', get_template_directory_uri() . '/css/template.css');
}
add_action('wp_enqueue_scripts', 'load_scripts');

register_nav_menus(
    array(
        'my_main_menu' => 'Main Menu'
    )
);
 