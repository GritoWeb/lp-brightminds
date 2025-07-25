<?php
/**
 * Backend/Modal de Configuração: Botão Primário
 * Arquivo: backend.php
 */

// Verificar se estamos no contexto do WordPress
if (!defined('ABSPATH')) {
    exit;
}

// Obter dados dos campos para preview
$button_text = get_field('button_text') ?: 'Inscreva-se';
$button_url = get_field('button_url') ?: '#';
$background_color = get_field('background_color') ?: '#007cba';
$text_color = get_field('text_color') ?: '#ffffff';
$hover_background_color = get_field('hover_background_color') ?: '#ffffff';
$hover_text_color = get_field('hover_text_color') ?: '#007cba';
$button_alignment = get_field('button_alignment') ?: 'center';
$font_weight = get_field('font_weight') ?: '600';
$enable_hover_border = get_field('enable_hover_border');
$hover_border_color = get_field('hover_border_color') ?: '#242424';
$enable_always_border = get_field('enable_always_border');

// Traduzir valores para exibição
$alignment_labels = array(
    'left' => '⬅️ Esquerda',
    'center' => '🎯 Centro',
    'right' => '➡️ Direita'
);

$font_weight_labels = array(
    '300' => '📝 Light (300)',
    '400' => '📄 Normal (400)',
    '500' => '📋 Medium (500)',
    '600' => '📊 Semibold (600)',
    '700' => '📰 Bold (700)',
    '800' => '📚 Extrabold (800)'
);
?>

<div class="acf-block-preview primary-button-backend-preview">
    <div class="acf-block-preview-header">
        <h3>🔘 Botão Primário</h3>
        <p>Configure texto, cores, alinhamento e efeitos de hover</p>
    </div>

    <div class="acf-block-preview-content">
        <!-- Preview do Botão -->
        <div class="button-preview-container" style="text-align: <?php echo esc_attr($button_alignment); ?>;">
            <div class="button-preview" 
                 style="display: inline-block; background-color: <?php echo esc_attr($background_color); ?>; color: <?php echo esc_attr($text_color); ?>; padding: 12px 32px; border-radius: 24px; font-weight: <?php echo esc_attr($font_weight); ?>; text-decoration: none; font-size: 18px; <?php echo $enable_always_border ? 'border: 1px solid white;' : ''; ?>">
                <?php echo esc_html($button_text); ?>
            </div>
        </div>

        <!-- Status da Configuração -->
        <div class="preview-status">
            <div class="status-item">
                <span class="status-label">📝 Texto:</span>
                <span class="status-value"><?php echo esc_html($button_text); ?></span>
            </div>
            
            <div class="status-item">
                <span class="status-label">🔗 URL:</span>
                <span class="status-value"><?php echo esc_html($button_url); ?></span>
            </div>
            
            <div class="status-item">
                <span class="status-label">📍 Alinhamento:</span>
                <span class="status-value"><?php echo $alignment_labels[$button_alignment] ?? $button_alignment; ?></span>
            </div>
            
            <div class="status-item">
                <span class="status-label">🔤 Peso da Fonte:</span>
                <span class="status-value"><?php echo $font_weight_labels[$font_weight] ?? $font_weight; ?></span>
            </div>
        </div>

        <!-- Cores -->
        <div class="color-preview">
            <h4>🎨 Cores Configuradas:</h4>
            <div class="color-row">
                <div class="color-item">
                    <span class="color-swatch" style="background-color: <?php echo esc_attr($background_color); ?>"></span>
                    <span>Fundo: <?php echo esc_html($background_color); ?></span>
                </div>
                <div class="color-item">
                    <span class="color-swatch" style="background-color: <?php echo esc_attr($text_color); ?>"></span>
                    <span>Texto: <?php echo esc_html($text_color); ?></span>
                </div>
            </div>
            <div class="color-row">
                <div class="color-item">
                    <span class="color-swatch" style="background-color: <?php echo esc_attr($hover_background_color); ?>"></span>
                    <span>Fundo (Hover): <?php echo esc_html($hover_background_color); ?></span>
                </div>
                <div class="color-item">
                    <span class="color-swatch" style="background-color: <?php echo esc_attr($hover_text_color); ?>"></span>
                    <span>Texto (Hover): <?php echo esc_html($hover_text_color); ?></span>
                </div>
            </div>
        </div>

        <!-- Efeitos de Hover -->
        <div class="hover-effects">
            <h4>✨ Efeitos de Hover:</h4>
            <div class="effect-status">
                <span class="status-label">🖼️ Borda no Hover:</span>
                <span class="status-value <?php echo $enable_hover_border ? 'status-success' : 'status-disabled'; ?>">
                    <?php echo $enable_hover_border ? '✅ Ativada' : '❌ Desativada'; ?>
                </span>
                <?php if ($enable_hover_border): ?>
                    <div class="border-info">
                        <span class="color-swatch" style="background-color: <?php echo esc_attr($hover_border_color); ?>"></span>
                        <span>Cor: <?php echo esc_html($hover_border_color); ?></span>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="effect-status">
                <span class="status-label">⭕ Borda Sempre Visível:</span>
                <span class="status-value <?php echo $enable_always_border ? 'status-success' : 'status-disabled'; ?>">
                    <?php echo $enable_always_border ? '✅ Ativada (Branca)' : '❌ Desativada'; ?>
                </span>
            </div>
        </div>

        <!-- Instruções de Uso -->
        <div class="usage-instructions">
            <h4>📋 Como Usar:</h4>
            <ul>
                <li>✅ Configure o texto e URL do botão</li>
                <li>🎨 Escolha cores para normal e hover</li>
                <li>📍 Defina o alinhamento (esquerda, centro, direita)</li>
                <li>🔤 Ajuste o peso da fonte conforme necessário</li>
                <li>✨ Ative bordas no hover para efeitos visuais</li>
            </ul>
        </div>
    </div>
