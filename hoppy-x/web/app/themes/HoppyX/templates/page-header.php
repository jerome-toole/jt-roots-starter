<?php use Roots\Sage\Titles; ?>

<header>
  <h1 class="page-title"><?= Titles\title(); ?></h1>
  <?php if ( has_post_thumbnail() ) {
    if ( !is_woocommerce() ) {
      get_template_part('templates/scroll-image');
    }
  }
  if ( get_field('page-quote') ) { ?>
  <aside class="page-quote"><?php the_field('page_quote')?></aside>
  <?php } ?>
</header>
