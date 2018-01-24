<?php
define("TEMPLATE_URI", get_template_directory_uri());

/* ==========================================================================
 * Определение IP-адреса
 * ========================================================================== */
function add_ipadress () {
echo '<script>var yaParams = {ip_adress: "'. $_SERVER['REMOTE_ADDR'] .'" };</script>';
}
add_action( 'wp_head', 'add_ipadress' );
/* ========================================================================== */

function setup_theme_support() {
  add_theme_support( 'html5', array(
    'search-form',
    'comment-list',
    'gallery',
    'caption'
  ));

  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');

	remove_action('wp_head','wp_generator');
  remove_action('wp_head','wlwmanifest_link');
  remove_action('wp_head','rsd_link');
  remove_action('wp_head','rest_output_link_wp_head',10);
  remove_action('wp_head','wp_oembed_add_discovery_links');
	remove_action('rest_api_init', 'wp_oembed_register_route');
  remove_action('template_redirect','rest_output_link_header', 11, 0 );
	remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
	remove_action('wp_head', 'wp_oembed_add_host_js');
  remove_action('wp_head', 'feed_links_extra', 3);
  remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
  remove_action('template_redirect', 'wp_shortlink_header', 11, 0);
	add_filter('emoji_svg_url', '__return_false' );

  remove_action('welcome_panel', 'wp_welcome_panel');
  remove_action('admin_color_scheme_picker', 'admin_color_scheme_picker');
  add_filter('autoptimize_filter_toolbar_show', '__return_false');


  show_admin_bar(false);

  register_nav_menus(
    array(
      'main_nav' => 'Главное меню',
    )
  );

  add_image_size( 'info_post_preview', 360, 240, true);

  // Custom theme for admin interface
  include 'opt/trim-admin.php';
  // Widgets and sidebars
  include('opt/theme-widgets.php');
  // Ru translit slug
  include('opt/ru-translit.php');
}

add_action('after_setup_theme','setup_theme_support');

// Now the CSS
function theme_style() {

  wp_enqueue_style('bs', TEMPLATE_URI.'/css/bootstrap.min.css', array(), null, 'all' );
  wp_enqueue_style('wpelem', TEMPLATE_URI.'/css/elements-style.css', array(), null, 'all' );
  wp_enqueue_style('fonts', TEMPLATE_URI.'/css/fonts.css', array(), null, 'all' );
  wp_enqueue_style('sp', TEMPLATE_URI.'/css/slider-pro.min.css', array(), null, 'all' );
  wp_enqueue_style('bs-s', '//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css', array(), null, 'all' );
  wp_enqueue_style('main-style', TEMPLATE_URI.'/style.css', array(), null, 'all' );
  wp_enqueue_style('main-mobile', TEMPLATE_URI.'/css/mobile.css', array(), null, 'all' );

  if(is_page_template('templates/page-calc.php')){
    wp_enqueue_style('calc-css', TEMPLATE_URI.'/calc/css/calc.css', array(), null, 'all' );
    wp_enqueue_style('yarrow-css', TEMPLATE_URI.'/calc/css/yarrow.css', array(), null, 'all' );
  }

}

// Now the JS
function theme_scripts() {

  wp_enqueue_script('js-bs',       TEMPLATE_URI.'/js/bootstrap.min.js', array('jquery'),null);
  wp_enqueue_script('js-bstool',   TEMPLATE_URI.'/js/bootstrap-toolkit.min.js', array('jquery'),null);
  wp_enqueue_script('js-sp',       TEMPLATE_URI.'/js/jquery.sliderPro.min.js', array('jquery'),null);
  wp_enqueue_script('jall',        TEMPLATE_URI.'/js/jarallax.js', array('jquery'), null);

  if(is_page_template('templates/page-contacts.php')){
    wp_enqueue_script('js-gapi',     '//maps.googleapis.com/maps/api/js', array(), null);
  }

  wp_enqueue_script('js-bs-s',     '//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js', array('jquery'), null);
  wp_enqueue_script('js-main',     TEMPLATE_URI.'/js/scripts.js', array('jquery'), null);

  wp_localize_script('js-main', 'ajax', array('url'=> admin_url('admin-ajax.php')));

  if(is_page_template('templates/page-calc.php')){
    wp_enqueue_script('d3sel', 'http://d3js.org/d3-selection.v0.6.min.js', array());
    wp_enqueue_script('svgu', 'http://rawgit.com/krispo/svg-path-utils/master/build/svg-path-utils.min.js', array());
    wp_enqueue_script('yarrow', TEMPLATE_URI.'/calc/js/yarrow.min.js', array());
    wp_enqueue_script('raphael', TEMPLATE_URI.'/calc/js/raphael.min.js', array());
    wp_enqueue_script('calc-js', TEMPLATE_URI.'/calc/js/podbor.js', array());
  }

  /*
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
  */
}

