<?php

// тех. характеристики кранов
  $fields_char_nt = array(
    'nt_capacity',
    'nt_length',
    'nt_height',
    'nt_weight'
  );

  $field_info_char_nt = array(
    get_field($fields_char_nt[0],$postID),
    get_field($fields_char_nt[1],$postID),
    get_field($fields_char_nt[2],$postID),
    get_field($fields_char_nt[3],$postID)
  );

  foreach ($fields_char_nt as $key => $value) {
    switch ($value) {
      case 'nt_capacity':
        if (!empty($field_info_char_nt[0])) {
            echo '<li><b>Грузоподъёмность:</b> '.$field_info_char_nt[0].'</li>';
          } 
          break;
      case 'nt_length':
        if (!empty($field_info_char_nt[1])) {
            echo '<li><b>Длина борта:</b> '.$field_info_char_nt[1].'</li>';
          } 
          break;
      case 'nt_height':
        if (!empty($field_info_char_nt[2])) {
            echo '<li><b>Высота борта:</b> '.$field_info_char_nt[2].'</li>';
          } 
          break;
      case 'nt_weight':
        if (!empty($field_info_char_nt[3])) {
            echo '<li><b>Ширина борта:</b> '.$field_info_char_nt[3].'</li>';
          } 
          break;        
    }
  }

?>