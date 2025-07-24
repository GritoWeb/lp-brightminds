<?php
/**
 * Template do Bloco: FAQ - Dúvidas Frequentes
 * Arquivo: faq.php
 */

// Verificar se estamos no contexto do WordPress
if (!defined('ABSPATH')) {
    exit;
}

// Obter dados dos campos
$section_title = get_field('section_title') ?: 'Dúvidas Frequentes';
$faq_items = get_field('faq_items');

// Se não há items, mostrar placeholder no editor
if (empty($faq_items) && is_admin()) {
    echo '<div class="bg-gray-100 border-2 border-dashed border-gray-300 rounded-lg p-8 text-center">
            <h3 class="text-lg font-semibold text-gray-600 mb-2">🔧 FAQ não configurado</h3>
            <p class="text-gray-500">Configure o título e adicione perguntas e respostas usando o painel lateral.</p>
          </div>';
    return;
}

// Se não há items no frontend, não mostrar nada
if (empty($faq_items)) {
    return;
}
?>

<section class="container my-24">
    <h2 class="font-medium uppercase mb-6 lg:text-[3.625rem]!">
        <?php echo esc_html($section_title); ?>
    </h2>

    <?php foreach ($faq_items as $index => $item): 
        $question = $item['question'] ?? '';
        $answer = $item['answer'] ?? '';
        
        if (empty($question) || empty($answer)) continue;
    ?>
        <div class="faq-item border-b py-1 border-gray-300">
            <button class="faq-question flex justify-between items-center w-full py-4 font-bold">
                <?php echo esc_html($question); ?>
                <span class="faq-icon relative inline-block w-5 h-5"></span>
            </button>
            <div class="faq-answer overflow-hidden max-h-0 transition-all duration-300">
                <p class="py-2"><?php echo wp_kses_post(nl2br($answer)); ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</section>
