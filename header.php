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
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <link rel="stylesheet" href="resources/css/editor-style.css" >
    <?php wp_head(); ?>

    <script>
(function () {
  const currentUrl = new URL(window.location.href);
  const pathname = currentUrl.pathname;

  // Verifica se a URL contém "/curso-gratuito"
  if (!pathname.includes("/curso-gratuito")) return;

  // Verifica se já existem parâmetros na URL (search string não vazia)
  if (currentUrl.search && currentUrl.search !== "") return;

  const params = currentUrl.searchParams;

  // Adiciona os parâmetros
  params.set("utm_source", "freemium");

  if (!params.has("utm_campaign")) params.set("utm_campaign", "freemium-bm");
  if (!params.has("utm_medium")) params.set("utm_medium", "freemium");
  if (!params.has("utm_content")) params.set("utm_content", "freemium");
  if (!params.has("hsrc")) params.set("hsrc", "freemium");

  const newUrl = `${currentUrl.origin}${pathname}?${params.toString()}`;

  // Redireciona se a URL atual for diferente da nova
  if (window.location.href !== newUrl) {
    window.location.replace(newUrl);
  }
})();
</script>

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
