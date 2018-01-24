<?php
/*
  Template Name: Калькулятор
*/
?>

<?php get_header(); ?>

<section class="content">
  <div class="page-header">
    <div class="container">
      <h1 class="page-title"><?php the_title(); ?></h1>
      <div class="page-text"><?php the_content(); ?></div>
    </div>
  </div>

  <div class="page-description">
    <div class="container">
      <div class="row">
      <div class="col-xs-12 col-sm-4 col-md-3">
        <aside>
          <nav class="aside-nav">
            <ul class="nav nav-stacked">
              <li>
                <div class="metrik-parameter">
                  <label>Вес груза (т) <input id="g_weight" class="calc_input" name="vesGruza" maxlength="3" value="0.1" type="text"></label>
                  <div class="help-block">Вес поднимаемаго груза</div>
                </div>
              </li>
              <li>
                <div class="metrik-parameter">
                  <label>Высота груза (м) <input id="g_height" class="calc_input "type="text" maxlength="2" value="5" title="Высота груза (м)" name="g_height"></label>
                  <div class="help-block">Размер груза по высоте</div>
                </div>
              </li>
              <li>
                <div class="metrik-parameter">
                  <label>Высота подъема (м) <input id="c_height_show" class="calc_input" type="text" maxlength="2" value="0" title="Высота груза (м)" name="c_height_show"></label>
                  <input id="c_height" type="hidden" value="0" name="c_height">
                  <div class="help-block">Требуемая высота для подъёма</div>
                </div>
              </li>
              <li>
                <div class="metrik-parameter">
                  <label>Вылет стрелы (м)  <input id="c_width" class="calc_input" type="text" maxlength="2" value="1" title="Высота груза (м)" name="visotaGruza"></label>
                  <div class="help-block">Удаление от оси крана до оси груза</div>
                </div>
              </li>
            </ul>
          </nav>
          <button class="btn-y" id="requestCrane">Подобрать автокран</button>
        </aside>
      </div>
      <div class="col-xs-12 col-sm-8 col-md-9">
        <div id="work_place" class="work_place">
      	  <img class="grunt" src="/content/themes/moon-prism/templates/calc/img/grunt.png" width="847" height="8">
        </div>
      </div>
      <div class="col-xs-12">
        <div id="AjaxFilteredShow" class="fileredshow">
          <div class="catalog-list"></div>
        </div>
      </div>
    </div>
    </div>
  </div>
</section>

<?php echo do_shortcode('[contact-form-7 id="241" title="Заказать технику"]'); ?>

<?php get_footer(); ?>
