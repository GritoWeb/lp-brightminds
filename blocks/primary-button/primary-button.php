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
$font_weight = get_field('font_weight') ?: '700';
$custom_font_size = get_field('custom_font_size');
$custom_width = get_field('custom_width');
$enable_hover_border = get_field('enable_hover_border');
$hover_border_color = get_field('hover_border_color') ?: '#242424';
$enable_always_border = get_field('enable_always_border');

// Definir font-size
if (!empty($custom_font_size)) {
    $font_size = ($custom_font_size / 16) . 'rem'; // Converter px para rem
} else {
    $font_size = '1rem'; // Padrão 16px
}

// Definir largura
$width_style = '';
if (!empty($custom_width)) {
    $width_style = 'max-width: ' . intval($custom_width) . 'px;';
}

// Padding padrão
$padding_x = '28px';
$padding_y = '12px';

// Classes de alinhamento
$alignment_classes = array(
    'left' => 'text-left',
    'center' => 'text-center',
    'right' => 'text-right'
);
$alignment_class = $alignment_classes[$button_alignment] ?? 'text-center';

// Classes de peso da fonte
$font_weight_classes = array(
    '500' => 'font-medium',
    '700' => 'font-bold'
);
$font_weight_class = $font_weight_classes[$font_weight] ?? 'font-bold';

// Definir estilos inline para o botão
$button_styles = sprintf(
    'background-color: %s; color: %s; --hover-bg-color: %s; --hover-text-color: %s; --hover-border-color: %s; padding: %s %s; font-size: %s; font-weight: %s; %s',
    esc_attr($background_color),
    esc_attr($text_color),
    esc_attr($hover_background_color),
    esc_attr($hover_text_color),
    esc_attr($hover_border_color),
    esc_attr($padding_y),
    esc_attr($padding_x), 
    esc_attr($font_size),
    esc_attr($font_weight),
    esc_attr($width_style)
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
            class="open-modal !text-[1.58rem] text-center !py-1 !max-w-[440px] inline-block primary-button rounded-3xl duration-300 <?php echo esc_attr($border_classes); ?>"
            style="<?php echo esc_attr($button_styles); ?>"
        >
            <?php echo wp_kses_post($button_text); ?>
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
