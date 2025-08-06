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
$mobile_width = $video_dimensions['mobile_width'] ?? '320';

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

<div class="youtube-video-block">
    <!-- YouTube placeholder -->
    <div
        id="<?php echo esc_attr($block_id); ?>"
        class="youtube-video-container relative cursor-pointer rounded-3xl border-2 border-transparent transition-all duration-300 focus:outline-none focus:border-blue-500 focus:shadow-lg"
        style="background-image: url('<?php echo esc_url($thumbnail_url); ?>'); background-size: cover; background-position: center;"
        aria-label="Play video"
        role="button"
        tabindex="0"
        data-embed-url="<?php echo esc_attr($embed_url); ?>"
        data-width="<?php echo esc_attr($video_width); ?>"
        data-height="<?php echo esc_attr($video_height); ?>"
        data-mobile-width="<?php echo esc_attr($mobile_width); ?>"
        data-mobile-height="<?php echo esc_attr($mobile_height); ?>"
    >
        <!-- Play button overlay -->
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 transition-all duration-300 opacity-90 play-button-overlay">
            <div class="youtube-play-button">
                <!-- YouTube Logo Background -->
                <svg width="68" height="48" viewBox="0 0 68 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <!-- YouTube Red Background -->
                    <path d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z" fill="#FF0000"/>
                    <!-- Play Triangle -->
                    <path d="M 45,24 27,14 27,34" fill="white"/>
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- CSS Responsivo -->
<style>
/* Desktop dimensions */
#<?php echo esc_attr($block_id); ?> {
    width: <?php echo esc_attr($video_width); ?>px;
    height: <?php echo esc_attr($video_height); ?>px;
    max-width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Mobile dimensions */
@media (max-width: 1023px) {
    #<?php echo esc_attr($block_id); ?> {
        width: <?php echo esc_attr($mobile_width); ?>px;
        height: <?php echo esc_attr($mobile_height); ?>px;
        max-width: calc(100vw - 40px);
    }
}

/* Para telas muito pequenas */
@media (max-width: <?php echo esc_attr($mobile_width + 40); ?>px) {
    #<?php echo esc_attr($block_id); ?> {
        width: calc(100vw - 40px);
        min-width: 280px;
    }
}

/* Garantir centralização */
.youtube-video-block {
    display: flex;
    justify-content: center;
    width: 100%;
    padding: 20px 0;
}

/* Assegurar que o iframe preencha o container quando ativo */
#<?php echo esc_attr($block_id); ?> iframe {
    width: 100% !important;
    height: 100% !important;
    border-radius: 24px;
}

/* YouTube Play Button Styling */
.youtube-play-button {
    transition: all 0.3s ease;
    cursor: pointer;
    filter: drop-shadow(0 4px 12px rgba(0, 0, 0, 0.3));
}

.youtube-play-button:hover {
    transform: scale(1.1);
    filter: drop-shadow(0 6px 16px rgba(0, 0, 0, 0.4));
}

.youtube-play-button svg {
    transition: all 0.3s ease;
}

/* Efeito hover no container */
#<?php echo esc_attr($block_id); ?>:hover .youtube-play-button {
    transform: scale(1.05);
}

#<?php echo esc_attr($block_id); ?>:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const placeholder = document.getElementById('<?php echo esc_js($block_id); ?>');
    if (!placeholder) return;

    function playVideo() {
        const embedUrl = placeholder.getAttribute('data-embed-url');

        // Esconder a imagem de fundo e o overlay
        placeholder.style.backgroundImage = 'none';
        placeholder.style.backgroundColor = '#000';
        
        // Remover o overlay do botão play
        const playButton = placeholder.querySelector('.play-button-overlay');
        if (playButton) {
            playButton.remove();
        }

        // Criar o iframe
        const iframe = document.createElement('iframe');
        iframe.setAttribute('src', embedUrl);
        iframe.setAttribute('frameborder', '0');
        iframe.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share');
        iframe.setAttribute('allowfullscreen', 'true');
        iframe.style.width = '100%';
        iframe.style.height = '100%';
        iframe.style.borderRadius = '24px';

        // Inserir o iframe
        placeholder.appendChild(iframe);
        
        // Remover cursor pointer
        placeholder.style.cursor = 'default';
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
