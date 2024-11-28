<?php get_template_part('template-parts/page-hero'); ?>

<?php get_template_part('template-parts/intro'); ?>

<section>
  <div class="container mx-auto">

    <div class="text-center mx-4 mb-12">
      <ul class="columns-1 sm:columns-2 gap-6">

        <?php $query = new WP_Query(array(
          'post_type'       => 'work',
          'posts_per_page'  => -1
        ));

        while ($query->have_posts()) {
          $query->the_post();
          setup_postdata($post);

          // Include the reusable template part.
          get_template_part('template-parts/work-item');
        }; ?>
      </ul>
      <?php
      // Reset the global post object so that the rest of the page works correctly.
      wp_reset_postdata(); ?>

    </div>
  </div>
</section>


<?php get_footer(); ?>