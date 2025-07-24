<?php
/**
 * Registro do Bloco ACF: Nosso Propósito
 */

// Registrar bloco Nosso Propósito
if (function_exists('acf_register_block_type')) {
    acf_register_block_type(array(
        'name'              => 'nosso-proposito',
        'title'             => __('Nosso Propósito'),
        'description'       => __('Seção com imagem e conteúdo sobre o propósito da empresa.'),
        'render_template'   => 'blocks/nosso-proposito/nosso-proposito.php',
        'category'          => 'brightminds',
        'icon'              => 'heart',
        'keywords'          => array('proposito', 'missao', 'about', 'sobre'),
        'supports'          => array(
            'align' => array('left', 'center', 'right', 'wide', 'full'),
            'mode' => true,
            'jsx' => true
        ),
        'example'  => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'titulo' => 'Nosso propósito',
                    'paragrafo_1' => 'Inspirar nossos alunos a realizar coisas extraordinárias.',
                    'paragrafo_2' => '"What one can be, one must be", Abraham Maslow.',
                    'botao_texto' => 'Quero que meus filhos tenham um futuro brilhante',
                    'botao_url' => '#',
                    'imagem' => '/wp-content/uploads/2025/07/nosso-proposito.webp'
                )
            )
        )
    ));
}

// Adicionar campos ACF para o bloco
if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
        'key' => 'group_nosso_proposito',
        'title' => '💝 Configurações Nosso Propósito',
        'fields' => array(
            // Imagem
            array(
                'key' => 'field_proposito_imagem',
                'label' => '🖼️ Imagem',
                'name' => 'imagem',
                'type' => 'image',
                'instructions' => 'Imagem que aparecerá do lado esquerdo',
                'required' => 1,
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
            ),
            // Título
            array(
                'key' => 'field_proposito_titulo',
                'label' => '📝 Título',
                'name' => 'titulo',
                'type' => 'text',
                'instructions' => 'Título da seção',
                'required' => 1,
                'default_value' => 'Nosso propósito',
                'placeholder' => 'Ex: Nosso propósito',
            ),
            // Parágrafo 1
            array(
                'key' => 'field_proposito_paragrafo_1',
                'label' => '📄 Primeiro Parágrafo',
                'name' => 'paragrafo_1',
                'type' => 'textarea',
                'instructions' => 'Primeiro parágrafo do conteúdo',
                'required' => 1,
                'default_value' => 'Inspirar nossos alunos a realizar coisas extraordinárias. E a continuar a aprender por toda a vida.',
                'rows' => 3,
            ),
            // Parágrafo 2 (citação)
            array(
                'key' => 'field_proposito_paragrafo_2',
                'label' => '💬 Segundo Parágrafo (Citação)',
                'name' => 'paragrafo_2',
                'type' => 'textarea',
                'instructions' => 'Citação ou segundo parágrafo',
                'required' => 0,
                'default_value' => '"What one can be, one must be", Abraham Maslow.',
                'rows' => 2,
            ),
            // Botão texto
            array(
                'key' => 'field_proposito_botao_texto',
                'label' => '🔘 Texto do Botão',
                'name' => 'botao_texto',
                'type' => 'text',
                'instructions' => 'Texto que aparecerá no botão',
                'required' => 1,
                'default_value' => 'Quero que meus filhos tenham um futuro brilhante',
                'placeholder' => 'Ex: Saiba mais',
            ),
            // Botão URL
            array(
                'key' => 'field_proposito_botao_url',
                'label' => '🔗 URL do Botão',
                'name' => 'botao_url',
                'type' => 'url',
                'instructions' => 'Para onde o botão deve levar',
                'required' => 1,
                'default_value' => '#',
                'placeholder' => 'https://exemplo.com',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/nosso-proposito',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => 'Configure a seção Nosso Propósito com imagem e conteúdo.',
    ));
}
