<li>
    <img class="aspect-[3/2] w-full rounded-2xl object-cover" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
    <h3 class="mt-6 text-lg font-semibold leading-8 text-gray-900"><?php the_title(); ?></h3>
    <p class="mt-4 text-base leading-7 text-gray-600"><?php echo get_the_excerpt(); ?></p>
</li>
