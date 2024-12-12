<?php
function theme_enqueue_scripts() {
    wp_enqueue_style(
        'main-css',
        get_template_directory_uri() . '/assets/css/dist/main.css',
        [],
        filemtime(get_template_directory() . '/assets/css/dist/main.css')
    );

    wp_enqueue_script(
        'main-js',
        get_template_directory_uri() . '/assets/js/main.js',
        [],
        filemtime(get_template_directory() . '/assets/js/main.js'),
        true
    );
    wp_enqueue_script(
        'sub-js',
        get_template_directory_uri() . '/assets/js/sub.js',
        [],
        filemtime(get_template_directory() . '/assets/js/sub.js'),
        true
    );
}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');
