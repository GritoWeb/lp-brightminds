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
            // Não chamar enqueueAssets() aqui para evitar duplicação
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

/**
 * Função para obter assets compilados do manifest do Vite
 */
function brightminds_get_compiled_asset($asset_path) {
    $manifest_path = get_template_directory() . '/dist/.vite/manifest.json';
    
    // Verificar se o manifest existe
    if (!file_exists($manifest_path)) {
        return false;
    }
    
    $manifest = json_decode(file_get_contents($manifest_path), true);
    
    // Verificar se o asset existe no manifest
    if (!isset($manifest[$asset_path])) {
        return false;
    }
    
    return get_template_directory_uri() . '/dist/' . $manifest[$asset_path]['file'];
}

function brightminds_enqueue_styles() {
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Anton&display=swap',
        'https://fonts.googleapis.com/css2?family=Heebo&display=swap',
        false
    );

    // Carregar app.css compilado pelo Vite
    $app_css = brightminds_get_compiled_asset('resources/css/app.css');
    if ($app_css) {
        wp_enqueue_style(
            'theme',
            $app_css,
            [],
            null
        );
    }

    // Carregar estilos dos blocos ACF
    wp_enqueue_style(
        'acf-blocks',
        get_template_directory_uri() . '/blocks/blocks.css',
        [],
        filemtime(get_template_directory() . '/blocks/blocks.css')
    );
}
add_action('wp_enqueue_scripts', 'brightminds_enqueue_styles');

/**
 * Adicionar estilos do editor
 */
function brightminds_add_editor_styles() {
    $editor_css = brightminds_get_compiled_asset('resources/css/editor-style.css');
    if ($editor_css) {
        add_editor_style(str_replace(get_template_directory_uri(), '', $editor_css));
    }
}
add_action('admin_init', 'brightminds_add_editor_styles');


function mytheme_enqueue_custom_script() {
    // Carregar app.js compilado pelo Vite
    $app_js = brightminds_get_compiled_asset('resources/js/app.js');
    if ($app_js) {
        wp_enqueue_script(
            'theme-app', 
            $app_js,
            [],
            null,
            true
        );
    }

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

// Registrar blocos ACF
function register_acf_blocks() {
    // Verificar se o ACF está ativo
    if (function_exists('acf_register_block_type')) {
        
        $blocks_dir = get_template_directory() . '/blocks/';
        
        // Carregar configuração global dos blocos
        if (file_exists($blocks_dir . 'blocks-config.php')) {
            include_once $blocks_dir . 'blocks-config.php';
        }
        
        // Buscar por pastas de blocos e carregar seus arquivos register.php
        $block_folders = glob($blocks_dir . '*', GLOB_ONLYDIR);
        
        foreach ($block_folders as $block_folder) {
            $register_file = $block_folder . '/register.php';
            if (file_exists($register_file)) {
                include_once $register_file;
            }
        }
    }
}
add_action('acf/init', 'register_acf_blocks');

// Inicializar TailPress com verificação de segurança
if (function_exists('tailpress')) {
    try {
        tailpress();
    } catch (Exception $e) {
        // Se houver erro no TailPress, usar fallback manual
        error_log('TailPress error: ' . $e->getMessage());
    }
}
