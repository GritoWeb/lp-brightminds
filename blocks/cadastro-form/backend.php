<?php
/**
 * Backend/Preview: Formulário de Cadastro
 * Arquivo: backend.php
 */

// Verificar se estamos no contexto do WordPress
if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="acf-block-preview cadastro-form-backend-preview">
    <div class="acf-block-preview-header">
        <h3>📝 Formulário de Cadastro</h3>
        <p>Formulário estático para cadastro de usuários na plataforma</p>
    </div>

    <div class="acf-block-preview-content">
        <!-- Preview do Formulário -->
        <div class="form-preview-container">
            <div class="form-preview-wrapper" style="max-width: 400px; margin: 0 auto; text-align: center;">
                <div class="form-preview" style="border: 2px dashed #ddd; padding: 20px; border-radius: 8px; background: #f9f9f9;">
                    
                    <!-- Campos de Preview -->
                    <div style="margin-bottom: 10px;">
                        <input type="text" placeholder="Insira seu nome" style="width: 100%; padding: 8px 10px; border: 1px solid #212121; border-radius: 4px; line-height: 26px;" disabled>
                    </div>
                    
                    <div style="margin-bottom: 10px;">
                        <input type="email" placeholder="Insira seu email" style="width: 100%; padding: 8px 10px; border: 1px solid #212121; border-radius: 4px; line-height: 26px;" disabled>
                    </div>
                    
                    <div style="margin-bottom: 15px;">
                        <input type="text" placeholder="Insira seu celular" style="width: 100%; padding: 8px 10px; border: 1px solid #212121; border-radius: 4px; line-height: 26px;" disabled>
                    </div>
                    
                    <div>
                        <button type="button" style="width: 100%; padding: 10px; background: #ffda00; color: #000; border: none; border-radius: 4px; text-transform: uppercase; letter-spacing: 1px; font-weight: bold; cursor: not-allowed;" disabled>
                            Receber acesso gratuito
                        </button>
                    </div>
                    
                </div>
            </div>
        </div>

        <!-- Informações do Bloco -->
        <div class="block-info">
            <div class="info-section">
                <h4>ℹ️ Informações</h4>
                <ul>
                    <li><strong>Tipo:</strong> Formulário Estático</li>
                    <li><strong>Integração:</strong> Área de Membros</li>
                    <li><strong>Campos:</strong> Nome, Email, Celular</li>
                    <li><strong>Ação:</strong> Cadastro automático</li>
                </ul>
            </div>

            <div class="info-section">
                <h4>🔧 Recursos</h4>
                <ul>
                    <li>✅ Validação automática de campos</li>
                    <li>✅ Formatação de telefone</li>
                    <li>✅ Integração com API externa</li>
                    <li>✅ Design responsivo</li>
                    <li>✅ Tag freemium automática</li>
                </ul>
            </div>

            <div class="info-section">
                <h4>⚙️ Configuração</h4>
                <p><strong>Este bloco é estático e não possui campos editáveis no backend.</strong></p>
                <p>As configurações do formulário (token, realm, etc.) estão fixas no código conforme especificado.</p>
            </div>
        </div>
    </div>
</div>

<style>
.cadastro-form-backend-preview {
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 20px;
    margin: 10px 0;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
}

.cadastro-form-backend-preview .acf-block-preview-header {
    text-align: center;
    margin-bottom: 25px;
    padding-bottom: 15px;
    border-bottom: 2px solid #f0f0f0;
}

.cadastro-form-backend-preview .acf-block-preview-header h3 {
    margin: 0 0 8px 0;
    color: #2c3e50;
    font-size: 1.4em;
    font-weight: 600;
}

.cadastro-form-backend-preview .acf-block-preview-header p {
    margin: 0;
    color: #7f8c8d;
    font-size: 0.95em;
}

.cadastro-form-backend-preview .acf-block-preview-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 25px;
    align-items: start;
}

.cadastro-form-backend-preview .form-preview-container {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 8px;
    border: 1px solid #e9ecef;
}

.cadastro-form-backend-preview .block-info {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 8px;
    border: 1px solid #e9ecef;
}

.cadastro-form-backend-preview .info-section {
    margin-bottom: 20px;
}

.cadastro-form-backend-preview .info-section:last-child {
    margin-bottom: 0;
}

.cadastro-form-backend-preview .info-section h4 {
    margin: 0 0 10px 0;
    color: #2c3e50;
    font-size: 1.1em;
    font-weight: 600;
}

.cadastro-form-backend-preview .info-section ul {
    margin: 0;
    padding-left: 20px;
    color: #5a6c7d;
}

.cadastro-form-backend-preview .info-section li {
    margin-bottom: 5px;
    font-size: 0.9em;
}

.cadastro-form-backend-preview .info-section p {
    margin: 0 0 8px 0;
    color: #5a6c7d;
    font-size: 0.9em;
    line-height: 1.4;
}

/* Responsivo */
@media (max-width: 768px) {
    .cadastro-form-backend-preview .acf-block-preview-content {
        grid-template-columns: 1fr;
        gap: 20px;
    }
}
</style>
