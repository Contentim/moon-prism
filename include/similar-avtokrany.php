<?php
	
	$tech_arr = get_post_meta($post->ID, 'similar_avtokrany', true);

	echo '<div class="ttl_alternative">Автокраны</div>';
	echo '<table class="table_price table_postorder">';
	echo '	<thead>';
	echo '		<tr>';
	echo '			<td rowspan="2" class="t_title">Название техники</td>';
	echo '			<td rowspan="2">Грузоподъемность</td>';
	echo '			<td rowspan="2">Вылет стрелы</td>';
	echo '			<td rowspan="2">Длина гуська (удлинитель стрелы)</td>';
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
		  'kran_capacity',
		  'kran_boom_length',
		  'kran_gusek',
		  'kran_max_height_lifting',
		  'kran_weight_boom',
		  'kran_wheel_formula',
		  'kran_gabarit_transport_length'
		 );

		$kran_price = get_post_meta($post_Id, 'price', false );
		$kran_price_nds = get_post_meta($post_Id, 'price_nds', false );
		$kran_capacity = get_post_meta($post_Id, 'kran_capacity', false );
		$kran_boom_length = get_post_meta($post_Id, 'kran_boom_length', false );
		$kran_gusek = get_post_meta($post_Id, 'kran_gusek', false ); 
		$kran_max_height_lifting = get_post_meta($post_Id, 'kran_max_height_lifting', false );
		$kran_weight_boom = get_post_meta($post_Id, 'kran_weight_boom', false );
		$kran_wheel_formula = get_post_meta($post_Id, 'kran_wheel_formula', false );
		$kran_gabarit_transport_length = get_post_meta($post_Id, 'kran_gabarit_transport_length', false );

		if (empty($kran_price_nds[0])) {
			$kran_price_nds = '<i>требует уточнения</i>';
		} else {
			$kran_price_nds = $kran_price_nds[0];
		}

		if (empty($kran_gusek[0])) {
			$kran_gusek = '<i>отсутствует</i>';
		} else {
			$kran_gusek = $kran_gusek[0];
		}

		echo '<tr>';
		echo '<td><a onclick="yaCounter44012149.reachGoal(\'tech-alternativa\'); return true;" href="/avtokrany/'.$post_semilar->post_name.'">'.$post_semilar->post_title.'</a></td>';
		echo '<td>'.$kran_capacity[0].'</td>';
		echo '<td>'.$kran_boom_length[0].'</td>';
		echo '<td>'.$kran_gusek.'</td>';
		echo '<td>'.$kran_price[0].'</td>';
		echo '<td>'.$kran_price_nds.'</td>';

	}

	echo'	</tbody>';
	echo'</table>';

              
?>