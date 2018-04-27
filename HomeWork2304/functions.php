<?php
session_start();

define(LOGIN, login);
define(PASSWORD, password);

function login($post){
	if (isset($post['login']) && isset($post['password'])){
		if ($post['login'] == LOGIN && md5($post['password']) == md5(PASSWORD)){
			$check = rtue;
		}
	}

	if ($check){
		header('Location: tovari.php');
		$_SESSION['access'] = true;
		$_SESSION['login'] = $post['login'];
	} else {
		header('Location: access_denied.php');
		$_SESSION['access'] = false;
	}
}

function getTovari(){
	$title = array('Tovar1', 'Tovar2', 'Tovar3');
	$desc = array('Description to tovar1','Description to tovar2', 'Description to tovar3');
	$fullDesc = array('Full description to tovar1','Full description to tovar2', 'Full description to tovar3');
	$price = array('100$', '200$', '300$');

	for ($i = 0; $i < 3; $i++) { 
		$tovari[$i] = array(
			'title' => $title[$i],
			'desc' => $desc[$i],
			'fullDesc' =>$fullDesc[$i],
			'price' => $price[$i]
			);
	}

	return $tovari;
}

?>