<?php
/**
 * Bloco ACF: Diferenciais
 */

// Incluir configuração do backend se necessário
if (empty(get_field('diferenciais')) && is_admin()) {
    include_once 'backend.php';
    return;
}

// Obter os campos do ACF
$section_title = get_field('section_title') ?: 'Diferenciais';
$diferenciais = get_field('diferenciais');

// ID único para o bloco
$block_id = 'diferenciais-' . $block['id'];

// Se não há diferenciais no frontend, não mostrar nada
if (empty($diferenciais) && !is_admin()) {
    return;
}

// Se não há diferenciais no admin, mostrar mensagem
if (empty($diferenciais) && is_admin()) {
    echo '<div class="p-5 bg-gray-100 border border-dashed border-gray-400 text-center rounded">';
    echo '<p><strong>⭐ Bloco de Diferenciais</strong></p>';
    echo '<p>Configure os diferenciais no painel lateral para começar.</p>';
    echo '</div>';
    return;
}

// Dividir diferenciais em chunks de 3 para criar as linhas
$diferencial_chunks = array_chunk($diferenciais, 3);
?>

<section id="<?php echo esc_attr($block_id); ?>" class="diferenciais bg-primary py-32 no-margin-y">
    <div class="container mx-auto">
        
        <?php if ($section_title): ?>
        <h2 class="text-4xl !font-normal text-gray uppercase mb-12"><?php echo esc_html($section_title); ?></h2>
        <?php endif; ?>
        
        <?php if ($diferencial_chunks): ?>
        <?php foreach ($diferencial_chunks as $chunk_index => $chunk): ?>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 <?php echo $chunk_index < count($diferencial_chunks) - 1 ? 'mb-8' : ''; ?>">
            <?php foreach ($chunk as $diferencial): 
                $icon = $diferencial['icon'];
                $title = $diferencial['title'];
                $description = $diferencial['description'];
                
                // Verificar se os campos obrigatórios estão preenchidos
                if (empty($title) || empty($description)) {
                    continue;
                }
            ?>
            
            <div class="flex items-start">
                <?php if ($icon): ?>
                <div class="icon mb-4 w-[50px] h-[50px] flex-shrink-0 mr-4">
                    <img 
                        src="<?php echo esc_url(is_array($icon) ? $icon['url'] : $icon); ?>" 
                        alt="<?php echo esc_attr($title); ?>" 
                        class="w-[50px] h-[50px]"
                        loading="lazy"
                    >
                </div>
                <?php endif; ?>
                
                <div>
                    <h3 class="text-2xl md:text-xl uppercase text-gray !font-normal !mt-0 mb-2"><?php echo esc_html($title); ?></h3>
                    <p class="!text-[1.06rem]"><?php echo esc_html($description); ?></p>
                </div>
            </div>
            
            <?php endforeach; ?>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
        
    </div>
</section>

<?php if (is_admin()): ?>
<!-- Mostrar informações úteis no editor -->
<div class="mt-3 p-3 bg-blue-50 border-l-4 border-blue-500 text-xs text-gray-700">
    <strong class="text-blue-700">📊 Status:</strong> 
    <?php echo count($diferenciais); ?> diferencial(is) configurado(s) |
    Layout: Grid 3 colunas | 
    Agrupados em <?php echo count($diferencial_chunks); ?> linha(s)
</div>
<?php endif; ?>
