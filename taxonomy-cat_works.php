<?php get_header(); ?>

<!--
======================================
	04*Contents
======================================
-->

<div class="sub-works">
  <div class="sub-works__category category inner">
    <ul class="category__list">
      <?php
      $term = get_queried_object();
      $term_slug = $term->slug;
      $term_name = $term->name;
      ?>
      <li class="category__item"><a href="<?php echo esc_url(home_url('/works/')); ?>">ALL</a></li>
      <?php
      $terms = get_terms('cat_works');
      foreach ($terms as $term) :
      ?>
        <li class="category__item 
          <?php if ($term_slug === $term->slug) {
            echo '--active';
          } ?>"><a href="<?php echo esc_url(get_term_link($term->term_id)); ?>">
            <?php echo $term->name; ?>
          </a>
        <?php endforeach; ?>
        </li>
    </ul>
  </div>
  <div class="sub-works__inner inner--pc">
    <div class="sub-works__itembox cards2">
      <div class="cards2__items inner">

        <?php
        if (have_posts()) :
          while (have_posts()) : the_post(); ?>

            <a href="<?php the_permalink(); ?>" class="sub-works__card card2">
              <div class="card2__box">
                <?php if (has_post_thumbnail()) : ?>
                  <!-- アイキャッチ画像指定されている場合 -->
                  <figure class="card2__img"><?php the_post_thumbnail(); ?></figure>
                <?php else : ?>
                  <!-- /アイキャッチ画像指定されていない場合に代替画像を表示 -->
                  <figure class="card2__img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/dummy.jpg"></figure>
                <?php endif; ?>
                <span class="card2__category"><?php echo get_the_terms($post->ID, 'cat_works')[0]->name; ?></span>
              </div>
              <h3 class="card2__title"><?php the_title(); ?></h3>

            </a>
        <?php endwhile;
        endif;
        ?>

      </div>
    </div>


    <!-- ページネーション(数字あり) -->
    <div class="sub-works__pagenavi wp-pagenavi">
      <div class="wp-pagenavi__inner">
        <?php
        global $wp_query;
        $big = 999999999; // need an unlikely integer
        $translated = __('Page', 'mytextdomain'); // Supply translatable string
        echo paginate_links(array(
          'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
          'format' => '?paged=%#%',
          'current' => max(1, get_query_var('paged')),
          'total' => $wp_query->max_num_pages,
          'before_page_number' => '<span class="screen-reader-text">' . $translated . ' </span>',
          'prev_text' => 'PREV',
          'next_text' => 'NEXT',
          'mid_size' => '1',
          'end_size' => '3',
        ));
        ?>
      </div>
    </div>

  </div>
</div>

<?php get_footer(); ?>