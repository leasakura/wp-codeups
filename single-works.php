<?php get_header(); ?>

<!--
======================================
	04*Contents
======================================
-->

<section class="works-article">
  <div class="works-article__inner inner">
    <h2 class="works-article__title"><?php the_title(); ?></h2>
    <div class="works-article__meta">
      <span>
        <?php the_time('Y/m/d'); ?>
      </span>
      <?php
      $terms = get_the_terms($post->ID, 'cat_works');
      foreach ($terms as $term) {
        echo '<span class="works-article__term"><a href="' . get_term_link($term->slug, 'cat_works') . '">' . $term->name . '</a></span>';
      }
      ?>
    </div>

    <div class="works-article__slide-box">
      <!-- スライダーのメインコンテナの div 要素（必須） -->
      <div class="works-article__slide swiper js-works2-swiper">
        <!-- スライドを囲む div 要素（必須） -->
        <div class="swiper-wrapper">
          <!-- それぞれのスライドの div 要素（必須） -->
          <?php
          for ($i = 1; $i <= 5; $i++) {
            $field_name = 'works' . $i;
            $image = get_field($field_name);
            if (!empty($image)) :
              $url = $image['url']; // 画像のURL
              $alt = $image['alt']; // 画像のalt
              $size = 'large'; // 出力サイズを変数に格納
              $thumb = $image['sizes'][$size]; // サムネイル画像のURL
              $width = $image['sizes'][$size . '-width']; // サムネイル画像のサイズ
          ?>

              <div class="swiper-slide">
                <img src="<?php echo $thumb; ?>" width="<?php echo $width; ?>" alt="<?php echo $alt; ?>" />
              </div>

            <?php endif; ?>
          <?php } ?>

        </div>

        <!-- ナビゲーションボタンの div 要素（省略可能） -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

      </div>

      <!-- サムネイル -->
      <div class="works-article__slide-thumbnail swiper js-works2-swiper-thumbnail">
        <div class="swiper-wrapper">
          <?php
          for ($i = 1; $i <= 5; $i++) {
            $field_name = 'works' . $i;
            $image = get_field($field_name);
            if (!empty($image)) :
              $url = $image['url']; // 画像のURL
              $alt = $image['alt']; // 画像のalt
              $size = 'thumbnail'; // 出力サイズを変数に格納
              $thumb = $image['sizes'][$size]; // サムネイル画像のURL
              $width = $image['sizes'][$size . '-width']; // サムネイル画像のサイズ
          ?>
              <div class="swiper-slide">
                <img src="<?php echo $thumb; ?>" width="<?php echo $width; ?>" alt="<?php echo $alt; ?>" />
              </div>
            <?php endif; ?>
          <?php } ?>
        </div>

      </div>

      <div class="works-article__body">
        <dl class="works-article__text-box">
          <?php $label = get_field('explanation'); ?>
          <dt><?php echo get_field_object('explanation')['label']; ?></dt>
          <dd><?php the_field('explanation'); ?></dd>
        </dl>
        <dl class="works-article__text-box">
          <?php $label = get_field('point'); ?>
          <dt><?php echo get_field_object('point')['label']; ?></dt>
          <dd><?php the_field('point'); ?></dd>
        </dl>
      </div>

    </div>
    <!-- ページネーション -->
    <div class="works-article__pagenavi wp-pagenavi">
      <div class="wp-pagenavi__inner">
        <?php $nextpost = get_adjacent_post(false, '', false);
        if ($nextpost) : ?>
          <span class="prev page-numbers"><?php next_post_link('%link', 'PREV'); ?></span>
        <?php endif; ?>
        <a href="<?php echo esc_url(home_url('/works/')); ?>" class="page-numbers">一覧</a>
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
      $term = get_the_terms($post->ID, 'cat_works'); //←ここが追加
      $args = array(
        'numberposts' => 4,
        'post_type' => 'works', //カスタム投稿タイプ名
        'taxonomy' => 'cat_works', //タクソノミー名
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
              <p class="card__category"><?php echo get_the_terms($post->ID, 'cat_works')[0]->name; ?></p>
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