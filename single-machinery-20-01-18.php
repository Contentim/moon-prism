<?php get_header();
  $bottom_desc = get_the_content();
  $cat_id = get_field('filters_cat');
  $first_post  = get_posts('numberposts=1&category='.$cat_id);

  $seo_desc_prodvig = get_post_meta($post->ID, 'seo_desc_prodvig', true);

  $fields = array('filter_param_1',
                  'filter_param_2',
                  'filter_param_3',
                  'params_addit',
                  'price',
                  'price_addit',
                  'filter_param_4');

  $field_info = array(
    CFS()->get_field_info($fields[0], $first_post[0]->ID),
    CFS()->get_field_info($fields[1], $first_post[0]->ID),
    CFS()->get_field_info($fields[2], $first_post[0]->ID),
    CFS()->get_field_info($fields[6], $first_post[0]->ID)
  );

?>
<section class="content">
  <div class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-lg-7">
          <div class="page-title"><?php the_title(); ?></div>
          <div class="breadcrumbs">
            <?php yoast_breadcrumb(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="page-content">

  <div class="container">
  <div class="row">
  <div class="col-xs-12 col-sm-12 col-md-7">
  <div class="cat-desc"><?php if(!empty($seo_desc_prodvig)){ ?>
  <?php echo $seo_desc_prodvig; ?>
  <?php } ?></div>
  </div>

  <div class="col-xs-12 col-sm-12 col-md-5"><div class="cat-desc cat-desc-img"><img src="https://stpmsk.ru/content/uploads/2017/06/kran-1.jpg" alt="Автокраны 25 тонн в аренду"></div><div class="category_order"><p class="category_order_title">Звоните, предоставим услуги по высшему разряду</p><p>+7(495) 199-13-87</p></div><div class="section_dogovor"><div id="dogovor-download" class="dogovor-category"><a href="https://yadi.sk/i/0erbaxp63GpMxq" class="caption-btn" target="_blank" onclick="yaCounter44012149.reachGoal ('dogovor-download'); return true;">Скачать образец договора аренды</a></div></div></div></div></div>

    <div class="container">
     <?php
      // Фильтры в категориях
      include('opt/filters-category.php');
     ?>

      <div class="row mobile-reverse">
        
        <div class="col-xs-12 col-sm-8 col-md-9">
          <div class="catalog-list">
            <?php

            $args = array_merge($filter_args_only, array(
              'cat' => $cat_id,
              'posts_per_page' => -1,
              'orderby' => 'meta_value_num',
              'meta_key' => 'price',
              'order' => 'ASC',
            ));

            $wp_query = new WP_Query($args);

            if($wp_query->have_posts()): ?>
            <?php while($wp_query->have_posts()): $wp_query->the_post(); ?>
              <div class="catalog-item">
                <div class="row">
                  <div class="hidden-xs col-sm-3 col-md-4">
                    <div class="catalog-item-img">
                      <a href="<?php the_permalink();?>">
                        <?php
                        $post_images = get_post_meta(get_the_ID(), 'inpost_gallery_data', true);
                        if ($post_images && !is_numeric($post_images)) {
                            foreach($post_images as $img) {
                              $preview_img['small'] = $img['imgurl'];
                              break;
                            }
                            echo '<img class="thumbnail-image" src="'.$preview_img['small'].'">';
                          }else{
                            echo '<img src="'.TEMPLATE_URI.'/img/no-photo.png" alt="">';
                          }
                        ?>
                      </a>
                    </div>
                  </div>
                  <div class="col-xs-7 col-sm-5">
                    <h3 class="catalog-item-title h3"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
                    <div class="catalog-item-description">
                      <?php
                        $params = array(
                          trim(CFS()->get($fields[1], get_the_ID())),
                          trim(CFS()->get($fields[2], get_the_ID())),
                          CFS()->get($fields[3], get_the_ID()),
                          trim(CFS()->get($fields[4], get_the_ID())),
                          trim(CFS()->get($fields[5], get_the_ID())),
                          trim(CFS()->get($fields[6], get_the_ID())),
                        );

                        echo '<ul class="list_char_catalog">';
                        if($params[0] != false){
                          echo '<li>'.$field_info[1]['label'].': '.$params[0].' т</li>';
                        }
                        if($params[1] != false){
                          echo '<li>'.$field_info[2]['label'].': '.$params[1].' м</li>';
                        }
                        if($params[5] != false){
                          echo '<li>'.$field_info[3]['label'].': '.$params[5].' м</li>';
                        }
                        if($params[2] != false){
                          foreach($params[2] as $k=>$v){
                            echo '<li>'.trim($v['params_addit_name']).': '.trim($v['params_addit_val']).'</li>';

                            if($k == 1) break;
                          }
                        }
                        echo '</ul>';
                      ?>
                    </div>
                  </div>
                  <div class="col-xs-5 col-sm-4 col-md-3">
                    <div class="catalog-item-priceinfo">
                      <div class="catalog-item-price">
                        <span class="title_price_catalog">Цена за смену:</span>
                        <?php if($params[3] != false){ ?>
                          <span class="price_services_tech"><?php echo number_format($params[3],0,'.',' '); ?> руб.</span>
                        <?php }else{ ?>
                          <span class="price_services_tech">требует уточнения</span>
                        <?php } ?>
                      </div>
                      <a href="<?php the_permalink();?>" class="caption-btn"><!--noindex-->Подробнее<!--/noindex--></a>
                    </div>
                  </div>
                </div>
              </div>

            <?php endwhile; ?>

            <?php else : ?>

            <article id="post-not-found" class="block">
              <p><?php _e("No posts found."); ?></p>
            </article>

            <?php endif; ?>

          </div>
        </div>
      
        <div class="col-xs-12 col-sm-4 col-md-3">
          <aside>
            
            <div class="item-spc">
              <div class="item-spc-description">
                <img src="/content/themes/moon-prism/img/kryuk.png" />
                <h3>Не та грузоподъёмность?</h3>
                <p>Воспользуйтесь </br>онлайн-калькулятором </br>подбора автокрана</p>
              </div>

              <a href="/calc-load-capacity-crane/" class="caption-spc-btn" target="_blank">Калькулятор расчета грузоподъемности</a>
            </div>

            <?php get_sidebar('park');?>
          </aside>
        </div>
      </div>

      <div class="set-eq related-cat-machinery">
        <div class="related-post-title">Возможно вам пригодится</div>
        <div class="row">
         <?php
          $allcats = get_categories(array('exclude'=>array($cat_id, 'parent'=>0)));
          shuffle($allcats);
          $parkQuery = array_slice($allcats, 0, 4);
          $i=1;
          $cnt = count($parkQuery);
          foreach($parkQuery as $item){

            $item_info['name'] = $item->name;
            $item_info['desc'] = $item->description;
            $item_info['preview'] = wp_get_attachment_url(get_field('tech_rubric_img','category_'.$item->term_id));
            $item_info['url'] = get_category_link($item->term_id);
            ?>
            <div class="col-xs-offset-1 col-xs-10 col-sm-offset-0 col-sm-4 col-md-3">
              <a href="<?php echo $item_info['url'];?>" class="eq-item blockAnimation">
                <div class="eq-item-img">
                 <?php if($item_info['preview']){?>
                  <img src="<?php echo $item_info['preview'];?>" alt="">
                 <?php } ?>
                </div>
                <div class="eq-item-caption">
                  <div class="eq-item-title"><?php echo $item_info['name'];?></div>
                  <div class="eq-item-description"><?php echo $item_info['desc'];?></div>
                </div>
                <div class="eq-item-btn-container">
                  <span class="caption-btn eq-item-btn"><!--noindex-->Подробнее<!--/noindex--></span>
                </div>
              </a>
            </div>
          <?php $i++; } ?>
        </div>
      </div>

      <?php if(!empty($bottom_desc)){ ?>
        <div class="row">
          <div class="col-xs-12">
            <div class="cat-desc"><?php echo $bottom_desc; ?></div>
          </div>
        </div>
      <?php } ?>

    </div>
  </div>
</section>
<?php get_footer(); ?>