add_action('wp_print_styles', 'theme_style');
add_action('wp_enqueue_scripts', 'theme_scripts');

// Menu output mods
class bootstrap_walker extends Walker_Nav_Menu {

    function start_el(&$output, $object, $depth = 0, $args = Array(), $current_object_id = 0) {

        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $dropdown = $args->has_children && $depth == 0;

        $class_names = $value = '';

        // If the item has children, add the dropdown class for bootstrap
        if ( $dropdown ) {
            $class_names = "dropdown ";
        }

        $classes = empty( $object->classes ) ? array() : (array) $object->classes;

        $class_names .= join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $object ) );
        $class_names = ' class="'. esc_attr( $class_names ) . '"';

        $output .= $indent . '<li id="menu-item-'. $object->ID . '"' . $value . $class_names .'>';

        if ( $dropdown ) {
            $attributes = ' href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"';
        } else {
            $attributes  = ! empty( $object->attr_title ) ? ' title="'  . esc_attr( $object->attr_title ) .'"' : '';
            $attributes .= ! empty( $object->target )     ? ' target="' . esc_attr( $object->target     ) .'"' : '';
            $attributes .= ! empty( $object->xfn )        ? ' rel="'    . esc_attr( $object->xfn        ) .'"' : '';
            $attributes .= ! empty( $object->url )        ? ' href="'   . esc_attr( $object->url        ) .'"' : '';
        }

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before .apply_filters( 'the_title', $object->title, $object->ID );
        $item_output .= $args->link_after;

        // if the item has children add the caret just before closing the anchor tag
        if ( $dropdown ) {
            $item_output .= ' <b class="caret"></b>';
        }
        $item_output .= '</a>';

        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $object, $depth, $args );
    } // end start_el function

    function start_lvl(&$output, $depth = 0, $args = Array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class='dropdown-menu' role='menu'>\n";
    }

    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ){
        $id_field = $this->db_fields['id'];
        if ( is_object( $args[0] ) ) {
            $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
        }
        return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
}

