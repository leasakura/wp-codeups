<?php get_header(); ?>

<!--
======================================
	02*Mv
======================================
-->

<div class="mv">
  <!-- スライダーのメインコンテナの div 要素（必須） -->
  <div class="mv__swiper swiper js-mv-swiper">
    <!-- スライドを囲む div 要素（必須） -->
    <div class="swiper-wrapper">
      <!-- それぞれのスライドの div 要素（必須） -->
      <?php
      for ($i = 1; $i <= 3; $i++) {
        $field_name = 'mv' . $i;
        $image = get_field($field_name);
        if (!empty($image)) :
          $url = $image['url']; // 画像のURL
          $alt = $image['alt']; // 画像のalt
      ?>

          <div class="swiper-slide">
            <div class="mv__slide-img">
              <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" />
            </div>
          </div>

        <?php endif; ?>
      <?php } ?>

      <div class="mv__text">
        <h2 class="mv__title">CodeUps</h2>
        <p class="mv__subtitle">未来をつくるテクノロジー</p>
      </div>

    </div>

  </div>
</div>

<!--
======================================
	03*News
======================================
-->

<div class="news top__news">
  <div class="inner">
    <div class="news__wrapper">

      <?php
      $num = 1; // PCの表示数(全件は-1)
      $args = [
        'post_type' => 'post', // 投稿タイプのスラッグ(通常投稿は'post')
        'posts_per_page' => $num, // 表示件数
      ];
      $the_query = new WP_Query($args);
      if ($the_query->have_posts()) :
        while ($the_query->have_posts()) : $the_query->the_post();
      ?>

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
          <div class="news__btn">
            <div class="button button--news">
              <a href="<?php the_permalink(); ?>">すべて見る</a>
            </div>
          </div>

        <?php endwhile;
      else : ?>
        <p>まだ記事がありません</p>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>
      <!-- 記事のループ処理終了 -->

    </div>
  </div>
</div>

<!--
======================================
	04*Content
======================================
-->

<section class="content top__content">
  <div class="content__inner">
    <div class="content__title section-header">
      <h2 class="section-header__title">事業内容</h2>
      <p class="section-header__subtitle">Content</p>
    </div>
    <ul class="content__items">
      <li class="content__item">
        <a href="<?php echo esc_url(home_url('/')); ?>/content#management">
          <picture>
            <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/img_content01_pc.jpg" media="(min-width: 768px)">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_content01_sp.jpg" alt="">
          </picture>
          <p>経営理念ページへ</p>
        </a>
      </li>
      <li class="content__item">
        <a href="<?php echo esc_url(home_url('/')); ?>/content#philosophy1">
          <picture>
            <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/img_content02_pc.jpg" media="(min-width: 768px)">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_content02_sp.jpg" alt="">
          </picture>
          <p>顧客第一主義</p>
        </a>
      </li>
      <li class="content__item">
        <a href="<?php echo esc_url(home_url('/')); ?>/content#philosophy2">
          <picture>
            <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/img_content03_pc.jpg" media="(min-width: 768px)">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_content03_sp.jpg" alt="">
          </picture>
          <p>社員の幸福追求</p>
        </a>
      </li>
      <li class="content__item">
        <a href="<?php echo esc_url(home_url('/')); ?>/content#philosophy3">
          <picture>
            <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/img_content04_pc.jpg" media="(min-width: 768px)">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_content04_sp.jpg" alt="">
          </picture>
          <p>イノベーションの追求</p>
        </a>
      </li>
    </ul>
  </div>
</section>

<!--
======================================
	05*Works
======================================
-->

