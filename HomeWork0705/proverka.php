<?php
	if (!isset($_SESSION['acces']) || empty($_SESSION['acces'])){
			header('Location:../reg.php');
	}

?>