<?php

/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package greenscapes
 */

?>

<footer class="bg-primary w-full justify-center text-white">

  <div class="px-4 relative mx-auto w-full max-w-screen-2xl">
    <div class="flex w-full flex-wrap justify-between gap-6 py-6 max-md:flex-col">

      <div class="flex w-full flex-wrap justify-between gap-6 py-6 max-md:flex-col">
        <div class="flex flex-col items-start justify-start gap-6 xl:flex-1">
          <img class="max-w-[150px] md:max-w-[200px] block" src="/wp-content/themes/greenscapes/theme/logo-alpha.webp" alt="Logo" />
        </div>
        <!-- Footer Navigation -->
        <?php wp_nav_menu(array('theme_location' => 'nav', 'menu_id' => 'footer_nav', 'container' => false)); ?>
      </div>

    </div>

  </div>
  <div class="bg-secondary py-6 px-4 text-sm">
    <p>@ <?php echo date("Y"); ?>
      All Rights Reserved</p>
  </div>
</footer>