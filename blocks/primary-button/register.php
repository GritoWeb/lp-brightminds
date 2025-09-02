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
                'instructions' => 'Digite o texto que aparecerá no botão. Tags HTML básicas são permitidas (strong, em, br, span).',
                'required' => 1,
                'default_value' => 'Inscreva-se',
                'placeholder' => 'Ex: Inscreva-se <strong>Agora</strong>',
            ),
            array(
                'key' => 'field_background_color',
                'label' => 'Cor de Fundo',
                'name' => 'background_color',
                'type' => 'select',
                'instructions' => 'Selecione a cor de fundo do botão',
                'required' => 0,
                'choices' => array(
                    '#ffda00' => '🟡 Amarelo (#ffda00)',
                    '#ffffff' => '⚪ Branco (#ffffff)',
                ),
                'default_value' => '#ffda00',
            ),
            // Alinhamento do botão
            array(
                'key' => 'field_button_alignment',
                'label' => '📍 Alinhamento do Botão',
                'name' => 'button_alignment',
                'type' => 'select',
                'instructions' => 'Escolha como o botão deve ser alinhado na página',
                'required' => 0,
                'choices' => array(
                    'left' => '⬅️ Esquerda',
                    'center' => '🎯 Centro',
                    'right' => '➡️ Direita',
                ),
                'default_value' => 'center',
                'wrapper' => array(
                    'width' => '100',
                ),
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
