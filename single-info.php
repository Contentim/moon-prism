<?php get_header(); ?>
<section class="content">
  <div class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
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
      <?php if(get_field('info_desc')){ ?>
      <div class="row mobile-reverse">
        <div class="col-xs-12 col-sm-6">
          <?php the_field('info_desc');?>
        </div>
        <div class="col-xs-12 col-sm-6">
          <?php the_post_thumbnail();?>
        </div>
      </div>
      <?php } ?>
      <?php if(get_field('info_add_desc')){ ?>
        <div class="additional-text">
          <?php the_field('info_add_desc');?>
        </div>
      <?php } ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>
