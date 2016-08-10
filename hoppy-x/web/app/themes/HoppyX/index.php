<?php get_template_part('templates/page', 'header'); ?>


<?php if (!have_posts()) : ?>
  <?php dynamic_sidebar('sidebar-search'); ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
<?php endif; ?>

<section class="post-loop">
  <?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
  <?php endwhile; ?>
</section>

<?php the_posts_navigation(); ?>
