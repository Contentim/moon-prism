<?php get_header(); ?>

<?php
  $postID = get_the_ID();
  $fields = array('filter_param_1',
                  'filter_param_2',
                  'filter_param_3',
                  'params_addit',
                  'price',
                  'price_addit',                                  
                  'filter_param_4',
                  'price_addit_ttk',
                  'price_addit_processing',
                  'price_addit_processing_ttk', // 8 
                  'price_nds', // 9 price_nds
                  'price_addit_nds', // 10
                  'price_addit_ttk_nds', // 11 
                  'price_addit_processing_nds', // 12 
                  'price_addit_processing_ttk_nds', // 13
                  'title_page_price'
                  );
  $field_info = array(
   CFS()->get_field_info($fields[0],$postID),
   CFS()->get_field_info($fields[1],$postID),
   CFS()->get_field_info($fields[2],$postID),
   CFS()->get_field_info($fields[6],$postID),
  );

  $params = array(
    trim(CFS()->get($fields[1], $postID)),
    trim(CFS()->get($fields[2], $postID)),
    CFS()->get($fields[3], $postID),
    trim(CFS()->get($fields[4], $postID)),
    trim(CFS()->get($fields[5], $postID)),
    trim(CFS()->get($fields[6], $postID)),
    trim(CFS()->get($fields[7], $postID)),
    trim(CFS()->get($fields[8], $postID)),
    trim(CFS()->get($fields[9], $postID)),
    trim(CFS()->get($fields[10], $postID)),
    trim(CFS()->get($fields[11], $postID)),
    trim(CFS()->get($fields[12], $postID)),
    trim(CFS()->get($fields[13], $postID)),
    trim(CFS()->get($fields[14], $postID)),
    trim(CFS()->get($fields[15], $postID))
  );

?>

