<?php require_once'header.php' ?>

	<div class="container">
		<div class="row d-flex justify-content-center align-items-center" style="height: 100vh;">
			<form method="POST">
			  <div class="form-group">
			    <label for="exampleInputSubject1">Subject</label>
			    <input type="text" name="subject" class="form-control" id="exampleInputSubject1" placeholder="Enter subject">
			  </div>

			  <div class="form-group">
			    <label for="exampleInputMessage1">Message</label>
			    <textarea rows="5" cols="50" name="message" id="exampleInputMessage1" class="form-control" placeholder="Enter message"></textarea>
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
	<script type="text/javascript" src="js/js.js"></script>

</html>

<?php 

	$to = 'admin@gmail.com';
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	$email = $_POST['email'];

	mail($to, $subject, $message);

	echo '<pre>';
	 print_r($_POST);
	echo '</pre>';

?>
