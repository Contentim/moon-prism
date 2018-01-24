<?php
/*
Template Name: Парк техники
*/
?>

<?php get_header(); ?>

<section class="content">
  <div class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-7">
          <h1 class="page-title"><?php the_title(); ?></h1>
          <div class="breadcrumbs">
            <?php yoast_breadcrumb(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="page-content">
    <div class="set-eq">
      <div class="container">
        <div class="row">
         <?php
          $parkQuery = get_categories(array('parent'=>0));

          $i=1;
          $cnt = count($parkQuery);
          foreach($parkQuery as $item){

            $item_info['name'] = $item->name;
            $item_info['desc'] = $item->description;
            $item_info['preview'] = wp_get_attachment_url(get_field('tech_rubric_img','category_'.$item->term_id));
            $item_info['url'] = get_category_link($item->term_id);

            if($i == 4){ ?>
              <div class="col-xs-offset-1 col-xs-10 col-sm-offset-0 col-sm-4 col-md-3">
                <div class="item-spc">
                  <div class="item-spc-title">Нужна помощь?</div>
                  <div class="item-spc-description">
                    Заполните форму,<br>и наш специалист поможет<br>подобрать подходящий кран
                  </div>
                  <a href="#" class="caption-spc-btn" data-toggle="modal" data-target="#orderCall">Заказать расчет</a>
                </div>
              </div>
           <?php } ?>
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
    </div>
  </div>
</section>

<?php get_footer(); ?>