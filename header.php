<?php
/**
 * Theme header template.
 *
 * @package TailPress
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A Bright Minds é uma plataforma de aprendizado online inovadora, projetada para crianças a partir de 11 anos e adolescentes que querem aprender habilidades fundamentais para o futuro.
Nosso foco é oferecer conteúdos que todos os pais gostariam que as escolas oferecessem, como comunicação, oratória," />
    <meta property="og:image" content="/wp-content/uploads/2025/07/download.webp">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <link rel="stylesheet" href="resources/css/editor-style.css" >
    <?php wp_head(); ?>
</head>
<body <?php body_class('bg-white text-zinc-900 antialiased'); ?>>
<?php do_action('tailpress_site_before'); ?>

<div id="page" class="min-h-screen flex flex-col">
    <?php do_action('tailpress_header'); ?>

   

    <div id="content" class="site-content grow">
        <?php if (is_front_page()): ?>
            
        <?php endif; ?>

        <?php do_action('tailpress_content_start'); ?>
        <main>
