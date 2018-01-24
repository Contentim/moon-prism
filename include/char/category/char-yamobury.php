<?php

// тех. характеристики кранов
  
  $fields_char_yamobur = array(
    'yamobur_diametr_bureniya',
    'yamobur_glubina_bureniya',
    'yamobur_diametr_shnekov',
    'yamobur_length_strela',
    'yamobur_dop_content'
  );

  $field_info_char_yamobur = array(
    get_field($fields_char_yamobur[0],$postID),
    get_field($fields_char_yamobur[1],$postID),
    get_field($fields_char_yamobur[2],$postID),
    get_field($fields_char_yamobur[3],$postID),
    get_field($fields_char_yamobur[4],$postID)
  );

  foreach ($fields_char_yamobur as $key => $value) {
    switch ($value) {
      case 'yamobur_diametr_bureniya':
        if (!empty($field_info_char_yamobur[0])) {
            echo '<li><b>Диаметр бурения:</b> '.$field_info_char_yamobur[0].'</li>';
          } 
          break;
      case 'yamobur_glubina_bureniya':
        if (!empty($field_info_char_yamobur[1])) {
            echo '<li><b>Глубина бурения:</b> '.$field_info_char_yamobur[1].'</li>';
          } 
          break;
      case 'yamobur_diametr_shnekov':
        if (!empty($field_info_char_yamobur[2])) {
            echo '<li><b>Диаметр шнеков:</b> '.$field_info_char_yamobur[2].'</li>';
          } 
          break; 
      case 'yamobur_length_strela':
        if (!empty($field_info_char_yamobur[3])) {
            echo '<li><b>Длина стрелы:</b> '.$field_info_char_yamobur[3].'</li>';
          } 
          break; 
      case 'yamobur_dop_content':
        if (!empty($field_info_char_yamobur[4])) {
            echo '<li><b>Дополнительные сведения:</b> '.$field_info_char_yamobur[4].'</li>';
          } 
          break;           
    }
  }

?>