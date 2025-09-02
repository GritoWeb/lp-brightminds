<?php
/**
 * Bloco ACF: Botão Primário
 */

// Obter os campos do ACF
$button_text = get_field('button_text') ?: 'Inscreva-se';
$button_url = '#'; // URL sempre fixa
$background_color = get_field('background_color') ?: '#ffda00';

// Lógica do hover baseada na cor de fundo
if ($background_color === '#ffda00') {
    // Se amarelo, hover é branco
    $hover_background_color = '#ffffff';
    $hover_text_color = '#000000';
} else {
    // Se branco, hover é amarelo
    $hover_background_color = '#ffda00';
    $hover_text_color = '#000000';
}

$text_color = '#000000'; // Texto sempre preto
$button_alignment = get_field('button_alignment') ?: 'center';
$enable_border = get_field('enable_border'); // Nova opção de borda preta

// Configurações fixas
$font_weight = '700'; // Sempre 700
$font_size = '1.71rem'; // Sempre grande
$padding_x = '28px';
$padding_y = '12px';

// Classes de alinhamento
$alignment_classes = array(
    'left' => 'text-left',
    'center' => 'text-center',
    'right' => 'text-right'
);
$alignment_class = $alignment_classes[$button_alignment] ?? 'text-center';

// Classes de borda - sempre transparente inicialmente para manter layout
$border_classes = '';

// Definir estilos inline para o botão
$button_styles = sprintf(
    'background-color: %s; color: %s; --hover-bg-color: %s; --hover-text-color: %s; padding: %s %s; font-size: %s; font-weight: %s; max-width: 700px;',
    esc_attr($background_color),
    esc_attr($text_color),
    esc_attr($hover_background_color),
    esc_attr($hover_text_color),
    esc_attr($padding_y),
    esc_attr($padding_x), 
    esc_attr($font_size),
    esc_attr($font_weight)
);

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
#<?php echo esc_attr($block_id); ?> .primary-button {
    border: 2px solid transparent;
    <?php if ($enable_border): ?>
    transition: all 0.3s ease;
    <?php endif; ?>
}

#<?php echo esc_attr($block_id); ?> .primary-button:hover {
    background-color: var(--hover-bg-color) !important;
    color: var(--hover-text-color) !important;
    <?php if ($enable_border): ?>
    border: 2px solid #000000 !important;
    <?php endif; ?>
}
</style>
