<?php
/**
 * Registro do Bloco ACF: Botão Primário
 */

// Registrar bloco do Botão Primário
if (function_exists('acf_register_block_type')) {
    acf_register_block_type(array(
        'name'              => 'primary-button',
        'title'             => __('Botão Primário'),
        'description'       => __('Um botão primário customizável com cores e texto editáveis.'),
        'render_template'   => 'blocks/primary-button/primary-button.php',
        'category'          => 'brightminds',
        'icon'              => 'button',
        'keywords'          => array('button', 'botão', 'cta', 'link'),
        'supports'          => array(
            'align' => false,
            'mode' => false,
            'jsx' => true
        ),
        'example'  => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'button_text' => 'Inscreva-se',
                    'button_url' => '#',
                    'background_color' => '#007cba',
                    'text_color' => '#ffffff'
                )
            )
        )
    ));
}

// Adicionar campos ACF para o bloco do botão primário
if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
        'key' => 'group_primary_button',
        'title' => 'Configurações do Botão Primário',
        'fields' => array(
            array(
                'key' => 'field_button_text',
                'label' => 'Texto do Botão',
                'name' => 'button_text',
                'type' => 'text',
                'instructions' => 'Digite o texto que aparecerá no botão',
                'required' => 1,
                'default_value' => 'Inscreva-se',
                'placeholder' => 'Ex: Inscreva-se',
            ),
            array(
                'key' => 'field_button_url',
                'label' => 'URL do Link',
                'name' => 'button_url',
                'type' => 'url',
                'instructions' => 'Digite a URL para onde o botão deve levar',
                'required' => 1,
                'default_value' => '#',
                'placeholder' => 'https://example.com',
            ),
            array(
                'key' => 'field_background_color',
                'label' => 'Cor de Fundo',
                'name' => 'background_color',
                'type' => 'color_picker',
                'instructions' => 'Selecione a cor de fundo do botão',
                'required' => 0,
                'default_value' => '#007cba',
            ),
            array(
                'key' => 'field_text_color',
                'label' => 'Cor do Texto',
                'name' => 'text_color',
                'type' => 'color_picker',
                'instructions' => 'Selecione a cor do texto do botão',
                'required' => 0,
                'default_value' => '#ffffff',
            ),
            array(
                'key' => 'field_hover_background_color',
                'label' => 'Cor de Fundo (Hover)',
                'name' => 'hover_background_color',
                'type' => 'color_picker',
                'instructions' => 'Selecione a cor de fundo quando o mouse passar sobre o botão',
                'required' => 0,
                'default_value' => '#ffffff',
            ),
            array(
                'key' => 'field_hover_text_color',
                'label' => 'Cor do Texto (Hover)',
                'name' => 'hover_text_color',
                'type' => 'color_picker',
                'instructions' => 'Selecione a cor do texto quando o mouse passar sobre o botão',
                'required' => 0,
                'default_value' => '#007cba',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/primary-button',
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
        'description' => '',
    ));
}
