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
                    'width' => '50',
                ),
            ),
            // Peso da fonte
            array(
                'key' => 'field_font_weight',
                'label' => '🔤 Peso da Fonte',
                'name' => 'font_weight',
                'type' => 'select',
                'instructions' => 'Escolha o peso (espessura) da fonte do botão. Cada peso tem padding e tamanho específicos.',
                'required' => 0,
                'choices' => array(
                    '500' => '📄 Medium (500) - 25px | Padding: 5px 28px',
                    '700' => '📰 Bold (700) - 27.5px | Padding: 5px 28px',
                ),
                'default_value' => '700',
                'wrapper' => array(
                    'width' => '50',
                ),
            ),
            // Ativar borda no hover
            array(
                'key' => 'field_enable_hover_border',
                'label' => '🖼️ Ativar Borda no Hover',
                'name' => 'enable_hover_border',
                'type' => 'true_false',
                'instructions' => 'Ativar esta opção para mostrar uma borda quando o mouse passar sobre o botão',
                'required' => 0,
                'default_value' => 0,
                'ui' => 1,
                'wrapper' => array(
                    'width' => '100',
                ),
            ),
            // Cor da borda no hover
            array(
                'key' => 'field_hover_border_color',
                'label' => '🎨 Cor da Borda (Hover)',
                'name' => 'hover_border_color',
                'type' => 'color_picker',
                'instructions' => 'Selecione a cor da borda quando o mouse passar sobre o botão',
                'required' => 0,
                'default_value' => '#242424',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_enable_hover_border',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '50',
                ),
            ),
            // Ativar borda sempre visível
            array(
                'key' => 'field_enable_always_border',
                'label' => '⭕ Ativar Borda Sempre Visível', 
                'name' => 'enable_always_border',
                'type' => 'true_false',
                'instructions' => 'Ativar esta opção para mostrar uma borda branca sempre visível no botão',
                'required' => 0,
                'default_value' => 0,
                'ui' => 1,
                'wrapper' => array(
                    'width' => '50',
                ),
            ),
            // Tamanho do botão
            array(
                'key' => 'field_button_size',
                'label' => '📏 Tamanho do Botão',
                'name' => 'button_size',
                'type' => 'select',
                'instructions' => 'Escolha o tamanho do botão (padding e fonte serão aplicados automaticamente)',
                'required' => 0,
                'choices' => array(
                    '400' => '📱 Pequeno (400px) - Padding menor, fonte 1.5625rem',
                    '700' => '🖥️ Grande (700px) - Padding maior, fonte 1.71rem',
                ),
                'default_value' => '700',
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
