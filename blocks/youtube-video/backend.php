<?php
/**
 * Backend/Modal de Configuração: YouTube Video
 * Arquivo: backend.php
 */

// Verificar se estamos no contexto do WordPress
if (!defined('ABSPATH')) {
    exit;
}

// Obter dados dos campos para preview
$youtube_url = get_field('youtube_url') ?: 'https://www.youtube.com/watch?v=1MotoMgiWVU';
$thumbnail_image = get_field('thumbnail_image') ?: '/wp-content/uploads/2025/07/thumb-video.webp';

// Obter dimensões do grupo
$video_dimensions = get_field('video_dimensions');
$video_width = $video_dimensions['video_width'] ?? '560';
$video_height = $video_dimensions['video_height'] ?? '315';
$mobile_height = $video_dimensions['mobile_height'] ?? '200';

// Processar thumbnail se for array ACF
if (is_array($thumbnail_image)) {
    $thumbnail_url = $thumbnail_image['url'];
    $thumbnail_alt = $thumbnail_image['alt'] ?? 'YouTube Thumbnail';
} else {
    $thumbnail_url = $thumbnail_image;
    $thumbnail_alt = 'YouTube Thumbnail';
}

// Extrair ID do YouTube
$youtube_id = '';
if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([^&\n?#]+)/', $youtube_url, $matches)) {
    $youtube_id = $matches[1];
}
?>

<div class="acf-block-preview youtube-video-backend-preview">
    <div class="acf-block-preview-header">
        <h3>🎥 YouTube Video</h3>
        <p>Configure URL, thumbnail e dimensões do player de vídeo</p>
    </div>

    <div class="acf-block-preview-content">
        <!-- Preview do Vídeo -->
        <div class="video-preview-container">
            <div class="video-preview-wrapper" style="max-width: <?php echo min(400, (int)$video_width); ?>px;">
                <div class="video-preview" 
                     style="background-image: url('<?php echo esc_url($thumbnail_url); ?>'); background-size: cover; background-position: center; width: 100%; height: <?php echo min(225, (int)$video_height * 400 / (int)$video_width); ?>px; border-radius: 12px; position: relative; display: flex; align-items: center; justify-content: center;">
                    <!-- Play button overlay -->
                    <div style="background: rgba(255,255,255,0.9); border-radius: 50%; width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="#ff0000">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Status da Configuração -->
        <div class="preview-status">
            <div class="status-item">
                <span class="status-label">🔗 URL:</span>
                <span class="status-value"><?php echo esc_html(wp_trim_words($youtube_url, 6, '...')); ?></span>
            </div>
            
            <div class="status-item">
                <span class="status-label">🆔 Video ID:</span>
                <span class="status-value <?php echo $youtube_id ? 'status-success' : 'status-warning'; ?>">
                    <?php echo $youtube_id ? esc_html($youtube_id) : '❌ Não detectado'; ?>
                </span>
            </div>
            
            <div class="status-item">
                <span class="status-label">🖼️ Thumbnail:</span>
                <span class="status-value <?php echo $thumbnail_url ? 'status-success' : 'status-warning'; ?>">
                    <?php echo $thumbnail_url ? '✅ Configurada' : '❌ Não configurada'; ?>
                </span>
            </div>
            
            <div class="status-item">
                <span class="status-label">📐 Dimensões:</span>
                <span class="status-value"><?php echo esc_html($video_width); ?>x<?php echo esc_html($video_height); ?>px</span>
            </div>
        </div>

        <!-- Dimensões Configuradas -->
        <div class="dimensions-preview">
            <h4>📐 Dimensões Configuradas:</h4>
            <div class="dimensions-grid">
                <div class="dimension-item">
                    <span class="dimension-label">💻 Desktop:</span>
                    <span class="dimension-value"><?php echo esc_html($video_width); ?>x<?php echo esc_html($video_height); ?>px</span>
                </div>
                <div class="dimension-item">
                    <span class="dimension-label">📱 Mobile:</span>
                    <span class="dimension-value">100% x <?php echo esc_html($mobile_height); ?>px</span>
                </div>
            </div>
        </div>

        <!-- Funcionamento -->
        <div class="functionality-info">
            <h4>⚡ Como Funciona:</h4>
            <ul>
                <li>✅ <strong>Lazy Loading:</strong> Vídeo só carrega ao clicar</li>
                <li>✅ <strong>Thumbnail personalizada</strong> aparece antes do play</li>
                <li>✅ <strong>Container mantém dimensões</strong> após carregar vídeo</li>
                <li>✅ <strong>Responsivo:</strong> Adapta ao tamanho da tela</li>
                <li>✅ <strong>YouTube NoScript:</strong> Sem cookies para privacidade</li>
                <li>✅ <strong>Acessível:</strong> Suporte a teclado</li>
            </ul>
        </div>

        <!-- Instruções de Uso -->
        <div class="usage-instructions">
            <h4>📋 Como Usar:</h4>
            <ul>
                <li>🔗 Cole a URL completa do YouTube</li>
                <li>🖼️ Faça upload da thumbnail personalizada</li>
                <li>📐 Configure as dimensões para desktop e mobile</li>
                <li>▶️ O vídeo carregará apenas quando clicado</li>
                <li>📱 Totalmente responsivo em todos os dispositivos</li>
            </ul>
        </div>

        <!-- URL Formats aceitos -->
        <div class="url-formats">
            <h4>🔗 Formatos de URL Aceitos:</h4>
            <div class="format-examples">
                <code>https://www.youtube.com/watch?v=ABC123</code><br>
                <code>https://youtu.be/ABC123</code><br>
                <code>https://www.youtube.com/embed/ABC123</code>
            </div>
        </div>
    </div>
</div>

<style>
.youtube-video-backend-preview {
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

.video-preview-container {
    margin-bottom: 20px;
    text-align: center;
}

.video-preview-wrapper {
    display: inline-block;
    border: 2px solid #e5e7eb;
    border-radius: 14px;
    padding: 2px;
    background: white;
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

.status-warning {
    color: #d97706 !important;
    font-weight: 600;
}

.dimensions-preview,
.functionality-info,
.usage-instructions,
.url-formats {
    margin-bottom: 20px;
}

.dimensions-preview h4,
.functionality-info h4,
.usage-instructions h4,
.url-formats h4 {
    margin: 0 0 10px 0;
    color: #374151;
    font-size: 14px;
    font-weight: 600;
}

.dimensions-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
}

.dimension-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 8px 12px;
    background: white;
    border-radius: 6px;
    border: 1px solid #e5e7eb;
    font-size: 13px;
}

.dimension-label {
    font-weight: 600;
    color: #374151;
}

.dimension-value {
    color: #6b7280;
    font-family: monospace;
}

.functionality-info ul,
.usage-instructions ul {
    margin: 0;
    padding-left: 0;
    list-style: none;
}

.functionality-info li,
.usage-instructions li {
    padding: 4px 0;
    font-size: 12px;
    color: #6b7280;
}

.format-examples {
    background: #f3f4f6;
    padding: 10px;
    border-radius: 6px;
    font-family: monospace;
    font-size: 12px;
    color: #374151;
}

.format-examples code {
    background: white;
    padding: 2px 6px;
    border-radius: 3px;
    border: 1px solid #e5e7eb;
}

@media (max-width: 768px) {
    .preview-status,
    .dimensions-grid {
        grid-template-columns: 1fr;
    }
}
</style>
