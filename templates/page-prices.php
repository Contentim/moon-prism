<?php
/*
Template Name: Цены
*/
?>

<?php get_header(); ?>
<section class="content">
  <div class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-6">
          <h1 class="page-title"><?php the_title(); ?></h1>
          <div class="breadcrumbs">
            <?php yoast_breadcrumb(); ?>
          </div>
        </div>
        <div class="col-xs-6">
          <?php if(get_field('price_attachment')){ ?>
          <div class="get-price-btn">
            <a href="<?php the_field('price_attachment');?>" target="_blank" class="caption-btn">Скачать прайс-лист</a>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  <div class="page-content">
    <div class="container">
      <div class="row">
      <div class="col-xs-12">
        <?php
          $cats = get_categories(array('parent'=>0));
          $cats_i = 1;
        ?>

        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
          <?php foreach($cats as $cat){
            $posts = get_posts(array('category'=>$cat->term_id,'posts_per_page'=>-1));
          ?>

          <div class="panel panel-styled">
            <a class="panel-heading <?php echo $cats_i == 1?'':'collapsed'?>" role="tab" id="heading<?php echo $cat->term_id;?>" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $cat->term_id;?>" aria-expanded="true" aria-controls="collapse<?php echo $cat->term_id;?>">
              <h4 class="panel-title"><?php echo $cat->name; ?> <div class="caret"></div></h4>
            </a>
            <div id="collapse<?php echo $cat->term_id;?>" class="panel-collapse collapse<?php echo $cats_i == 1?' in':''?>" role="tabpanel" aria-labelledby="heading<?php echo $cat->term_id;?>">
              <div class="panel-body">
                <table class="table">
                  <thead>
                     <tr>
                       <td>Наименование<br>техники</td>
                       <td>Цена за смену<br>(7ч+1ч подачи)</td>
                       <td>Цена 1ч<br>переработки</td>
                       <td>Цена заезда<br>в ТТК</td>
                       <td>Цена 1 км<br>за  МКАД</td>
                     </tr>
                  </thead>
                  <tbody>
                  <?php foreach($posts as $post){
                    $postID = $post->ID;
                    $fields = array('price',
                                    'price_addit',
                                    'price_addit_processing',
                                    'price_addit_ttk'
                                   );
                    $params = array(
                      trim(CFS()->get($fields[0], $postID)),
                      trim(CFS()->get($fields[1], $postID)),
                      trim(CFS()->get($fields[2], $postID)),
                      trim(CFS()->get($fields[3], $postID)),
                    );

                  ?>
                     <tr>
                       <td><a href="<?php echo get_permalink($post->ID);?>"><?php echo $post->post_title;?></a></td>
                       <td><?php echo $params[0]?number_format(str_replace(',', '.', $params[0]), 0, '.', ' ').' руб.':''; ?></td>
                       <td><?php echo $params[2]?number_format(str_replace(',', '.', $params[2]), 0, '.', ' ').' руб.':''; ?></td>
                       <td><?php echo $params[3]?number_format(str_replace(',', '.', $params[3]), 0, '.', ' ').' руб.':''; ?></td>
                       <td><?php echo $params[1]?number_format(str_replace(',', '.', $params[1]), 0, '.', ' ').' руб.':''; ?></td>
                     </tr>
                   <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        <?php $cats_i++; } ?>
        </div>
      </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>
