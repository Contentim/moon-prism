<div class="col-xs-12 col-sm-4 col-md-3 pc-version">
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