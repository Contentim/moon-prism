<?php

function theme_register_sidebars() {
  register_sidebar(array(
    'id' => 'sidebar-park',
    'name' => __('Парк техники'),
    'description' => 'Используется на страницах парка техники',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));
}
add_action( 'widgets_init', 'theme_register_sidebars' );

// unregister all widgets
function unregister_default_widgets() {
  unregister_widget('WP_Widget_Pages');
  unregister_widget('WP_Widget_Calendar');
  unregister_widget('WP_Widget_Archives');
  unregister_widget('WP_Widget_Links');
  unregister_widget('WP_Widget_Meta');
  unregister_widget('WP_Widget_Search');
  unregister_widget('WP_Widget_Text');
  unregister_widget('WP_Widget_Categories');
  unregister_widget('WP_Widget_Recent_Posts');
  unregister_widget('WP_Widget_Recent_Comments');
  unregister_widget('WP_Widget_RSS');
  unregister_widget('WP_Widget_Tag_Cloud');
  unregister_widget('WP_Nav_Menu_Widget');
  unregister_widget('Twenty_Eleven_Ephemera_Widget');
}

add_action('widgets_init', 'unregister_default_widgets', 11);


class thm_category_list_widget extends WP_Widget {

  function __construct() {
    parent::__construct('thm_category_list', 'Список категорий', array('description' => 'Список категорий парка техники'));
  }

  public function widget( $args, $instance ) {
    $cats = get_categories(array(
      'parent'=>0,
    ));
  ?>
    <nav class="aside-nav">
      <ul class="nav nav-stacked">
        <?php
          if(!empty(get_query_var('cat'))){
            $curr_cat = get_query_var('cat');
          }else{
            global $post;
            $curr_cat = get_the_category($post->ID);
            $curr_cat = $curr_cat[0]->term_id;
          }
          foreach($cats as $cat){
            $is_curr = $curr_cat == $cat->term_id;
        ?>
          <li <?php echo $is_curr?'class="active"':'';?>>
            <a href="<?php echo get_category_link($cat->term_id); ?>"><noindex>
              <?php echo $cat->name;
              if($is_curr){
                echo '<span class="pull-right caret-right"></span>';
              }
              ?>
              </noindex> 
            </a>
          </li>
        <?php } ?>
      </ul>
    </nav>
  <?php
  }
}

class leave_request_widget extends WP_Widget {

  function __construct() {
    parent::__construct(
    // Base ID of your widget
    'leave_request_widget', 
    // Widget name will appear in UI
    'Оставить заявку', 
    // Widget description
    array( 'description' => 'Предложить оставить заявку, чтобы ответить на интересующий вопрос', ) 
    );
  }

  public function widget( $args, $instance ) {
    $text = apply_filters( 'the_content', $instance['text'] );
    if (!empty($text)){
?>
    <div class="item-spc">
      <div class="item-spc-description">
        <?php echo $text; ?>
      </div>
      <a href="#" data-toggle="modal" data-target="#orderCall" class="caption-spc-btn">Оставить заявку</a>
    </div>
<?php
    }
  }

  // Widget Backend 
  public function form( $instance ) {
    if ( isset( $instance[ 'text' ] ) ) {
      $title = $instance[ 'text' ];
    } else {
      $title = '';
    }
  ?>
  <p>
    <label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Текст:' ); ?></label> 
    <textarea class="widefat" rows="10" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>"><?php echo esc_attr( $title ); ?></textarea>
  </p>
  <?php 
  }

  // Updating widget replacing old instances with new
  public function update( $new_instance, $old_instance ) {
  $instance = array();
  $instance['text'] = ( ! empty( $new_instance['text'] ) ) ? strip_tags( $new_instance['text'] ) : '';
  return $instance;
  }
}

function load_widgets() {
  register_widget( 'thm_category_list_widget' );
  register_widget( 'leave_request_widget' );
}

add_action( 'widgets_init', 'load_widgets' );
?>