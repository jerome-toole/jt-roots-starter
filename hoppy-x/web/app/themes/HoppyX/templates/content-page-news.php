<div class="page-content">
  <?php the_content(); ?>
  <section class="news post-loop">
  <?php
  $newsargs = array (
    'category_name' => 'news',
    'nopaging'      => true,
    'orderby'       => 'name',
    'order'         => 'ASC'
  );
  // The Query
  $news = new WP_Query( $newsargs );

  // The Loop
  while ($news->have_posts()) : $news->the_post();
    get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format());
    endwhile;?>
  </section>
</div>
<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
