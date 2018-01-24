<?php

// тех. характеристики газелей
  $fields_char_gazel = array(
    'gazel_capacity',
    'gazel_dlina',
    'gazel_shirina',
    'gazel_height',
    'gazel_users',
    'gazel_weight',
    'gazel_height_kuzova',
    'gazel_piramida',
    'gazel_gruz'
  );

  $field_info_char_gazel = array(
    get_field($fields_char_gazel[0],$postID),
    get_field($fields_char_gazel[1],$postID),
    get_field($fields_char_gazel[2],$postID),
    get_field($fields_char_gazel[3],$postID),
    get_field($fields_char_gazel[4],$postID),
    get_field($fields_char_gazel[5],$postID),
    get_field($fields_char_gazel[6],$postID),
    get_field($fields_char_gazel[7],$postID),
    get_field($fields_char_gazel[8],$postID)
  );

  foreach ($fields_char_gazel as $key => $value) {
    switch ($value) {
      case 'gazel_capacity':
        if (!empty($field_info_char_gazel[0])) {
            echo '<li><b>Грузоподъёмность:</b> '.$field_info_char_gazel[0].'</li>';
          } 
          break;
      case 'gazel_dlina':
        if (!empty($field_info_char_gazel[1])) {
            echo '<li><b>Длина борта:</b> '.$field_info_char_gazel[1].'</li>';
          } 
          break;
      case 'gazel_shirina':
        if (!empty($field_info_char_gazel[2]) && !is_category()) {
            echo '<li><b>Ширина борта:</b> '.$field_info_char_gazel[3].'</li>';
          } 
          break;
      case 'gazel_height':
        if (!empty($field_info_char_gazel[3]) && !is_category()) {
            echo '<li><b>Высота автомобиля:</b> '.$field_info_char_gazel[3].'</li>';
          } 
          break;
      case 'gazel_users':
        if (!empty($field_info_char_gazel[4]) && !is_category()) {
            echo '<li><b>Кол-во пассажиров:</b> '.$field_info_char_gazel[4].'</li>';
          } 
          break;
      case 'gazel_weight':
        if (!empty($field_info_char_gazel[5])) {
            echo '<li><b>Объем кузова:</b> '.$field_info_char_gazel[5].'</li>';
          } 
          break;
      case 'gazel_height_kuzova':
        if (!empty($field_info_char_gazel[6])) {
            echo '<li><b>Высота кузова:</b> '.$field_info_char_gazel[6].'</li>';
          } 
          break;
      case 'gazel_piramida':
        if (!empty($field_info_char_gazel[7])) {
            echo '<li><b>Высота пирамиды:</b> '.$field_info_char_gazel[7].'</li>';
          } 
          break;
      case 'gazel_gruz':
        if (!empty($field_info_char_gazel[8])) {
            echo '<li><b>Длина допустимого груза:</b> '.$field_info_char_gazel[8].'</li>';
          } 
          break;                    
    }
  }

?>


