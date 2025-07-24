<?php
/**
 * Bloco ACF: Botão Primário
 */

// Obter os campos do ACF
$button_text = get_field('button_text') ?: 'Inscreva-se';
$button_url = get_field('button_url') ?: '#';
$background_color = get_field('background_color') ?: '#007cba';
$text_color = get_field('text_color') ?: '#ffffff';
$hover_background_color = get_field('hover_background_color') ?: '#ffffff';
$hover_text_color = get_field('hover_text_color') ?: '#007cba';

// Definir estilos inline
$button_styles = sprintf(
    'background-color: %s; color: %s; --hover-bg-color: %s; --hover-text-color: %s;',
    esc_attr($background_color),
    esc_attr($text_color),
    esc_attr($hover_background_color),
    esc_attr($hover_text_color)
);

// ID único para o bloco
$block_id = 'primary-button-' . $block['id'];
?>

<div id="<?php echo esc_attr($block_id); ?>" class="primary-button-block">
    <div class="lg:pt-12 py-8 lg:py-0">
        <a 
            href="<?php echo esc_url($button_url); ?>" 
            class="open-modal bg-primary py-3 px-8 text-3xl rounded-3xl text-background hover:bg-white hover:text-hover duration-300 primary-button"
            style="<?php echo esc_attr($button_styles); ?>"
        >
            <?php echo esc_html($button_text); ?>
        </a>
    </div>
</div>

<style>
#<?php echo esc_attr($block_id); ?> .primary-button:hover {
    background-color: var(--hover-bg-color) !important;
    color: var(--hover-text-color) !important;
}
</style>
