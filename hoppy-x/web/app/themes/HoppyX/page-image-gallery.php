<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php dynamic_sidebar('sidebar-search'); ?>
  <?php get_template_part('templates/content', 'page-image-gallery'); ?>
<?php endwhile; ?>
