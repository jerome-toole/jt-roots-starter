<div class="page-content">
  <?php the_content(); ?>
  <section class="writings post-loop">
  <?php
  $writingsargs = array (
    'category_name' => 'writings',
    'nopaging'      => true,
    'orderby'       => 'name',
    'order'         => 'ASC'
  );
  // The Query
  $writings = new WP_Query( $writingsargs );

  // The Loop
  while ($writings->have_posts()) : $writings->the_post();
    get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format());
    endwhile;?>
  </section>
</div>
<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
