<?php

   // тех. характеристики автовышек
  $fields_char_vyshka = array(
    'vyshka_capacity',
    'vyshka_height',
    'vyshka_rotation',
    'vyshka_gabarity',
    'vyshka_kolesnaya_formula'
  );

  $field_info_char_vyshka = array(
    get_field($fields_char_vyshka[0],$postID),
    get_field($fields_char_vyshka[1],$postID),
    get_field($fields_char_vyshka[2],$postID),
    get_field($fields_char_vyshka[3],$postID),
    get_field($fields_char_vyshka[4],$postID)
  );

  foreach ($fields_char_vyshka as $key => $value) {
    switch ($value) {
      case 'vyshka_capacity':
        if (!empty($field_info_char_vyshka[0])) {
            echo '<li><b>Грузоподъёмность:</b> '.$field_info_char_vyshka[0].'</li>';
          } 
          break;
      case 'vyshka_height':
        if (!empty($field_info_char_vyshka[1])) {
            echo '<li><b>Рабочая высота подъема:</b> '.$field_info_char_vyshka[1].'</li>';
          } 
          break;
      case 'vyshka_rotation':
        if (!empty($field_info_char_vyshka[2]) && !is_category()) {
            echo '<li><b>Угол вращения поворотной части:</b> '.$field_info_char_vyshka[2].'</li>';
        }
        break;
      case 'vyshka_gabarity':
        if (!empty($field_info_char_vyshka[3]) && !is_category()) {
          echo '<li><b>Габариты автомашины:</b> '.$field_info_char_vyshka[3].'</li>';
        }
          break;
      case 'vyshka_kolesnaya_formula':
        if (!empty($field_info_char_vyshka[4]) && !is_category()) {
          echo '<li><b>Колесная формула:</b> '.$field_info_char_vyshka[4].'</li>';
        }
          break;
    }
  }
  
?>