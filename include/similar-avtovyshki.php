<?php
	
	$tech_arr = get_post_meta($post->ID, 'similar_avtovyshki', true);

	// print_r($tech_arr);

	echo '<div class="ttl_alternative">Автовышки</div>';
	echo '<table class="table_price table_postorder">';
	echo '	<thead>';
	echo '		<tr>';
	echo '			<td rowspan="2" class="t_title">Название техники</td>';
	echo '			<td rowspan="2" class="t_gruz">Грузоподъемность</td>';
	echo '			<td rowspan="2" class="t_strela">Высота подъема</td>';
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
		  'vyshka_capacity',
		  'vyshka_height',
		  'vyshka_rotation',
		  'vyshka_gabarity',
		  'vyshka_kolesnaya_formula'

		 );

		$avtovyshki_price = get_post_meta($post_Id, 'price', false );
		$avtovyshki_price_nds = get_post_meta($post_Id, 'price_nds', false );
		$avtovyshki_capacity = get_post_meta($post_Id, 'vyshka_capacity', false );
		$vyshka_height = get_post_meta($post_Id, 'vyshka_height', false );

		if (empty($avtovyshki_price_nds[0])) {
			$avtovyshki_price_nds = '<i>требует уточнения</i>';
		} else {
			$avtovyshki_price_nds = $avtovyshki_price_nds[0];
		}


		echo '<tr>';
		echo '<td><a onclick="yaCounter44012149.reachGoal(\'tech-alternativa\'); return true;" href="/avtovyshki/'.$post_semilar->post_name.'">'.$post_semilar->post_title.'</a></td>';
		echo '<td>'.$avtovyshki_capacity[0].'</td>';
		echo '<td>'.$vyshka_height[0].'</td>';
		echo '<td>'.$avtovyshki_price[0].'</td>';
		echo '<td>'.$avtovyshki_price_nds.'</td>';

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