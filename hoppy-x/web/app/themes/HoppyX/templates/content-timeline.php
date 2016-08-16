<article <?php post_class(); ?>>
    <?php if( has_excerpt() ){ ?>
      <a href="<?php the_permalink(); ?>">
    <?php } ?>
    <header>
        <?php if ( has_post_thumbnail() ) { ?>
        <div class="entry-image">
          <?php the_post_thumbnail('large'); ?>
        </div>
        <?php } ?>
      <div class="entry-text">
        <h2 class="entry-title"><?php the_title(); ?></h2>
        <?php get_template_part('templates/entry-meta'); ?>
        <div class="entry-summary">
        <?php the_excerpt(); ?>
        </div>
        <?php if( has_excerpt() ){ ?>
          <a class="read-more" href="<?php the_permalink(); ?>">Read more<span></span></a>
        <?php } ?>
      </div>
    </header>
    <?php if( has_excerpt() ){ ?>
      </a>
    <?php } ?>
</article>

