<?php  
#array_key_exists()
	require_once('function.php');

	$key = 'house';
	$arr = array('book' => 'big', 'dog' => 'black', 'house' => 'white');
	my_array_key_exists($key, $arr);



#array_keys
	$param = 'blue';
	$arr = array('book' => 'big', 'dog' => 'black', 'house' => 'white', 'book1' => 'big');
	echo "<pre>";
		print_r($arr);
	echo "</pre>";
	$arr = array('dog', 'book', 'cat');
	$arr = array("blue", "red", "green", "blue", "blue");
	echo "<pre>";
		print_r(my_array_keys($arr, $param));
	echo "</pre>";


#array_combine
	$a = array('green', 'red', 'yellow');
	$b = array('avocado', 'apple', 'banana');
	echo "<pre>";
		print_r (myArrayCombine($a, $b));
	echo "</pre>";


#array_search
	$arr = array('green', 'red', 'yellow', 'red', 5);
	$param = 5;
	myArraySearch($arr, $param);
	


#in_array()
	$arr = array('green', 'red', 'yellow');
	$param = 'red';
	$arr = array(4, '1', 2, '3');
	$param = '4';
	myInArray($arr, $param);



#array_diff //Вычислить расхождение массивов // Ключи сохраняются 
	$arr1 = array('green', 'red', 'yellow', 'blue');
	$arr2 = array('green', 'red', 'yellow');
	myArrayDiff($arr1, $arr2);


#array_intersect //Вычисляет схождение массивов // Ключи сохраняются 
	$arr1 = array('green', 'red', 'yellow', 'blue');
	$arr2 = array('green', 'red', 'yellow');
	$arr1 = array("a" => "green", "red", "blue");
	$arr2 = array("b" => "green", "yellow", "red");
	myArrayIntersect($arr1, $arr2);



#sort
	$arr = array(5, 5000, 2, 4, 8, 6, 89, 1000);
	mySort($arr);


#max min
	$arr = array(1, 5, 5000, 2, 4, 8, 6, 89, 1000);
	$arr = array('orange1', 'orange2', 'apple');
	myMax($arr);
	myMin($arr);


#round
	$b = 4.5;
	myRound($b)
?>


