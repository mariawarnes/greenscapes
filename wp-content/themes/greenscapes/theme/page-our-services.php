<?php
get_header(); ?>
<section id="hero"
  style="background-image: url('<?php echo (has_post_thumbnail()) ? get_the_post_thumbnail_url() : ''; ?>');">


  <div class="content">
    <h2>
      <?php
      if (get_the_title()) {
        echo get_the_title();
      }
      ?>
    </h2>
  </div>
</section>

<section id="intro" class="py-6 text-center text-xl">
  <div class="container mx-auto">
    <?php
    if (get_the_content()) {
      the_content();
    }
    ?>
  </div>
</section>

<section>
  <div class="container mx-auto">

    <div class="text-center max-md:mx-4">
      <?php
      $featured_services = get_field('featured_services');
      if ($featured_services): ?>
        <ul class="md:flex gap-6">
          <?php foreach ($featured_services as $post):

            // Setup this post for WP functions (variable must be named $post).
            setup_postdata($post); ?>
            <li class="flex w-full justify-between text-left my-6 bg-white overflow-hidden rounded-3xl flex-col">
              <div class="p-4 max-md:mb-4">

                <div class="flex flex-row items-center mb-4 justify-left">
                  <div id="icon" class="rounded-full bg-primary mr-4 p-4 text-xl">
                    <?php echo (get_field('icon')) ? '<img src="' . get_field('icon') . '">' : ''; ?>
                  </div>
                  <h3 class="text-2xl font-bold"><?php the_title(); ?></h3>
                </div>

                <?php the_excerpt(); ?>


                <a class="btn self-start" href="<?php the_permalink(); ?>">Read more</a>
              </div>


              <?php echo get_the_post_thumbnail($post_id, 'full', array('class' => 'self-end')); ?>
            </li>
          <?php endforeach; ?>
        </ul>
        <?php
        // Reset the global post object so that the rest of the page works correctly.
        wp_reset_postdata(); ?>
      <?php endif; ?>

      <a class="btn mb-6 mx-auto inline-block" href="/services">More Services</a>

    </div>
  </div>
</section>


<?php get_footer(); ?>