 <?php

// тех. характеристики фуры
  $fields_char_musorovoz = array(
    'musorovoz_capacity',
    'musorovoz_weight',
    'musorovoz_tip_pogruzki'
  );

  $field_info_char_musorovoz = array(
    get_field($fields_char_musorovoz[0],$postID),
    get_field($fields_char_musorovoz[1],$postID),
    get_field($fields_char_musorovoz[2],$postID)
  );

  foreach ($fields_char_musorovoz as $key => $value) {
    switch ($value) {
      case 'musorovoz_capacity':
        if (!empty($field_info_char_musorovoz[0])) {
            echo '<li><b>Грузоподъемность:</b> '.$field_info_char_musorovoz[0].'</li>';
          }
          break;
      case 'musorovoz_weight':
        if (!empty($field_info_char_musorovoz[1])) {
            echo '<li><b>Объем кузова:</b> '.$field_info_char_musorovoz[1].'</li>';
          }
          break;
      case 'musorovoz_tip_pogruzki':
        if (!empty($field_info_char_musorovoz[2])) {
            echo '<li><b>Тип загрузки:</b> '.$field_info_char_musorovoz[2].'</li>';
          }
          break;
    }
  }

?>