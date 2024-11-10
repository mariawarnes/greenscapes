<li class="flex text-center flex-col w-full justify-between mb-6 bg-white overflow-hidden rounded-3xl">
  <div class="mb-4">
    <p class="text-2xl font-serif font-bold py-2">Before</p>
    <?php echo (get_field('before')) ? '<img src="' . get_field('before') . '">' : ''; ?>

    <p class="text-2xl font-serif font-bold py-2">After</p>
    <?php echo (get_field('after')) ? '<img src="' . get_field('after') . '">' : ''; ?>

  </div>

  <div class="p-4 lg:p-6">
    <?php the_excerpt(); ?>
    <a class="btn self-start" href="<?php the_permalink(); ?>">About <?php the_title(); ?></a>

  </div>
</li>