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

// Novos campos
$button_alignment = get_field('button_alignment') ?: 'center';
$font_weight = get_field('font_weight') ?: '600';
$enable_hover_border = get_field('enable_hover_border');
$hover_border_color = get_field('hover_border_color') ?: '#242424';
$enable_always_border = get_field('enable_always_border');

// Classes de alinhamento
$alignment_classes = array(
    'left' => 'text-left',
    'center' => 'text-center',
    'right' => 'text-right'
);
$alignment_class = $alignment_classes[$button_alignment] ?? 'text-center';

// Classes de peso da fonte
$font_weight_classes = array(
    '300' => 'font-light',
    '400' => 'font-normal', 
    '500' => 'font-medium',
    '600' => 'font-semibold',
    '700' => 'font-bold',
    '800' => 'font-extrabold'
);
$font_weight_class = $font_weight_classes[$font_weight] ?? 'font-semibold';

// Definir estilos inline para o botão
$button_styles = sprintf(
    'background-color: %s; color: %s; --hover-bg-color: %s; --hover-text-color: %s; --hover-border-color: %s;',
    esc_attr($background_color),
    esc_attr($text_color),
    esc_attr($hover_background_color),
    esc_attr($hover_text_color),
    esc_attr($hover_border_color)
);

// Classes adicionais para bordas
$border_classes = '';
if ($enable_always_border) {
    $border_classes = 'border border-white';
}

// ID único para o bloco
$block_id = 'primary-button-' . $block['id'];
?>

<div id="<?php echo esc_attr($block_id); ?>" class="primary-button-block">
    <div class="lg:pt-12 py-8 lg:py-0 <?php echo esc_attr($alignment_class); ?>">
        <a 
            href="<?php echo esc_url($button_url); ?>" 
            class="inline-block primary-button py-3 px-8 text-3xl rounded-3xl duration-300 <?php echo esc_attr($font_weight_class); ?> <?php echo esc_attr($border_classes); ?>"
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
    <?php if ($enable_hover_border): ?>
    border: 1px solid var(--hover-border-color) !important;
    border-radius: 25px !important;
    <?php endif; ?>
}

<?php if (!$enable_always_border && $enable_hover_border): ?>
#<?php echo esc_attr($block_id); ?> .primary-button {
    border: 1px solid transparent;
}
<?php endif; ?>
</style>
