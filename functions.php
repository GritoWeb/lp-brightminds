<?php

if (is_file(__DIR__.'/vendor/autoload_packages.php')) {
    require_once __DIR__.'/vendor/autoload_packages.php';
}

function tailpress(): TailPress\Framework\Theme
{
    return TailPress\Framework\Theme::instance()
        ->assets(fn($manager) => $manager
            ->withCompiler(new TailPress\Framework\Assets\ViteCompiler, fn($compiler) => $compiler
                ->registerAsset('resources/css/app.css')
                ->registerAsset('resources/js/app.js')
                ->editorStyleFile('resources/css/editor-style.css')
            )
            ->enqueueAssets()
        )
        ->features(fn($manager) => $manager->add(TailPress\Framework\Features\MenuOptions::class))
        ->menus(fn($manager) => $manager->add('primary', __( 'Primary Menu', 'tailpress')))
        ->themeSupport(fn($manager) => $manager->add([
            'title-tag',
            'custom-logo',
            'post-thumbnails',
            'align-wide',
            'wp-block-styles',
            'responsive-embeds',
            'html5' => [
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            ]
        ]));
}

function brightminds_enqueue_styles() {
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Anton&display=swap',
        'https://fonts.googleapis.com/css2?family=Heebo&display=swap',
        false
    );

    wp_enqueue_style(
        'theme',
        get_template_directory_uri() . '/dist/css/app.css',
        [],
        null
    );
}
add_action('wp_enqueue_scripts', 'brightminds_enqueue_styles');


function mytheme_enqueue_custom_script() {
    wp_enqueue_script(
        'custom-faq', // Handle name
        get_template_directory_uri() . '/js/faq.js', // Path to your JS file
        array('jquery'), // Dependencies
        null, // Version
        true // Load in footer
    );

    wp_enqueue_script(
        'custom-form', // Novo handle para o form.js
        get_template_directory_uri() . '/js/form.js', // Caminho do novo arquivo
        array('jquery'), // Dependencies
        null, // Version
        true // Load in footer
    );
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_custom_script');




tailpress();
