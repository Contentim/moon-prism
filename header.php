
<?php  
$LastModified_unix = unix_time($post->post_modified);  
$LastModified = gmdate("D, d M Y H:i:s \G\M\T", $LastModified_unix);  
$IfModifiedSince = false; 
if (isset($_ENV['HTTP_IF_MODIFIED_SINCE'])) 
    $IfModifiedSince = strtotime(substr($_ENV['HTTP_IF_MODIFIED_SINCE'], 5));   
if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE'])) 
    $IfModifiedSince = strtotime(substr($_SERVER['HTTP_IF_MODIFIED_SINCE'], 5)); 
if ($IfModifiedSince && $IfModifiedSince >= $LastModified_unix) { 
    header($_SERVER['SERVER_PROTOCOL'] . ' 304 Not Modified'); 
    exit; 
} 
 
header('Last-Modified: '. $LastModified);

function unix_time($time_send){ 
     $year_lm=substr($time_send, 0, 4); 
     $mount_lm=substr($time_send, 5, 2); 
     $day_lm=substr($time_send, 8, 2); 
     $time_lm=substr($time_send, 10, 9); 
     $time_lm_unix_in = $year_lm.'-'.$mount_lm.'-'.$day_lm.' '.$time_lm; 
     $select_lm = strtotime($time_lm_unix_in); 
     return $select_lm; 
}

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Last-Modified" content="<?php echo $LastModified; ?>">
  <link rel="icon" href="<?php echo TEMPLATE_URI;?>/img/favicon.png">

  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="/content/themes/moon-prism/custom.css" type="text/css" media="all" />

  <?php wp_head(); ?>

  <script type="text/javascript" src="/content/themes/moon-prism/js/jquery.tablesorter.min.js"></script>
  <script type="text/javascript" src="/content/themes/moon-prism/js/custom.js"></script>

</head>
<body <?php body_class();?>>
  <header>
    <div id="top_nav">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-lg-12" id="header_list_top_nav">
            <div class="podacha_tech">Подача техники в пределах МКАД - бесплатно</div>
            <ul class="list_top_nav clearfix">
              <li><a href="/about/">О компании</a></li>
              <li><a href="/vakansii/">Вакансии</a></li>
              <li><a href="/info/">Статьи</a></li>
              <li><a href="/galereya/">Фотогалерея</a></li>
            </ul>
          </div>
        </div>
      </div>    
    </div>
    <div class="head">
      <div class="container">
        <div class="row">
          <div class="col-xs-5">
           <?php if(is_home()){ ?>
            <div class="logo">
              <div class="logo-title"><span>Спец</span>ТехноПеревозки</div>
              <div class="logo-slogon"><?php bloginfo('description'); ?></div>
            </div>
            <?php }else{ ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
              <div class="logo-title"><span>Спец</span>ТехноПеревозки</div>
              <div class="logo-slogon"><?php bloginfo('description'); ?></div>
            </a>
            <?php } ?>
          </div>
          <div class="col-xs-7">
            <div class="row">
              <div class="hidden-xs col-sm-6 col-lg-8">
                <div class="header-adress">
                  <?php the_field('contact_address_short', 7); ?>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="header-phone">
                  <span><?php the_field('contact_phone_header', 7); ?></span>
                  <a href="#" class="order_phone" data-toggle="modal" data-target="#orderCall">Заказать звонок</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php if (has_nav_menu("main_nav")): ?>
    <nav class="navbar navbar-styled">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
            <span class="sr-only">Меню</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="navbar-brand">Меню</div>
        </div>

        <div class="collapse navbar-collapse" id="navbar-collapse">
          <?php display_main_menu(); ?>
        </div>
      </div>
    </nav>
    <?php endif ?>
  </header>
