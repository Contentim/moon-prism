<?php

// тех. характеристики экскаваторов
  $fields_char_excavator = array(
    'ex_weight_front_kowsh',
    'ex_front_kowsha_max_height',
    'ex_weight_ex_kowsha',
    'ex_glubina_kopaniya',
    'ex_massa',
    'ex_width_kowsha_pogruzka',
    'ex_gidromolot',
    'ex_height_vygruzky'
  );

  $field_info_char_excavator = array(
    get_field($fields_char_excavator[0],$postID),
    get_field($fields_char_excavator[1],$postID),
    get_field($fields_char_excavator[2],$postID),
    get_field($fields_char_excavator[3],$postID),
    get_field($fields_char_excavator[4],$postID),
    get_field($fields_char_excavator[5],$postID),
    get_field($fields_char_excavator[6],$postID),
    get_field($fields_char_excavator[7],$postID)
  );

  foreach ($fields_char_excavator as $key => $value) {
    switch ($value) {
      case 'ex_weight_front_kowsh':
        if (!empty($field_info_char_excavator[0])) {
            echo '<li><b>Ёмкость фронтального ковша:</b> '.$field_info_char_excavator[0].'</li>';
          } 
          break;
      case 'ex_front_kowsha_max_height':
        if (!empty($field_info_char_excavator[1])) {
            echo '<li><b>Грузоподъемность фронтального ковша при максимальной высоте подъема:</b> '.$field_info_char_excavator[1].'</li>';
          } 
          break;
      case 'ex_weight_ex_kowsha':
        if (!empty($field_info_char_excavator[2])) {
            echo '<li><b>Ёмкость экскаваторного ковша:</b> '.$field_info_char_excavator[2].'</li>';
          } 
          break; 
      case 'ex_glubina_kopaniya':
        if (!empty($field_info_char_excavator[3])) {
            echo '<li><b>Глубина копания:</b> '.$field_info_char_excavator[3].'</li>';
          } 
          break; 
      case 'ex_massa':
        if (!empty($field_info_char_excavator[4]) && !is_category()) {
            echo '<li><b>Масса:</b> '.$field_info_char_excavator[4].'</li>';
          } 
          break;  
      case 'ex_width_kowsha_pogruzka':
        if (!empty($field_info_char_excavator[5]) && !is_category()) {
            echo '<li><b>Ширина ковша для погрузки:</b> '.$field_info_char_excavator[5].'</li>';
          } 
          break; 
      case 'ex_gidromolot':
        if (!empty($field_info_char_excavator[6]) && !is_category()) {
            echo '<li><b>Гидромолот:</b> '.$field_info_char_excavator[6].'</li>';
          } 
          break; 
      case 'ex_height_vygruzky':
        if (!empty($field_info_char_excavator[7]) && !is_category()) {
            echo '<li><b>Высота выгрузки:</b> '.$field_info_char_excavator[7].'</li>';
          } 
          break;                    
    }
  }

?>