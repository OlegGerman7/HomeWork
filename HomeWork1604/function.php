<?php
#array_key_exists
	function my_array_key_exists($val, $arr){
		foreach ($arr as $key => $value) {
			if ($key == $val){
				echo "Key exists";
			}
		}
	}



#array_keys
	function my_array_keys($arr, $param){
		$res = null;
		$i = 0;
		foreach ($arr as $key => $value) {
			if (isset($param)){
				if ($value == $param){
					$res[$i] = $key;
					$i++;
					}			
				} else{
					$res[$i] = $key;
					$i++;
				}

		}
		return $res;
	}


#array_combine
	function myArrayCombine($arr1, $arr2){
		if (count($arr1) == count($arr2)){
			for ($i = 0; $i < count($arr1) ; $i++) { 
				$res[$arr1[$i]] = $arr2[$i];
			}
			return $res;
		} else {
			echo "Error";
		}
	}



#array_search
	function myArraySearch($arr, $param){
		foreach ($arr as $key => $value) {
			if ($value === $param){
				echo "$key";
				break;
			} 
		}
	}


#in_array()
	function myInArray($arr, $param){
		$flag = 0;
		foreach ($arr as $key => $value) {
			if ($param === $value){
				$flag += 1;
			} 
		}
		if ($flag > 0){
			echo 'Param exists';
		} else {
			echo 'Param no exists';
		}		
	}


#array_diff //Вычислить расхождение массивов // Цикл foreach // Ключи сохраняются 
	function myArrayDiff($arr1, $arr2){
		$i = 0;
		foreach ($arr1 as $key1 => $value1) {
			$flag = 0;
			foreach ($arr2 as $key2 => $value2) {
				if ($value1 !== $value2){
					$flag = 1;
				} else {
					$flag = 0;
					break;
				}
			}
			if ($flag == 1){
				$res[$i] = $value1;
				$i++;
			}
		}
		echo '<pre>';
			print_r($res);
		echo '<pre>';
	}


#array_diff //Вычислить расхождение массивов // Цикл for // Ключи сохраняются 
	// function myArrayDiff($arr1, $arr2){
	// 	$i = 0;
	// 	for($j = 0; $j < count($arr1); $j++) {
	// 		$flag = 0;
	// 		for($r = 0; $r < count($arr2); $r++) {
	// 			if ($arr1[$j] !== $arr2[$r]){
	// 				$flag = 1;
	// 			} else {
	// 				$flag = 0;
	// 				break;
	// 			}
	// 		}
	// 		if ($flag == 1){
	// 			$res[$i] = $arr1[$j];
	// 			$i++;
	// 		}
	// 	}
	// 	echo '<pre>';
	// 		print_r($res);
	// 	echo '</pre>';
	// }


#array_intersect //Вычисляет схождение массивов // Ключи сохраняются 
	function myArrayIntersect($arr1, $arr2){
		foreach ($arr1 as $key1 => $value1) {
			$flag = 0;
			foreach ($arr2 as $key2 => $value2) {
				if ($value1 === $value2){
					$flag = 1;
					break;
				} else {
					$flag = 0;
				}
			}
			if ($flag == 1){
				$res[$key1] = $value1;
			}
		}
		echo '<pre>';
			print_r($res);
		echo '<pre>';
	}



#sort
	function mySort($arr){
		for ($i = 1; $i < count($arr) - 1; $i++) { 
			for ($j = 0; $j < count($arr) - $i; $j++) { 
				if ($arr[$j] > $arr[$j + 1]){
					$k = $arr[$j];
					$arr[$j] = $arr[$j + 1];
					$arr[$j + 1] = $k;
				}
			}
		}
		echo '<pre>';
	  		print_r($arr);
	  	echo '</pre>';	
	}



#max
	function myMax($arr){
		$res = $arr[0];
		for ($i = 1; $i < count($arr); $i++){
			if ($arr[$i] > $res){
				$res = $arr[$i];
			}
		}
			echo "Max element : $res <br>";
	}	



#min
	function myMin($arr){
		$res = $arr[0];
		for ($i = 1; $i < count($arr); $i++){
			if ($arr[$i] < $res){
				$res = $arr[$i];
			}
		}
		echo "Min element : $res <br>";
	}	


#round
	function myRound($b){
	$i = 0;
	$res = null;
	$a = (string) $b;
	var_dump($a);
	if ($a{0} == 0){
		if ($a{$i + 1} != '.'){
			$res .= $a{$i};
		} else {
			if ($a{$i + 2} >=5){
				$res = $res + 1;
		} else {
			$res = $a{$i};
		}
	}
} else {
	while ($a{$i}){
		if ($a{$i} != '.' || $a{$i} == '0'){
			$res .= $a{$i};
			$i++;
		} else {
			if ($a{$i + 1} >=5){
				$res = $res + 1;
		}
			break;
		}
	}
}
	var_dump($res);
}
?>
