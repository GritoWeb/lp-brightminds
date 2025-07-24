<?php
/**
 * Registro do Bloco ACF: Diferenciais
 */

// Registrar bloco de Diferenciais
if (function_exists('acf_register_block_type')) {
    acf_register_block_type(array(
        'name'              => 'diferenciais',
        'title'             => __('Diferenciais'),
        'description'       => __('Seção de diferenciais com ícones e descrições. Totalmente editável com repeater.'),
        'render_template'   => 'blocks/diferenciais/diferenciais.php',
        'category'          => 'brightminds',
        'icon'              => 'star-filled',
        'keywords'          => array('diferenciais', 'features', 'vantagens', 'beneficios'),
        'supports'          => array(
            'align' => array('left', 'center', 'right', 'wide', 'full'),
            'mode' => true,
            'jsx' => true
        ),
        'example'  => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'section_title' => 'Diferenciais',
                    'diferenciais' => array(
                        array(
                            'icon' => '/wp-content/uploads/2025/07/professor.svg',
                            'title' => 'Professores dominam e são referência',
                            'description' => 'Seu filho vai aprender com pessoas com conhecimento profundo.'
                        )
                    )
                )
            )
        )
    ));
}

// Adicionar campos ACF para o bloco de Diferenciais
if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
        'key' => 'group_diferenciais',
        'title' => '⭐ Configurações dos Diferenciais',
        'fields' => array(
            // Título da seção
            array(
                'key' => 'field_diferenciais_title',
                'label' => '📝 Título da Seção',
                'name' => 'section_title',
                'type' => 'text',
                'instructions' => 'Digite o título principal da seção (ex: "Diferenciais")',
                'required' => 1,
                'default_value' => 'Diferenciais',
                'placeholder' => 'Ex: Diferenciais',
                'wrapper' => array(
                    'width' => '100',
                ),
            ),
            // Repeater de diferenciais
            array(
                'key' => 'field_diferenciais_list',
                'label' => '⭐ Lista de Diferenciais',
                'name' => 'diferenciais',
                'type' => 'repeater',
                'instructions' => 'Clique em "Adicionar Diferencial" para incluir cada item. Você pode reordenar arrastando.',
                'required' => 1,
                'layout' => 'block',
                'button_label' => '➕ Adicionar Diferencial',
                'min' => 1,
                'max' => 12,
                'collapsed' => 'field_diferencial_title',
                'sub_fields' => array(
                    // Ícone
                    array(
                        'key' => 'field_diferencial_icon',
                        'label' => '🎯 Ícone',
                        'name' => 'icon',
                        'type' => 'image',
                        'instructions' => 'Faça upload do ícone SVG ou PNG (50x50px recomendado)',
                        'required' => 1,
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                        'wrapper' => array(
                            'width' => '30',
                        ),
                    ),
                    // Título
                    array(
                        'key' => 'field_diferencial_title',
                        'label' => '📝 Título',
                        'name' => 'title',
                        'type' => 'text',
                        'instructions' => 'Digite o título do diferencial',
                        'required' => 1,
                        'placeholder' => 'Ex: Professores dominam suas matérias',
                        'wrapper' => array(
                            'width' => '70',
                        ),
                    ),
                    // Descrição
                    array(
                        'key' => 'field_diferencial_description',
                        'label' => '📄 Descrição',
                        'name' => 'description',
                        'type' => 'textarea',
                        'instructions' => 'Digite a descrição detalhada do diferencial',
                        'required' => 1,
                        'placeholder' => 'Ex: Seu filho vai aprender com pessoas com conhecimento profundo...',
                        'rows' => 3,
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
                    'value' => 'acf/diferenciais',
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
        'description' => 'Configure a seção de diferenciais com repeater para adicionar quantos itens desejar.',
    ));
}
