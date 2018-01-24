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

  // тех. характеристики кранов
  $fields_char_kran = array(
    'capacity',
    'boom_length',
    'gusek',
    'max_height_lifting',
    'weight_boom',
    'wheel_formula',                                  
    'gabarit_transport_length'
  );

  $field_info_char_kran = array(
    get_field($fields_char_kran[0],$postID),
    get_field($fields_char_kran[1],$postID),
    get_field($fields_char_kran[2],$postID),
    get_field($fields_char_kran[3],$postID),
    get_field($fields_char_kran[4],$postID),
    get_field($fields_char_kran[5],$postID),
    get_field($fields_char_kran[6],$postID),
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

        <div class="col-xs-12 col-sm-8 col-md-9">

        <div class="additional-text type2 price-arenda-speztechnika">
           
            <div class="row">
              <div class="col-xs-6 col-lg-6">
                <h2>Цены для юридических лиц - с НДС 18%</h2>
                <ul class="price_tech">
                  <li>
                    <h3>Смена:</h3>
                    <?php if($params[9] != false){ ?>
                      <span class="h3"><?php echo number_format($params[9],0,'.',' '); ?> руб.</span>
                    <?php } else { ?>
                      <span>требует уточнения</span>
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
              <div class="col-xs-6 col-lg-6" >
                <h2>Цены для физических лиц - без НДС</h2>
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


        <div class="row">
          <div class="col-xs-12 col-sm-5">
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
          <div class="col-xs-12 col-sm-7">

            <div class="pcard-description">
              
              <div class="pcard-description-text">
                <?php if(get_field('order_condition')){ ?>
                    <?php the_field('order_condition'); ?>
                <?php } ?>
              </div>
              
              <div class="service-price hide">
                <div class="row">
                  <div class="col-xs-12 col-lg-12">

                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

          <?php if(get_field('tech_worktime')){ ?>
          <div class="additional-text type2">
            <?php the_field('tech_worktime'); ?>
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

              <?php echo '<ul>' ?>

                <?php
                  if (sizeof($field_info_char_kran) != 0) {
                    echo '<li>Грузоподъёмность: '.$field_info_char_kran[0].'</li>';
                    echo '<li>Длина стрелы: '.$field_info_char_kran[1].'</li>';
                    echo '<li>Гусёк: '.$field_info_char_kran[2].'</li>';
                    echo '<li>Максимальная высота подъема крюка: '.$field_info_char_kran[3].'</li>';
                    echo '<li>Масса груза, допустимая при выдвижение стрелы: '.$field_info_char_kran[4].'</li>';
                    echo '<li>Колесная формула: '.$field_info_char_kran[5].'</li>';
                    echo '<li>Габариты в транспортном положении (Д х Ш х В): '.$field_info_char_kran[6].'</li>';
                  }
                ?>

              <?php echo '</ul>' ?>

              <ul>
              <?php
                
                if($params[0] != false){

                  if ($field_info[1]['label'] == 'Грузоподъёмность') {
                    $postfix_gruz ='т';
                  } else {
                    $postfix_gruz ='';
                  }

                  echo '<li>'.$field_info[1]['label'].': <span>'.$params[0].' '.$postfix_gruz.'</span></li>';
                  
                }

                if($params[1] != false){
                  echo '<li>'.$field_info[2]['label'].': <span>'.$params[1].' м</span></li>';
                }

                if($params[5] != false){
                  echo '<li>'.$field_info[3]['label'].': <span>'.$params[5].' м</span></li>';
                }

                if($params[2] != false){
                  foreach($params[2] as $k=>$v){
                    if(!empty($v['params_addit_name'])){
                      echo '<li>'.trim($v['params_addit_name']).': <span>';
                    }
                    echo trim($v['params_addit_val']).'</span></li>';
                  }
                }

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

      <?php if( get_field('similar_avtokrany') || get_field('similar_avtovyshki') || get_field('similar_samosval') || get_field('similar_fura') || get_field('similar_musorovoz') || get_field('similar_konteinerovozy') || get_field('similar_avtobetononasosy') || get_field('similar_gazel') || get_field('similar_dlinnomery') || get_field('similar_manipulyatory') || get_field('similar_ekskavatory') || get_field('similar_yamobury') || get_field('similar_nizkoramnye_traly')){ ?>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="#additional-text #type2">
            <h2 class="align_center">Альтернатива и дополнительные предложения</h2>
          </div>
        </div>
      <?php } ?>

      <?php



      ?>

      <?php if(get_field('similar_avtokrany')){ ?>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="#additional-text #type2">
            <?php include "include/similar-avtokrany.php" ?>
          </div>
        </div>
      <?php } ?>

      <?php if(get_field('similar_avtovyshki')){ ?>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="#additional-text #type2">
            <?php include "include/similar-avtovyshki.php" ?>
          </div>
        </div>
      <?php } ?>

      <?php if(get_field('similar_samosval')){ ?>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="#additional-text #type2">
            <?php include "include/similar-samosval.php" ?>
          </div>
        </div>
      <?php } ?>

      <?php if(get_field('similar_fura')){ ?>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="#additional-text #type2">
            <?php include "include/similar-fura.php" ?>
          </div>
        </div>
      <?php } ?>

      <?php if(get_field('similar_musorovoz')){ ?>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="#additional-text #type2">
            <?php include "include/similar-musorovoz.php" ?>
          </div>
        </div>
      <?php } ?>

      <?php if(get_field('similar_konteinerovozy')){ ?>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="#additional-text #type2">
            <?php include "include/similar-konteinerovozy.php" ?>
          </div>
        </div>
      <?php } ?>

      <?php if(get_field('similar_avtobetononasosy')){ ?>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="#additional-text #type2">
            <?php include "include/similar-avtobetononasosy.php" ?>
          </div>
        </div>
      <?php } ?>

      <?php if(get_field('similar_gazel')){ ?>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="#additional-text #type2">
            <?php include "include/similar-gazel.php" ?>
          </div>
        </div>
      <?php } ?>

      <?php if(get_field('similar_dlinnomery')){ ?>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="#additional-text #type2">
            <?php include "include/similar-dlinnomery.php" ?>
          </div>
        </div>
      <?php } ?>

      <?php if(get_field('similar_manipulyatory')){ ?>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="#additional-text #type2">
            <?php include "include/similar-manipulyatory.php" ?>
          </div>
        </div>
      <?php } ?>

      <?php if(get_field('similar_ekskavatory')){ ?>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="#additional-text #type2">
            <?php include "include/similar-ekskavatory.php" ?>
          </div>
        </div>
      <?php } ?>

      <?php if(get_field('similar_yamobury')){ ?>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="#additional-text #type2">
            <?php include "include/similar-yamobury.php" ?>
          </div>
        </div>
      <?php } ?>


      <?php if(get_field('similar_nizkoramnye_traly')){ ?>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="#additional-text #type2">
            <?php include "include/similar-nizkoramnye-traly.php" ?>
          </div>
        </div>
      <?php } ?>

      
    </div>
  </div>
</section>

<?php echo do_shortcode('[contact-form-7 id="241" title="Заказать технику"]'); ?>

<?php get_footer(); ?>