// Add Twitter Bootstrap's standard 'active' class name to the active nav link item
function add_active_class($classes, $item) {
  if(in_array('current-menu-item', $classes)) {
    $classes[] = "active";
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'add_active_class', 10, 2 );

// Add item to Top menu to append
function add_search_to_nav( $items, $args ) {
  $items .= '<li class="menu-item-calc"><a href="'.get_permalink(586).'">Расчёт грузоподъёмности</a></li>';
  return $items;
}
add_filter( 'wp_nav_menu_items', 'add_search_to_nav', 10, 2 );

// display the main menu bootstrap-style
// this menu is limited to 2 levels (that's a bootstrap limitation)
function display_main_menu() {
  wp_nav_menu(
    array(
      'theme_location' => 'main_nav', /* where in the theme it's assigned */
      'menu' => 'main_nav', /* menu name */
      'menu_class' => 'nav navbar-nav nav-justified',
      'container' => false, /* container class */
      'depth' => 2,
      'walker' => new bootstrap_walker(),
    )
  );
}

/*
  A function used in multiple places to generate the metadata of a post.
*/
function display_post_meta() {
?>

    <ul class="meta text-muted list-inline">
        <li>
            <a href="<?php the_permalink() ?>">
                <span class="glyphicon glyphicon-time"></span>
                <?php the_date(); ?>
            </a>
        </li>
        <li>
            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>">
                <span class="glyphicon glyphicon-user"></span>
                <?php the_author(); ?>
            </a>
        </li>
        <?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
        <li>
            <?php
                $sp = '<span class="glyphicon glyphicon-comment"></span> ';
                comments_popup_link($sp . __( 'Leave a comment'), $sp . __( '1 Comment'), $sp . __( '% Comments'));
            ?>
        </li>
        <?php endif; ?>
        <?php edit_post_link(__( 'Edit'), '<li><span class="glyphicon glyphicon-pencil"></span> ', '</li>'); ?>
    </ul>

<?php
}

function page_navi() {
  global $wp_query;
  if (get_next_posts_link() || get_previous_posts_link()) { ?>
    <nav class="block">
      <ul class="pager pager-unspaced">
        <li class="previous"><?php next_posts_link("&laquo; " . __('Older posts')); ?></li>
        <li class="next"><?php previous_posts_link(__('Newer posts') . " &raquo;"); ?></li>
      </ul>
    </nav>
  <?php } ?>

    <?php
}

/*** ДОБАВЛЯЕМ meta robots noindex,nofollow ДЛЯ СТРАНИЦ ***/
function meta_noindex () {
  if (is_paged() /*Все и любые страницы пагинации*/) {
    echo "".'<meta name="robots" content="noindex,follow" />'."\n";
  } else {
    echo "".'<meta name="robots" content="index,follow" />'."\n";
  }
}
 
add_action('wp_head', 'meta_noindex', 1); // добавляем свой noindex,nofollow в head

function numeric_posts_nav() {

  global $wp_query;

  /** Stop execution if there's only 1 page */
  if( $wp_query->max_num_pages <= 1 )
      return;

  $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
  $max   = intval( $wp_query->max_num_pages );

  /**	Add current page to the array */
  if ( $paged >= 1 )
      $links[] = $paged;

  /**	Add the pages around the current page to the array */
  if ( $paged >= 3 ) {
      $links[] = $paged - 1;
      $links[] = $paged - 2;
  }

  if ( ( $paged + 2 ) <= $max ) {
      $links[] = $paged + 2;
      $links[] = $paged + 1;
  }

  echo '<nav class="pages-nav">
        <ul class="pagination">'. "\n";

  /**	Previous Post Link */
  if ( get_previous_posts_link() )
      printf( '<li>%s</li>' . "\n", get_previous_posts_link('<span class="caret-left" aria-hidden="true"></span>') );

  /**	Link to first page, plus ellipses if necessary */
  if ( ! in_array( 1, $links ) ) {
      $class = 1 == $paged ? ' class="active"' : '';

      printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

      if ( ! in_array( 2, $links ) )
          echo '<li>…</li>';
  }

  /**	Link to current page, plus 2 pages in either direction if necessary */
  sort( $links );
  foreach ( (array) $links as $link ) {
      $class = $paged == $link ? ' class="active"' : '';
      printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
  }

  /**	Link to last page, plus ellipses if necessary */
  if ( ! in_array( $max, $links ) ) {
      if ( ! in_array( $max - 1, $links ) )
          echo '<li>…</li>' . "\n";

      $class = $paged == $max ? ' class="active"' : '';
      printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
  }

  /**	Next Post Link */
  if ( get_next_posts_link() )
      printf( '<li>%s</li>' . "\n", get_next_posts_link('<span class="caret-right" aria-hidden="true"></span>') );

  echo '</ul></nav>' . "\n";
}

function main_classes() {
    $nbr_sidebars = (is_active_sidebar('sidebar-left') ? 1 : 0) + (is_active_sidebar('sidebar-right') ? 1 : 0);
    $classes = "";
    if ($nbr_sidebars == 0) {
        $classes .= "col-sm-8 col-md-push-2";
    } else if ($nbr_sidebars == 1) {
        $classes .= "col-md-8";
    } else {
        $classes .= "col-md-6";
    }
    if (is_active_sidebar( 'sidebar-left' )) {
        $classes .= " col-md-push-".($nbr_sidebars == 2 ? 3 : 4);
    }
    echo $classes;
}

function sidebar_right_classes() {
  $nbr_sidebars = (is_active_sidebar('sidebar-left') ? 1 : 0) + (is_active_sidebar('sidebar-right') ? 1 : 0);
  echo 'col-md-'.($nbr_sidebars == 2 ? 3 : 4);
}

function disable_wp_emojicons() {
  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
}
add_action( 'init', 'disable_wp_emojicons' );

// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
  global $post;
	return '<a class="moretag" href="'. get_permalink($post->ID) . '" title="Подробнее">...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


//добавляем тип поста
add_action( 'init', 'add_post_type' );

function add_post_type() {

  register_post_type('service', array(
    'labels' => array(
      'name' => 'Услуги',
      'add_new' => 'Добавить',
      'singular_name' => 'Услуги',
      'add_new' => 'Добавить',
      'add_new_item' => 'Добавление услуги',
      'edit_item' => 'Редактирование услуги',
      'new_item' => 'Добавление услуги',
      'all_items' => 'Все проекты',
      'view_item' => 'Просмотреть на сайте',
      'search_items' => 'Найти',
    ),
    'public' => true,
    'has_archive' => true,
    'menu_icon' => 'dashicons-welcome-add-page',
    'show_ui' => true,
    'menu_position' => 8,
    'capability_type' => 'post',
    'hierarchical' => false,
    'query_var' => true,
    'supports' => array(
      'title',
      //'editor',
      'thumbnail'
    )
  ));

  register_post_type('info', array(
    'labels' => array(
      'name' => 'Полезное',
      'add_new' => 'Добавить',
      'singular_name' => 'Полезное',
      'add_new' => 'Добавить',
      'add_new_item' => 'Добавление записи',
      'edit_item' => 'Редактирование записи',
      'new_item' => 'Добавление записи',
      'all_items' => 'Все записи',
      'view_item' => 'Просмотреть на сайте',
      'search_items' => 'Найти',
    ),
    'public' => true,
    'has_archive' => true,
    'menu_icon' => 'dashicons-admin-post',
    'show_ui' => true,
    'menu_position' => 8,
    'capability_type' => 'post',
    'hierarchical' => false,
    'query_var' => true,
    'supports' => array(
      'title',
      'editor',
      'thumbnail'
    )
  ));

  register_post_type('machinery', array(
    'labels' => array(
      'name' => 'Продвигаемое',
      'add_new' => 'Добавить',
      'singular_name' => 'Продвигаемое',
      'add_new' => 'Добавить',
      'add_new_item' => 'Добавление записи',
      'edit_item' => 'Редактирование записи',
      'new_item' => 'Добавление записи',
      'all_items' => 'Все записи',
      'view_item' => 'Просмотреть на сайте',
      'search_items' => 'Найти',
    ),
    'menu_icon' => 'dashicons-admin-post',
    'menu_position' => 7,
    'capability_type' => 'post',
    'public' => true,
    'has_archive' => false,
    'rewrite' => array('slug' => 'park-tekhniki'),
    'supports' => array(
      'title',
      'editor',
      'thumbnail'
    ),
  ));
}

function revcon_change_post_label() {
  global $menu;
  global $submenu;
  $menu[5][6] = 'dashicons-editor-kitchensink';
}

function revcon_change_post_object() {
  global $wp_post_types;
  $post = &$wp_post_types['post'];
  $labels = $post->labels;
  $labels->name = 'Парк техники';
  $labels->singular_name = 'Техника';
  $labels->add_new = 'Добавить';
  $labels->add_new_item = 'Добавить технику';
  $labels->edit_item = 'Редактировать';
  $labels->new_item = 'Техника';
  $labels->view_item = 'Посмотреть';
  $labels->search_items = 'Поиск техники';
  $labels->all_items = 'Вся техника';
  $labels->menu_name = 'Парк техники';
  $labels->name_admin_bar = 'Парк техники';

}

add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );

