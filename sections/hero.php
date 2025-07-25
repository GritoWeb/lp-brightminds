<div class="bg-black">
    <div class="container pt-2 pb-32">
        <div>
            <img class="w-[7.0625rem] lg:w-[11.9735rem]" src="/wp-content/uploads/2025/07/logo.webp" alt="Logo BrightMinds">
        </div>
        <div class="lg:flex lg:justify-between lg:pt-12">
            <div class="flex flex-col">
                <h1 class="uppercase text-white">
                    Bem-vindo<br>à Bright Minds,<br><span class="text-primary font-bold">a escola do futuro.</span>
                </h1>
                <p class="text-accent! pt-4">
                    O futuro dos seus filhos pode ser brilhante.<br>
                    Assista ao vídeo de apresentação<br>
                    e entenda como.
                </p>
                <div class="lg:pt-12 py-8 lg:py-0">
                    <button class="open-modal bg-primary py-3 px-8 text-3xl rounded-3xl text-background hover:bg-white hover:text-hover duration-300">
                        Inscreva-se
                    </button>
                </div>
            </div>
            <div>
                <!-- YouTube placeholder -->
                <div
                    id="youtube-embed"
                    class="youtube-placeholder rounded-3xl lg:w-[560px] mw-[100%] lg:h-[315px] h-[200px]"
                    style="background-image: url('/wp-content/uploads/2025/07/thumb-video.webp');"
                    aria-label="Play video"
                    role="button"
                    tabindex="0"
                ></div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const placeholder = document.getElementById('youtube-embed');
    if (!placeholder) return;

    placeholder.addEventListener('click', function() {
        const iframe = document.createElement('iframe');
        iframe.setAttribute('src', 'https://www.youtube-nocookie.com/embed/1MotoMgiWVU?autoplay=1&si=IzP84P4t2AE12fVE');
        iframe.setAttribute('frameborder', '0');
        iframe.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share');
        iframe.setAttribute('allowfullscreen', 'true');
        iframe.classList.add('rounded-3xl');

        iframe.style.width = '100%';
        iframe.style.maxWidth = '560px';
        iframe.style.height = '200px';

        if (window.innerWidth >= 1024) {
            iframe.style.width = '560px';
            iframe.style.height = '315px';
        }

        this.parentNode.replaceChild(iframe, this);
    });
});

</script>



