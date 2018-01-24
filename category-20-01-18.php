<?php get_header();
  $queried_object = get_queried_object();

  $title_category_tech = get_field('title_category_tech', $queried_object);

  if (!empty($title_category_tech)) {
      $title_category_tech = $title_category_tech;
    } else {
      $title_category_tech = single_cat_title();
  }

  $html_code_dogovor = get_field('html_code_dogovor', $queried_object);

  $top_desc = get_field('tech_top_desc', $queried_object);
  $bottom_desc = get_field('tech_bottom_desc', $queried_object);

  $tech_category_content_img = wp_get_attachment_url(get_field('tech_category_content_img', $queried_object));

  $tech_category_content_img_alt = get_field('tech_category_content_img', $queried_object);


  $first_post  = get_posts('numberposts=1&category='.$queried_object->term_id);

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
    CFS()->get_field_info($fields[6], $first_post[0]->ID),
  );

  $tech_links = get_field('tech_cloud_links', get_queried_object());

?>
<section class="content">
  <div class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-lg-12">
          <h1 class="page-title"><?php echo $title_category_tech ?></h1>
          <div class="breadcrumbs">
            <?php yoast_breadcrumb(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php // print_r($tech_category_content_img_alt) ?>

  <?php
        $current_category = get_the_category(); 
        $current_category = $current_category[0]->cat_ID;
    ?>
  
    <div class="container">
        <div class="row">
          <div class="col-xs-7">
            <div class="cat-desc"><?php echo $top_desc; ?></div>
          </div>
          <div class="col-xs-5">
            <div class="cat-desc cat-desc-img"><img src="<?php echo $tech_category_content_img; ?>" alt="<?php echo $title_category_tech ?>"/></div>
            <div class="category_order">
              <p class="category_order_title">Звоните, предоставим услуги по высшему разряду</p>
              <p><?php the_field('contact_phone_header', 7); ?></p>
            </div>
            <?php if ($html_code_dogovor) { ?>
                <div class="section_dogovor"><?php echo $html_code_dogovor ?></div>
            <?php } ?>
          </div>
        </div>
    </div>
  
  <div class="page-content">
    <div class="container">
     <?php
      // Фильтры в категориях
      include('opt/filters-category.php');

      if(isset($filter_params[0],$filter_params[1],$filter_params[2])){ ?>
      <div class="row navbar-filters-block">
        <div class="col-xs-12 col-md-9 navbar-filters-container">
          <nav class="navbar navbar-filters">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#filters-collapse" aria-expanded="false">
                <span class="sr-only">Фильтры</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <div class="navbar-brand">Фильтры</div>
            </div>

            <div class="collapse navbar-collapse" id="filters-collapse">
              <ul class="nav navbar-nav nav-justified">
               <?php if(!empty($filter_params[0])){ ?>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $field_info[0]['label'];?> <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo get_category_link($cat_ID);?>">Все</a></li>
                    <?php
                      foreach($filter_params[0] as $param){
                        echo '<li'.(isset($_GET['brand']) && $_GET['brand']==$param?' class="active"':'').'><a href="'.filter_merge_queries($cat_ID,array('brand'=>$param)).'">'.$param.'</a></li>';
                      }
                    ?>
                  </ul>
                </li>
                <?php } ?>
                <?php if(!empty($filter_params[1])){ ?>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $field_info[1]['label'];?> <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li<?php if(isset($_GET['capacity_order']) && $_GET['capacity_order']=='asc'){echo ' class="active"';} ?>><a href="<?php echo filter_merge_queries($cat_ID,array('capacity_order'=>'asc'))?>">По возрастанию</a></li>
                    <li<?php if(isset($_GET['capacity_order']) && $_GET['capacity_order']=='desc'){echo ' class="active"';} ?>><a href="<?php echo filter_merge_queries($cat_ID,array('capacity_order'=>'desc'))?>">По убыванию</a></li>
                    <li>
                      <select class="form-control">
                        <option data-href="<?php echo filter_merge_queries($cat_ID,array('capacity'=>$param),true)?>" value="none">Указать</option>
                        <?php
                        foreach($filter_params[1] as $param){
                          $sel='';
                          if(isset($_GET['capacity'])){
                            $sel = $param == $_GET['capacity']?' selected':'';
                          }
                          echo '<option data-href="'.filter_merge_queries($cat_ID,array('capacity'=>$param)).'" value="'.$param.'"'.$sel.'>'.$param.' '.($queried_object->term_id == 3||$queried_object->term_id == 1?"тонн":"").'</option>';
                        }
                        ?>
                      </select>
                    </li>
                  </ul>
                </li>
                <?php } ?>
                <?php if(!empty($filter_params[2])){ ?>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $field_info[2]['label'];?> <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li<?php if(isset($_GET['length_order']) && $_GET['length_order']=='asc'){echo ' class="active"';} ?>><a href="<?php echo filter_merge_queries($cat_ID,array('length_order'=>'asc'))?>">По возрастанию</a></li>
                    <li<?php if(isset($_GET['length_order']) && $_GET['length_order']=='desc'){echo ' class="active"';} ?>><a href="<?php echo filter_merge_queries($cat_ID,array('length_order'=>'desc'))?>">По убыванию</a></li>
                    <li>
                      <select class="form-control">
                        <option data-href="<?php echo filter_merge_queries($cat_ID,array('length'=>$param),true)?>" value="none">Указать</option>
                        <?php
                        foreach($filter_params[2] as $param) {
                          $sel='';
                          if(isset($_GET['length'])){
                            $sel = $param == $_GET['length']?' selected':'';
                          }
                          echo '<option data-href="'.filter_merge_queries($cat_ID,array('length'=>$param)).'" value="'.$param.'"'.$sel.'>'.$param.' '.($queried_object->term_id == 3||$queried_object->term_id == 1?"метров":"").'</option>';
                        }
                        ?>
                      </select>
                    </li>
                  </ul>
                </li>
                <?php } ?>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">По цене <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li<?php if(isset($_GET['price_order']) && $_GET['price_order']=='asc'){echo ' class="active"';} ?>><a href="<?php echo filter_merge_queries($cat_ID,array('price_order'=>'asc'))?>">По возрастанию</a></li>
                    <li<?php if(isset($_GET['price_order']) && $_GET['price_order']=='desc'){echo ' class="active"';} ?>><a href="<?php echo filter_merge_queries($cat_ID,array('price_order'=>'desc'))?>">По убыванию</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
      <?php } ?>
      <div class="row mobile-reverse">

      <div class="col-xs-12 col-sm-4 col-md-3 sidebar-category-menu">
          <aside>

          <?php
              if($tech_links != false) {
              ?>
                <nav class="aside-nav alternate">
                  <ul class="nav nav-stacked">
                  <?php
                    foreach ($tech_links as $link) {
                      echo '<li><a href="'.get_permalink($link->ID).'">'.$link->post_title.'</a></li>';
                    }
                  ?>
                  </ul>
                </nav>
              <?php
              }
              ?>

          <?php
            $category = get_the_category(); 
            $catID = $category[0]->cat_ID;
          ?>

          <?php
            if ($catID == 1) {
              echo '<div class="item-spc"><div class="item-spc-description"> <img src="/content/themes/moon-prism/img/kryuk.png"><h3>Калькулятор грузоподъемности автокрана</h3><p>Воспользуйтесь <br>онлайн-расчетом <br>грузоподъемности</p></div><a href="/calc-load-capacity-crane/" class="caption-spc-btn" target="_blank">Перейти к расчету</a></div>';
            }
          ?>



            <?php get_sidebar('park');?>
              

          </aside>
        </div>
        
        <div class="col-xs-12 col-sm-8 col-md-9">
          <div class="catalog-list">
            <?php if(have_posts()): ?>
            <?php while(have_posts()): the_post(); ?>
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
                  <div class="col-xs-12 col-sm-5">
                    <h2 class="catalog-item-title h3"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
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

                        $category = get_the_category(); 
                        $category = $category[0]->cat_ID;

                        echo '<ul class="list_char_catalog">';

                        switch ($category) {
                          case 13: // мусоровозы
                            include "include/char/category/char-musorovoz.php";
                            break;
                          case 12: // автобетононасосы
                            include "include/char/category/char-avtobetononasosy.php";
                            break;
                          case 3: // автовышки
                            include "include/char/category/char-avtovyshki.php";
                            break;   
                          case 1: // автокраны
                            include "include/char/category/char-avtokrany.php";
                            break;
                          case 11: // газели
                            include "include/char/category/char-gazel.php";
                            break;  
                          case 8: // длинномеры
                            include "include/char/category/char-dlinnomery.php";
                            break;  
                          case 6: // контейнеровозы
                            include "include/char/category/char-konteinerovozy.php";
                            break; 
                          case 4: // манипуляторы
                            include "include/char/category/char-manipulyatory.php";
                            break;  
                          case 7: // тралы
                            include "include/char/category/char-nizkoramnye-traly.php";
                            break; 
                          case 10: // самосвалы
                            include "include/char/category/char-samosval.php";
                            break;  
                          case 9: // фуры
                            include "include/char/category/char-fura.php";
                            break; 
                          case 5: // экскаваторы
                            include "include/char/category/char-ekskavatory.php";
                            break;  
                          case 14: // ямобуры
                            include "include/char/category/char-yamobury.php";
                            break;    
                        }
                        echo '</ul>';


                        /*echo '<ul class="list_char_catalog">';
                        if($params[0] != false){
                          echo '<li>'.$field_info[1]['label'].': '.$params[0].' '.($queried_object->term_id == 3||$queried_object->term_id == 1?"т":"").'</li>';
                        }
                        if($params[1] != false){
                          echo '<li>'.$field_info[2]['label'].': '.$params[1].' '.($queried_object->term_id == 3||$queried_object->term_id == 1?"м":"").'</li>';
                        }
                        if($params[5] != false){
                          echo '<li>'.$field_info[3]['label'].': '.$params[5].' '.($queried_object->term_id == 3||$queried_object->term_id == 1?"м":"").'</li>';
                        }
                        if($params[2] != false){
                          $count = 0;
                          foreach($params[2] as $k=>$v){
                            echo '<li>'.trim($v['params_addit_name']).': '.trim($v['params_addit_val']).'</li>';
                            if($count == 1) break;
                            $count++;
                          }
                        }
                        echo '</ul>';*/
                      ?>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="catalog-item-priceinfo">
                      <div class="catalog-item-price">
                        <span class="title_price_catalog">Цена за смену:</span>
                        <?php if($params[3] != false){ ?>
                          <span class="price_services_tech"><?php echo number_format($params[3],0,'.',' '); ?> руб.</span>
                        <?php }else{ ?>
                          <span class="price_services_tech">требует уточнения</span>
                        <?php } ?>
                      </div>
                      <a href="<?php the_permalink();?>" class="caption-btn">Арендовать</a>
                    </div>
                  </div>
                </div>
              </div>

            <?php endwhile; ?>

              <div class="row">
                <div class="col-xs-12">
                  <?php numeric_posts_nav(); ?>
                </div>
              </div>

            <?php else : ?>

            <article id="post-not-found" class="block">
              <p><?php _e("No posts found."); ?></p>
            </article>

            <?php endif; ?>

          </div>
        </div>

        
      </div>

      <div class="set-eq related-cat-machinery">
        <div class="related-post-title">Возможно вам пригодится</div>
        <div class="row">
         <?php
          $allcats = get_categories(array('exclude'=>array(get_query_var('cat'),'parent'=>0)));
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
                  <span class="caption-btn eq-item-btn">Подробнее</span>
                </div>
              </a>
            </div>
          <?php $i++; } ?>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12">
          <div class="cat-desc"><?php echo $bottom_desc; ?></div>
        </div>
      </div>

    </div>
  </div>
</section>
<?php get_footer(); ?>