add_shortcode( 'getphone' , 'getnumphone' );
function getnumphone(){
  return get_field('contact_phone', 7);
}

function filter_merge_queries($catID, array $updates, $unset = false ) {
  $req = $_GET;
  if($unset == true){
    foreach($updates as $k=>$param){
      unset($req[$k]);
    }
    $updates = array();
  }
  $params = array_merge(array('filter'=>''),$req, $updates);
  return get_category_link($catID).'?'.http_build_query($params);
}

// Сортировать в категории по произвольному полю "Цена"
function sort_in_category_by_price( $query ) {
  if ($query->is_main_query() && $query->is_category()) {
    $query->set('orderby', 'meta_value_num');
    $query->set('meta_key','price' );
    $query->set('order', 'ASC' );
  }
}
add_action( 'pre_get_posts', 'sort_in_category_by_price' );

function bk_calulate_load_capacity_crane() {
  $data = $_POST['data'];

  /*

  X Высота - f(x) Вес

  $y = f(x) = (-14*x + 264)/10

  X Вылет - f(x) Вес
  $x = f(x) = (-3.4*x + 60.4)/10;

  $g = sqrt(((-14*14 + 264)/10)+((-3.4*14 + 60.4)/10))-0.5;
  */

  $first_post  = get_posts('numberposts=1&category=1');

  $fields = array('filter_param_1',  // Марка крана
                  'filter_param_2',  // Грузоподъёмность
                  'filter_param_3',  // Вылет стрелы
                  'params_addit',
                  'price',
                  'price_addit',
                  'filter_param_4'); // Максимальная высота подъема крюка

  $field_info = array(
    CFS()->get_field_info($fields[0], $first_post[0]->ID),
    CFS()->get_field_info($fields[1], $first_post[0]->ID),
    CFS()->get_field_info($fields[2], $first_post[0]->ID),
    CFS()->get_field_info($fields[6], $first_post[0]->ID),
  );

  $posts_per_page = get_option('posts_per_page');

  $paramsQ = array(
    'category' => 1,
    'posts_per_page' => -1,
    'orderby' => 'meta_value_num',
    'meta_key' => 'price',
    'order' => 'ASC',
    'meta_query' => array(
      array(
        'key'     => 'filter_param_2',
        'value'   => (int) $data['g_weight'],
        'type'    => 'numeric',
        'compare' => '>=',
      )),
  );

  if($_POST['loadMore']){
    $paramsQ['posts_per_page'] = 50;
    $paramsQ['offset'] = $posts_per_page;
  }

  /*
    Вес груза, eказывается одним числом,
    так что, достаём все краны с подходящим весом
  */
  $all_posts = get_posts($paramsQ);

  // Парсинг поля "Вылет стрелы"
  $filter_max_width = array();
  foreach ($all_posts as $crane) {
    $width = CFS()->get('filter_param_3', $crane->ID);
    preg_match_all( "/([0-9.?0-9]+)/" , $width, $all_value);

    //ищем все цифры и складываем их.
    $max_width = 0;
    foreach ($all_value[0] as $value) {
      $max_width += intval($value);
    }

    if($max_width >= intval($data['c_width'])){
      $filter_max_width[$crane->ID] = true;
    }
  }

  // высота подъёма
  $filter_max_height = array();
  foreach ($all_posts as $crane) {
    $height = CFS()->get('filter_param_4', $crane->ID);
    preg_match_all( "/([0-9.?0-9]+)/" , $height, $all_value);

    $max_height = 0;
    foreach ($all_value[0] as $value) {
      $max_height += intval($value);
    }

    $sizeand_height = $data['c_height'];
    if($max_height >= intval($sizeand_height)){
        $filter_max_height[$crane->ID] = true;
    }
  }

  $filtered_crane = array_keys(array_intersect_key($filter_max_width, $filter_max_height));

  $posts = array();

  if(!empty($filtered_crane)){
    $posts = get_posts(array(
      'category' => 1,
      'posts_per_page' => $posts_per_page+1,
      'orderby' => 'meta_value_num',
      'meta_key' => 'price',
      'order' => 'ASC',
      'post__in' => $filtered_crane,
    ));
  }

?>
  <?php if(!empty($posts)) {
    foreach($posts as $i => $item){
      ?>
      <div class="catalog-item">
        <div class="row">
          <div class="hidden-xs col-sm-3">
            <div class="catalog-item-img">
              <a href="<?php echo get_permalink($item->ID);?>">
                <?php
                $post_images = get_post_meta($item->ID, 'inpost_gallery_data', true);
                if ($post_images && !is_numeric($post_images)) {
                    foreach($post_images as $img) {
                      $preview_img['small'] = $img['imgurl'];
                      break;
                    }
                    echo '<img class="thumbnail-image" src="'.$preview_img['small'].'">';
                  }else{
                    echo '<img src="'.TEMPLATE_URI.'/img/no-photo.png" alt="">';
                  }
                ?>
              </a>
            </div>
          </div>
          <div class="col-xs-7 col-sm-7">
            <div class="catalog-item-title h3"><a href="<?php echo get_permalink($item->ID);?>"><?php echo get_the_title($item->ID); ?></a></div>
            <div class="catalog-item-description">
              <?php
                $params = array(
                  trim(CFS()->get($fields[1], $item->ID)),
                  trim(CFS()->get($fields[2], $item->ID)),
                  CFS()->get($fields[3], $item->ID),
                  trim(CFS()->get($fields[4], $item->ID)),
                  trim(CFS()->get($fields[5], $item->ID)),
                  trim(CFS()->get($fields[6], $item->ID)),
                );
                if($params[0] != false){
                  echo $field_info[1]['label'].': <span>'.$params[0].' т</span><br>';
                }
                if($params[1] != false){
                  echo $field_info[2]['label'].': <span>'.$params[1].' м</span><br>';
                }
                if($params[5] != false){
                  echo $field_info[3]['label'].': <span>'.$params[5].' м</span><br>';
                }
                if($params[2] != false){
                  foreach($params[2] as $k=>$v){
                    echo trim($v['params_addit_name']).': <span>'.trim($v['params_addit_val']).'</span><br>';
                    if($k == 1) break;
                  }
                }
              ?>
            </div>
          </div>
          <div class="col-xs-5 col-sm-4 col-md-2">
            <div class="catalog-item-priceinfo">
              <div class="catalog-item-price">
                Цена за смену:
                <?php if($params[3] != false){ ?>
                  <span><?php echo number_format($params[3],0,'.',' '); ?> руб.</span>
                <?php }else{ ?>
                  <span>требует уточнения</span>
                <?php } ?>
              </div>
              <a href="#" class="getcrane caption-btn" data-name="<?php echo get_the_title($item->ID); ?>" data-url="<?php echo get_permalink($item->ID);?>">Заказать</a>
            </div>
          </div>
        </div>
      </div>
      <?php
        if($i == $posts_per_page-1 && !isset($_POST['loadMore'])) {
          break;
        }
      }

      if(count($posts) > get_option('posts_per_page') && !isset($_POST['loadMore'])){
        echo '<button id="loadMore" data-c_width="'.$data['c_width'].'" data-c_height="'.$data['c_height'].'" data-g_height="'.$data['g_height'].'" data-g_weight="'.$data['g_weight'].'" class="btn-y">Показать ещё</button>';
      }
    }else{
      echo '<h2 class="text-center">Извините, подходящего крана не найдено.<br>Сможем ли, мы, Вам помочь уточните по телефону '.get_field('contact_phone_header', 7).'</h2>';
    }?>
<?php
  wp_die();
}

