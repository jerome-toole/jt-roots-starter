<div class="page-content">
  <section class='gallery' >

<?php
  $gallery_cat = get_field('gallery_category');

  $args = array(
    'post_type' => 'attachment',
    'post_mime_type' => 'image',
    'orderby' => 'post_date',
    'order' => 'desc',
    'posts_per_page' => '30',
    'post_status'    => 'inherit',
    'tax_query' => array(
        array(
            'taxonomy' => 'attachment_category', //or tag or custom taxonomy
            'field' => 'slug',
            'terms' => $gallery_cat,
        ),
    ),
  );

  $loop = new WP_Query( $args );

  while ( $loop->have_posts() ) : $loop->the_post();

    $image_id = get_the_ID();
    $image_full = wp_get_attachment_image_src( $image_id, 'gallery_image' );
    $image_thumb = wp_get_attachment_image_src( $image_id, 'gallery_square' );
    $terms = get_the_terms( $image_id, 'attachment_tag');
    $caption = get_the_excerpt();
    $keywords = '';

    if ( $terms && ! is_wp_error( $terms ) ) :
      $att_tags = array();
      foreach ( $terms as $term ) {
        $att_tags[] = $term->slug;
      }
      $keywords = join( " ", $att_tags );
    endif; ?>

    <a href="<?php the_permalink(); ?>" class="lightbox-item" data-title="<?php the_title() ?>" data-caption="<?php echo $caption ?>" data-image="<?php echo $image_full[0]; ?>" <?php echo $keywords ? 'data-keywords="'.esc_html( $keywords ).'"': null; ?>">
      <figure class='gallery-item' >
        <img alt="<?php echo $caption ?>" src="<?php echo $image_thumb[0]; ?>"/>
      </figure>
      <aside class="gallery-item__keywords"><?php echo get_the_term_list($image_id, 'attachment_tag') ?></aside>
    </a>

  <?php endwhile; ?>

  </section>

  <?php
  // Restore original Post Data
  wp_reset_postdata();
  ?>
<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
