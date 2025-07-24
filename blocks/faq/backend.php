<?php
/**
 * Backend/Modal de Configuração: FAQ - Dúvidas Frequentes
 * Arquivo: backend.php
 */

// Verificar se estamos no contexto do WordPress
if (!defined('ABSPATH')) {
    exit;
}

// Obter dados dos campos para preview
$section_title = get_field('section_title') ?: 'Dúvidas Frequentes';
$faq_items = get_field('faq_items');
$total_items = is_array($faq_items) ? count($faq_items) : 0;
?>

<div class="acf-block-preview faq-backend-preview">
    <div class="acf-block-preview-header">
        <h3>📝 FAQ - Dúvidas Frequentes</h3>
        <p>Configure perguntas e respostas com accordion interativo</p>
    </div>

    <div class="acf-block-preview-content">
        <!-- Status da Configuração -->
        <div class="preview-status">
            <div class="status-item">
                <span class="status-label">📝 Título:</span>
                <span class="status-value"><?php echo esc_html($section_title); ?></span>
            </div>
            
            <div class="status-item">
                <span class="status-label">❓ Perguntas:</span>
                <span class="status-value <?php echo $total_items > 0 ? 'status-success' : 'status-warning'; ?>">
                    <?php echo $total_items; ?> configurada<?php echo $total_items !== 1 ? 's' : ''; ?>
                </span>
            </div>
        </div>

        <!-- Preview dos Items -->
        <?php if (!empty($faq_items)): ?>
            <div class="faq-items-preview">
                <h4>🔍 Preview das Perguntas:</h4>
                <div class="faq-list">
                    <?php foreach ($faq_items as $index => $item): 
                        $question = $item['question'] ?? '';
                        $answer = $item['answer'] ?? '';
                        
                        if (empty($question)) continue;
                    ?>
                        <div class="faq-item-preview">
                            <div class="faq-question">
                                <strong>❓ <?php echo esc_html($question); ?></strong>
                            </div>
                            <?php if (!empty($answer)): ?>
                                <div class="faq-answer">
                                    💬 <?php echo esc_html(wp_trim_words($answer, 15, '...')); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- Instruções de Uso -->
        <div class="usage-instructions">
            <h4>📋 Como Usar:</h4>
            <ul>
                <li>✅ Configure o título da seção</li>
                <li>➕ Adicione perguntas e respostas usando o repeater</li>
                <li>📱 O accordion será totalmente responsivo</li>
                <li>🎯 Apenas o primeiro item fica aberto por padrão</li>
                <li>🔄 Os usuários podem expandir/recolher cada pergunta</li>
            </ul>
        </div>

        <!-- Dicas de Conteúdo -->
        <div class="content-tips">
            <h4>💡 Dicas de Conteúdo:</h4>
            <ul>
                <li>📝 Use perguntas claras e diretas</li>
                <li>💬 Respostas podem ter múltiplos parágrafos</li>
                <li>🎯 Ordene da pergunta mais importante para menos</li>
                <li>📊 Recomendado: 5-10 perguntas por seção</li>
                <li>🔍 Pense nas dúvidas reais dos seus clientes</li>
            </ul>
        </div>

        <!-- Exemplo de Perguntas -->
        <?php if (empty($faq_items)): ?>
            <div class="example-questions">
                <h4>💭 Exemplos de Perguntas:</h4>
                <div class="example-list">
                    <div class="example-item">
                        <strong>❓ Qual a idade mínima para se inscrever na Bright Minds?</strong>
                        <span>💬 A partir de 11 anos. Mas crianças menores também podem participar...</span>
                    </div>
                    <div class="example-item">
                        <strong>❓ Adultos podem participar?</strong>
                        <span>💬 Sim, adultos podem e devem participar...</span>
                    </div>
                    <div class="example-item">
                        <strong>❓ Como vão ser realizadas as aulas ao vivo?</strong>
                        <span>💬 Via Zoom, ao final de cada módulo...</span>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<style>
.faq-backend-preview {
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

.faq-items-preview {
    margin-bottom: 20px;
}

.faq-items-preview h4 {
    margin: 0 0 10px 0;
    color: #374151;
    font-size: 14px;
    font-weight: 600;
}

.faq-list {
    max-height: 200px;
    overflow-y: auto;
    border: 1px solid #e5e7eb;
    border-radius: 6px;
    background: white;
}

.faq-item-preview {
    padding: 12px;
    border-bottom: 1px solid #f3f4f6;
}

.faq-item-preview:last-child {
    border-bottom: none;
}

.faq-question {
    margin-bottom: 5px;
    font-size: 13px;
    color: #1f2937;
}

.faq-answer {
    font-size: 12px;
    color: #6b7280;
    font-style: italic;
}

.usage-instructions,
.content-tips,
.example-questions {
    margin-bottom: 15px;
}

.usage-instructions h4,
.content-tips h4,
.example-questions h4 {
    margin: 0 0 8px 0;
    color: #374151;
    font-size: 14px;
    font-weight: 600;
}

.usage-instructions ul,
.content-tips ul {
    margin: 0;
    padding-left: 0;
    list-style: none;
}

.usage-instructions li,
.content-tips li {
    padding: 4px 0;
    font-size: 12px;
    color: #6b7280;
}

.example-list {
    border: 1px solid #e5e7eb;
    border-radius: 6px;
    background: white;
    max-height: 150px;
    overflow-y: auto;
}

.example-item {
    padding: 8px 12px;
    border-bottom: 1px solid #f3f4f6;
    font-size: 12px;
}

.example-item:last-child {
    border-bottom: none;
}

.example-item strong {
    display: block;
    color: #1f2937;
    margin-bottom: 3px;
}

.example-item span {
    color: #6b7280;
    font-style: italic;
}

@media (max-width: 768px) {
    .preview-status {
        grid-template-columns: 1fr;
    }
}
</style>
