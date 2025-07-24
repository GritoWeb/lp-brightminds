<?php
/**
 * Registro do Bloco ACF: YouTube Video
 */

// Registrar bloco do YouTube Video
if (function_exists('acf_register_block_type')) {
    acf_register_block_type(array(
        'name'              => 'youtube-video',
        'title'             => __('YouTube Video'),
        'description'       => __('Um player de YouTube com thumbnail personalizada que carrega o vídeo ao clicar.'),
        'render_template'   => 'blocks/youtube-video/youtube-video.php',
        'category'          => 'brightminds',
        'icon'              => 'video-alt3',
        'keywords'          => array('youtube', 'video', 'player', 'embed', 'thumbnail'),
        'supports'          => array(
            'align' => array('left', 'center', 'right', 'wide', 'full'),
            'mode' => false,
            'jsx' => true
        ),
        'example'  => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'youtube_url' => 'https://www.youtube.com/watch?v=1MotoMgiWVU',
                    'thumbnail_image' => '/wp-content/uploads/2025/07/thumb-video.webp',
                    'video_width' => '560',
                    'video_height' => '315',
                    'mobile_height' => '200'
                )
            )
        )
    ));
}

// Adicionar campos ACF para o bloco do YouTube Video
if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
        'key' => 'group_youtube_video',
        'title' => 'Configurações do YouTube Video',
        'fields' => array(
            array(
                'key' => 'field_youtube_url',
                'label' => 'URL do YouTube',
                'name' => 'youtube_url',
                'type' => 'url',
                'instructions' => 'Cole a URL completa do YouTube (ex: https://www.youtube.com/watch?v=ABC123) ou URL de embed',
                'required' => 1,
                'default_value' => 'https://www.youtube.com/watch?v=1MotoMgiWVU',
                'placeholder' => 'https://www.youtube.com/watch?v=...',
            ),
            array(
                'key' => 'field_thumbnail_image',
                'label' => 'Imagem Thumbnail',
                'name' => 'thumbnail_image',
                'type' => 'image',
                'instructions' => 'Selecione a imagem que aparecerá antes do vídeo ser reproduzido',
                'required' => 1,
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
            ),
            array(
                'key' => 'field_video_dimensions',
                'label' => 'Dimensões do Vídeo',
                'name' => 'video_dimensions',
                'type' => 'group',
                'instructions' => 'Configure as dimensões do player de vídeo',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_video_width',
                        'label' => 'Largura (Desktop)',
                        'name' => 'video_width',
                        'type' => 'number',
                        'instructions' => 'Largura do vídeo em pixels para desktop',
                        'required' => 0,
                        'default_value' => 560,
                        'min' => 300,
                        'max' => 1920,
                        'step' => 10,
                        'append' => 'px',
                    ),
                    array(
                        'key' => 'field_video_height',
                        'label' => 'Altura (Desktop)',
                        'name' => 'video_height',
                        'type' => 'number',
                        'instructions' => 'Altura do vídeo em pixels para desktop',
                        'required' => 0,
                        'default_value' => 315,
                        'min' => 200,
                        'max' => 1080,
                        'step' => 5,
                        'append' => 'px',
                    ),
                    array(
                        'key' => 'field_mobile_height',
                        'label' => 'Altura (Mobile)',
                        'name' => 'mobile_height',
                        'type' => 'number',
                        'instructions' => 'Altura do vídeo em pixels para dispositivos móveis',
                        'required' => 0,
                        'default_value' => 200,
                        'min' => 150,
                        'max' => 500,
                        'step' => 5,
                        'append' => 'px',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/youtube-video',
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
