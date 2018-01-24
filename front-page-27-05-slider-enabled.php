<?php get_header();
  $bg_img = wp_get_attachment_image_src(get_post_thumbnail_id(4), 'full');

  $sliderQuery = new WP_Query(array(
    'post_type' => 'imageslider',
    'posts_per_page' => -1,
    'orderby' => 'post_date',
    'order' => 'ASC',
    'no_found_rows' => 1,
   ));
?>

<?php if (have_posts()) : ?>
<div class="slider-pro" id="mainslider">
  <div class="sp-slides">
    <?php
      while ($sliderQuery->have_posts()) : $sliderQuery->the_post();
        $feat_image = wp_get_attachment_url(get_post_thumbnail_id());
        $post_meta = get_post_meta(get_the_ID());
        $anim_obj_img = wp_get_attachment_url(get_field('slide_anim_img'));
    ?>
    <div class="sp-slide" style="background-image: url(<?php echo $feat_image; ?>);">
      <div class="circle-shadow"></div>
      <?php if ($anim_obj_img) {
        ?>
        <div class="sp-layer" data-position="topRight" data-horizontal="20%"
         data-show-transition="<?php the_field('slide_anim_appiar'); ?>" data-hide-transition="<?php the_field('slide_anim_disappiar'); ?>"
         data-show-delay="300" data-show-duration="1000">
          <img src="<?php echo $anim_obj_img; ?>" alt="">
        </div>
      <?php
    } ?>
      <div class="sp-layer" data-position="centerLeft" data-horizontal="21%"
       data-show-transition="left" data-hide-transition="right"
       data-show-delay="300" data-show-duration="1000">
        <div class="caption-title"><?php echo $post_meta['_sphis_slide_title'][0]; ?></div>
        <div class="caption-description"><?php echo $post_meta['_sphis_slide_caption'][0]; ?></div>
        <?php if ($post_meta['_sphis_slide_link'][0]) {
        ?>
          <a href="<?php echo $post_meta['_sphis_slide_link'][0]; ?>" <?php echo $post_meta['_sphis_link_behaviour'][0] == 1 ? 'target="_blank" ' : ''; ?>class="caption-btn"><noindex>Подробнее</noindex></a>
        <?php
    } ?>
      </div>
    </div>
   <?php endwhile; ?>
   <?php wp_reset_query(); ?>
  </div>
</div>
<?php endif; ?>

<section class="content">
  <div class="set-eq">
    <div class="container">
      <div class="set-eq-title">Мы предлагаем</div>
      <div class="row">
       <?php
        //$parkQuery = get_categories(array('hide_empty'=>false));
        $parkQuery = get_categories(array('parent' => 0));
        $services = get_posts(array('post_type' => 'service', 'posts_per_page' => -1));
        $parkQuery = array_merge($parkQuery, $services);

        $i = 1;
        $cnt = count($parkQuery);
        foreach ($parkQuery as $item) {
            if ($item instanceof WP_Term) { // if from category
            $item_info['name'] = $item->name;
                $item_info['desc'] = $item->description;
                $item_info['preview'] = wp_get_attachment_url(get_field('tech_rubric_img', 'category_'.$item->term_id));
                $item_info['url'] = get_category_link($item->term_id);
            } else { // from posts service
            $item_info['name'] = $item->post_title;
                $item_info['desc'] = get_field('service_icon_text', $item->ID);
                $item_info['preview'] = wp_get_attachment_url(get_field('service_icon', $item->ID));
                $item_info['url'] = get_permalink($item->ID);
            }

            if ($i == 4) {
                ?>
            <div class="col-xs-offset-1 col-xs-10 col-sm-offset-0 col-sm-4 col-md-3">
              <div class="item-spc">
                <div class="item-spc-title">Нужна помощь?</div>
                <div class="item-spc-description">
                  Заполните форму,<br>и наш специалист поможет<br>подобрать подходящий кран
                </div>
                <a href="#" class="caption-spc-btn" data-toggle="modal" data-target="#orderCall">Заказать расчет</a>
              </div>
            </div>
          <?php
            } ?>
          <div class="col-xs-offset-1 col-xs-10 col-sm-offset-0 col-sm-4 col-md-3">
            <a href="<?php echo $item_info['url']; ?>" class="eq-item blockAnimation">
              <div class="eq-item-img">
               <?php if ($item_info['preview']) {
                ?>
                <img src="<?php echo $item_info['preview']; ?>" alt="">
               <?php
            } ?>
              </div>
              <div class="eq-item-caption">
                <div class="eq-item-title"><?php echo $item_info['name']; ?></div>
                <div class="eq-item-description"><?php echo $item_info['desc']; ?></div>
              </div>
              <div class="eq-item-btn-container">
                <span class="caption-btn eq-item-btn"><noindex>Подробнее</noindex></span>
              </div>
            </a>
          </div>
        <?php ++$i;
        } ?>
      </div>
    </div>
  </div>
  <div  class="jarallax features-pl" style="background-image:url(<?php echo $bg_img[0]; ?>)" data-image="<?php echo $bg_img[0]; ?>">
  <div class="features">
    <div class="night-block"></div>
    <div class="container">
      <div class="features-title"><?php the_field('home_plus_title', 4); ?></div>
      <div class="row">
        <div class="col-xs-4 col-xs-15-3">
          <div class="feature-img-container">
            <div class="feature-img">
              <?php echo wp_get_attachment_image(get_field('home_plus_img1', 4), 'full'); ?>
            </div>
          </div>
          <div class="feature-title"><?php the_field('home_plus_desc1', 4); ?></div>
        </div>
        <div class="col-xs-4 col-xs-15-3">
          <div class="feature-img-container">
            <div class="feature-img">
              <?php echo wp_get_attachment_image(get_field('home_plus_img2', 4), 'full'); ?>
            </div>
          </div>
          <div class="feature-title"><?php the_field('home_plus_desc2', 4); ?></div>
        </div>
        <div class="col-xs-4 col-xs-15-3">
          <div class="feature-img-container">
            <div class="feature-img">
              <?php echo wp_get_attachment_image(get_field('home_plus_img3', 4), 'full'); ?>
            </div>
          </div>
          <div class="feature-title"><?php the_field('home_plus_desc3', 4); ?></div>
        </div>
        <div class="col-xs-6 col-xs-15-3">
          <div class="feature-img-container">
            <div class="feature-img">
              <?php echo wp_get_attachment_image(get_field('home_plus_img4', 4), 'full'); ?>
            </div>
          </div>
          <div class="feature-title"><?php the_field('home_plus_desc4', 4); ?></div>
        </div>
        <div class="col-xs-6 col-xs-15-3">
          <div class="feature-img-container">
            <div class="feature-img">
              <?php echo wp_get_attachment_image(get_field('home_plus_img5', 4), 'full'); ?>
            </div>
          </div>
          <div class="feature-title"><?php the_field('home_plus_desc5', 4); ?></div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="information-container">
    <div class="information">
      <div class="container">
       <div class="information-img"></div>
        <div class="row">
          <div class="col-xs-12 col-sm-6">
            <div class="information-content">
              <h1 class="information-title">
                <?php the_field('home_bottom_title', 4); ?>
              </h1>
              <div class="information-text"><?php the_field('home_bottom_desc', 4); ?></div>
              <a href="<?php the_field('btn_home_link', 4); ?>" class="caption-btn"><noindex>Подробнее</noindex></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
