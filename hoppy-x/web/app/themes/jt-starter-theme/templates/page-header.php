<?php use Roots\Sage\Titles; ?>

<header>
  <h1 class="page-title"><?= Titles\title(); ?></h1>
  <?php if ( has_post_thumbnail() ) { ?>
    <div class="entry-image">
       <?php the_post_thumbnail('large'); ?>
    </div>
  <?php }
  if ( get_field('page_quote') ) { ?>
  <aside class="page-quote"><?php the_field('page_quote')?></aside>
  <?php } ?>
</header>
