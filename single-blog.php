<?php get_header(); ?>

<!--
======================================
	04*Contents
======================================
-->

<section class="blog-article">
  <div class="inner">
    <h2 class="blog-article__title"><?php the_title(); ?></h2>
    <div class="blog-article__meta">
      <span>
        <?php the_time('Y/m/d'); ?>
      </span>
      <?php
      $terms = get_the_terms($post->ID, 'cat_blog');
      foreach ($terms as $term) {
        echo '<span class="blog-article__term"><a href="' . get_term_link($term->slug, 'cat_blog') . '">' . $term->name . '</a></span>';
      }
      ?>
    </div>
    <div class="blog-article__body">
      <p><?php the_content(); ?></p>
    </div>

    <!-- ページネーション -->
    <div class="blog-article__pagenavi wp-pagenavi">
      <div class="wp-pagenavi__inner">
        <?php $nextpost = get_adjacent_post(false, '', false);
        if ($nextpost) : ?>
          <span class="prev page-numbers"><?php next_post_link('%link', 'PREV'); ?></span>
        <?php endif; ?>
        <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="page-numbers">一覧</a>
        <?php $prevpost = get_adjacent_post(false, '', true);
        if ($prevpost) : ?>
          <span class="next page-numbers"><?php previous_post_link('%link', 'NEXT'); ?></span>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>


<!--
======================================
	05*関連記事
======================================
-->

<section class="relation">
  <div class="inner">
    <h3 class="relation-title">関連記事</h3>
    <div class="cards cards--relation">
      <?php
      global $post;
      $term = get_the_terms($post->ID, 'cat_blog'); //←ここが追加
      $args = array(
        'numberposts' => 4,
        'post_type' => 'blog', //カスタム投稿タイプ名
        'taxonomy' => 'cat_blog', //タクソノミー名
        'term' => $term->slug, //ターム名 ←ここが追加
        'orderby' => 'rand', //ランダム表示
        'post__not_in' => array($post->ID) //表示中の記事を除外
      );
      ?>
      <?php $myPosts = get_posts($args);
      if ($myPosts) : ?>
        <?php foreach ($myPosts as $post) : setup_postdata($post); ?>

          <a href="<?php the_permalink(); ?>" class="card card--relation">
            <?php if (has_post_thumbnail()) : ?>
              <!-- アイキャッチ画像指定されている場合 -->
              <figure class="card__img"><?php the_post_thumbnail(); ?></figure>
            <?php else : ?>
              <!-- /アイキャッチ画像指定されていない場合に代替画像を表示 -->
              <figure class="card__img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/dummy.jpg"></figure>
            <?php endif; ?>
            <div class="card__textbox">
              <h3 class="card__title"><?php the_title(); ?></h3>
            </div>
            <div class="card__footer">
              <p class="card__category"><?php echo get_the_terms($post->ID, 'cat_blog')[0]->name; ?></p>
              <span class="card__date"><?php the_time('Y.m.d'); ?></span>
            </div>
          </a>
        <?php endforeach; ?>
      <?php else : ?>
        <p>関連アイテムはまだありません。</p>
      <?php endif;
      wp_reset_postdata(); ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>