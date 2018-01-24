<?php

// тех. характеристики кранов
  $fields_char_konteinerovoz = array(
    'konteinerovoz_capacity',
    'konteinerovoz_gabarity'
  );

  $field_info_char_konteinerovoz = array(
    get_field($fields_char_konteinerovoz[0],$postID),
    get_field($fields_char_konteinerovoz[1],$postID)
  );

  foreach ($fields_char_konteinerovoz as $key => $value) {
    switch ($value) {
      case 'konteinerovoz_capacity':
        if (!empty($field_info_char_konteinerovoz[0])) {
            echo '<li><b>Грузоподъёмность:</b> '.$field_info_char_konteinerovoz[0].'</li>';
          } 
          break;
      case 'konteinerovoz_gabarity':
        if (!empty($field_info_char_konteinerovoz[1])) {
            echo '<li><b>Габариты полуприцепа (Д х Ш х В):</b> '.$field_info_char_konteinerovoz[1].'</li>';
          } 
          break;
    }
  }

?>