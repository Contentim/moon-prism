<?php
	
	$tech_arr = get_post_meta($post->ID, 'similar_dlinnomery', true);

	// print_r($tech_arr);
	/*
	<h2>Длинномер</h2>
              <table class="table_price table_postorder">
                <thead>
                  <tr>
                    <td class="t_title" rowspan="2">Название техники</td>
                    <td class="" rowspan="2">Грузоподъёмность, т.</td>
                    <td class="" rowspan="2">Длина борта, м.</td>
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
                      <a href="javascript:;">Длинномер</a>
                    </td>
                    <td>груз-ть</td>
                    <td>11111</td>
                    <td>22222</td>
                    <td>22222</td>
                  </tr>
                </tbody>
              </table>
      */

	echo '<div class="ttl_alternative">Длинномеры</div>';
	echo '<table class="table_price table_postorder">';
	echo '	<thead>';
	echo '		<tr>';
	echo '			<td rowspan="2" class="t_title">Название техники</td>';
	echo '			<td rowspan="2" class="t_gruz">Грузоподъемность</td>';
	echo '			<td class="" rowspan="2">Длина борта</td>';
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
			'dlinnomery_capacity',
			'dlinnomery_dlina',
			'dlinnomery_shirina'
		 );

		$dlinnomery_price = get_post_meta($post_Id, 'price', false );
		$dlinnomery_price_nds = get_post_meta($post_Id, 'price_nds', false );
		$dlinnomery_capacity = get_post_meta($post_Id, 'dlinnomery_capacity', false );
		$dlinnomery_dlina = get_post_meta($post_Id, 'dlinnomery_dlina', false );
		$dlinnomery_shirina = get_post_meta($post_Id, 'dlinnomery_shirina', false );

		if (empty($dlinnomery_price_nds[0])) {
			$dlinnomery_price_nds = '<i>требует уточнения</i>';
		} else {
			$dlinnomery_price_nds = $dlinnomery_price_nds[0];
		}

		echo '<tr>';
		echo '<td><a onclick="yaCounter44012149.reachGoal(\'tech-alternativa\'); return true;" href="/dlinnomery/'.$post_semilar->post_name.'">'.$post_semilar->post_title.'</a></td>';
		echo '<td>'.$dlinnomery_capacity[0].'</td>';
		echo '<td>'.$dlinnomery_dlina[0].'</td>';
		echo '<td>'.$dlinnomery_price[0].'</td>';
		echo '<td>'.$dlinnomery_price_nds.'</td>';

	}

	echo'	</tbody>';
	echo'</table>';
              
?>