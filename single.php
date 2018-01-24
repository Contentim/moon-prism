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
                  'title_page_price',
                  'time_smena'
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
    trim(CFS()->get($fields[15], $postID)),
    trim(CFS()->get($fields[16], $postID))
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
  
    <?php
        $current_category = get_the_category(); 
        $current_category = $current_category[0]->cat_ID;
    
        include "ab-test-single-new.php";
        
    /*if ($current_category == 3) {
      include "ab-test-single-new.php";
    } else {
      include "ab-test-single-old.php";
    }*/

    ?>


<?php echo do_shortcode('[contact-form-7 id="241" title="Заказать технику"]'); ?>

<?php get_footer(); ?>
