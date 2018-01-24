<?php

// тех. характеристики кранов
  $fields_char_samosval = array(
    'samosval_capacity',
    'samosval_weight'
  );

  $field_info_char_samosval = array(
    get_field($fields_char_samosval[0],$postID),
    get_field($fields_char_samosval[1],$postID)
  );

  foreach ($fields_char_samosval as $key => $value) {
    switch ($value) {
      case 'samosval_capacity':
        if (!empty($field_info_char_samosval[0])) {
            echo '<li><b>Грузоподъёмность:</b> '.$field_info_char_samosval[0].'</li>';
          } 
          break;
      case 'samosval_weight':
        if (!empty($field_info_char_samosval[1])) {
            echo '<li><b>Объем кузова:</b> '.$field_info_char_samosval[1].'</li>';
          } 
          break;
    }
  }

?>