<section class="content">
  <div class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <h1 class="page-title"><?php the_field('tech_title'); ?> <?php edit_post_link('<span class="glyphicon glyphicon-pencil" title="Редактировать"></span>');?></h1>
          <!-- <h1 class="page-title"><?php //the_title(); ?><?php //edit_post_link('<span class="glyphicon glyphicon-pencil" title="Редактировать"></span>');?></h1> -->
          <div class="breadcrumbs">
            <?php yoast_breadcrumb(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="page-content">
    <div class="container">
      <div class="row mobile-reverse">

        <div class="col-xs-12 col-sm-4 col-md-3">
            <div class="single-card-img">
            <?php
              $post_images = get_post_meta(get_the_ID(), 'inpost_gallery_data', true);
              $preview_img = false;

              if($post_images && !is_numeric($post_images)){
                $preview_img = array();
                foreach($post_images as $img) {
                  $preview_img[] = array(
                    'full'  => preg_replace('/(-[0-9]*x.*\.)/','.', $img['imgurl']),
                    'small' => $img['imgurl'],
                    'alt'   => $img['title'],
                  );
                }
              }
            ?>

            <?php if($preview_img){ ?>
            <div class="slider-pro" id="pcard-slider">
              <div class="sp-slides">
                <?php foreach($preview_img as $img) { ?>
                  <div class="sp-slide">
                    <img class="sp-image" src="<?php echo $img['full'];?>" alt="<?php echo $img['alt'];?>" title="<?php echo $img['alt'];?>">
                    <div class="sp-thumbnail">
                      <img class="sp-thumbnail-image" src="<?php echo $img['small'];?>" alt="">
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
            <?php }else{
                    echo '<img src="'.TEMPLATE_URI.'/img/no-photo.png" alt="">';
                  }
            ?>
            </div>
        </div>
        <div class="col-xs-12 col-sm-8 col-md-9">
          <div class="additional-text type2 price-arenda-speztechnika">
           
            <div class="row">
              <div class="col-xs-12 col-lg-6">
                <h2>Цены для юридических лиц - с НДС 18%</h2>
                <ul class="price_tech">
                  <li>
                    <h3>Смена:</h3>
                    <?php if($params[9] != false){ ?>
                      <span class="h3"><?php echo number_format($params[9],0,'.',' '); ?> руб.</span>
                    <?php } else { ?>
                      <i>требует уточнения</i>
                    <?php } ?>
                  </li>

                  <?php if($params[12] != false){ ?>
                    <li><h3>1 час переработки:</h3> <span class="h3"><?php echo number_format($params[12],0,'.',' '); ?> руб.</span></li>
                  <?php } ?>

                  <?php if($params[11] != false){ ?>
                    <li><h3>Смена в ТТК:</h3> <span class="h3"><?php echo number_format($params[11],0,'.',' '); ?> руб.</span></li>
                  <?php } ?>

                  <?php if($params[13] != false){ ?>
                    <li><h3>1 час переработки в ТТК:</h3> <span class="h3"><?php echo number_format($params[13],0,'.',' '); ?> руб.</span></li>
                  <?php } ?>

                  <?php if($params[10] != false){ ?>
                    <li><h3>1 км за МКАД:</h3> <span class="h3"><?php echo number_format($params[10],0,'.',' '); ?> руб.</span></li>
                  <?php } ?>
                  
                </ul>
              </div>
              <div class="col-xs-12 col-lg-6" >
                <h2 class="title_price_not_nds">Цены для физических лиц - без НДС</h2>
                <ul class="price_tech">
                  <li>
                    <h3>Смена:</h3>
                    <?php if($params[3] != false){ ?>
                      <span class="h3"><?php echo number_format($params[3],0,'.',' '); ?> руб.</span>
                    <?php } else { ?>
                      <span>требует уточнения</span>
                    <?php } ?>
                  </li>

                  <?php if($params[7] != false){ ?>
                    <li><h3>1 час переработки:</h3> <span class="h3"><?php echo number_format($params[7],0,'.',' '); ?> руб.</span></li>
                  <?php } ?>

                  <?php if($params[6] != false){ ?>
                    <li><h3>Смена в ТТК:</h3> <span class="h3"><?php echo number_format($params[6],0,'.',' '); ?> руб.</span></li>
                  <?php } ?>

                  <?php if($params[8] != false){ ?>
                    <li><h3>1 час переработки в ТТК:</h3> <span class="h3"><?php echo number_format($params[8],0,'.',' '); ?> руб.</span></li>
                  <?php } ?>

                  <?php if($params[4] != false){ ?>
                    <li><h3>1 км за МКАД:</h3> <span class="h3"><?php echo number_format($params[4],0,'.',' '); ?> руб.</span></li>
                  <?php } ?>
                  
                </ul>
              </div>
              <div class="col-xs-12 col-lg-12 button-callback-order" >
                <a href="#" class="caption-btn" data-toggle="modal" data-target="#orderT">Заказать</a>
                <h3>*Оплата возможна наличным и безналичным расчетом</h3>
              </div>
            </div>
        </div>
        </div>
      </div>
    </div>
  </div>      

  <div class="page-content">
    <div class="container">
      <div class="row mobile-reverse">

        <div class="col-xs-12 col-sm-8 col-md-9">
          
          <?php if(get_field('tech_worktime')){ ?>
          <div class="additional-text type2">
            <?php the_field('tech_worktime'); ?>
          </div>
          <?php } ?>
          
          <?php if(get_field('order_condition')){ ?>
            <div class="additional-text type2 price-arenda-speztechnika">
              <?php the_field('order_condition'); ?>
            </div>
          <?php } ?>

          

          <?php if(get_field('tech_desc')){ ?>
          <div class="pcard-description-next additional-text type2">
            <!--<div class="h3"><?php //the_field('tech_title'); ?></div>-->
              <?php the_field('tech_desc'); ?>
          </div>
          <?php } ?>

          <div class="additional-text type2">
              <h2>Технические характеристики</h2>

              <ul>
              <?php // вывод технических ключевых технических характеристик ?>
              <?php
                include "include/char/category/char-avtokrany.php";
	          	  include "include/char/category/char-avtovyshki.php";
                include "include/char/category/char-avtobetononasosy.php";
                include "include/char/category/char-samosval.php";
                include "include/char/category/char-fura.php";
                include "include/char/category/char-musorovoz.php";
                include "include/char/category/char-konteinerovozy.php";
                include "include/char/category/char-gazel.php";
                include "include/char/category/char-dlinnomery.php";
                include "include/char/category/char-manipulyatory.php";
                include "include/char/category/char-ekskavatory.php";
                include "include/char/category/char-yamobury.php";
                include "include/char/category/char-nizkoramnye-traly.php";
              ?>
              </ul>

              <input type="hidden" value="<? echo $field_info[1]['label'] ?>"/>
          </div>

          <?php if(get_field('tech_add_info')){ ?>
          <div class="additional-text">
            <?php the_field('tech_add_info'); ?>
          </div>
          <?php } ?>

          <!-- <div class="related-machinery"></div> -->

      </div>

      <div class="col-xs-12 col-sm-4 col-md-3">
          <aside>

          <div class="item-spc item-jober">
            <div class="item-spc-description">
              <img src="/content/themes/moon-prism/img/jober.png" />
              <h3>Услуги рабочих</h3>
              <div class="i-jober">Стропальщики <span>3000 руб./смена</span></div>
              <div class="i-jober">Грузчики <span>2000 руб./смена</span></div>
            </div>
          </div>

          <?php
            $category = get_the_category();
            $category = $category[0]->cat_ID;
            
              if ($category == 1) { ?>
              <div class="item-spc">
                <div class="item-spc-description">
                  <img src="/content/themes/moon-prism/img/kryuk.png" />
                  <h3>Не та грузоподъёмность?</h3>
                  <p>Воспользуйтесь </br>онлайн-калькулятором </br>подбора автокрана</p>
                </div>

                <a href="/calc-load-capacity-crane/" class="caption-spc-btn" target="_blank">Калькулятор расчета грузоподъемности</a>
              </div>
          <?php }?>

          

            <!-- <?php //get_sidebar('park');?> -->

            <div class="item-spc"><div class="item-spc-description"><p>Не нашли то, что искали?<br> Позвоните диспетчеру по<br> тел. <span class="phone-bold" itemprop="telephone">8 (495) 199 13 87</span><br><span class="phone-bold" itemprop="telephone">8 (925) 074 13 87</span><br> или оставьте заявку.<br> Мы подберем для вас подходящий вариант.</p></div> <a href="#" data-toggle="modal" data-target="#orderCall" class="caption-spc-btn">Оставить заявку</a></div>

          </aside>
      </div>

      <?php // вывод альтернативного или похожего предложения в виде таблицы ?>
      <?php include "include/price-list-alternativa.php"; ?>

      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="set-eq">
          <div class="container">
            <div class="set-eq-title"><noindex>Парк спецтехники и услуги</noindex></div>
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
                        Заполните форму,<br> и наш специалист поможет<br> с выбором спецтехники
                      </div>
                      <a href="#" class="caption-spc-btn" data-toggle="modal" data-target="#orderCall">Заказать расчет</a>
                    </div>
                  </div>
                <?php
                  } ?>
                <div class="col-xs-offset-1 col-xs-10 col-sm-offset-0 col-sm-4 col-md-3">
                  <a href="<?php echo $item_info['url']; ?>" class="eq-item" rel="nofollow">
                    <div class="eq-item-img">
                     <?php if ($item_info['preview']) {
                      ?>
                      <img src="<?php echo $item_info['preview']; ?>" alt="">
                     <?php
                  } ?>
                    </div>
                    <div class="eq-item-caption">
                      <div class="eq-item-title"><noindex><?php echo $item_info['name']; ?></noindex></div>
                      <div class="eq-item-description"><noindex><?php echo $item_info['desc']; ?></noindex></div>
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
      </div>
      
    </div>
  </div>
</section>

<?php echo do_shortcode('[contact-form-7 id="241" title="Заказать технику"]'); ?>

<?php get_footer(); ?>
