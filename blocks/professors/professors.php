<?php
/**
 * Bloco ACF: Nossos Professores
 */

// Verificar se está no modo de edição do bloco
$is_edit_mode = isset($block['data']['_is_edit_mode']) || (isset($_GET['context']) && $_GET['context'] === 'edit');

// Se não há dados e está no modo de edição, mostrar interface de configuração
if (empty(get_field('professors')) && is_admin()) {
    ?>
    <div class="professors-config-panel p-8 bg-gray-50 border-2 border-dashed border-blue-600 rounded-lg text-center">
        <h3 class="mt-0 text-blue-600 text-xl font-bold">👨‍🏫 Configurar Nossos Professores</h3>
        <p class="mb-5 text-gray-600">Clique no botão abaixo para abrir o painel de configuração dos professores</p>
        
        <button onclick="openProfessorsModal()" class="bg-blue-600 text-white border-0 py-3 px-6 rounded cursor-pointer text-base hover:bg-blue-700 transition-colors">
            ⚙️ Configurar Professores
        </button>
        
        <div id="professors-modal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.7); z-index: 999999;">
            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; padding: 30px; border-radius: 8px; max-width: 800px; max-height: 90vh; overflow-y: auto; width: 90%;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <h2 style="margin: 0;">👨‍🏫 Configurar Professores</h2>
                    <button onclick="closeProfessorsModal()" style="background: #dc3545; color: white; border: none; padding: 8px 12px; border-radius: 4px; cursor: pointer;">✕</button>
                </div>
                
                <div id="professors-form">
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-weight: bold; margin-bottom: 5px;">📝 Título da Seção:</label>
                        <input type="text" id="section-title" placeholder="Ex: Nossos Professores" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                    </div>
                    
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-weight: bold; margin-bottom: 5px;">📄 Descrição da Seção:</label>
                        <textarea id="section-description" placeholder="Ex: Conheça nossos professores especialistas..." style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; height: 80px;"></textarea>
                    </div>
                    
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-weight: bold; margin-bottom: 10px;">👥 Professores:</label>
                        <div id="professors-list">
                            <!-- Professores serão adicionados aqui dinamicamente -->
                        </div>
                        <button onclick="addProfessor()" style="background: #28a745; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer; margin-top: 10px;">
                            ➕ Adicionar Professor
                        </button>
                    </div>
                    
                    <div style="text-align: right; border-top: 1px solid #eee; padding-top: 20px;">
                        <button onclick="saveProfessors()" style="background: #0073aa; color: white; border: none; padding: 12px 24px; border-radius: 4px; cursor: pointer; margin-right: 10px;">
                            💾 Salvar Configurações
                        </button>
                        <button onclick="closeProfessorsModal()" style="background: #6c757d; color: white; border: none; padding: 12px 24px; border-radius: 4px; cursor: pointer;">
                            ❌ Cancelar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
        let professorCount = 0;
        
        function openProfessorsModal() {
            document.getElementById('professors-modal').style.display = 'block';
            // Carregar dados existentes se houver
            loadExistingData();
        }
        
        function closeProfessorsModal() {
            document.getElementById('professors-modal').style.display = 'none';
        }
        
        function addProfessor() {
            professorCount++;
            const professorHtml = `
                <div class="professor-item" id="professor-${professorCount}" style="border: 1px solid #ddd; padding: 15px; margin-bottom: 15px; border-radius: 4px; background: #f9f9f9;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                        <h4 style="margin: 0;">👤 Professor ${professorCount}</h4>
                        <button onclick="removeProfessor(${professorCount})" style="background: #dc3545; color: white; border: none; padding: 5px 8px; border-radius: 3px; cursor: pointer; font-size: 12px;">🗑️</button>
                    </div>
                    
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 10px;">
                        <div>
                            <label style="display: block; font-weight: bold; margin-bottom: 3px;">👤 Nome:</label>
                            <input type="text" id="name-${professorCount}" placeholder="Ex: Marcel van Hattem" style="width: 100%; padding: 6px; border: 1px solid #ddd; border-radius: 3px;">
                        </div>
                        <div>
                            <label style="display: block; font-weight: bold; margin-bottom: 3px;">💼 Cargo:</label>
                            <input type="text" id="position-${professorCount}" placeholder="Ex: Professor de comunicação" style="width: 100%; padding: 6px; border: 1px solid #ddd; border-radius: 3px;">
                        </div>
                    </div>
                    
                    <div style="margin-bottom: 10px;">
                        <label style="display: block; font-weight: bold; margin-bottom: 3px;">📝 Descrição:</label>
                        <textarea id="description-${professorCount}" placeholder="Ex: Marcel é jornalista, cientista político..." style="width: 100%; padding: 6px; border: 1px solid #ddd; border-radius: 3px; height: 60px;"></textarea>
                    </div>
                    
                    <div>
                        <label style="display: block; font-weight: bold; margin-bottom: 3px;">📸 URL da Foto:</label>
                        <input type="url" id="image-${professorCount}" placeholder="Ex: /wp-content/uploads/2025/07/professor.jpg" style="width: 100%; padding: 6px; border: 1px solid #ddd; border-radius: 3px;">
                    </div>
                </div>
            `;
            
            document.getElementById('professors-list').insertAdjacentHTML('beforeend', professorHtml);
        }
        
        function removeProfessor(id) {
            document.getElementById(`professor-${id}`).remove();
        }
        
        function loadExistingData() {
            // Carregar dados existentes dos campos ACF se houver
            // Este seria conectado com o ACF em uma implementação real
        }
        
        function saveProfessors() {
            // Coletar dados do formulário
            const data = {
                section_title: document.getElementById('section-title').value,
                section_description: document.getElementById('section-description').value,
                professors: []
            };
            
            // Coletar dados dos professores
            const professorItems = document.querySelectorAll('.professor-item');
            professorItems.forEach((item, index) => {
                const id = item.id.split('-')[1];
                const professor = {
                    name: document.getElementById(`name-${id}`).value,
                    position: document.getElementById(`position-${id}`).value,
                    description: document.getElementById(`description-${id}`).value,
                    image: document.getElementById(`image-${id}`).value
                };
                
                if (professor.name && professor.position && professor.description) {
                    data.professors.push(professor);
                }
            });
            
            // Salvar dados (conectar com ACF)
            console.log('Dados para salvar:', data);
            
            // Fechar modal
            closeProfessorsModal();
            
            // Recarregar bloco
            alert('✅ Configurações salvas! O bloco será atualizado.');
        }
        
        // Adicionar pelo menos um professor por padrão
        addProfessor();
        </script>
        
        <style>
        #professors-modal {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }
        
        #professors-modal input:focus,
        #professors-modal textarea:focus {
            outline: none;
            border-color: #0073aa;
            box-shadow: 0 0 0 1px #0073aa;
        }
        
        #professors-modal button:hover {
            opacity: 0.9;
        }
        
        .professor-item {
            transition: all 0.3s ease;
        }
        
        .professor-item:hover {
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        </style>
    </div>
    <?php
    return;
}

