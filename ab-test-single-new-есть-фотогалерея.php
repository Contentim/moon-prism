
  <div class="page-content">
    <div class="container">
      <div class="row mobile-reverse">

        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="single-card-img">

            <?php if(get_field('image_this_tech')){ ?>
              <img src="<?php the_field('image_this_tech'); ?>" alt="<?php the_field('tech_title'); ?>" title="<?php the_field('tech_title'); ?>"/>
            <?php }?>

            

            

            </div>
        </div>

        
        <div class="col-xs-12 col-sm-6 col-md-6">
    		<div class="item-spc current-menu-articles">
				<h3 class="align_center">Содержание</h3>

				<ul class="list-nav-current-articles">
				    
				    <li><a href="#prices_services" rel="m_PageScroll2id" onclick="yaCounter44012149.reachGoal('nav-prices'); return true;">Цены</a></li>
				    
				    <?php if(get_field('order_condition')){ ?>
				    <li><a href="#usloviya_zakaza" rel="m_PageScroll2id" onclick="yaCounter44012149.reachGoal('nav-usl-zakaza'); return true;">Условия заказа</a></li>
				    <?php } ?>
				    
				    <?php if(get_field('tech_worktime')){ ?>
				    <li><a href="#rezhim-raboty" rel="m_PageScroll2id" onclick="yaCounter44012149.reachGoal('nav-rezhim-raboty'); return true;">Режим работы</a></li>
				    <?php } ?>
				    
				    <li><a href="#tech-char-articles" rel="m_PageScroll2id" onclick="yaCounter44012149.reachGoal('nav-tech-char'); return true;">Технические характеристики</a></li>
				    
				    <?php if(get_field('tech_add_info')){ ?>
				    <li><a href="#tech_add_info" rel="m_PageScroll2id" onclick="yaCounter44012149.reachGoal('nav-desc'); return true;">Описание</a></li>
				    <?php } ?>

            <?php if(get_field('schema_gruza')){ ?>
            <li><a href="#schema_gruza" rel="m_PageScroll2id" onclick="yaCounter44012149.reachGoal('schema_gruza'); return true;">Схема грузоподъёмности</a></li>
            <?php } ?>
				    
				    <li><a href="#tech-alternativa" rel="m_PageScroll2id" onclick="yaCounter44012149.reachGoal('nav-alternativa'); return true;">Не подходит техника? <b>Посмотрите альтернативу</b></a></li>
				</ul>
    		</div>
    	</div>
        
        
      </div>
    </div>
  </div>      

  <div class="page-content">
    <div class="container">
      <div class="row mobile-reverse">

        <div class="col-xs-12 col-sm-8 col-md-9">

          
            
          <div class="additional-text type2 price-arenda-speztechnika additional-desc" id="prices_services">
            <h2>Цены</h2>

            <div class="additional-content">
            <div class="row">
              <div class="col-xs-12 col-lg-6">
                <h3>Для юридических лиц - с НДС 18%</h3>
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
                <h3 class="title_price_not_nds">Для физических лиц - без НДС</h3>
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

          
          <?php if(get_field('tech_worktime')){ ?>
          <div class="additional-text type2 additional-desc" id="rezhim-raboty">
            <?php if(get_field('tech_worktime_title')){ ?>
              <h2><?php the_field('tech_worktime_title'); ?></h2>
            <?php } ?>

            <div class="additional-content">
              <?php the_field('tech_worktime'); ?>
            </div>
          </div>
          <?php } ?>
          
          <?php if(get_field('order_condition')){ ?>
            <div class="additional-text type2 price-arenda-speztechnika additional-desc" id="usloviya_zakaza">
              <?php if(get_field('order_condition_title')){ ?>
                <h2><?php the_field('order_condition_title'); ?></h2>
              <?php } ?>

              <div class="additional-content">
                <?php the_field('order_condition'); ?>
              </div>  
            </div>
          <?php } ?>

          

          <?php if(get_field('tech_desc')){ ?>
          <div class="pcard-description-next additional-text type2 additional-desc" >
            <!--<div class="h3"><?php //the_field('tech_title'); ?></div>-->
              <?php if(get_field('tech_desc_title')){ ?>
                <h2><?php the_field('tech_desc_title'); ?></h2>
              <?php } ?>

              <div class="additional-content">
                <?php the_field('tech_desc'); ?>
              </div>  
          </div>
          <?php } ?>

          <div class="additional-text type2 additional-desc">
              <h2 id="tech-char-articles">Технические характеристики</h2>

              <div class="additional-content">

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
          </div>

          <?php if(get_field('tech_add_info')){ ?>
          <div class="additional-text additional-desc" id="tech_add_info">
            <?php if(get_field('tech_add_info_title')){ ?>
              <h2><?php the_field('tech_add_info_title'); ?></h2>
            <?php } ?>

            <div class="additional-content">
              <?php the_field('tech_add_info'); ?>
            </div>  
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

       <div class="col-xs-12 col-sm-12 col-md-12">
        <?php if(get_field('schema_gruza')){ ?>
          <div class="additional-text additional-desc" id="schema_gruza">
            <h2>Схема грузоподъёмности</h2>
            <div class="additional-content">
                <img src="<?php the_field('schema_gruza'); ?>" alt="<?php the_field('tech_title'); ?>" title="<?php the_field('tech_title'); ?>"/>
            </div>  
          </div>
          <?php } ?>
      </div>

      <?php // вывод альтернативного или похожего предложения в виде таблицы ?>
      <?php include "include/price-list-alternativa.php"; ?>

      
      <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="single-card-img">

          <?php if(get_field('image_this_tech')){ ?>
            <?php the_field('image_this_tech'); ?>
          <?php }?>

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
          <div class="slider-pro" id="pcard-slider" onclick="yaCounter44012149.reachGoal('click-slider'); return true;" >
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

    </div>
  </div>
</section>

   