<?php

	if($_POST['amount'] === '' || $_POST['nominal'] === '') {
		$data = 'Заполните все поля!';
	}elseif ($_POST['amount'] == 0) {
		$data = 'Сумма не может быть равна 0!';			
		}else {
			
			$tmp = str_replace(' ', '', $_POST['nominal']);	
			$amount = (int) str_replace(' ', '', $_POST['amount']);
			$nominal = explode(",", $tmp);		
			$countNominal = count($nominal);	
			$INF=PHP_INT_MAX;
			$F=Array();
			$F[0]=0;
			
			for($m=1; $m<=$amount; ++$m) {
				$F[$m]=$INF;
				for($i=0; $i<$countNominal; ++$i) {
					if($m>=$nominal[$i] && $F[$m-$nominal[$i]]+1<$F[$m]) {
						$F[$m] = $F[$m-$nominal[$i]]+1;
					}                       
				}
			}

			if($F[$amount]==$INF) { 
				$rem = $amount%$nominal[0];
				$next = $amount-$rem+$nominal[0];
				$prev = $amount-$rem;
				
					if($prev)
						$data = "Неверная сумма, попробуйте $next или $prev \r\n";
					else 
						$data = "Неверная сумма, попробуйте $next \r\n";
			}
			else {		
				$arr = array_fill(0, $countNominal, 0);		
				while($amount>0) {
					for($i=0;$i<$countNominal;++$i) {												
						if ($F[$amount-$nominal[$i]]==$F[$amount]-1) { 									
							$arr[$i]++;					
							$amount-=$nominal[$i];						
							break;				
						}
					} 		
				}				
				$data = [$nominal, $arr];
			}				
		}
	
	header('Content-Type: application/json');
	echo json_encode($data, JSON_UNESCAPED_UNICODE);
	
?>
