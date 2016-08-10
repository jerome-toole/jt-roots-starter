<?php get_template_part('templates/page', 'header'); ?>
<div class="page-content">
  <section class="search-gallery gallery">
  <?php dynamic_sidebar('sidebar-search'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
<?php endif; ?>
<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/content', 'search'); ?>

<?php endwhile; ?>

<?php the_posts_navigation(); ?>

  </section>
</div>