<section class="works top__works">
  <div class="works__title section-header">
    <h2 class="section-header__title">制作実績</h2>
    <p class="section-header__subtitle section-header__subtitle--right">Works</p>
  </div>
  <div class="works__inner">
    <div class="works__itembox inner--pc">
      <div class="works__imgbox">
        <div class="works__img swiper js-works-swiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="works__slide-img">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_works01_tmunb.jpg" alt="実績1">
              </div>
            </div>
            <div class="swiper-slide">
              <div class="works__slide-img">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_works02_tmunb.jpg" alt="実績2">
              </div>
            </div>
            <div class="swiper-slide">
              <div class="works__slide-img">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_works03_tmunb.jpg" alt="実績3">
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
      <div class="works__textbox section-textbox">
        <h3 class="section-textbox__title">最新プロジェクト</h3>
        <p class="section-textbox__text">
          <span class="inner">
            当社では、これまでに数多くのプロジェクトに取り組んできました。その中でも特に優れた成果を残した実績をご紹介いたします。お客様のビジネスに貢献するため、最適なソリューションを提供してまいります。
          </span>
        </p>
        <button class="works__btn button" onclick="location.href='<?php echo esc_url(home_url('/works/')); ?>'">
          <span>詳しく見る</span>
        </button>
      </div>
    </div>
  </div>
</section>

<!--
======================================
	06*Overview
======================================
-->

<section class="overview top__overview">
  <div class="overview__title section-header">
    <h2 class="section-header__title">企業概要</h2>
    <p class="section-header__subtitle">Overview</p>
  </div>
  <div class="overview__inner">
    <div class="overview__itembox inner--pc">
      <div class="overview__img">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_overview.jpg" alt="">
      </div>
      <div class="overview__textbox section-textbox">
        <h3 class="section-textbox__title">株式会社CodeUpsについて</h3>
        <p class="section-textbox__text">
          <span class="inner">
            当社はIT分野で幅広い事業を展開しており、お客様に価値あるサービスを提供することを目指しています。私たちは技術に強みを持ち、お客様と共に成長していくことを大切にしています。
          </span>
        </p>
        <button class="overview__btn button" onclick="location.href='<?php echo esc_url(home_url('/overview/')); ?>'">
          <span>詳しく見る</span>
        </button>
      </div>
    </div>
  </div>
</section>


<!--
======================================
	07*Blog
======================================
-->

<section class="blog top__blog">
  <div class="blog__title section-header">
    <h2 class="section-header__title">ブログ</h2>
    <p class="section-header__subtitle section-header__subtitle--right">Blog</p>
  </div>
  <div class="blog__inner inner">
    <div class="blog__itembox cards">
      <div class="cards__items inner">
        <?php
        $num = 3;
        // 投稿タイプのみ指定する場合
        $args = [
          'post_type' => 'blog', // 投稿タイプのスラッグ
          'posts_per_page' => $num, // 表示件数（変更不要）
        ];
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) :
          while ($the_query->have_posts()) : $the_query->the_post();
        ?>
            <a href="<?php the_permalink(); ?>" class="blog__card card">
              <figure class="card__img">
                <?php the_post_thumbnail('post-thumbnail', array('alt' => the_title_attribute('echo=0'))); ?>
              </figure>
              <div class="card__textbox">
                <h3 class="card__title"><?php the_title(); ?></h3>
                <p class="card__text"><?php echo mb_substr(get_the_excerpt(), 0, 40); ?></p>
              </div>
              <div class="card__footer">
                <p class="card__category">
                  <?php
                  $taxonomy_terms = get_the_terms($post->ID, 'cat_blog');
                  foreach ($taxonomy_terms as $taxonomy_term) {
                    echo '<span class="' . $taxonomy_term->slug . '">' . $taxonomy_term->name . '</span>';
                  }
                  ?>
                </p>
                <time datetime="<?php the_time('Y.n.j'); ?>" class="card__date">
                  <?php the_time('Y.m.d'); ?>
                </time>
              </div>
            </a>

          <?php endwhile;
        else : ?>
          <p>まだ記事がありません</p>
        <?php endif; ?>

      </div>
    </div>
    <button class="blog__btn button button--blog" onclick="location.href='<?php echo esc_url(home_url('/blog/')); ?>'">
      <span>詳しく見る</span>
    </button>
  </div>
</section>

<?php get_footer(); ?>