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

<footer class="container mx-auto py-8 text-black text-center lg:text-left">
  
  <div class="flex flex-col md:flex-row items-center md:items-end md:justify-start space-y-4 md:space-y-0 md:space-x-4">
   
    <img src="/wp-content/uploads/2025/07/logo.webp" alt="Bright Minds Logo" class="w-48 h-auto">
    
  
    <div>
      <h2 class="font-medium uppercase" style="font-size: 24px; line-height: 1.5;">Bright Minds.</h2>
      <h2 class="font-medium uppercase" style="font-size: 24px; line-height: 1.5;">A escola do futuro.</h2>
      <p>Email: suporte@escolabrightminds.com.br</p>
    </div>
  </div>

  <hr class="my-4">

  <div>
    <a href="/termos" class="no-underline! text-black hover:underline!">
      Política de privacidade
    </a>
  </div>


</footer>

</div>

<?php wp_footer(); ?>
</body>
</html>
