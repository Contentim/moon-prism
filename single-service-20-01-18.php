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

        <div class="col-xs-12 col-sm-9">
          <div class="service-desc">
            <?php if(get_field('service_content_html')){ the_field('service_content_html'); } ?>
           </div>
        </div>

        <div class="col-xs-12 col-sm-4 col-md-3 sidebar-category-menu">
          <aside>
            <nav class="aside-nav alternate">
              <ul class="nav nav-stacked">
                <li>
                  <a href="#">Квартирный переезд</a>
                </li>
                <li>
                  <a href="#">Дачный переезд</a>
                </li>
                <li>
                  <a href="#">Офисный переезд</a>
                </li>
                <li>
                  <a href="#">Такелажные работы</a>
                </li>
                <li>
                  <a href="#">Разгрузка стекла или зеркал</a>
                </li>
                <li>
                  <a href="#">Перевозка пианино</a>
                </li>
                <li>
                  <a href="#">Вывоз мусора</a>
                </li>
              </ul>
            </nav>
          </aside>
        </div>

        <div class="col-xs-12 col-sm-12">
          <div class="service-desc">
            <?php if(get_field('service_content_full_width')){ the_field('service_content_full_width'); } ?>
           </div>
        </div>

        

        <!-- <div class="col-xs-12 col-sm-12">
          <?php //the_post_thumbnail();?>
        </div> -->

      </div>

    </div>
  </div>
</section>
<?php get_footer(); ?>

