<?php
	
	$tech_arr = get_post_meta($post->ID, 'similar_musorovoz', true);

	echo '<div class="ttl_alternative">Мусоровозы</div>';
	echo '<table class="table_price table_postorder">';
	echo '	<thead>';
	echo '		<tr>';
	echo '			<td rowspan="2" class="t_title">Название техники</td>';
	echo '			<td rowspan="2">Грузоподъемность</td>';
	echo '			<td rowspan="2">Объем кузова</td>';
	echo '			<td rowspan="2">Тип погрузки</td>';
	echo '			<td colspan="2">Цена смены</td>';
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
		  'musorovoz_capacity',
		  'musorovoz_weight',
		  'musorovoz_tip_pogruzki'
		  /*
		  'price_addit',
		  'price_addit_processing',
		  'price_addit_ttk',
		  
		  'price_addit_nds',
		  'price_addit_processing_nds',
		  'price_addit_processing_ttk_nds'*/
		 );

		$musorovoz_price = get_post_meta($post_Id, 'price', false );
		$musorovoz_price_nds = get_post_meta($post_Id, 'price_nds', false );
		$musorovoz_capacity = get_post_meta($post_Id, 'musorovoz_capacity', false );
		$musorovoz_weight = get_post_meta($post_Id, 'musorovoz_weight', false );
		$musorovoz_tip_pogruzki = get_post_meta($post_Id, 'musorovoz_tip_pogruzki', false );

		if (empty($musorovoz_price_nds[0])) {
			$musorovoz_price_nds = '<i>требует уточнения</i>';
		} else {
			$musorovoz_price_nds = $musorovoz_price_nds[0];
		}

		echo '<tr>';
		echo '<td><a onclick="yaCounter44012149.reachGoal(\'tech-alternativa\'); return true;" href="/musorovoz/'.$post_semilar->post_name.'">'.$post_semilar->post_title.'</a></td>';
		echo '<td>'.$musorovoz_capacity[0].'</td>';
		echo '<td>'.$musorovoz_weight[0].'</td>';
		echo '<td>'.$musorovoz_tip_pogruzki[0].'</td>';
		echo '<td>'.$musorovoz_price[0].'</td>';
		echo '<td>'.$musorovoz_price_nds.'</td>';

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

	echo'	</tbody>';
	echo'</table>';

              
?>