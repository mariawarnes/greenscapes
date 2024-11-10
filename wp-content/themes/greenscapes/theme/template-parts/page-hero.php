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