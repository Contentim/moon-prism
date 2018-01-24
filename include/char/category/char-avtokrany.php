<?php

// тех. характеристики кранов
  $fields_char_kran = array(
    'kran_capacity',
    'kran_boom_length',
    'kran_gusek',
    'kran_max_height_lifting',
    'kran_weight_boom',
    'kran_wheel_formula',
    'kran_gabarit_transport_length'
  );

  $field_info_char_kran = array(
    get_field($fields_char_kran[0],$postID),
    get_field($fields_char_kran[1],$postID),
    get_field($fields_char_kran[2],$postID),
    get_field($fields_char_kran[3],$postID),
    get_field($fields_char_kran[4],$postID),
    get_field($fields_char_kran[5],$postID),
    get_field($fields_char_kran[6],$postID),
  );

  foreach ($fields_char_kran as $key => $value) {
    switch ($value) {
      case 'kran_capacity':
        if (!empty($field_info_char_kran[0])) {
            echo '<li><b>Грузоподъёмность:</b> '.$field_info_char_kran[0].'</li>';
          } 
          break;
      case 'kran_boom_length':
        if (!empty($field_info_char_kran[1])) {
            echo '<li><b>Длина стрелы:</b> '.$field_info_char_kran[1].'</li>';
          } 
          break;
      case 'kran_gusek':
        if (!empty($field_info_char_kran[2])) {
                    echo '<li><b>Длина гуська (удлинитель стрелы):</b> '.$field_info_char_kran[2].'</li>';
                }
          break;
      case 'kran_max_height_lifting':
        if (!empty($field_info_char_kran[3])) {
          echo '<li><b>Максимальная высота подъема крюка:</b> '.$field_info_char_kran[3].'</li>';
        }
          break;
      case 'kran_weight_boom':
        if (!empty($field_info_char_kran[4])) {
          echo '<li><b>Масса груза, допустимая при выдвижение стрелы:</b> '.$field_info_char_kran[4].'</li>';
        }
          break;
      case 'kran_wheel_formula':
        if (!empty($field_info_char_kran[5]) && !is_category()) {
          echo '<li><b>Колесная формула:</b> '.$field_info_char_kran[5].'</li>';
        }
          break;
      case 'kran_gabarit_transport_length':
        if (!empty($field_info_char_kran[6]) && !is_category()) {
          echo '<li><b>Габариты в транспортном положении (Д х Ш х В):</b> '.$field_info_char_kran[6].'</li>';
        }
          break;        
    }
  }

?>