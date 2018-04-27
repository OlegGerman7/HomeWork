<?php require_once'header.php'; ?>
<?php
	if (!isset($_SESSION['access']) || !$_SESSION['access']){
			header('Location: index.php');
		}
?>
	<div class="container">
		<div class="row d-flex justify-content-center align-items-center" style="height: 100vh;">
			<form method="POST">
			  <div class="form-group">
			    <label for="exampleInputTitle1">Title</label>
			    <input type="text" name="title" class="form-control" id="exampleInputTitle1" value="<?php echo $_GET['title']; ?>">
			  </div>

			  <div class="form-group">
			    <label for="exampleInputDesc1">Desc</label>
			    <input type="text" name="desc" class="form-control" id="exampleInputDesc1" value="<?php echo 
			    $_GET['desc']; ?>">
			  </div>

			  <div class="form-group">
			    <label for="exampleInputPrice1">Price</label>
			    <input type="text" name="price" class="form-control" id="exampleInputPrice1" value="<?php echo $_GET['price']; ?>" >
			  </div>

			  <div class="form-group">
			    <label for="exampleInputEmail1">Email address</label>
			    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
			  </div>

			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
	
</body>
</html>

<?php 
	$to = 'admin@gmail.com';
	$title = $_POST['title'];
	$message = $_POST['desc'] . "\r\n" . $_POST['price'] . "\r\n". $_POST['email'];
	$email = $_POST['email'];
	mail($to, $title, $message);


	echo $title."<br>";
	echo $message."<br>";
	echo $to."<br>";
	echo $email;
echo '<pre>';
 print_r($_POST);
echo '</pre>';

?>