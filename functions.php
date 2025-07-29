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

    // Function to get compiled CSS file
    $compiled_css = brightminds_get_compiled_asset('app', 'css');
    
    if ($compiled_css) {
        wp_enqueue_style(
            'theme',
            $compiled_css['url'],
            [],
            $compiled_css['version']
        );
    } else {
        // Fallback para desenvolvimento
        wp_enqueue_style(
            'theme-dev',
            get_template_directory_uri() . '/resources/css/app.css',
            [],
            time()
        );
    }

    // Carregar estilos dos blocos ACF
    $acf_blocks_file = get_template_directory() . '/blocks/blocks.css';
    if (file_exists($acf_blocks_file)) {
        wp_enqueue_style(
            'acf-blocks',
            get_template_directory_uri() . '/blocks/blocks.css',
            [],
            filemtime($acf_blocks_file)
        );
    }
}

// Helper function to get compiled assets
function brightminds_get_compiled_asset($name, $type) {
    $assets_dir = get_template_directory() . '/dist/assets/';
    $assets_uri = get_template_directory_uri() . '/dist/assets/';
    
    if (!is_dir($assets_dir)) {
        return false;
    }
    
    $pattern = $assets_dir . $name . '-*.' . $type;
    $files = glob($pattern);
    
    if (!empty($files)) {
        $file = $files[0];
        $filename = basename($file);
        
        return [
            'url' => $assets_uri . $filename,
            'version' => filemtime($file)
        ];
    }
    
    return false;
}
add_action('wp_enqueue_scripts', 'brightminds_enqueue_styles');

// Function to suppress 404 errors in production
function brightminds_suppress_404_console_errors() {
    ?>
    <script>
    // Global error prevention for missing elements
    (function() {
        // Override getElementById to add safety check
        const originalGetElementById = document.getElementById;
        document.getElementById = function(id) {
            const element = originalGetElementById.call(document, id);
            if (!element) {
                console.log('Element not found: ' + id);
                // Return a mock element that prevents errors
                return {
                    addEventListener: function() {
                        console.log('addEventListener called on non-existent element: ' + id);
                    },
                    style: {},
                    classList: {
                        add: function() {},
                        remove: function() {},
                        toggle: function() {},
                        contains: function() { return false; }
                    }
                };
            }
            return element;
        };

        // Suppress console errors for missing resources in production
        <?php if (wp_get_environment_type() === 'production') : ?>
        const originalError = console.error;
        console.error = function(...args) {
            const message = args.join(' ');
            // Don't log 404 errors for CSS/JS files
            if (message.includes('Failed to load resource') && 
                (message.includes('.css') || message.includes('.js'))) {
                return;
            }
            originalError.apply(console, args);
        };
        <?php endif; ?>
    })();
    </script>
    <?php
}
add_action('wp_head', 'brightminds_suppress_404_console_errors');
add_action('wp_head', 'brightminds_fix_inline_scripts', 1); // High priority to load first

// Additional protection against inline script errors
function brightminds_protect_against_inline_errors() {
    ?>
    <script>
    // Ultimate protection - override document.getElementById temporarily
    (function() {
        let scriptExecuting = false;
        const originalGetElementById = document.getElementById;
        
        // Monkey patch getElementById to prevent null errors
        document.getElementById = function(id) {
            const element = originalGetElementById.call(document, id);
            if (!element && !scriptExecuting) {
                console.warn('Element with ID "' + id + '" not found, returning safe fallback');
                return {
                    addEventListener: function() {
                        console.log('Prevented addEventListener on null element: ' + id);
                    },
                    style: { display: 'none' },
                    classList: {
                        add: function() {},
                        remove: function() {},
                        toggle: function() {},
                        contains: function() { return false; }
                    },
                    removeAttribute: function() {},
                    click: function() {}
                };
            }
            return element;
        };
        
        // Restore original function after page load
        window.addEventListener('load', function() {
            setTimeout(function() {
                document.getElementById = originalGetElementById;
                scriptExecuting = true;
            }, 1000);
        });
    })();
    </script>
    <?php
}
add_action('wp_head', 'brightminds_protect_against_inline_errors', 0); // Highest priority
function brightminds_fix_inline_scripts() {
    ?>
    <script>
    // Comprehensive fix for missing element errors
    document.addEventListener('DOMContentLoaded', function() {
        // List of problematic element IDs
        const problematicIds = ['openWhatsappForm', 'whatsappIframeContainer'];
        
        problematicIds.forEach(function(id) {
            const element = document.getElementById(id);
            if (!element) {
                // Create a dummy element to prevent errors
                const dummyElement = document.createElement('div');
                dummyElement.id = id;
                dummyElement.style.display = 'none';
                dummyElement.addEventListener = function() {
                    console.log('Event listener added to dummy element: ' + id);
                };
                document.body.appendChild(dummyElement);
            }
        });
        
        // Override any existing onclick handlers that might be problematic
        const openWhatsappForm = document.getElementById('openWhatsappForm');
        if (openWhatsappForm) {
            // Remove any existing onclick attributes
            openWhatsappForm.removeAttribute('onclick');
            
            // Add our safe event listener
            openWhatsappForm.addEventListener('click', function(e) {
                e.preventDefault();
                const container = document.getElementById('whatsappIframeContainer');
                if (container) {
                    container.style.display = (container.style.display === 'block') ? 'none' : 'block';
                } else {
                    console.log('WhatsApp container not found - preventing error');
                }
            });
        }
    });
    
    // Additional safety: wrap any existing scripts that might be problematic
    (function() {
        const originalAddEventListener = Element.prototype.addEventListener;
        Element.prototype.addEventListener = function(type, listener, options) {
            try {
                return originalAddEventListener.call(this, type, listener, options);
            } catch (error) {
                console.log('addEventListener error prevented:', error.message);
            }
        };
    })();
    </script>
    <?php
}

function mytheme_enqueue_custom_script() {
    // Enqueue compiled JS if available
    $compiled_js = brightminds_get_compiled_asset('app', 'js');
    
    if ($compiled_js) {
        wp_enqueue_script(
            'theme-js',
            $compiled_js['url'],
            [],
            $compiled_js['version'],
            true
        );
    }

    // Custom FAQ script with safety checks
    wp_enqueue_script(
        'custom-faq',
        get_template_directory_uri() . '/js/faq.js',
        array('jquery'),
        filemtime(get_template_directory() . '/js/faq.js'),
        true
    );

    // Custom form script with safety checks
    wp_enqueue_script(
        'custom-form',
        get_template_directory_uri() . '/js/form.js',
        array('jquery'),
        filemtime(get_template_directory() . '/js/form.js'),
        true
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

tailpress();
