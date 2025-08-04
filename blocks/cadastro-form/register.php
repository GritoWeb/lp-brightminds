<?php
/**
 * Registro do Bloco ACF: Formulário de Cadastro
 */

// Registrar bloco do Formulário de Cadastro
if (function_exists('acf_register_block_type')) {
    acf_register_block_type(array(
        'name'              => 'cadastro-form',
        'title'             => __('Formulário de Cadastro'),
        'description'       => __('Formulário de cadastro para acesso gratuito à plataforma Bright Minds.'),
        'render_template'   => 'blocks/cadastro-form/cadastro-form.php',
        'category'          => 'brightminds',
        'icon'              => 'forms',
        'keywords'          => array('formulário', 'cadastro', 'form', 'registro', 'acesso'),
        'supports'          => array(
            'align' => array('left', 'center', 'right', 'wide', 'full'),
            'mode' => false,
            'jsx' => true
        ),
        'example'  => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'preview_image_help' => plugin_dir_url(__FILE__) . 'preview.png',
                )
            )
        )
    ));
}

// Como o bloco não tem campos editáveis, não precisamos de campos ACF
// O bloco é completamente estático conforme solicitado
