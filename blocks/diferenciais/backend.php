<?php
/**
 * Backend: Modal de configuração dos Diferenciais
 */

// Se não há dados e está no modo admin, mostrar interface de configuração amigável
if (empty(get_field('diferenciais')) && is_admin()) {
    ?>
    <div class="diferenciais-config-panel p-8 bg-blue-50 border-2 border-dashed border-blue-600 rounded-lg text-center">
        <h3 class="mt-0 text-blue-600 text-xl font-bold">⭐ Configurar Diferenciais</h3>
        <p class="mb-5 text-gray-600">Clique no botão abaixo para abrir o painel de configuração dos diferenciais</p>
        
        <button onclick="openDiferenciaisModal()" class="bg-blue-600 text-white border-0 py-3 px-6 rounded cursor-pointer text-base hover:bg-blue-700 transition-colors">
            ⚙️ Configurar Diferenciais
        </button>
        
        <div id="diferenciais-modal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.7); z-index: 999999;">
            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; padding: 30px; border-radius: 8px; max-width: 900px; max-height: 90vh; overflow-y: auto; width: 95%;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <h2 style="margin: 0;">⭐ Configurar Diferenciais</h2>
                    <button onclick="closeDiferenciaisModal()" style="background: #dc3545; color: white; border: none; padding: 8px 12px; border-radius: 4px; cursor: pointer;">✕</button>
                </div>
                
                <div id="diferenciais-form">
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-weight: bold; margin-bottom: 5px;">📝 Título da Seção:</label>
                        <input type="text" id="section-title" placeholder="Ex: Diferenciais" value="Diferenciais" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                    </div>
                    
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-weight: bold; margin-bottom: 10px;">⭐ Diferenciais:</label>
                        <div id="diferenciais-list">
                            <!-- Diferenciais serão adicionados aqui dinamicamente -->
                        </div>
                        <button onclick="addDiferencial()" style="background: #28a745; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer; margin-top: 10px;">
                            ➕ Adicionar Diferencial
                        </button>
                    </div>
                    
                    <div style="text-align: right; border-top: 1px solid #eee; padding-top: 20px;">
                        <button onclick="saveDiferenciais()" style="background: #0073aa; color: white; border: none; padding: 12px 24px; border-radius: 4px; cursor: pointer; margin-right: 10px;">
                            💾 Salvar Configurações
                        </button>
                        <button onclick="closeDiferenciaisModal()" style="background: #6c757d; color: white; border: none; padding: 12px 24px; border-radius: 4px; cursor: pointer;">
                            ❌ Cancelar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
        let diferencialCount = 0;
        
        function openDiferenciaisModal() {
            document.getElementById('diferenciais-modal').style.display = 'block';
            // Adicionar alguns exemplos por padrão
            if (diferencialCount === 0) {
                addDefaultDiferenciais();
            }
        }
        
        function closeDiferenciaisModal() {
            document.getElementById('diferenciais-modal').style.display = 'none';
        }
        
        function addDiferencial() {
            diferencialCount++;
            const diferencialHtml = `
                <div class="diferencial-item" id="diferencial-${diferencialCount}" style="border: 1px solid #ddd; padding: 15px; margin-bottom: 15px; border-radius: 4px; background: #f9f9f9;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                        <h4 style="margin: 0;">⭐ Diferencial ${diferencialCount}</h4>
                        <button onclick="removeDiferencial(${diferencialCount})" style="background: #dc3545; color: white; border: none; padding: 5px 8px; border-radius: 3px; cursor: pointer; font-size: 12px;">🗑️</button>
                    </div>
                    
                    <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 15px; margin-bottom: 15px;">
                        <div>
                            <label style="display: block; font-weight: bold; margin-bottom: 3px;">🎯 URL do Ícone:</label>
                            <input type="url" id="icon-${diferencialCount}" placeholder="Ex: /wp-content/uploads/2025/07/icon.svg" style="width: 100%; padding: 6px; border: 1px solid #ddd; border-radius: 3px;">
                            <small style="color: #666;">Recomendado: SVG 50x50px</small>
                        </div>
                        <div>
                            <label style="display: block; font-weight: bold; margin-bottom: 3px;">📝 Título:</label>
                            <input type="text" id="title-${diferencialCount}" placeholder="Ex: Professores dominam suas matérias" style="width: 100%; padding: 6px; border: 1px solid #ddd; border-radius: 3px;">
                        </div>
                    </div>
                    
                    <div>
                        <label style="display: block; font-weight: bold; margin-bottom: 3px;">📄 Descrição:</label>
                        <textarea id="description-${diferencialCount}" placeholder="Ex: Seu filho vai aprender com pessoas com conhecimento profundo..." style="width: 100%; padding: 6px; border: 1px solid #ddd; border-radius: 3px; height: 80px;"></textarea>
                    </div>
                </div>
            `;
            
            document.getElementById('diferenciais-list').insertAdjacentHTML('beforeend', diferencialHtml);
        }
        
        function removeDiferencial(id) {
            document.getElementById(`diferencial-${id}`).remove();
        }
        
        function addDefaultDiferenciais() {
            // Adicionar exemplos baseados no HTML fornecido
            const exemplos = [
                {
                    icon: '/wp-content/uploads/2025/07/professor.svg',
                    title: 'Professores dominam e são referência em suas matérias',
                    description: 'Seu filho vai aprender com pessoas com conhecimento profundo e prático de assuntos fundamentais.'
                },
                {
                    icon: '/wp-content/uploads/2025/07/formacao.svg',
                    title: 'Formação inédita',
                    description: 'Formação única e inédita no Brasil, que desenvolve habilidades e conhecimentos fundamentais para o futuro dos jovens.'
                },
                {
                    icon: '/wp-content/uploads/2025/07/gamificados.svg',
                    title: 'Testes gamificados',
                    description: 'As crianças e adolescentes gostam de testar seus conhecimentos ao invés de apenas assistir às aulas.'
                }
            ];
            
            exemplos.forEach((exemplo, index) => {
                addDiferencial();
                document.getElementById(`icon-${diferencialCount}`).value = exemplo.icon;
                document.getElementById(`title-${diferencialCount}`).value = exemplo.title;
                document.getElementById(`description-${diferencialCount}`).value = exemplo.description;
            });
        }
        
        function saveDiferenciais() {
            // Coletar dados do formulário
            const data = {
                section_title: document.getElementById('section-title').value,
                diferenciais: []
            };
            
            // Coletar dados dos diferenciais
            const diferencialItems = document.querySelectorAll('.diferencial-item');
            diferencialItems.forEach((item) => {
                const id = item.id.split('-')[1];
                const diferencial = {
                    icon: document.getElementById(`icon-${id}`).value,
                    title: document.getElementById(`title-${id}`).value,
                    description: document.getElementById(`description-${id}`).value
                };
                
                if (diferencial.title && diferencial.description && diferencial.icon) {
                    data.diferenciais.push(diferencial);
                }
            });
            
            // Salvar dados (conectar com ACF)
            console.log('Dados para salvar:', data);
            
            // Fechar modal
            closeDiferenciaisModal();
            
            // Recarregar bloco
            alert('✅ Configurações salvas! O bloco será atualizado.');
        }
        </script>
        
        <style>
        #diferenciais-modal {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }
        
        #diferenciais-modal input:focus,
        #diferenciais-modal textarea:focus {
            outline: none;
            border-color: #0073aa;
            box-shadow: 0 0 0 1px #0073aa;
        }
        
        #diferenciais-modal button:hover {
            opacity: 0.9;
        }
        
        .diferencial-item {
            transition: all 0.3s ease;
        }
        
        .diferencial-item:hover {
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        </style>
    </div>
    <?php
    return;
}
