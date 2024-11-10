<section id="intro" class="py-6 text-center max-w-prose mx-auto text-xl">
  <div class="container mx-auto">
    <?php
    if (get_the_content()) {
      the_content();
    }
    ?>
  </div>
</section>