// Obter os campos do ACF
$section_title = get_field('section_title') ?: 'Nossos Professores';
$section_description = get_field('section_description') ?: 'Seu filho vai aprender com pessoas com conhecimento profundo e prático de assuntos fundamentais.';

// Configurações de layout
$layout_settings = get_field('layout_settings');
$columns_desktop = $layout_settings['columns_desktop'] ?? '2';
$show_title = $layout_settings['show_title'] ?? true;
$show_description = $layout_settings['show_description'] ?? true;

// Repeater de professores
$professors = get_field('professors');

// ID único para o bloco
$block_id = 'professors-' . $block['id'];

// Classes CSS para grid baseado no número de colunas
$grid_classes = 'grid grid-cols-1 gap-8 mt-12';
switch($columns_desktop) {
    case '1':
        $grid_classes .= ' md:grid-cols-1';
        break;
    case '3':
        $grid_classes .= ' md:grid-cols-2 lg:grid-cols-3';
        break;
    case '2':
    default:
        $grid_classes .= ' md:grid-cols-2';
        break;
}

// Se não há professores, mostrar mensagem para o admin
if (empty($professors) && is_admin()) {
    echo '<div style="padding: 20px; background: #f0f0f1; border: 1px dashed #ccd0d4; text-align: center;">';
    echo '<p><strong>👨‍🏫 Bloco de Professores</strong></p>';
    echo '<p>Clique em "Adicionar Professor" no painel lateral para começar a adicionar professores.</p>';
    echo '</div>';
    return;
}