</div>

<style>
.primary-button-backend-preview {
    background: #f8f9fa;
    border: 1px solid #e3e8ee;
    border-radius: 8px;
    padding: 20px;
    margin: 10px 0;
}

.acf-block-preview-header {
    border-bottom: 1px solid #e3e8ee;
    padding-bottom: 15px;
    margin-bottom: 20px;
}

.acf-block-preview-header h3 {
    margin: 0 0 5px 0;
    color: #1e40af;
    font-size: 18px;
    font-weight: 600;
}

.acf-block-preview-header p {
    margin: 0;
    color: #6b7280;
    font-size: 14px;
}

.button-preview-container {
    margin-bottom: 20px;
    padding: 20px;
    background: white;
    border-radius: 8px;
    border: 1px solid #e5e7eb;
}

.preview-status {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
    margin-bottom: 20px;
}

.status-item {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px;
    background: white;
    border-radius: 6px;
    border: 1px solid #e5e7eb;
}

.status-label {
    font-weight: 600;
    color: #374151;
    font-size: 13px;
}

.status-value {
    color: #6b7280;
    font-size: 13px;
}

.status-success {
    color: #059669 !important;
    font-weight: 600;
}

.status-disabled {
    color: #9ca3af !important;
}

.color-preview,
.hover-effects,
.usage-instructions {
    margin-bottom: 20px;
}

.color-preview h4,
.hover-effects h4,
.usage-instructions h4 {
    margin: 0 0 10px 0;
    color: #374151;
    font-size: 14px;
    font-weight: 600;
}

.color-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
    margin-bottom: 8px;
}

.color-item {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 12px;
    color: #6b7280;
}

.color-swatch {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    border: 1px solid #e5e7eb;
    display: inline-block;
}

.effect-status {
    margin-bottom: 10px;
    padding: 8px;
    background: white;
    border-radius: 6px;
    border: 1px solid #e5e7eb;
}

.border-info {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-top: 5px;
    font-size: 12px;
    color: #6b7280;
}

.usage-instructions ul {
    margin: 0;
    padding-left: 0;
    list-style: none;
}

.usage-instructions li {
    padding: 4px 0;
    font-size: 12px;
    color: #6b7280;
}

@media (max-width: 768px) {
    .preview-status,
    .color-row {
        grid-template-columns: 1fr;
    }
}
</style>
