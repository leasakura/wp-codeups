<?php get_header(); ?>

<!--
======================================
	04*Contents
======================================
-->

<div class="sub-overview">
  <div class="inner">
    <dl class="sub-overview__items">
      <?php if (get_field('company_name')) : ?>
        <div class="sub-overview__item">
          <dt>会社名</dt>
          <dd><?php the_field('company_name'); ?></dd>
        </div>
      <?php endif; ?>
      <?php if (get_field('company_foundation')) : ?>
        <div class="sub-overview__item">
          <dt>設立</dt>
          <dd><?php the_field('company_foundation'); ?></dd>
        </div>
      <?php endif; ?>
      <?php if (get_field('company_money')) : ?>
        <div class="sub-overview__item">
          <dt>資本金</dt>
          <dd><?php the_field('company_money'); ?></dd>
        </div>
      <?php endif; ?>
      <?php if (get_field('company_ceo')) : ?>
        <div class="sub-overview__item">
          <dt>代表者</dt>
          <dd><?php the_field('company_ceo'); ?></dd>
        </div>
      <?php endif; ?>
      <?php if (get_field('company_employee')) : ?>
        <div class="sub-overview__item">
          <dt>従業員数</dt>
          <dd><?php the_field('company_employee'); ?></dd>
        </div>
      <?php endif; ?>
      <?php if (get_field('company_business')) : ?>
        <div class="sub-overview__item">
          <dt>事業内容</dt>
          <dd><?php the_field('company_business'); ?></dd>
        </div>
      <?php endif; ?>
      <?php if (get_field('company_address')) : ?>
        <div class="sub-overview__item">
          <dt>所在地</dt>
          <dd><?php the_field('company_address'); ?></dd>
        </div>
      <?php endif; ?>
    </dl>
    <?php if (get_field('company_map')) : ?>
      <div class="sub-overview__map">
        <?php the_field('company_map'); ?>
      </div>
    <?php endif; ?>
  </div>
</div>

<?php get_footer(); ?>