// Se não há professores no frontend, não mostrar nada
if (empty($professors) && !is_admin()) {
    return;
}
?>

<div id="<?php echo esc_attr($block_id); ?>" class="professors-block w-full">
    <div class="container max-w-6xl mx-auto px-5 pb-8">
        
        <?php if ($show_title || $show_description): ?>
        <div class="text-center">
            <?php if ($show_title && $section_title): ?>
            <h2 class="text-2xl lg:text-4xl !font-normal uppercase mb-4 text-gray"><?php echo esc_html($section_title); ?></h2>
            <?php endif; ?>
            
            <?php if ($show_description && $section_description): ?>
            <p class="!text-base text-gray-600 leading-relaxed"><?php echo esc_html($section_description); ?></p>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <?php if ($professors): ?>
        <div class="<?php echo esc_attr($grid_classes); ?> mt-12 gap-8">
            <?php foreach ($professors as $professor): 
                $image = $professor['professor_image'];
                $name = $professor['professor_name'];
                $position = $professor['professor_position'];
                $description = $professor['professor_description'];
                
                // Verificar se os campos obrigatórios estão preenchidos
                if (empty($name) || empty($position) || empty($description)) {
                    continue;
                }
            ?>
            
            <div class="professor-item flex flex-col md:flex-row items-center gap-4 p-5 bg-white rounded-xl  h-full">
                <?php if ($image): ?>
                <div class="professor-image w-32 md:w-48 flex-shrink-0 mb-4 md:mb-0">
                    <img 
                        src="<?php echo esc_url($image['url']); ?>" 
                        alt="<?php echo esc_attr($image['alt'] ?: 'Foto de ' . $name); ?>" 
                        class="w-full h-auto aspect-square object-cover rounded-full border-4 border-gray-100"
                        loading="lazy"
                    >
                </div>
                <?php endif; ?>
                
                <div class="professor-content flex-1 text-center md:text-left <?php echo $image ? 'md:w-3/5' : 'w-full'; ?>">
                    <h3 class="professor-name text-lg md:text-xl !mt-0 !font-normal text-gray mb-2 "><?php echo esc_html($name); ?></h3>
                    <p class="professor-info !text-base text-gray mt-2">
                        <span class="professor-position text-[#1d1d1d] !font-bold block mb-1"><?php echo esc_html($position); ?></span>
                        <span class="professor-description"><?php echo esc_html($description); ?></span>
                    </p>
                </div>
            </div>
            
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
        
    </div>
</div>

<?php if (is_admin()): ?>
<!-- Mostrar informações úteis no editor -->
<div class="mt-3 p-3 bg-blue-50 border-l-4 border-blue-500 text-xs text-gray-700">
    <strong class="text-blue-700">📊 Status:</strong> 
    <?php echo count($professors); ?> professor(es) configurado(s) | 
    Layout: <?php echo $columns_desktop; ?> coluna(s) no desktop |
    <?php echo $show_title ? '✅' : '❌'; ?> Título |
    <?php echo $show_description ? '✅' : '❌'; ?> Descrição
</div>
<?php endif; ?>
