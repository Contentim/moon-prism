<?php
/*
Template Name: О нас
*/
?>

<?php get_header();

$bg_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
?>
<section class="content">
  <div class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-lg-7">
          <h1 class="page-title"><?php the_title(); ?><?php edit_post_link('<span class="glyphicon glyphicon-pencil" title="Редактировать"></span>');?></h1>
          <div class="breadcrumbs">
            <?php yoast_breadcrumb(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="page-description">
    <div class="container">
      <div class="row">
        <div class="col-xs-12"><?php the_field('about_desc'); ?></div>
      </div>
    </div>
  </div>

  <div class="jarallax" style="background-image:url(<?php echo $bg_img[0]; ?>)" data-image="<?php echo $bg_img[0]; ?>" data-min-height="739" data-max-height="739">
  <div class="about">
    <div class="night-block"></div>
    <div class="container">
      <div class="about-title">
        <?php the_field('about_plus_title'); ?>
        <div class="about-description">
          <?php the_field('about_plus_desc'); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-6">
          <div class="feature-v2">
            <div class="feature-v2-title"><span class="caret-right"></span><?php the_field('about_plus1_title'); ?></div>
            <div class="feature-v2-description"><?php the_field('about_plus1_desc'); ?></div>
          </div>
          <div class="feature-v2">
            <div class="feature-v2-title"><span class="caret-right"></span><?php the_field('about_plus2_title'); ?></div>
            <div class="feature-v2-description"><?php the_field('about_plus2_desc');?></div>
          </div>
          <div class="feature-v2">
            <div class="feature-v2-title"><span class="caret-right"></span><?php the_field('about_plus3_title'); ?></div>
            <div class="feature-v2-description"><?php the_field('about_plus3_desc');?></div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6">
          <div class="feature-v2">
            <div class="feature-v2-title"><span class="caret-right"></span><?php the_field('about_plus4_title'); ?></div>
            <div class="feature-v2-description"><?php the_field('about_plus4_desc');?></div>
          </div>
          <div class="feature-v2">
            <div class="feature-v2-title"><span class="caret-right"></span><?php the_field('about_plus5_title'); ?></div>
            <div class="feature-v2-description"><?php the_field('about_plus5_desc');?></div>
          </div>
          <div class="feature-v2">
            <div class="feature-v2-title"><span class="caret-right"></span><?php the_field('about_plus6_title'); ?></div>
            <div class="feature-v2-description"><?php the_field('about_plus6_desc');?></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="information">
    <div class="container">
     <div class="information-img about-img"></div>
      <div class="row">
        <div class="col-xs-12 col-sm-6">
          <div class="information-content">
            <div class="information-title">
              <?php the_field('about_bottom_title');?>
            </div>
            <div class="information-text"><?php the_field('about_bottom_desc');?></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>
