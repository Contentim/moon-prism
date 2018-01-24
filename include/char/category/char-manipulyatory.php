<?php

// тех. характеристики манипуляторы
  $fields_char_manipulyatory = array(
    'manipulyatory_capacity',
    'manipulyatory_dlina_strely',
    'manipulyatory_capacity_borta',
    'manipulyatory_dlina_borta',
    'manipulyatory_shirina_borta'
  );

  $field_info_char_manipulyatory = array(
    get_field($fields_char_manipulyatory[0],$postID),
    get_field($fields_char_manipulyatory[1],$postID),
    get_field($fields_char_manipulyatory[2],$postID),
    get_field($fields_char_manipulyatory[3],$postID),
    get_field($fields_char_manipulyatory[4],$postID)
  );

  foreach ($fields_char_manipulyatory as $key => $value) {
    switch ($value) {
      case 'manipulyatory_capacity':
        if (!empty($field_info_char_manipulyatory[0])) {
            echo '<li><b>Грузоподъёмность стрелы:</b> '.$field_info_char_manipulyatory[0].'</li>';
          } 
          break;
      case 'manipulyatory_dlina_strely':
        if (!empty($field_info_char_manipulyatory[1])) {
            echo '<li><b>Длина стрелы:</b> '.$field_info_char_manipulyatory[1].'</li>';
          } 
          break;
      case 'manipulyatory_capacity_borta':
        if (!empty($field_info_char_manipulyatory[2])) {
            echo '<li><b>Грузоподъёмность борта:</b> '.$field_info_char_manipulyatory[2].'</li>';
          } 
          break;
      case 'manipulyatory_dlina_borta':
        if (!empty($field_info_char_manipulyatory[3])) {
            echo '<li><b>Длина борта:</b> '.$field_info_char_manipulyatory[3].'</li>';
          } 
          break;
      case 'manipulyatory_shirina_borta':
        if (!empty($field_info_char_manipulyatory[4])) {
            echo '<li><b>Ширина борта:</b> '.$field_info_char_manipulyatory[4].'</li>';
          } 
          break;
    }
  }

?>

