<?php
/**
 * Theme footer template.
 *
 * @package TailPress
 */
?>
        </main>

        <?php do_action('tailpress_content_end'); ?>
    </div>

    <?php do_action('tailpress_content_after'); ?>

    <footer id="colophon" class="bg-light/50 mt-12 bg-backround" role="contentinfo">
        <div><img src="/wp-content/uploads/2025/06/logo.webp" alt="Logo BrightMinds" class="w-[150px]"></div>
        <hr>
        <div></div>
    </footer>
</div>

<?php wp_footer(); ?>
</body>
</html>
