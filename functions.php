<?php

if (is_file(__DIR__.'/vendor/autoload_packages.php')) {
    require_once __DIR__.'/vendor/autoload_packages.php';
}

/**
 * Verificar se estamos em ambiente de desenvolvimento
 */
function brightminds_is_development() {
    return defined('WP_DEBUG') && WP_DEBUG === true;
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
        if (brightminds_is_development()) {
            error_log('Vite manifest not found: ' . $manifest_path);
        }
        return false;
    }
    
    $manifest_content = file_get_contents($manifest_path);
    if ($manifest_content === false) {
        if (brightminds_is_development()) {
            error_log('Could not read Vite manifest: ' . $manifest_path);
        }
        return false;
    }
    
    $manifest = json_decode($manifest_content, true);
    if ($manifest === null) {
        if (brightminds_is_development()) {
            error_log('Invalid JSON in Vite manifest: ' . $manifest_path);
        }
        return false;
    }
    
    // Verificar se o asset existe no manifest
    if (!isset($manifest[$asset_path])) {
        if (brightminds_is_development()) {
            error_log('Asset not found in manifest: ' . $asset_path);
        }
        return false;
    }
    
    $asset_file = $manifest[$asset_path]['file'];
    $full_path = get_template_directory() . '/dist/' . $asset_file;
    
    // Verificar se o arquivo físico existe
    if (!file_exists($full_path)) {
        if (brightminds_is_development()) {
            error_log('Compiled asset file not found: ' . $full_path);
        }
        return false;
    }
    
    return get_template_directory_uri() . '/dist/' . $asset_file;
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
    } else {
        // Fallback: carregar o arquivo CSS original se o compilado não estiver disponível
        wp_enqueue_style(
            'theme-fallback',
            get_template_directory_uri() . '/resources/css/app.css',
            [],
            filemtime(get_template_directory() . '/resources/css/app.css')
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
        // Converter URL completa para caminho relativo ao tema
        $relative_path = str_replace(get_template_directory_uri() . '/', '', $editor_css);
        add_editor_style($relative_path);
    } else {
        // Fallback: tentar carregar diretamente se o manifest não estiver disponível
        if (brightminds_is_development()) {
            error_log('Editor style not found in manifest, trying fallback');
        }
    }
}
add_action('admin_init', 'brightminds_add_editor_styles');

/**
 * Enqueue editor styles for Gutenberg
 */
function brightminds_enqueue_block_editor_assets() {
    $editor_css = brightminds_get_compiled_asset('resources/css/editor-style.css');
    if ($editor_css) {
        wp_enqueue_style(
            'brightminds-editor-style',
            $editor_css,
            [],
            null
        );
    }
}
add_action('enqueue_block_editor_assets', 'brightminds_enqueue_block_editor_assets');


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
    } else {
        // Fallback: carregar o arquivo JS original se o compilado não estiver disponível
        wp_enqueue_script(
            'theme-app-fallback', 
            get_template_directory_uri() . '/resources/js/app.js',
            [],
            filemtime(get_template_directory() . '/resources/js/app.js'),
            true
        );
    }

    // Verificar se o arquivo faq.js existe antes de tentar carregá-lo
    $faq_js_path = get_template_directory() . '/js/faq.js';
    if (file_exists($faq_js_path)) {
        wp_enqueue_script(
            'custom-faq',
            get_template_directory_uri() . '/js/faq.js',
            array('jquery'),
            filemtime($faq_js_path),
            true
        );
    }

    // Verificar se o arquivo form.js existe antes de tentar carregá-lo
    $form_js_path = get_template_directory() . '/js/form.js';
    if (file_exists($form_js_path)) {
        wp_enqueue_script(
            'custom-form',
            get_template_directory_uri() . '/js/form.js',
            array('jquery'),
            filemtime($form_js_path),
            true
        );
    }
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
        if (brightminds_is_development()) {
            error_log('TailPress error: ' . $e->getMessage());
        }
    }
}
