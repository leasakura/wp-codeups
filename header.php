<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- テストアップ用 -->
  <meta name="robots" content="noindex,nofollow" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <!--
======================================
	01*header
======================================
-->
  <header class="header js-header">
    <div class="header__inner">
      <h1 class="header__logo"><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_theme_file_uri('/assets/images/logo.png'); ?>" alt="CodeUps"></a></h1>
      <button class="header__hamburger js-hamburger u-mobile" id="">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <nav class="header__nav header-nav js-drawer">
        <ul class="header-nav__items">
          <li class="header-nav__item"><a href="<?php echo esc_url(home_url('/')); ?>">トップ</a></li>
          <li class="header-nav__item"><a href="<?php echo esc_url(home_url('/news/')); ?>">お知らせ</a></li>
          <li class="header-nav__item"><a href="<?php echo esc_url(home_url('/content/')); ?>">事業内容</a></li>
          <li class="header-nav__item"><a href="<?php echo esc_url(home_url('/works/')); ?>">制作実績</a></li>
          <li class="header-nav__item"><a href="<?php echo esc_url(home_url('/overview/')); ?>">企業概要</a></li>
          <li class="header-nav__item"><a href="<?php echo esc_url(home_url('/blog/')); ?>">ブログ</a></li>
          <li class="header-nav__item"><a href="<?php echo esc_url(home_url('/contact/')); ?>">お問い合わせ</a></li>
        </ul><!-- /.header-nav__items -->
      </nav><!-- /.header__nav -->
      <nav class="header__nav header-pcnav u-desktop">
        <ul class="header-pcnav__items">
          <li class="header-pcnav__item"><a href="<?php echo esc_url(home_url('/')); ?>">トップ</a></li>
          <li class="header-pcnav__item"><a href="<?php echo esc_url(home_url('/news/')); ?>">お知らせ</a></li>
          <li class="header-pcnav__item"><a href="<?php echo esc_url(home_url('/content/')); ?>">事業内容</a></li>
          <li class="header-pcnav__item"><a href="<?php echo esc_url(home_url('/works/')); ?>">制作実績</a></li>
          <li class="header-pcnav__item"><a href="<?php echo esc_url(home_url('/overview/')); ?>">企業概要</a></li>
          <li class="header-pcnav__item"><a href="<?php echo esc_url(home_url('/blog/')); ?>">ブログ</a></li>
          <li class="header-pcnav__item"><a href="<?php echo esc_url(home_url('/contact/')); ?>">お問い合わせ</a></li>
        </ul><!-- /.header-nav__items -->
      </nav><!-- /.header-nav -->
    </div><!-- /.header__inner -->
  </header>

  <!--
======================================
	02*Mv
======================================
-->

  <?php if (!is_front_page()) : ?>
    <?php if (is_home()) : ?>
      <div class="mv mv-sub mv--news">
        <h2 class="mv-sub__text"><?php
                                  $page_obj = get_page_by_path('news');
                                  $page = get_post($page_obj);
                                  echo $page->post_title;
                                  ?></h2>
      </div>
    <?php elseif (is_tax('cat_blog')) : ?>
      <div class="mv mv-sub mv--taxonomy">
        <h2 class="mv-sub__text">ブログ</h2>
      </div>
    <?php elseif (is_tax('cat_works')) : ?>
      <div class="mv mv-sub mv--taxonomy-works">
        <h2 class="mv-sub__text">制作実績</h2>
      </div>
    <?php elseif (is_post_type_archive('blog')) : ?>
      <div class="mv mv-sub mv--archive">
        <h2 class="mv-sub__text"><?php the_archive_title(); ?></h2>
      </div>
    <?php elseif (is_post_type_archive('works')) : ?>
      <div class="mv mv-sub mv--archive-works">
        <h2 class="mv-sub__text"><?php the_archive_title(); ?></h2>
      </div>
    <?php elseif (is_single()) : ?>
      <div class="mv mv-sub mv-none"></div>
    <?php else : ?>
      <div class="mv mv-sub mv--<?php
                                global $post;
                                $slug = $post->post_name;
                                echo $slug;
                                ?>">
        <h2 class="mv-sub__text"><?php the_title(); ?></h2>
      </div>
    <?php endif; ?>
  <?php endif; ?>

  <!--
======================================
	03*breadcrumb
======================================
-->

  <?php if (!is_front_page()) : ?>
    <div class="breadcrumbs inner">
      <?php
      if (function_exists('bcn_display')) {
        bcn_display();
      }
      ?>
    </div>
  <?php endif; ?>