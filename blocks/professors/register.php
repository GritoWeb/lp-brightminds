<?php
/**
 * Registro do Bloco ACF: Nossos Professores
 */

// Registrar bloco de Professores
if (function_exists('acf_register_block_type')) {
    acf_register_block_type(array(
        'name'              => 'professors',
        'title'             => __('Nossos Professores'),
        'description'       => __('Seção para exibir professores com foto, nome, cargo e descrição. Totalmente editável com repeater.'),
        'render_template'   => 'blocks/professors/professors.php',
        'category'          => 'brightminds',
        'icon'              => 'businessman',
        'keywords'          => array('professors', 'professores', 'team', 'equipe', 'pessoas'),
        'supports'          => array(
            'align' => array('left', 'center', 'right', 'wide', 'full'),
            'mode' => true,
            'jsx' => true
        ),
        'example'  => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'section_title' => 'Nossos Professores',
                    'section_description' => 'Seu filho vai aprender com pessoas com conhecimento profundo e prático de assuntos fundamentais.',
                    'professors' => array(
                        array(
                            'professor_name' => 'Marcel van Hattem',
                            'professor_position' => 'Professor de comunicação e oratória',
                            'professor_description' => 'Marcel é jornalista, cientista político e congressista brasileiro filiado ao Partido Novo.',
                            'professor_image' => '/wp-content/uploads/2025/07/marcel-van-hattem.webp'
                        ),
                        array(
                            'professor_name' => 'Flávio Morgenstern',
                            'professor_position' => 'Professor de cultura e retórica',
                            'professor_description' => 'Flavio é escritor, analista político, palestrante e tradutor.',
                            'professor_image' => '/wp-content/uploads/2025/07/flavio-morgenstern.webp'
                        )
                    )
                )
            )
        )
    ));
}

// Adicionar campos ACF para o bloco de Professores
if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
        'key' => 'group_professors',
        'title' => '👨‍🏫 Configurações dos Professores',
        'fields' => array(
            // Título da seção
            array(
                'key' => 'field_section_title',
                'label' => '📝 Título da Seção',
                'name' => 'section_title',
                'type' => 'text',
                'instructions' => 'Digite o título principal da seção (ex: "Nossos Professores")',
                'required' => 1,
                'default_value' => 'Nossos Professores',
                'placeholder' => 'Ex: Nossos Professores',
                'wrapper' => array(
                    'width' => '50',
                ),
            ),
            // Descrição da seção
            array(
                'key' => 'field_section_description',
                'label' => '📄 Descrição da Seção',
                'name' => 'section_description',
                'type' => 'textarea',
                'instructions' => 'Digite uma breve descrição que aparecerá abaixo do título',
                'required' => 0,
                'default_value' => 'Seu filho vai aprender com pessoas com conhecimento profundo e prático de assuntos fundamentais.',
                'placeholder' => 'Ex: Conheça nossos professores especialistas...',
                'rows' => 3,
                'wrapper' => array(
                    'width' => '50',
                ),
            ),
            // Repeater de professores
            array(
                'key' => 'field_professors',
                'label' => '👥 Lista de Professores',
                'name' => 'professors',
                'type' => 'repeater',
                'instructions' => 'Clique em "Adicionar Professor" para incluir cada membro da equipe. Você pode reordenar arrastando.',
                'required' => 1,
                'layout' => 'block',
                'button_label' => '➕ Adicionar Professor',
                'min' => 1,
                'max' => 20,
                'collapsed' => 'field_professor_name',
                'sub_fields' => array(
                    // Foto do professor
                    array(
                        'key' => 'field_professor_image',
                        'label' => '📸 Foto do Professor',
                        'name' => 'professor_image',
                        'type' => 'image',
                        'instructions' => 'Faça upload da foto do professor (formato quadrado funciona melhor)',
                        'required' => 1,
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                        'wrapper' => array(
                            'width' => '30',
                        ),
                    ),
                    // Nome do professor
                    array(
                        'key' => 'field_professor_name',
                        'label' => '👤 Nome Completo',
                        'name' => 'professor_name',
                        'type' => 'text',
                        'instructions' => 'Digite o nome completo do professor',
                        'required' => 1,
                        'placeholder' => 'Ex: Marcel van Hattem',
                        'wrapper' => array(
                            'width' => '35',
                        ),
                    ),
                    // Cargo/Posição
                    array(
                        'key' => 'field_professor_position',
                        'label' => '💼 Cargo/Especialidade',
                        'name' => 'professor_position',
                        'type' => 'text',
                        'instructions' => 'Digite o cargo ou área de especialidade (aparecerá em negrito)',
                        'required' => 1,
                        'placeholder' => 'Ex: Professor de comunicação e oratória',
                        'wrapper' => array(
                            'width' => '35',
                        ),
                    ),
                    // Descrição/Bio
                    array(
                        'key' => 'field_professor_description',
                        'label' => '📝 Descrição/Biografia',
                        'name' => 'professor_description',
                        'type' => 'textarea',
                        'instructions' => 'Digite uma breve biografia ou descrição do professor',
                        'required' => 1,
                        'placeholder' => 'Ex: Marcel é jornalista, cientista político e congressista brasileiro...',
                        'rows' => 3,
                        'wrapper' => array(
                            'width' => '100',
                        ),
                    ),
                ),
            ),
            // Configurações de layout
            array(
                'key' => 'field_layout_settings',
                'label' => '⚙️ Configurações de Layout',
                'name' => 'layout_settings',
                'type' => 'group',
                'instructions' => 'Personalize como os professores serão exibidos',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_columns_desktop',
                        'label' => '🖥️ Colunas no Desktop',
                        'name' => 'columns_desktop',
                        'type' => 'select',
                        'instructions' => 'Quantas colunas exibir em telas grandes',
                        'choices' => array(
                            '1' => '1 Coluna',
                            '2' => '2 Colunas (Recomendado)',
                            '3' => '3 Colunas',
                        ),
                        'default_value' => '2',
                        'wrapper' => array(
                            'width' => '33',
                        ),
                    ),
                    array(
                        'key' => 'field_show_title',
                        'label' => '📝 Exibir Título da Seção',
                        'name' => 'show_title',
                        'type' => 'true_false',
                        'instructions' => 'Marque para mostrar o título da seção',
                        'default_value' => 1,
                        'ui' => 1,
                        'wrapper' => array(
                            'width' => '33',
                        ),
                    ),
                    array(
                        'key' => 'field_show_description',
                        'label' => '📄 Exibir Descrição da Seção',
                        'name' => 'show_description',
                        'type' => 'true_false',
                        'instructions' => 'Marque para mostrar a descrição da seção',
                        'default_value' => 1,
                        'ui' => 1,
                        'wrapper' => array(
                            'width' => '33',
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
                    'value' => 'acf/professors',
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
        'description' => 'Configure a seção de professores com repeater para adicionar quantos professores desejar.',
    ));
}
