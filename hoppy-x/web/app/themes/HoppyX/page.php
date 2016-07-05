<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php if ( 13 == $post->post_parent ) {
    get_template_part('templates/content', 'gallery');
  } else {
    get_template_part('templates/content', 'page');
  } ?>
<?php endwhile; ?>
