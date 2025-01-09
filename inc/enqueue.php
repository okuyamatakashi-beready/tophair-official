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
    if (is_page('concept')) { // ページスラッグが 'about' の場合
        wp_enqueue_style(
            'concept-css',
            get_template_directory_uri() . '/assets/css/dist/concept.css',
            [],
            filemtime(get_template_directory() . '/assets/css/dist/concept.css')
        );

        // wp_enqueue_script(
        //     'about-js',
        //     get_template_directory_uri() . '/assets/js/about.js',
        //     [],
        //     filemtime(get_template_directory() . '/assets/js/about.js'),
        //     true
        // );
    }
    if (is_page('menu')) { // ページスラッグが 'about' の場合
        wp_enqueue_style(
            'menu-css',
            get_template_directory_uri() . '/assets/css/dist/menu.css',
            [],
            filemtime(get_template_directory() . '/assets/css/dist/menu.css')
        );

    }
    if (is_page('about')) { // ページスラッグが 'about' の場合
        wp_enqueue_style(
            'about-css',
            get_template_directory_uri() . '/assets/css/dist/about.css',
            [],
            filemtime(get_template_directory() . '/assets/css/dist/about.css')
        );

    }
}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');
