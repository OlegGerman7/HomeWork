<?php 
	require_once'functions.php';

	if (isset($_POST) && !empty($_POST)){
		login($_POST);
	} 
?>
<?php require_once'header_form.php'; ?>

	<div class="container">
		<div class="row d-flex justify-content-center align-items-center" style="height: 100vh;">
			<form method="POST">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Login</label>
			    <input type="text" name="login" class="form-control" id="exampleInputEmail1" placeholder="Enter login">
			  </div>

			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
			  </div>
			  
			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
	
</body>
</html>