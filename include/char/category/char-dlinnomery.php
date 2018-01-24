<?php

// тех. характеристики длиномеров
  $fields_char_dlinnomery = array(
    'dlinnomery_capacity',
    'dlinnomery_dlina',
    'dlinnomery_shirina'
  );

  $field_info_char_dlinnomery = array(
    get_field($fields_char_dlinnomery[0],$postID),
    get_field($fields_char_dlinnomery[1],$postID),
    get_field($fields_char_dlinnomery[2],$postID)
  );

  foreach ($fields_char_dlinnomery as $key => $value) {
    switch ($value) {
      case 'dlinnomery_capacity':
        if (!empty($field_info_char_dlinnomery[0])) {
            echo '<li><b>Грузоподъёмность:</b> '.$field_info_char_dlinnomery[0].'</li>';
          } 
          break;
      case 'dlinnomery_dlina':
        if (!empty($field_info_char_dlinnomery[1])) {
            echo '<li><b>Длина борта:</b> '.$field_info_char_dlinnomery[1].'</li>';
          } 
          break;
      case 'dlinnomery_shirina':
        if (!empty($field_info_char_dlinnomery[2])) {
            echo '<li><b>Ширина борта:</b> '.$field_info_char_dlinnomery[2].'</li>';
          } 
          break;    
    }
  }

?>

