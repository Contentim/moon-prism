<?php
/*
Template Name: Контакты
*/
?>

<?php get_header();

  $location = get_field('map_point');
?>
<section class="content">
  <div class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-6">
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
      <div class="col-xs-12 col-sm-5" itemscope itemtype="http://schema.org/Organization">
		<span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
        <?php if(get_field('contact_address')){?>
          <span class="contacts-info-title">Адрес:</span>
          <?php the_field('contact_address'); ?>
        <?php } ?>
        <?php if(get_field('contact_phone')){?>
          <br><br>
          <span class="contacts-info-title">Телефон:</span>
          <?php the_field('contact_phone'); ?>
        <?php } ?>
        <?php if(get_field('contact_mail')){?>
          <br><br>
          <span class="contacts-info-title">Email:</span>
          <?php the_field('contact_mail'); ?>
        <?php } ?>
		</span>
        <?php if(get_field('contact_info')){?>
          <br><br>
          <?php the_field('contact_info'); ?>
        <?php } ?>
        <div class="contactform">
          <div class="contactform-text">
            <?php echo do_shortcode('[contact-form-7 id="22" title="Обратная связь"]'); ?>
          </div>
        </div>
      </div>
     </div>
    </div>
  </div>
  <div class="mapblock">
    <div id="map" class="map" data-lat="<?php echo $location['lat'];?>" data-lng="<?php echo $location['lng'];?>"></div>
  </div>
</section>
<?php get_footer(); ?>
