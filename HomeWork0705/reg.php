<?php require_once'functions.php'; ?>
<?php require_once'header_form.php'; ?>

<?php if ($_POST){
	registerUser($_POST);
 }
?>

<?php if(getErrorMessage()): ?>
   <p style="color: red"><?= getErrorMessage(); ?></p>
 <?php endif; ?>

	<div class="container">
		<div class="row d-flex justify-content-center align-items-center" style="height: 100vh;">
			<form method="POST" action="reg.php">
			<h3>Registration</h3>
			  <div class="form-group">
			    <label for="exampleInputEmail1">FirstName</label>
			    <input type="text" name="firstName" value="firstName" class="form-control" >
			  </div>
			 <div class="form-group">
			    <label for="exampleInputEmail1">lastName</label>
			    <input type="text" name="lastName" value="lastName" class="form-control" >
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">login*</label>
			    <input type="text" name="login" value="login" class="form-control" requaired >
			  </div>

			  <div class="form-group">
			    <label for="exampleInputEmail1">email*</label>
			    <input type="text" name="email" value="email" class="form-control" requaired >
			  </div>

			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
			  </div>

			  <div class="form-group">
			    <label for="exampleInputPassword1">PasswordConfirm</label>
			    <input type="password" name="passwordConfirm" class="form-control" id="exampleInputPassword1" placeholder="PasswordConfirm">
			  </div>
			  
			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>
			</div>

	</div>
	
</body>
</html>