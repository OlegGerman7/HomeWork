<?php require_once'functions.php'; ?>
<?php authorization($_POST); ?>
<?php require_once'header_form.php'; ?>
	<div class="container">
			<?php echo $_SESSION['login']; ?>
			<?php var_dump($_SESSION['acces']); ?>

		<div class="row d-flex justify-content-center align-items-center" style="height: 100vh;">

			<form method="POST" action="authorization.php">
			<h3>Authorization</h3>
			  <div class="form-group">
			    <label>login*</label>
			    <input type="text" name="login" value="login" class="form-control" requaired >
			  </div>

			  <div class="form-group">
			    <label>Password</label>
			    <input type="password" name="password" class="form-control" placeholder="Password">
			  </div>

			  <button class="btn btn-primary" type="submit">Submit</button>
			</form>
			</div>
		</div>
	
</body>
</html>