<?php
	
	$tech_arr = get_post_meta($post->ID, 'similar_manipulyatory', true);

	// print_r($tech_arr);
	/*
	<h2>Кран-манипулятор</h2>
              <table class="table_price table_postorder">
                <thead>
                  <tr>
                    <td class="t_title" rowspan="2">Название техники</td>
                    <td class="" rowspan="2">Грузоподъёмность, т.</td>
                    <td class="" rowspan="2">Длина стрелы, м.</td>
                    <td class="" colspan="2">Борт, м.</td>
                    <td class="t_price" colspan="2">Цена смены</td>
                  </tr>
                  <tr>
                    <td class="">Длина, м.</td>
                    <td class="">Ширина, м.</td>
                    <td class="t_man">для частников</td>
                    <td class="t_firma">для компаний</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <a href="javascript:;">Кран-манипулятор</a>
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

	echo '<div class="ttl_alternative">Кран-манипуляторы</div>';
	echo '<table class="table_price table_postorder">';
	echo '	<thead>';
	echo '		<tr>';
	echo '			<td rowspan="2" class="t_title">Название техники</td>';
	echo '			<td rowspan="2" class="t_gruz">Грузоподъемность</td>';
	echo '			<td class="" rowspan="2">Длина стрелы</td>';
	echo '			<td class="" colspan="2">Борт</td>';
	echo '			<td colspan="2" class="t_price">Цена смены</td>';
	echo '		</tr>';
	echo '		<tr>';
	echo '			<td class="">Длина</td>';
	echo '			<td class="">Ширина</td>';
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
		  'manipulyatory_capacity',
		  'manipulyatory_dlina_strely',
		  'manipulyatory_capacity_borta',
		  'manipulyatory_dlina_borta',
		  'manipulyatory_shirina_borta'
		);

		$manipulyatory_price = get_post_meta($post_Id, 'price', false );
		$manipulyatory_price_nds = get_post_meta($post_Id, 'price_nds', false );
		$manipulyatory_capacity = get_post_meta($post_Id, 'manipulyatory_capacity', false );
		$manipulyatory_dlina_strely = get_post_meta($post_Id, 'manipulyatory_dlina_strely', false );
		$manipulyatory_capacity_borta = get_post_meta($post_Id, 'manipulyatory_capacity_borta', false );
		$manipulyatory_dlina_borta = get_post_meta($post_Id, 'manipulyatory_dlina_borta', false );
		$manipulyatory_shirina_borta = get_post_meta($post_Id, 'manipulyatory_shirina_borta', false );

		if (empty($manipulyatory_price_nds[0])) {
			$manipulyatory_price_nds = '<i>требует уточнения</i>';
		} else {
			$manipulyatory_price_nds = $manipulyatory_price_nds[0];
		}

		echo '<tr>';
		echo '<td><a onclick="yaCounter44012149.reachGoal(\'tech-alternativa\'); return true;" href="/manipulyatory/'.$post_semilar->post_name.'">'.$post_semilar->post_title.'</a></td>';
		echo '<td>'.$manipulyatory_capacity[0].'</td>';
		echo '<td>'.$manipulyatory_dlina_strely[0].'</td>';
		echo '<td>'.$manipulyatory_dlina_borta[0].'</td>';
		echo '<td>'.$manipulyatory_shirina_borta[0].'</td>';
		echo '<td>'.$manipulyatory_price[0].'</td>';
		echo '<td>'.$manipulyatory_price_nds.'</td>';

	}

	echo'	</tbody>';
	echo'</table>';
              
?>