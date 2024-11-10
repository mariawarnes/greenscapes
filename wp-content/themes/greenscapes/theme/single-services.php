<?php get_template_part('template-parts/page-hero'); ?>

<?php get_template_part('template-parts/intro'); ?>

<section>
  <div class="container mx-auto">

    <div class="text-center max-md:mx-4">
      <ul class="columns-2 gap-6 mb-12">

        <?php $query = new WP_Query(array(
          'post_type'      => 'work',
          'posts_per_page' => -1,
          'meta_query'     => array(
            array(
              'key'     => 'featured_services',
              'value'   => '"' . get_the_ID() . '"',
              'compare' => 'LIKE'
            )
          )
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

      <p>Like what you see?</p>
      <a class="btn mx-auto inline-block mb-12" href="/get-a-quote">Get a quote</a>

    </div>
  </div>
</section>

<?php get_footer(); ?>