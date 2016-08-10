<?php
$image_id = get_the_ID();
$image_full = wp_get_attachment_image_src( $image_id, 'gallery_image' );
$image_thumb = wp_get_attachment_image_src( $image_id, 'gallery_square' );
$terms = get_the_term_list( $image_id, 'attachment_tag');
$caption = get_the_excerpt();
$keywords = '';
?>

  <article class="search-result-image gallery-item">
    <a href="<?php the_permalink(); ?>" class="lightbox-item" data-title="<?php the_title() ?>" data-caption="<?php echo $caption ?>" data-image="<?php echo $image_full[0]; ?>" <?php echo $keywords ? 'data-keywords="'.esc_html( $keywords ).'"': null; ?>">
      <figure>
          <img alt="<?php echo $caption ?>" src="<?php echo $image_thumb[0]; ?>"/>
      </figure>
    </a>
    <div class="search-result-image__meta">
      <h1 class="title"><?php the_title() ?></h1>
      <span class="caption"><?php echo $caption ?></span>

      <div class="search-result-image__keywords">
        <a href target="_blank" class="reveal-button">Keywords</a>
        <aside class="reveal keywords"><?php echo $terms ?></aside>
      </div>
    </div>
  </article>
