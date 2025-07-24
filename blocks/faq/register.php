<?php
/**
 * Registro do Bloco ACF: FAQ (Dúvidas Frequentes)
 */

// Registrar bloco de FAQ
if (function_exists('acf_register_block_type')) {
    acf_register_block_type(array(
        'name'              => 'faq',
        'title'             => __('FAQ - Dúvidas Frequentes'),
        'description'       => __('Seção de perguntas e respostas frequentes com accordion interativo. Totalmente editável com repeater.'),
        'render_template'   => 'blocks/faq/faq.php',
        'category'          => 'brightminds',
        'icon'              => 'editor-help',
        'keywords'          => array('faq', 'duvidas', 'perguntas', 'respostas', 'accordion'),
        'supports'          => array(
            'align' => array('left', 'center', 'right', 'wide', 'full'),
            'mode' => true,
            'jsx' => true
        ),
        'example'  => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'section_title' => 'Dúvidas Frequentes',
                    'faq_items' => array(
                        array(
                            'question' => 'Qual a idade mínima para se inscrever na Bright Minds?',
                            'answer' => 'A partir de 11 anos. Mas crianças menores também podem participar. Nesse caso, recomendamos que os pais participem ativamente, acompanhando as aulas junto com os seus filhos.'
                        )
                    )
                )
            )
        )
    ));
}

// Adicionar campos ACF para o bloco de FAQ
if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
        'key' => 'group_faq',
        'title' => '❓ Configurações do FAQ',
        'fields' => array(
            // Título da seção
            array(
                'key' => 'field_faq_title',
                'label' => '📝 Título da Seção',
                'name' => 'section_title',
                'type' => 'text',
                'instructions' => 'Digite o título principal da seção (ex: "Dúvidas Frequentes")',
                'required' => 1,
                'default_value' => 'Dúvidas Frequentes',
                'placeholder' => 'Ex: Dúvidas Frequentes',
                'wrapper' => array(
                    'width' => '100',
                ),
            ),
            // Repeater de FAQ
            array(
                'key' => 'field_faq_list',
                'label' => '❓ Lista de Perguntas e Respostas',
                'name' => 'faq_items',
                'type' => 'repeater',
                'instructions' => 'Clique em "Adicionar Pergunta" para incluir cada item. Você pode reordenar arrastando.',
                'required' => 1,
                'layout' => 'block',
                'button_label' => '➕ Adicionar Pergunta',
                'min' => 1,
                'max' => 20,
                'collapsed' => 'field_faq_question',
                'sub_fields' => array(
                    // Pergunta
                    array(
                        'key' => 'field_faq_question',
                        'label' => '❓ Pergunta',
                        'name' => 'question',
                        'type' => 'text',
                        'instructions' => 'Digite a pergunta frequente',
                        'required' => 1,
                        'placeholder' => 'Ex: Qual a idade mínima para se inscrever na Bright Minds?',
                        'wrapper' => array(
                            'width' => '100',
                        ),
                    ),
                    // Resposta
                    array(
                        'key' => 'field_faq_answer',
                        'label' => '💬 Resposta',
                        'name' => 'answer',
                        'type' => 'textarea',
                        'instructions' => 'Digite a resposta detalhada para a pergunta',
                        'required' => 1,
                        'placeholder' => 'Ex: A partir de 11 anos. Mas crianças menores também podem participar...',
                        'rows' => 4,
                        'wrapper' => array(
                            'width' => '100',
                        ),
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/faq',
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
        'description' => 'Configure a seção de FAQ com repeater para adicionar quantas perguntas e respostas desejar.',
    ));
}
