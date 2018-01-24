 <?php

// тех. характеристики фуры
  $fields_char_fura = array(
    'fura_capacity',
    'fura_weight',
    'fura_length',
    'fura_shirina',
    'fura_height'
  );

  $field_info_char_fura = array(
    get_field($fields_char_fura[0],$postID),
    get_field($fields_char_fura[1],$postID),
    get_field($fields_char_fura[2],$postID),
    get_field($fields_char_fura[3],$postID),
    get_field($fields_char_fura[4],$postID)
  );

  foreach ($fields_char_fura as $key => $value) {
    switch ($value) {
      case 'fura_capacity':
        if (!empty($field_info_char_fura[0])) {
            echo '<li><b>Грузоподъемность:</b> '.$field_info_char_fura[0].'</li>';
          } 
          break;
      case 'fura_weight':
        if (!empty($field_info_char_fura[1])) {
            echo '<li><b>Объем кузова:</b> '.$field_info_char_fura[1].'</li>';
          } 
          break;
      case 'fura_length':
        if (!empty($field_info_char_fura[2])) {
            echo '<li><b>Длина кузова:</b> '.$field_info_char_fura[2].'</li>';
          } 
          break;
      case 'fura_shirina':
        if (!empty($field_info_char_fura[3])) {
            echo '<li><b>Ширина кузова:</b> '.$field_info_char_fura[3].'</li>';
          } 
          break;
      case 'fura_height':
        if (!empty($field_info_char_fura[4])) {
            echo '<li><b>Высота кузова:</b> '.$field_info_char_fura[4].'</li>';
          } 
          break;            
    }
  }

?>