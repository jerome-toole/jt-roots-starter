<div class="page-content">
  <?php the_content(); ?>
</div>
<div class="about-hoppy-timeline">
  <section class="timeline about-hoppy post-loop" id="timeline">
  <?php
  $timelineargs = array (
    'category_name' => 'timeline',
    'nopaging'      => true,
    'meta_key'      => 'timeline_order',
    'orderby'       => 'meta_value_num',
    'order'         => 'DESC'
  );
  // The Query
  $timeline = new WP_Query( $timelineargs );

  // The Loop
  while ($timeline->have_posts()) : $timeline->the_post();
    get_template_part('templates/content', 'timeline');
    endwhile;?>
  </section>
</div>
<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
