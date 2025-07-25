<?php
/**
 * Bloco ACF: YouTube com Thumbnail
 */

// Obter os campos do ACF
$youtube_url = get_field('youtube_url') ?: 'https://www.youtube-nocookie.com/embed/1MotoMgiWVU?autoplay=1&si=IzP84P4t2AE12fVE';
$thumbnail_image = get_field('thumbnail_image') ?: '/wp-content/uploads/2025/07/thumb-video.webp';

// Obter dimensões do grupo
$video_dimensions = get_field('video_dimensions');
$video_width = $video_dimensions['video_width'] ?? '560';
$video_height = $video_dimensions['video_height'] ?? '315';
$mobile_height = $video_dimensions['mobile_height'] ?? '200';

// ID único para o bloco
$block_id = 'youtube-embed-' . $block['id'];

// Extrair ID do YouTube da URL se for uma URL completa
$youtube_id = '';
if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([^&\n?#]+)/', $youtube_url, $matches)) {
    $youtube_id = $matches[1];
    $embed_url = 'https://www.youtube-nocookie.com/embed/' . $youtube_id . '?autoplay=1';
} else {
    $embed_url = $youtube_url;
}

// Se thumbnail_image for um array (ACF image field), pegar a URL
if (is_array($thumbnail_image)) {
    $thumbnail_url = $thumbnail_image['url'];
} else {
    $thumbnail_url = $thumbnail_image;
}
?>

<div class="youtube-video-block md:w-1/2">
    <div>
        <!-- YouTube placeholder -->
        <div
            id="<?php echo esc_attr($block_id); ?>"
            class="relative min-w-[340px] flex items-center justify-center cursor-pointer rounded-3xl border-2 border-transparent transition-all duration-300 focus:outline-none focus:border-blue-500 focus:shadow-lg w-full lg:w-[560px] h-[200px] lg:h-[315px]"
            style="background-image: url('<?php echo esc_url($thumbnail_url); ?>'); background-size: cover; background-position: center;"
            aria-label="Play video"
            role="button"
            tabindex="0"
            data-embed-url="<?php echo esc_attr($embed_url); ?>"
            data-width="<?php echo esc_attr($video_width); ?>"
            data-height="<?php echo esc_attr($video_height); ?>"
            data-mobile-height="<?php echo esc_attr($mobile_height); ?>"
        >
            <!-- Play button overlay -->
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 transition-all duration-300 opacity-90">
                <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="40" cy="40" r="40" fill="rgba(255, 255, 255, 0.9)"/>
                    <path d="M32 24L56 40L32 56V24Z" fill="#ff0000"/>
                </svg>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const placeholder = document.getElementById('<?php echo esc_js($block_id); ?>');
    if (!placeholder) return;

    function playVideo() {
        const embedUrl = placeholder.getAttribute('data-embed-url');
        const width = placeholder.getAttribute('data-width');
        const height = placeholder.getAttribute('data-height');
        const mobileHeight = placeholder.getAttribute('data-mobile-height');

        // Esconder a imagem de fundo e o overlay
        placeholder.style.backgroundImage = 'none';
        placeholder.style.backgroundColor = '#000';
        
        // Remover o overlay do botão play
        const playButton = placeholder.querySelector('div');
        if (playButton) {
            playButton.remove();
        }

        // Criar o iframe
        const iframe = document.createElement('iframe');
        iframe.setAttribute('src', embedUrl);
        iframe.setAttribute('frameborder', '0');
        iframe.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share');
        iframe.setAttribute('allowfullscreen', 'true');
        iframe.classList.add('rounded-3xl');

        // Definir dimensões do iframe para preencher o container
        iframe.style.width = '100%';
        iframe.style.height = '100%';
        iframe.style.position = 'absolute';
        iframe.style.top = '0';
        iframe.style.left = '0';

        // Tornar o container posição relativa
        placeholder.style.position = 'relative';
        placeholder.style.cursor = 'default';
        
        // Inserir o iframe dentro do container
        placeholder.appendChild(iframe);
    }

    // Click event
    placeholder.addEventListener('click', playVideo);

    // Keyboard accessibility
    placeholder.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            playVideo();
        }
    });
});
</script>
