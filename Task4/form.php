<?php

	include 'simple_html_dom.php';
	
	$data = file_get_html('https://terrikon.com/football/italy/championship/archive');
	
	if($_POST['club'] === '') {
		echo 'Заполните полe.';
	}else {		
		
		$club = $_POST['club'];
		$years = [];	
		$searchList = $data->find('.tab .news a');
		
		foreach($searchList as $a) {
			$season = str_replace(['Чемпионат Италии', '. ', ', '], '', $a->innertext);
			$years[] = $season;
		}
		
		$data->clear();
		echo "<h3>$club. Статистика:</h3>";
		
		for($i=0; $i<count($years); $i++) {			
			$data = file_get_html('https://terrikon.com'.$searchList[$i]->href.'');
			foreach ($data->find('table.colored', 0)->find('tr td a[href^=/football/teams/]') as $element) {
				if ($element->innertext == $club) {
					$place = $element->parent()->prev_sibling();
					echo 'Сезон '.$years[$i].': место '.$place.'</br>';
				}
			}
		}		
		$data->clear();
		unset($data);
	}
?>
