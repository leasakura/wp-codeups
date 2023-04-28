<?php get_header(); ?>

<!--
======================================
	04*Contents
======================================
-->

<div class="news-article">
  <div class="inner">
    <h2 class="news-article__title"><?php the_title(); ?></h2>
    <p class="news-article__text"><?php the_content(); ?></p>

    <!-- ページネーション -->
    <div class="news-article__pagenavi wp-pagenavi">
      <div class="wp-pagenavi__inner">
        <?php $nextpost = get_adjacent_post(false, '', false);
        if ($nextpost) : ?>
          <span class="prev page-numbers"><?php next_post_link('%link', 'PREV'); ?></span>
        <?php endif; ?>
        <a href="<?php echo esc_url(home_url('/news/')); ?>" class="page-numbers">一覧</a>
        <?php $prevpost = get_adjacent_post(false, '', true);
        if ($prevpost) : ?>
          <span class="next page-numbers"><?php previous_post_link('%link', 'NEXT'); ?></span>
        <?php endif; ?>
      </div>
    </div>

  </div>
</div>

<?php get_footer(); ?>