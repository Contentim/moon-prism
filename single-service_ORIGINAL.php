<?php get_header(); ?>
<section class="content">
  <div class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-lg-7">
          <h1 class="page-title"><?php the_title(); ?></h1>
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

        <div class="col-xs-12 col-sm-4">
          <?php the_post_thumbnail();?>
        </div>

        <div class="col-xs-12 col-sm-8">
          <div class="service-desc">
            <?php the_field('service_desc');?>
          </div>
          <?php if(get_field('service_price')){?>
          <div class="service-price">Цена за смену: <span class="h3"><?php the_field('service_price');?></span></div>
          <?php } ?>
        </div>

      </div>

      <?php if(get_field('service_add_desc')){?>
        <div class="additional-text type2">
          <?php the_field('service_add_desc');?>
        </div>
      <?php } ?>

      <?php if(get_field('service_txt1')){?>
      <div class="row page-inset-content">
        <div class="col-xs-12 col-sm-8 col-md-9">
          <h2 class="h3"><?php the_field('service_txt1_title');?></h2>
          <?php the_field('service_txt1');?>
        </div>
        <div class="col-xs-offset-1 col-xs-10 col-sm-offset-0 col-sm-4 col-md-3">
          <div class="item-spc">
            <div class="item-spc-description">
              Не нашли то, что искали?<br>
              Позвоните диспетчеру по<br>
              тел. <span class="phone-bold"><?php echo getnumphone(); ?></span><br>
              или оставьте заявку.<br>
              Мы подберем для вас подходящий вариант.
            </div>
            <a href="#" data-toggle="modal" data-target="#orderCall" class="caption-spc-btn">Оставить заявку</a>
          </div>
        </div>
      </div>
      <?php } ?>

      <?php if(get_field('service_txt2')){?>
      <div class="additional-text">
        <h3 class="h3"><?php the_field('service_txt2_title');?></h3>
        <?php the_field('service_txt2');?>
      </div>
      <?php } ?>
      
    </div>
  </div>
</section>
<?php get_footer(); ?>