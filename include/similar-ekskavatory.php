<?php
	
	$tech_arr = get_post_meta($post->ID, 'similar_ekskavatory', true);

	// print_r($tech_arr);
	/*
	<h2>Экскаваторы</h2>
              <table class="table_price table_postorder">
                <thead>
                  <tr>
                    <td class="t_title" rowspan="2">Название техники</td>
                    <td class="" rowspan="2">Ёмкость ковша, м. куб.</td>
                    <td class="" rowspan="2">Глубина копания, м.</td>
                    <td class="" rowspan="2">MAX ёмкость ковша, м. куб.</td>
                    <td class="" rowspan="2">Грузоподъёмность фронтального ковша при MAX высоте подъёма, т.</td>
                    <td class="t_price" colspan="2">Цена смены</td>
                  </tr>
                  <tr>
                    <td class="t_man">для частников</td>
                    <td class="t_firma">для компаний</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <a href="javascript:;">Экскаваторы</a>
                    </td>
                    <td>груз-ть</td>
                    <td>11111</td>
                    <td>22222</td>
                    <td>22222</td>
                    <td>22222</td>
                    <td>22222</td>
                  </tr>
                </tbody>
              </table>
      */

	echo '<div class="ttl_alternative">Экскаваторы</div>';
	echo '<table class="table_price table_postorder">';
	echo '	<thead>';
	echo '		<tr>';
	echo '			<td rowspan="2" class="t_title">Название техники</td>';
	echo '			<td rowspan="2">Ёмкость фронтального ковша</td>';
	echo '			<td rowspan="2">Глубина копания</td>';
	echo '			<td rowspan="2">Ёмкость экс. ковша</td>';
	echo '			<td rowspan="2">Грузоподъёмность фронтального ковша при MAX высоте подъёма</td>';
	echo '			<td colspan="2" class="t_price">Цена смены</td>';
	echo '		</tr>';
	echo '		<tr>';
	echo '			<td class="t_man">для частников</td>';
	echo '			<td class="t_firma">для компаний</td>';
	echo '		</tr>';
	echo '	</thead>';
	echo '	<tbody>';

	foreach ($tech_arr as $key => $value) {
		
		$post_Id = $value;
		$category = get_the_category($post_Id); 
		$post_semilar = get_post($post_Id);  

		$fields_semilar = array(
			'price',
			'price_nds',
			'ex_weight_front_kowsh',
			'ex_front_kowsha_max_height',
			'ex_weight_ex_kowsha',
			'ex_glubina_kopaniya',
			'ex_massa',
			'ex_width_kowsha_pogruzka',
			'ex_gidromolot',
			'ex_height_vygruzky'
		);

		$ex_price = get_post_meta($post_Id, 'price', false );
		$ex_price_nds = get_post_meta($post_Id, 'price_nds', false );
		$ex_weight_front_kowsh = get_post_meta($post_Id, 'ex_weight_front_kowsh', false );
		$ex_front_kowsha_max_height = get_post_meta($post_Id, 'ex_front_kowsha_max_height', false );
		$ex_weight_ex_kowsha = get_post_meta($post_Id, 'ex_weight_ex_kowsha', false );
		$ex_glubina_kopaniya = get_post_meta($post_Id, 'ex_glubina_kopaniya', false );
		$ex_massa = get_post_meta($post_Id, 'ex_massa', false );
		$ex_width_kowsha_pogruzka = get_post_meta($post_Id, 'ex_width_kowsha_pogruzka', false );
		$ex_gidromolot = get_post_meta($post_Id, 'ex_gidromolot', false );
		$ex_height_vygruzky = get_post_meta($post_Id, 'ex_height_vygruzky', false );

		if (empty($ex_price_nds[0])) {
			$ex_price_nds = '<i>требует уточнения</i>';
		} else {
			$ex_price_nds = $ex_price_nds[0];
		}

		echo '<tr>';
		echo '<td><a onclick="yaCounter44012149.reachGoal(\'tech-alternativa\'); return true;" href="/ekskavatory/'.$post_semilar->post_name.'">'.$post_semilar->post_title.'</a></td>';
		echo '<td>'.$ex_weight_front_kowsh[0].'</td>';
		echo '<td>'.$ex_glubina_kopaniya[0].'</td>';
		echo '<td>'.$ex_weight_ex_kowsha[0].'</td>';
		echo '<td>'.$ex_front_kowsha_max_height[0].'</td>';
		echo '<td>'.$ex_price[0].'</td>';
		echo '<td>'.$ex_price_nds.'</td>';
		echo '</tr>';
		
		/*
		echo '<h2>'.$post_semilar->post_title.'</h2>';

		echo '<h2>Цены для юридических лиц - с НДС 18%</h2>';

		echo 'Смена: '.$params_semilar[4];
		echo "<br>";
		echo '1 час переработки: '.$params_semilar[6];
		echo "<br>";
		echo '1 час переработки в ТТК: '.$params_semilar[7];
		echo "<br>";
		echo '1 км за МКАД: '.$params_semilar[5];

		echo '<h2>Цены для физических лиц - без НДС</h2>';

		echo 'Смена: '.$params_semilar[0];
		echo "<br>";
		echo '1 час переработки: '.$params_semilar[2];;
		echo "<br>";
		echo '1 час переработки в ТТК: '.$params_semilar[3];
		echo "<br>";
		echo '1 км за МКАД: '.$params_semilar[1];
		*/

	}

	// function categoryListSimilarTechnique($item){
	// 	global $parent_item;
	// 	$post_Id = $item;
	// 	$category = get_the_category($post_Id);
	// 	$parent_item = $category[0]->slug;
	// }


	echo'	</tbody>';
	echo'</table>';

              
?>