add_action('wp_ajax_calulate', 'calulate_load_capacity_crane');
add_action('wp_ajax_nopriv_calulate', 'calulate_load_capacity_crane');


function calulate_load_capacity_crane() {
  $data = $_POST['data'];

  $posts_per_page = get_option('posts_per_page');

    /*
      Получаем все краны которые могут поднять требуемый вес.
      Вес груза, указывается одним числом.
    */
  $paramsQ = array(
    'category' => 1,
    'posts_per_page' => -1,
    'orderby' => 'meta_value_num',
    'meta_key' => 'price',
    'order' => 'ASC',
    'meta_query' => array(
      array(
        'key'     => 'filter_param_2',
        'value'   => (int) $data['g_weight'],
        'type'    => 'numeric',
        'compare' => '>=',
      )),
  );

  $all_posts = get_posts($paramsQ);

  // Парсинг поля "Вылет стрелы"
  $filtered_crane = array();
  foreach ($all_posts as $crane) {

    $x = intval($data['c_width']);
    $y = intval($data['c_height']);
    $w = intval($data['g_weight']);

    $table_json  = CFS()->get('table_json', $crane->ID);

    $table  = json_decode('['.$table_json.']', true);

    if(empty(trim($table_json)) || json_last_error() != JSON_ERROR_NONE){
      continue;
    }

    for($i = count($table)-1; $i > 0; --$i) {
    	if ($x <= $table[$i]['x'] && $y <= $table[$i]['y'] && $w <= $table[$i]['w']) {
        $filtered_crane[] = $crane->ID;
        //var_dump($table[$i]['x'], $table[$i]['y'], $table[$i]['w']);echo '<br>';
        break;
    	}
    }

  }

  $posts = array();

  if(!empty($filtered_crane)){
    $first_post  = get_posts('numberposts=1&category=1');
    $fields = array('filter_param_1',  // Марка крана
                    'filter_param_2',  // Грузоподъёмность
                    'filter_param_3',  // Вылет стрелы
                    'params_addit',
                    'price',
                    'price_addit',
                    'filter_param_4'); // Максимальная высота подъема крюка

    $field_info = array(
      CFS()->get_field_info($fields[0], $first_post[0]->ID),
      CFS()->get_field_info($fields[1], $first_post[0]->ID),
      CFS()->get_field_info($fields[2], $first_post[0]->ID),
      CFS()->get_field_info($fields[6], $first_post[0]->ID),
    );

    $filter_params = array(
      'category' => 1,
      'posts_per_page' => $posts_per_page+1,
      'orderby' => 'meta_value_num',
      'meta_key' => 'price',
      'order' => 'ASC',
      'post__in' => $filtered_crane,
    );

    //Если приходит запрос показать ещё, то показываем ещё 50 позиций.
    if($_POST['loadMore']){
      $filter_params['posts_per_page'] = 50;
      $filter_params['offset'] = $posts_per_page;
    }

    $posts = get_posts($filter_params);
  }

?>
  <?php if(!empty($posts)) {
    foreach($posts as $i => $item){
      ?>
      <div class="catalog-item">
        <div class="row">
          <div class="hidden-xs col-sm-3">
            <div class="catalog-item-img">
              <a href="<?php echo get_permalink($item->ID);?>">
                <?php
                $post_images = get_post_meta($item->ID, 'inpost_gallery_data', true);
                if ($post_images && !is_numeric($post_images)) {
                    foreach($post_images as $img) {
                      $preview_img['small'] = $img['imgurl'];
                      break;
                    }
                    echo '<img class="thumbnail-image" src="'.$preview_img['small'].'">';
                  }else{
                    echo '<img src="'.TEMPLATE_URI.'/img/no-photo.png" alt="">';
                  }
                ?>
              </a>
            </div>
          </div>
          <div class="col-xs-7 col-sm-7">
            <div class="catalog-item-title h3"><a href="<?php echo get_permalink($item->ID);?>"><?php echo get_the_title($item->ID); ?></a></div>
            <div class="catalog-item-description">
              <?php
                $params = array(
                  trim(CFS()->get($fields[1], $item->ID)),
                  trim(CFS()->get($fields[2], $item->ID)),
                  CFS()->get($fields[3], $item->ID),
                  trim(CFS()->get($fields[4], $item->ID)),
                  trim(CFS()->get($fields[5], $item->ID)),
                  trim(CFS()->get($fields[6], $item->ID)),
                );
                if($params[0] != false){
                  echo $field_info[1]['label'].': <span>'.$params[0].' т</span><br>';
                }
                if($params[1] != false){
                  echo $field_info[2]['label'].': <span>'.$params[1].' м</span><br>';
                }
                if($params[5] != false){
                  echo $field_info[3]['label'].': <span>'.$params[5].' м</span><br>';
                }
                if($params[2] != false){
                  foreach($params[2] as $k=>$v){
                    echo trim($v['params_addit_name']).': <span>'.trim($v['params_addit_val']).'</span><br>';
                    if($k == 1) break;
                  }
                }
              ?>
            </div>
          </div>
          <div class="col-xs-5 col-sm-4 col-md-2">
            <div class="catalog-item-priceinfo">
              <div class="catalog-item-price">
                Цена за смену:
                <?php if($params[3] != false){ ?>
                  <span><?php echo number_format($params[3],0,'.',' '); ?> руб.</span>
                <?php }else{ ?>
                  <span>требует уточнения</span>
                <?php } ?>
              </div>
              <a href="#" class="getcrane caption-btn" data-name="<?php echo get_the_title($item->ID); ?>" data-url="<?php echo get_permalink($item->ID);?>">Заказать</a>
            </div>
          </div>
        </div>
      </div>
      <?php
        if($i == $posts_per_page-1 && !isset($_POST['loadMore'])) {
          break;
        }
      }

      if(count($posts) > get_option('posts_per_page') && !isset($_POST['loadMore'])){
        echo '<button id="loadMore" data-c_width="'.$data['c_width'].'" data-c_height="'.$data['c_height'].'" data-g_height="'.$data['g_height'].'" data-g_weight="'.$data['g_weight'].'" class="btn-y">Показать ещё</button>';
      }
    }else{
      echo '<h2 class="text-center">Извините, подходящего крана не найдено.<br>Сможем ли, мы, Вам помочь уточните по телефону '.get_field('contact_phone_header', 7).'</h2>';
    }?>
<?php
  wp_die();
}
