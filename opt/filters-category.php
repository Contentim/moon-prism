<?php
global $wp_query, $post;

$is_post = is_single() && get_post_type($post);

if($is_post){
  $cat_ID = get_field('filters_cat');
} else {
  $cat_ID = get_query_var('cat');
}

$posts_cat = get_posts('numberposts=-1&category='.$cat_ID);
$filter_params = array();
$filter_args_only = array();

foreach($posts_cat as $p){
  $param_val[0] = trim(CFS()->get($fields[0], $p->ID));
  $param_val[1] = trim(CFS()->get($fields[1], $p->ID));
  $param_val[2] = trim(CFS()->get($fields[2], $p->ID));
  $param_val[3] = trim(CFS()->get($fields[4], $p->ID));

  if(!empty($param_val[0])){
    $filter_params[0][] = $param_val[0];
  }
  if(!empty($param_val[1])){
    $filter_params[1][] = $param_val[1];
  }
  if(!empty($param_val[2])){
    $filter_params[2][] = $param_val[2];
  }
  if(!empty($param_val[3])){
    $filter_params[3][] = $param_val[3];
  }
}

if(!empty($filter_params[0])){
  $filter_params[0] = array_unique($filter_params[0]);
}
if(!empty($filter_params[1])){
  $filter_params[1] = array_unique($filter_params[1]);
  sort($filter_params[1], SORT_NUMERIC);
}
if(!empty($filter_params[2])){
  $filter_params[2] = array_unique($filter_params[2]);
  sort($filter_params[2], SORT_NUMERIC);
}
if(!empty($filter_params[3])){
  $filter_params[3] = array_unique($filter_params[3]);
}

if($is_post) {
  parse_str(html_entity_decode(get_field('filters_params')), $_GET);
}

if(isset($_GET['filter']) || $is_post){
  $posts_id_filtered = array();
  $inc_posts = array();
  $filtered = false;

  if(isset($_GET['brand'])){
    $val = trim($_GET['brand']);
    $inc_posts = array();
    foreach($posts_cat as $p){
      $param_val = trim(CFS()->get($fields[0], $p->ID));
      if(!empty($param_val) && $param_val == $val){
        $inc_posts[] = $p->ID;
      }
    }
    $posts_id_filtered[] = $inc_posts;
    $filtered = true;
  }

  if(isset($_GET['capacity'])){
    $val = trim($_GET['capacity']);
    $inc_posts = array();
    foreach($posts_cat as $p){
      $param_val = trim(CFS()->get($fields[1], $p->ID));
      if(!empty($param_val) && $param_val == $val){
        $inc_posts[] = $p->ID;
      }
    }
    $posts_id_filtered[] = $inc_posts;
    $filtered = true;
  }

  if(isset($_GET['capacity_order'])){
    $filter_args['orderby'] = 'meta_value_num';
    $filter_args['meta_key'] = $fields[1];
    if($_GET['capacity_order'] == 'desc') {
      $filter_args['order'] = 'DESC';
    }else{
      $filter_args['order'] = 'ASC';
    }
  }

  if(isset($_GET['length_order'])){
    $filter_args['orderby'] = 'meta_value_num';
    $filter_args['meta_key'] = $fields[2];
    if($_GET['length_order'] == 'desc') {
      $filter_args['order'] = 'DESC';
    }else{
      $filter_args['order'] = 'ASC';
    }
  }

  if(isset($_GET['price_order'])){
    $filter_args['orderby'] = 'meta_value_num';
    $filter_args['meta_key'] = $fields[4];
    if($_GET['price_order'] == 'desc') {
      $filter_args['order'] = 'DESC';
    }else{
      $filter_args['order'] = 'ASC';
    }
  }

  if(isset($_GET['length'])){
    $val = trim($_GET['length']);
    $inc_posts = array();
    foreach($posts_cat as $p){
      $param_val = trim(CFS()->get($fields[2], $p->ID));
      if(!empty($param_val) && $param_val == $val){
        $inc_posts[] = $p->ID;
      }
    }
    $posts_id_filtered[] = $inc_posts;
    $filtered = true;
  }

  if(count($posts_id_filtered) > 1) {
    $filter_args['post__in'] = call_user_func_array('array_intersect', $posts_id_filtered);
  }else{
    $filter_args['post__in'] = $posts_id_filtered[0];
  }
  if(!empty($filter_args['post__in']) || !$filtered){
    $filter_args_only = $filter_args;
    $filter_args = array_merge($wp_query->query_vars, $filter_args);
  }else{
    $filter_args['post__in']= array(false);
  }

  query_posts($filter_args);
}
?>
