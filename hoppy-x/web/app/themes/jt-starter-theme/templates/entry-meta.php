<?php

if( get_field('post_author') ) {
  $author = get_field('post_author');
} else {
  $author = get_the_author();
}
?>

<p class="entry-meta">

  <?php if (get_field('timeline_date')) : ?>
    <time class="updated"><?= the_field('timeline_date') ?></time>
  <?php else : ?>
    <time class="updated" datetime="<?= get_post_time('c', true); ?>"><?= get_the_date(); ?></time>
  <?php endif; ?>

  <?php if (in_category(4)) : ?>
    <span class="entry-meta__divider">by </span><span class="byline author vcard"><?php echo $author ?></span>
  <?php else : ?>

  <?php endif; ?>
</p>
