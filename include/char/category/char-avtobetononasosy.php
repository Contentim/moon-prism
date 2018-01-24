 <?php

// тех. характеристики автобетононасосов
  $fields_char_beton = array(
    'beton_height',
    'beton_range',
    'beton_size_stock',
    'beton_size_piston',
    'beton_gabarity'
  );

  $field_info_char_beton = array(
    get_field($fields_char_beton[0],$postID),
    get_field($fields_char_beton[1],$postID),
    get_field($fields_char_beton[2],$postID),
    get_field($fields_char_beton[3],$postID),
    get_field($fields_char_beton[4],$postID)
  );

  foreach ($fields_char_beton as $key => $value) {
    switch ($value) {
      case 'beton_height':
        if (!empty($field_info_char_beton[0])) {
            echo '<li><b>Высота подачи:</b> '.$field_info_char_beton[0].'</li>';
          } 
          break;
      case 'beton_range':
        if (!empty($field_info_char_beton[1])) {
            echo '<li><b>Дальность подачи:</b> '.$field_info_char_beton[1].'</li>';
          } 
          break;
      case 'beton_size_stock':
        if (!empty($field_info_char_beton[2])) {
            echo '<li><b>Объём подачи штоковой стороны:</b> '.$field_info_char_beton[2].'</li>';
        }
        break;
      case 'beton_size_piston':
        if (!empty($field_info_char_beton[3])) {
          echo '<li><b>Объём подачи поршневой стороны:</b> '.$field_info_char_beton[3].'</li>';
        }
          break;
      case 'beton_gabarity':
        if (!empty($field_info_char_beton[4])) {
          echo '<li><b>Размер площадки:</b> '.$field_info_char_beton[4].'</li>';
        }
          break;    
    }
  }

?>