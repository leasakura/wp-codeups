<?php get_header(); ?>

<!--
======================================
	04*Contents
======================================
-->

<div class="sub-news">
  <div class="sub-news__inner inner">
    <?php
    $num = 5; // PCの表示数(全件は-1)
    $args = [
      'post_type' => 'post', // 投稿タイプのスラッグ(通常投稿は'post')
      'posts_per_page' => $num, // 表示件数
      'paged' => get_query_var('paged'), //ページネーション2P目以降を表示させるために追加
    ];
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) :
      while ($the_query->have_posts()) : $the_query->the_post();
    ?>
        <div class="sub-news__item">
          <div class="news__header">
            <!-- 投稿日 -->
            <span class="news__date">
              <time datetime="<?php the_time('Y.n.j'); ?>">
                <?php the_time('Y.m.d'); ?>
              </time>
            </span>
            <!-- カテゴリー1件表示(カテゴリー順の上にある方が表示される) -->
            <span class="news__tag">
              <?php
              $category = get_the_category();
              echo '<span class="' . $category->slug . '">' . $category[0]->name . '</span>';
              ?>
            </span>
          </div>
          <a href="<?php the_permalink(); ?>" class="news__text"><?php the_title(); ?></a>
        </div>
      <?php endwhile;
    else : ?>
      <p>まだ記事がありません</p>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
    <!-- 記事のループ処理終了 -->

  </div>
</div>


<!-- ページネーション(数字あり) -->
<div class="sub-news__pagenavi wp-pagenavi">
  <div class="wp-pagenavi__inner">
    <?php
    the_posts_pagination(array(
      'mid_size' => 1,
      'prev_text' => 'PREV',
      'next_text' => 'NEXT',
    ));
    ?>
  </div>
</div>

<?php get_footer(); ?>