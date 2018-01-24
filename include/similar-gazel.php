<?php
	
	$tech_arr = get_post_meta($post->ID, 'similar_gazel', true);

	// print_r($tech_arr);
	/*
	<h2>Газель</h2>
              <table class="table_price table_postorder">
                <thead>
                  <tr>
                    <td class="t_title" rowspan="2">Название техники</td>
                    <td class="" rowspan="2">Грузоподъёмность, т.</td>
                    <td class="" rowspan="2">Кол-во пассажиров, чел.</td>
                    <td class="" rowspan="2">Длина борта, м.</td>
                    <td class="" rowspan="2">Ширина кузова, м.</td>
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
                      <a href="javascript:;">Газель</a>
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

	echo '<div class="ttl_alternative">Газель</div>';
	echo '<table class="table_price table_postorder">';
	echo '	<thead>';
	echo '		<tr>';
	echo '			<td rowspan="2" class="t_title">Название техники</td>';
	echo '			<td rowspan="2" class="t_gruz">Грузоподъемность</td>';
	echo '			<td class="" rowspan="2">Кол-во пассажиров</td>';
	echo '			<td class="" rowspan="2">Длина борта</td>';
	echo '			<td class="" rowspan="2">Ширина кузова</td>';
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
		  'gazel_capacity',
		  'gazel_dlina',
		  'gazel_shirina',
		  'gazel_height',
		  'gazel_users',
		  'gazel_weight',
		  'gazel_height_kuzova',
		  'gazel_piramida',
		  'gazel_gruz'
		);

		$gazel_price = get_post_meta($post_Id, 'price', false );
		$gazel_price_nds = get_post_meta($post_Id, 'price_nds', false );
		$gazel_capacity = get_post_meta($post_Id, 'gazel_capacity', false );
		$gazel_dlina = get_post_meta($post_Id, 'gazel_dlina', false );
		$gazel_shirina = get_post_meta($post_Id, 'gazel_shirina', false );
		$gazel_height = get_post_meta($post_Id, 'gazel_height', false );
		$gazel_users = get_post_meta($post_Id, 'gazel_users', false );
		$gazel_weight = get_post_meta($post_Id, 'gazel_weight', false );
		$gazel_height_kuzova = get_post_meta($post_Id, 'gazel_height_kuzova', false );
		$gazel_piramida = get_post_meta($post_Id, 'gazel_piramida', false );
		$gazel_gruz = get_post_meta($post_Id, 'gazel_gruz', false );

		if (empty($gazel_price_nds[0])) {
			$gazel_price_nds = '<i>требует уточнения</i>';
		} else {
			$gazel_price_nds = $gazel_price_nds[0];
		}		

		echo '<tr>';
		echo '<td><a onclick="yaCounter44012149.reachGoal(\'tech-alternativa\'); return true;" href="/gazeli/'.$post_semilar->post_name.'">'.$post_semilar->post_title.'</a></td>';
		echo '<td>'.$gazel_capacity[0].'</td>';
		echo '<td>'.$gazel_users[0].'</td>';
		echo '<td>'.$gazel_dlina[0].'</td>';
		echo '<td>'.$gazel_weight[0].'</td>';
		echo '<td>'.$gazel_price[0].'</td>';
		echo '<td>'.$gazel_price_nds.'</td>';

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