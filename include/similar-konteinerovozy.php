<?php
	
	$tech_arr = get_post_meta($post->ID, 'similar_konteinerovozy', true);

	// print_r($tech_arr);
	/*
	<h2>Контейнеровоз</h2>
      <table class="table_price table_postorder">
        <thead>
          <tr>
            <td class="t_title" rowspan="2">Название техники</td>
            <td class="t_gruz" rowspan="2">Грузоподъёмность, т.</td>
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
              <a href="javascript:;">Контейнеровоз</a>
            </td>
            <td>груз-ть</td>
            <td>11111</td>
            <td>22222</td>
          </tr>
        </tbody>
      </table>
      */

	echo '<div class="ttl_alternative">Контейнеровозы</div>';
	echo '<table class="table_price table_postorder">';
	echo '	<thead>';
	echo '		<tr>';
	echo '			<td class="t_title" rowspan="2">Название техники</td>';
	echo '			<td class="t_gruz" rowspan="2">Грузоподъёмность</td>';
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
		  'konteinerovoz_capacity',
		  'konteinerovoz_gabarity'
		 );

		$konteinerovozy_price = get_post_meta($post_Id, 'price', false );
		$konteinerovozy_price_nds = get_post_meta($post_Id, 'price_nds', false );
		$konteinerovoz_capacity = get_post_meta($post_Id, 'konteinerovoz_capacity', false );
		$konteinerovoz_gabarity = get_post_meta($post_Id, 'konteinerovoz_gabarity', false );
		
		if (empty($konteinerovozy_price_nds[0])) {
			$konteinerovozy_price_nds = '<i>требует уточнения</i>';
		} else {
			$konteinerovozy_price_nds = $konteinerovozy_price_nds[0];
		}

		echo '<tr>';
		echo '<td><a onclick="yaCounter44012149.reachGoal(\'tech-alternativa\'); return true;" href="/konteinerovozy/'.$post_semilar->post_name.'">'.$post_semilar->post_title.'</a></td>';
		echo '<td>'.$konteinerovoz_capacity[0].'</td>';
		echo '<td>'.$konteinerovozy_price[0].'</td>';
		echo '<td>'.$konteinerovozy_price_nds.'</td>';
		echo '</tr>';

	}

	echo'	</tbody>';
	echo'</table>';
              
?>