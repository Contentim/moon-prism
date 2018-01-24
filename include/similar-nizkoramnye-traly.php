<?php
	
	$tech_arr = get_post_meta($post->ID, 'similar_nizkoramnye_traly', true);

	// print_r($tech_arr);
	/*
	<h2>Низкорамники - тралы</h2>
              <table class="table_price table_postorder">
                <thead>
                  <tr>
                    <td class="t_title" rowspan="2">Название техники</td>
                    <td class="" rowspan="2">Грузоподъёмность, т.</td>
                    <td class="t_price" colspan="3">Борт</td>
                    <td class="t_price" colspan="2">Цена смены</td>
                  </tr>
                  <tr>
                    <td class="">Длина, м.</td>
                    <td class="">Высота, м.</td>
                    <td class="">Ширина, м.</td>
                    <td class="t_man">для частников</td>
                    <td class="t_firma">для компаний</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <a href="javascript:;">Низкорамники - тралы</a>
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

	echo '<div class="ttl_alternative">Низкорамники - тралы</div>';
	echo '<table class="table_price table_postorder">';
	echo '	<thead>';
	echo '		<tr>';
	echo '			<td rowspan="2" class="t_title">Название техники</td>';
	echo '			<td rowspan="2" class="t_gruz">Грузоподъемность</td>';
	echo '			<td class="t_price" colspan="3">Борт</td>';
	echo '			<td colspan="2" class="t_price">Цена смены</td>';
	echo '		</tr>';
	echo '		<tr>';
	echo '			<td>Длина</td>';
	echo '			<td>Высота</td>';
	echo '			<td>Ширина</td>';
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
		  'nt_capacity',
		  'nt_length',
		  'nt_height',
		  'nt_weight'
		 );

		$nt_price = get_post_meta($post_Id, 'price', false );
		$nt_price_nds = get_post_meta($post_Id, 'price_nds', false );
		$nt_capacity = get_post_meta($post_Id, 'nt_capacity', false );
		$nt_length = get_post_meta($post_Id, 'nt_length', false );
		$nt_height = get_post_meta($post_Id, 'nt_height', false );
		$nt_weight = get_post_meta($post_Id, 'nt_weight', false );

		if (empty($nt_price_nds[0])) {
			$nt_price_nds = '<i>требует уточнения</i>';
		} else {
			$nt_price_nds = $nt_price_nds[0];
		}

		echo '<tr>';
		echo '<td><a onclick="yaCounter44012149.reachGoal(\'tech-alternativa\'); return true;" href="/nizkoramnye-traly/'.$post_semilar->post_name.'">'.$post_semilar->post_title.'</a></td>';
		echo '<td>'.$nt_capacity[0].'</td>';
		echo '<td>'.$nt_length[0].'</td>';
		echo '<td>'.$nt_height[0].'</td>';
		echo '<td>'.$nt_weight[0].'</td>';
		echo '<td>'.$nt_price[0].'</td>';
		echo '<td>'.$nt_price_nds.'</td>';

	}

	echo'	</tbody>';
	echo'</table>';
              
?>