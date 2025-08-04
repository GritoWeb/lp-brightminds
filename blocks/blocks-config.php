<?php
/**
 * Configuração Global dos Blocos ACF
 * 
 * Este arquivo contém configurações globais que se aplicam a todos os blocos ACF
 */

// Adicionar categoria personalizada para os blocos
add_filter('block_categories_all', function($categories) {
    // Adicionar categoria "BrightMinds" no início da lista
    array_unshift($categories, array(
        'slug'  => 'brightminds',
        'title' => __('BrightMinds', 'lp-brightminds'),
        'icon'  => 'star-filled'
    ));
    
    return $categories;
});

// Adicionar suporte a align para todos os blocos ACF se necessário
add_filter('acf/blocks/wrap_frontend_ouput', function($wrapper, $name) {
    // Lista de blocos que devem ter wrapper
    $blocks_with_wrapper = array(
        'acf/primary-button',
        'acf/youtube-video',
        'acf/faq',
        'acf/cadastro-form'
    );
    
    if (in_array($name, $blocks_with_wrapper)) {
        return true;
    }
    
    return $wrapper;
}, 10, 2);

// Debug: Listar blocos registrados (apenas para desenvolvimento)
if (defined('WP_DEBUG') && WP_DEBUG) {
    add_action('wp_footer', function() {
        if (current_user_can('manage_options')) {
            echo '<!-- Blocos ACF registrados: ';
            $registered_blocks = acf_get_block_types();
            if ($registered_blocks) {
                foreach ($registered_blocks as $block) {
                    echo $block['name'] . ' (' . $block['title'] . '), ';
                }
            }
            echo ' -->';
        }
    });
}
