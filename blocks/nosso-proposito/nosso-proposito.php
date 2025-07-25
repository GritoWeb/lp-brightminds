<?php
/**
 * Bloco ACF: Nosso Propósito
 */

// Incluir configuração do backend se necessário
if (empty(get_field('titulo')) && is_admin()) {
    include_once 'backend.php';
    return;
}

// Obter os campos do ACF
$imagem = get_field('imagem');
$titulo = get_field('titulo') ?: 'Nosso propósito';
$paragrafo_1 = get_field('paragrafo_1') ?: 'Inspirar nossos alunos a realizar coisas extraordinárias. E a continuar a aprender por toda a vida.';
$paragrafo_2 = get_field('paragrafo_2') ?: '"What one can be, one must be", Abraham Maslow.';
$botao_texto = get_field('botao_texto') ?: 'Quero que meus filhos tenham um futuro brilhante';
$botao_url = get_field('botao_url') ?: '#';

// ID único para o bloco
$block_id = 'nosso-proposito-' . $block['id'];

// Se não há dados no admin, mostrar mensagem
if (empty($titulo) && is_admin()) {
    echo '<div class="p-5 bg-gray-100 border border-dashed border-gray-400 text-center rounded">';
    echo '<p><strong>💝 Bloco Nosso Propósito</strong></p>';
    echo '<p>Configure o conteúdo no painel lateral para começar.</p>';
    echo '</div>';
    return;
}

// URL da imagem
$imagem_url = '';
if ($imagem) {
    $imagem_url = is_array($imagem) ? $imagem['url'] : $imagem;
} else {
    $imagem_url = '/wp-content/uploads/2025/07/nosso-proposito.webp';
}

// Alt text da imagem
$imagem_alt = '';
if (is_array($imagem)) {
    $imagem_alt = $imagem['alt'] ?: 'Nosso propósito';
} else {
    $imagem_alt = 'Parent and child studying together';
}
?>

<section id="<?php echo esc_attr($block_id); ?>" class="purpose-section flex flex-col md:flex-row no-margin-y">

    <div class="w-full md:w-1/2">
        <img 
            src="<?php echo esc_url($imagem_url); ?>" 
            alt="<?php echo esc_attr($imagem_alt); ?>" 
            class="w-full h-full object-cover"
            loading="lazy"
        >
    </div>

    <div class="w-full md:w-1/2 bg-black text-white flex flex-col justify-center items-start px-8 py-32! md:p-16">
        <h2 class="text-4xl font-bold uppercase mb-8"><?php echo esc_html($titulo); ?></h2>
        
        <?php if ($paragrafo_1): ?>
        <p class="mb-4 text-white!"><?php echo esc_html($paragrafo_1); ?></p>
        <?php endif; ?>
        
        <?php if ($paragrafo_2): ?>
        <p class="mb-8 text-white!">
            <?php 
            // Verificar se é uma citação (tem aspas)
            if (strpos($paragrafo_2, '"') !== false) {
                // Dividir citação e autor
                $parts = explode(',', $paragrafo_2);
                if (count($parts) >= 2) {
                    $citacao = trim($parts[0]);
                    $autor = trim(implode(',', array_slice($parts, 1)));
                    echo '<span class="font-semibold">' . esc_html($citacao) . ',</span><br>' . esc_html($autor) . '.';
                } else {
                    echo esc_html($paragrafo_2);
                }
            } else {
                echo esc_html($paragrafo_2);
            }
            ?>
        </p>
        <?php endif; ?>
        
        <?php if ($botao_texto && $botao_url): ?>
        <div>
            <a 
                href="<?php echo esc_url($botao_url); ?>"
                class="open-modal inline-block duration-300 bg-primary font-semibold px-2 py-3 rounded-3xl transition text-[1.125rem] lg:text-[1.5rem]/6 text-center lg:w-[65%]"
                style="color: #242424;"
                onmouseover="this.style.backgroundColor='white'; this.style.color='#844d17';"
                onmouseout="this.style.backgroundColor=''; this.style.color='#242424';"
            >
                <?php echo esc_html($botao_texto); ?>
            </a>
        </div>
        <?php endif; ?>
    </div>
</section>

<?php if (is_admin()): ?>
<!-- Mostrar informações úteis no editor -->
<div class="mt-3 p-3 bg-purple-50 border-l-4 border-purple-500 text-xs text-gray-700">
    <strong class="text-purple-700">📊 Status:</strong> 
    <?php echo $titulo ? '✅' : '❌'; ?> Título |
    <?php echo $imagem ? '✅' : '❌'; ?> Imagem |
    <?php echo $botao_texto ? '✅' : '❌'; ?> Botão configurado
</div>
<?php endif; ?>
