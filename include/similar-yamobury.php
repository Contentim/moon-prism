<?php
	
	$tech_arr = get_post_meta($post->ID, 'similar_yamobury', true);


	echo '<div class="ttl_alternative">Ямобуры</div>';
	echo '<table class="table_price table_postorder">';
	echo '	<thead>';
	echo '		<tr>';
	echo '			<td rowspan="2">Название техники</td>';
	echo '			<td rowspan="2">Длина стрелы</td>';
	echo '			<td rowspan="2">Диаметр бурения</td>';
	echo '			<td rowspan="2">Глубина бурения</td>';	
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
		  'yamobur_length_strela',
		  'yamobur_diametr_bureniya',
		  'yamobur_glubina_bureniya',
		  'yamobur_diametr_shnekov',
		  'yamobur_dop_content'
		  /*
		  'price_addit',
		  'price_addit_processing',
		  'price_addit_ttk',
		  
		  'price_addit_nds',
		  'price_addit_processing_nds',
		  'price_addit_processing_ttk_nds'*/
		 );

		$yamobur_price = get_post_meta($post_Id, 'price', false );
		$yamobur_price_nds = get_post_meta($post_Id, 'price_nds', false );
		$yamobur_length_strela = get_post_meta($post_Id, 'yamobur_length_strela', false );
		$yamobur_diametr_bureniya = get_post_meta($post_Id, 'yamobur_diametr_bureniya', false );
		$yamobur_glubina_bureniya = get_post_meta($post_Id, 'yamobur_glubina_bureniya', false ); 
		$yamobur_diametr_shnekov = get_post_meta($post_Id, 'yamobur_diametr_shnekov', false );
		$yamobur_dop_content = get_post_meta($post_Id, 'yamobur_dop_content', false );

		if (empty($yamobur_price_nds[0])) {
			$yamobur_price_nds = '<i>требует уточнения</i>';
		} else {
			$yamobur_price_nds = $yamobur_price_nds[0];
		}

		echo '<tr>';
		echo '<td><a onclick="yaCounter44012149.reachGoal(\'tech-alternativa\'); return true;" href="/yamobury/'.$post_semilar->post_name.'">'.$post_semilar->post_title.'</a></td>';
		echo '<td>'.$yamobur_length_strela[0].'</td>';
		echo '<td>'.$yamobur_diametr_bureniya[0].'</td>';
		echo '<td>'.$yamobur_glubina_bureniya[0].'</td>';
		echo '<td>'.$yamobur_price[0].'</td>';
		echo '<td>'.$yamobur_price_nds.'</td>';

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