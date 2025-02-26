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
    if (is_page('news')) { // ページスラッグが 'news' の場合
        wp_enqueue_style(
            'news-css',
            get_template_directory_uri() . '/assets/css/dist/news.css',
            [],
            filemtime(get_template_directory() . '/assets/css/dist/news.css')
        );

    }
    if (is_page('gallery')) { // ページスラッグが 'gallery' の場合
        wp_enqueue_style(
            'gallery-css',
            get_template_directory_uri() . '/assets/css/dist/gallery.css',
            [],
            filemtime(get_template_directory() . '/assets/css/dist/gallery.css')
        );

    }
    if (is_page('faq')) { // ページスラッグが 'faq' の場合
        wp_enqueue_style(
            'faq-css',
            get_template_directory_uri() . '/assets/css/dist/faq.css',
            [],
            filemtime(get_template_directory() . '/assets/css/dist/faq.css')
        );

    }
    if (is_page(['contact', 'confirm', 'thanks'])) { // ページスラッグが 'contact', 'confirm', 'thanks' の場合
        wp_enqueue_style(
            'contact-css',
            get_template_directory_uri() . '/assets/css/dist/contact.css',
            [],
            filemtime(get_template_directory() . '/assets/css/dist/contact.css')
        );
    }

    if (is_singular('tophair-salon')) { // ページスラッグが 'faq' の場合
        wp_enqueue_style(
            'tophair-salon-css',
            get_template_directory_uri() . '/assets/css/dist/tophair-salon.css',
            [],
            filemtime(get_template_directory() . '/assets/css/dist/tophair-salon.css')
        );

    }
}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');
