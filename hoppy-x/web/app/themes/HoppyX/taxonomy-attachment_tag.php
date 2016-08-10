<?php get_template_part('templates/page', 'header'); ?>
<div class="page-content">

<?php if ( have_posts() ) : ?>

        <section class="gallery search-gallery post-loop">
          <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('templates/content', 'search'); ?>
          <?php endwhile; ?>
        </section>

<?php else : ?>

  <?php dynamic_sidebar('sidebar-search'); ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>

<?php endif; ?>

<?php the_posts_navigation(); ?>
</div>
