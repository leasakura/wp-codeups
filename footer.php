<!--
======================================
  09*pagetop
======================================
-->

<button class="pagetop" onclick="location.href='#'">
  <span class="arrow"></span>
</button>

<!--
======================================
	08*Contact
======================================
-->

<?php if (!is_page("118") && !is_404()) : ?>
  <section class="contact top__contact">
    <div class="contact__inner inner--pc">
      <div class="contact__title section-header">
        <h2 class="section-header__title">お問い合わせ</h2>
        <p class="section-header__subtitle --up">Contact</p>
      </div>
      <p class="contact__text inner">ご相談、お見積り等、弊社へのお問い合わせはこちらからお願いします。</p>
      <button class="contact__btn button" onclick="location.href='<?php echo esc_url(home_url('/contact/')); ?>'">
        <span>お問い合わせへ</span>
      </button>
    </div>
  </section>
<?php endif; ?>

<footer class="footer">
  <div class="footer__inner">
    <p class="footer__logo"><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_theme_file_uri('/assets/images/logo.png'); ?>" alt="CodeUps"></a></p>
    <ul class="footer__items">
      <li class="footer__item"><a href="<?php echo esc_url(home_url('/')); ?>">トップ</a></li>
      <li class="footer__item"><a href="<?php echo esc_url(home_url('/news/')); ?>">お知らせ</a></li>
      <li class="footer__item"><a href="<?php echo esc_url(home_url('/content/')); ?>">事業内容</a></li>
      <li class="footer__item"><a href="<?php echo esc_url(home_url('/works/')); ?>">制作実績</a></li>
      <li class="footer__item"><a href="<?php echo esc_url(home_url('/overview/')); ?>">企業概要</a></li>
      <li class="footer__item"><a href="<?php echo esc_url(home_url('/blog/')); ?>">ブログ</a></li>
      <li class="footer__item"><a href="<?php echo esc_url(home_url('/contact/')); ?>">お問い合わせ</a></li>
    </ul>
  </div><!-- /.footer__inner -->
  <p class="copyright">&copy; 2021 CodeUps Inc.</p>
</footer>
<?php wp_footer(); ?>
</body>

</html>