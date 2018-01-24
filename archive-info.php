<?php get_header(); ?>
<section class="content">
  <div class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="page-title"><?php echo post_type_archive_title(); ?></div>
          <div class="breadcrumbs">
            <?php yoast_breadcrumb(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="page-content">
    <div class="container">
      <?php if (have_posts()) : ?>
      <div class="row">
      <?php
        $i=1;
        $cnt = $wp_query->post_count;
        while (have_posts()) : the_post(); ?>

        <div class="col-xs-12 col-sm-4">
          <a class="blitem" href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('info_post_preview'); ?>
            <div class="blitem-description">
              <time><?php echo get_the_date(); ?></time>
              <div class="blitem-text"><?php the_title();?></div>
            </div>
          </a>
        </div>
        <?php
          if($i%3 == 0){
            echo '</div>'; //.row
            if($i < $cnt) {
              echo '<div class="row">';
            }
          }
          $i++;
        ?>
      <?php endwhile; ?>	
      </div>

      <div class="row">
        <div class="col-xs-12">
          <?php numeric_posts_nav(); ?>
        </div>
      </div>

      <?php else : ?>
      <article id="post-not-found" class="block">
          <p><?php _e("No items found."); ?></p>
      </article>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>