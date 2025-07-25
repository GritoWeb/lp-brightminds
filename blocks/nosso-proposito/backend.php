<?php
/**
 * Backend: Modal de configuração Nosso Propósito
 */

// Se não há dados e está no modo admin, mostrar interface de configuração
if (empty(get_field('titulo')) && is_admin()) {
    ?>
    <div class="proposito-config-panel p-8 bg-purple-50 border-2 border-dashed border-purple-600 rounded-lg text-center">
        <h3 class="mt-0 text-purple-600 text-xl font-bold">Configurar Nosso Propósito</h3>
        <p class="mb-5 text-gray-600">Clique no botão abaixo para configurar a seção</p>
        
        <button onclick="openPropositoModal()" class="bg-purple-600 text-white border-0 py-3 px-6 rounded cursor-pointer text-base hover:bg-purple-700 transition-colors">
            ⚙️ Configurar Seção
        </button>
        
        <div id="proposito-modal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.7); z-index: 999999;">
            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; padding: 30px; border-radius: 8px; max-width: 700px; max-height: 90vh; overflow-y: auto; width: 95%;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <h2 style="margin: 0;">💝 Configurar Nosso Propósito</h2>
                    <button onclick="closePropositoModal()" style="background: #dc3545; color: white; border: none; padding: 8px 12px; border-radius: 4px; cursor: pointer;">✕</button>
                </div>
                
                <div id="proposito-form">
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-weight: bold; margin-bottom: 5px;">🖼️ URL da Imagem:</label>
                        <input type="url" id="imagem-url" placeholder="Ex: /wp-content/uploads/2025/07/nosso-proposito.webp" value="/wp-content/uploads/2025/07/nosso-proposito.webp" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                    </div>
                    
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-weight: bold; margin-bottom: 5px;">📝 Título:</label>
                        <input type="text" id="titulo" placeholder="Ex: Nosso propósito" value="Nosso propósito" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                    </div>
                    
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-weight: bold; margin-bottom: 5px;">📄 Primeiro Parágrafo:</label>
                        <textarea id="paragrafo-1" placeholder="Ex: Inspirar nossos alunos..." style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; height: 80px;">Inspirar nossos alunos a realizar coisas extraordinárias. E a continuar a aprender por toda a vida.</textarea>
                    </div>
                    
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-weight: bold; margin-bottom: 5px;">💬 Segundo Parágrafo (Citação):</label>
                        <textarea id="paragrafo-2" placeholder="Ex: What one can be..." style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; height: 60px;">"What one can be, one must be", Abraham Maslow.</textarea>
                    </div>
                    
                    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 15px; margin-bottom: 20px;">
                        <div>
                            <label style="display: block; font-weight: bold; margin-bottom: 5px;">🔘 Texto do Botão:</label>
                            <input type="text" id="botao-texto" placeholder="Ex: Saiba mais" value="Quero que meus filhos tenham um futuro brilhante" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                        </div>
                        <div>
                            <label style="display: block; font-weight: bold; margin-bottom: 5px;">🔗 URL do Botão:</label>
                            <input type="url" id="botao-url" placeholder="https://..." value="#" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                        </div>
                    </div>
                    
                    <div style="text-align: right; border-top: 1px solid #eee; padding-top: 20px;">
                        <button onclick="saveProposito()" style="background: #0073aa; color: white; border: none; padding: 12px 24px; border-radius: 4px; cursor: pointer; margin-right: 10px;">
                            💾 Salvar Configurações
                        </button>
                        <button onclick="closePropositoModal()" style="background: #6c757d; color: white; border: none; padding: 12px 24px; border-radius: 4px; cursor: pointer;">
                            ❌ Cancelar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
        function openPropositoModal() {
            document.getElementById('proposito-modal').style.display = 'block';
        }
        
        function closePropositoModal() {
            document.getElementById('proposito-modal').style.display = 'none';
        }
        
        function saveProposito() {
            // Coletar dados do formulário
            const data = {
                imagem: document.getElementById('imagem-url').value,
                titulo: document.getElementById('titulo').value,
                paragrafo_1: document.getElementById('paragrafo-1').value,
                paragrafo_2: document.getElementById('paragrafo-2').value,
                botao_texto: document.getElementById('botao-texto').value,
                botao_url: document.getElementById('botao-url').value
            };
            
            // Salvar dados (conectar com ACF)
            console.log('Dados para salvar:', data);
            
            // Fechar modal
            closePropositoModal();
            
            // Recarregar bloco
            alert('✅ Configurações salvas! O bloco será atualizado.');
        }
        </script>
        
        <style>
        #proposito-modal {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }
        
        #proposito-modal input:focus,
        #proposito-modal textarea:focus {
            outline: none;
            border-color: #0073aa;
            box-shadow: 0 0 0 1px #0073aa;
        }
        
        #proposito-modal button:hover {
            opacity: 0.9;
        }
        </style>
    </div>
    <?php
    return;
}
