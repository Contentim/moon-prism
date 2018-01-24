<?php
/*
Template Name: Постраничный прайс-лист
*/
?>

<?php get_header(); ?>

<section class="content">
  <div class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-9">
          <h1 class="page-title"><?php the_title(); ?></h1>
          <div class="breadcrumbs">
            <?php yoast_breadcrumb(); ?>
          </div>
        </div>
        <div class="col-xs-3">
          <?php if(get_field('price_attachment')){ ?>
          <div class="get-price-btn">
            
            <?
              $download_price = get_post_custom_values('download_price');
              if (!empty($download_price[0])) {
                echo '<a href="'.$download_price[0].'" target="_blank" class="caption-btn">Скачать прайс-лист</a>';
              }
            ?>
            
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

      <?
        $id_autopark = get_post_custom_values('id_autopark');
      ?>


      <?php the_content( $more_link_text, $strip_teaser ); ?>


      <?
        $category_id = $id_autopark[0];
      ?>

        <?php
          $cats = get_categories(array('parent'=>0));
          $cats_i = 1;
        ?>

        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
          <?php 
            foreach($cats as $cat){
              $posts = get_posts(array('category'=>$category_id,'posts_per_page'=>-1));
                // $posts = get_posts(array('category'=>$cat->term_id,'posts_per_page'=>-1));
              if ($cat->term_id == $category_id) {
                $cat_name = $cat->name;
                $cat_id = $cat->term_id;
              }
            };
          ?>

          <div class="panel panel-styled">
              <div class="panel-body">
                <table class="table tablesorter">
                  <thead>
                     <tr>
                       <td>Наименование техники</td>
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
      </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>
