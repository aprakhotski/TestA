<?php

$words = [
	'red',
	'blue',
	'green',
	'yellow', 
	'lime', 
	'magenta', 
	'black', 
	'gold', 
	'gray', 
	'tomato'
	];
	
for ($i=0; $i<5; $i++){	
	$tmpWords = $words;
	
	for ($j=0; $j<5; $j++){						
		$keyWord = array_rand($tmpWords, 1);			
		do 
		$keyColor = array_rand($words, 1);
		while ($words[$keyColor] == $tmpWords[$keyWord]);		
		
		echo "<span style='color:$words[$keyColor]; font-size:35px;
			 text-shadow: 0 0 1px black;'> $tmpWords[$keyWord] </span>";
		array_splice($tmpWords, $keyWord, 1);
	}
	echo "<p></p>";
}
