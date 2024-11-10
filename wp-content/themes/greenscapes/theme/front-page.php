<?php
get_header(); ?>
<section id="hero"
  style="background-image: url('<?php echo (has_post_thumbnail()) ? get_the_post_thumbnail_url() : ''; ?>');">


  <div class="content">
    <h2>
      <?php
      if (get_field('banner_title')) {
        echo esc_html(get_field('banner_title'));
      }
      ?>
    </h2>
    <?php
    if (get_field('button_text')) {

      if (get_field('button_link')) {
        echo '<a href="' . esc_url(get_field('button_link')) . '" class="btn">' . esc_html(get_field('button_text')) . '</a>';
      }
    }
    ?>
  </div>
</section>

<?php get_template_part('template-parts/intro'); ?>

<section>
  <div class="container mx-auto">

    <div class="text-center max-md:mx-4">
      <?php
      $featured_services = get_field('featured_services');
      if ($featured_services): ?>
        <ul class="md:flex gap-6">
          <?php foreach ($featured_services as $post):
            setup_postdata($post);

            // Include the reusable template part.
            get_template_part('template-parts/services-item');

          endforeach;
          wp_reset_postdata(); ?>
        </ul>
      <?php endif; ?>


      <a class="btn mb-24 mx-auto inline-block" href="/services">More Services</a>

    </div>
  </div>
</section>


<?php get_footer(); ?>