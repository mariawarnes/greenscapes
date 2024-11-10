<li class="flex lg:flex-row flex-col w-full justify-between text-left my-6 bg-white overflow-hidden rounded-3xl">
  <div class="p-4 lg:p-6 max-lg:mb-4 lg:w-1/2 lg:h-auto">
    <div class="flex flex-row items-center mb-4 justify-left">
      <div id="icon" class="rounded-full bg-primary mr-4 p-4 text-xl">
        <?php echo (get_field('icon')) ? '<img src="' . get_field('icon') . '">' : ''; ?>
      </div>
      <h3 class="text-2xl font-bold"><?php the_title(); ?></h3>
    </div>

    <?php the_excerpt(); ?>

    <a class="btn self-start" href="<?php the_permalink(); ?>">Read more</a>
  </div>

  <div class="lg:w-1/2 lg:h-auto">
    <?php echo get_the_post_thumbnail(get_the_ID(), 'full', array('class' => 'max-lg:self-end object-cover')); ?>
  </div>
</li>