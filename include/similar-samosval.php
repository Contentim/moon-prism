<?php
	
	$tech_arr = get_post_meta($post->ID, 'similar_samosval', true);

	// print_r($tech_arr);
	/*
	<h2>Самосвалы, фуры, мусоровозы</h2>
      <table class="table_price table_postorder">
        <thead>
          <tr>
            <td class="t_title" rowspan="2">Название техники</td>
            <td class="t_gruz" rowspan="2">Груз-ть, т.</td>
            <td class="t_strela" rowspan="2">Объём кузова, м. куб.</td>
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
              <a href="javascript:;">Самосвалы, фуры, мусоровозы</a>
            </td>
            <td>груз-ть</td>
            <td>объем кузова</td>
            <td>11111</td>
            <td>22222</td>
          </tr>
        </tbody>
      </table>

      */

	echo '<div class="ttl_alternative">Самосвалы</div>';
	echo '<table class="table_price table_postorder">';
	echo '	<thead>';
	echo '		<tr>';
	echo '			<td rowspan="2" class="t_title">Название техники</td>';
	echo '			<td rowspan="2" class="t_gruz">Грузоподъемность</td>';
	echo '			<td rowspan="2" class="t_strela">Объём кузова</td>';
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
		  'samosval_capacity',
		  'samosval_weight'
		);

		$samosval_price = get_post_meta($post_Id, 'price', false );
		$samosval_price_nds = get_post_meta($post_Id, 'price_nds', false );
		$samosval_capacity = get_post_meta($post_Id, 'samosval_capacity', false );
		$samosval_weight = get_post_meta($post_Id, 'samosval_weight', false );

		if (empty($samosval_price_nds[0])) {
			$samosval_price_nds = '<i>требует уточнения</i>';
		} else {
			$samosval_price_nds = $samosval_price_nds[0];
		}

		echo '<tr>';
		echo '<td><a onclick="yaCounter44012149.reachGoal(\'tech-alternativa\'); return true;" href="/samosvaly/'.$post_semilar->post_name.'">'.$post_semilar->post_title.'</a></td>';
		echo '<td>'.$samosval_capacity[0].'</td>';
		echo '<td>'.$samosval_weight[0].'</td>';
		echo '<td>'.$samosval_price[0].'</td>';
		echo '<td>'.$samosval_price_nds.'</td>';
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