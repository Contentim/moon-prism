<?php
	
	$tech_arr = get_post_meta($post->ID, 'similar_avtobetononasosy', true);

	// print_r($tech_arr);
	/*
	<h2>Автобетононасос</h2>
              <table class="table_price table_postorder">
                <thead>
                  <tr>
                    <td class="t_title" rowspan="2">Название техники</td>
                    <td class="" rowspan="2">Высота подачи, м.</td>
                    <td class="" rowspan="2">Дальность подачи, м.</td>
                    <td class="" colspan="2">Объем подачи, куб. м.</td>
                    <td class="t_price" colspan="2">Цена смены</td>
                  </tr>
                  <tr> 
                    <td class="">штоковая сторона</td>
                    <td class="">поршневая сторона</td>
                    <td class="t_man">для частников</td>
                    <td class="t_firma">для компаний</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <a href="javascript:;">Контейнеровоз</a>
                    </td>
                    <td>груз-ть</td>
                    <td>11111</td>
                    <td>22222</td>
                    <td>333</td>
                    <td>44444</td>
                    <td>555555</td>
                  </tr>
                </tbody>
              </table>
      */

	echo '<div class="ttl_alternative">Автобетононасосы</div>';
	echo '<table class="table_price table_postorder avtobetononasosy">';
	echo '	<thead>';
	echo '		<tr>';
	echo '			<td class="t_title" rowspan="2">Название техники</td>';
	echo '			<td class="" rowspan="2">Высота подачи</td>';
	echo '			<td class="" rowspan="2">Дальность подачи</td>';
	echo '			<td class="" colspan="2">Объем подачи</td>';
	echo '			<td class="t_price" colspan="2">Цена смены</td>';
	echo '		</tr>';
	echo '		<tr> ';
	echo '			<td class="">штоковая сторона</td>';
	echo '			<td class="">поршневая сторона</td>';
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
		  'beton_height',
		  'beton_range',
		  'beton_size_stock',
		  'beton_size_piston'
		  /*
		  'price_addit',
		  'price_addit_processing',
		  'price_addit_ttk',
		  
		  'price_addit_nds',
		  'price_addit_processing_nds',
		  'price_addit_processing_ttk_nds'*/
		 );

		$beton_price = get_post_meta($post_Id, 'price', false );
		$beton_price_nds = get_post_meta($post_Id, 'price_nds', false );
		$beton_height = get_post_meta($post_Id, 'beton_height', false );
		$beton_range = get_post_meta($post_Id, 'beton_range', false );
		$beton_size_stock = get_post_meta($post_Id, 'beton_size_stock', false ); 
		$beton_size_piston = get_post_meta($post_Id, 'beton_size_piston', false );

		if (empty($beton_price_nds[0])) {
			$beton_price_nds = '<i>требует уточнения</i>';
		} else {
			$beton_price_nds = $beton_price_nds[0];
		}

		echo '<tr>';
		echo '<td><a onclick="yaCounter44012149.reachGoal(\'tech-alternativa\'); return true;" href="/avtobetononasosy/'.$post_semilar->post_name.'">'.$post_semilar->post_title.'</a></td>';
		echo '<td>'.$beton_height[0].'</td>';
		echo '<td>'.$beton_range[0].'</td>';
		echo '<td>'.$beton_size_stock[0].'</td>';
		echo '<td>'.$beton_size_piston[0].'</td>';
		echo '<td>'.$beton_price[0].'</td>';
		echo '<td>'.$beton_price_nds.'</td>';

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