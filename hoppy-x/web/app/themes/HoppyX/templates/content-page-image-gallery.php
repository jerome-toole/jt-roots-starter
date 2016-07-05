<div class="page-content">
  <?php the_content(); ?>
  <section class="image-gallery post-loop">
  <?php
    $args = array(
        'post_type'      => 'page',
        'posts_per_page' => -1,
        'post_parent'    => $post->ID,
        'order'          => 'ASC',
        'orderby'        => 'menu_order'
     );


    $parent = new WP_Query( $args );

    if ( $parent->have_posts() ) : ?>

        <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>

          <article <?php post_class(); ?>>
            <a href="<?php the_permalink(); ?>">
              <div class="entry-image">
                <?php if ( has_post_thumbnail() ) { the_post_thumbnail('thumbnail');} ?>
                <div class="entry-image__overlay"></div>
                <h2 class="entry-title"><?php the_title(); ?></h2>
              </div>
            </a>
          </article>

        <?php endwhile; ?>

    <?php endif; wp_reset_query(); ?>

  </section>
</div>
<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
