<?php require_once'functions.php';?>
<?php require_once'header_form.php';?>

<?php 
	if (isset($_POST['search']) && !empty($_POST['search'])){
		$data = searchArticles($_POST['search']);
		$flag = null;
		foreach ($data as $key => $value) {
			$flag ++;?> 
			<p><a href='<?php echo $value["url"].".php";?>?url=<?php echo $value["url"]; ?>&countSearchPost=<?php echo $flag;?>' ><?php echo $value['title']; ?></a></p>
		
			
	<?php }
 	if ($flag){
	 	echo "Count search : $flag"; 
	} else {
		echo"Nothing found";
	}

	}

 	else {
		echo "Enter search"; 
		}?>