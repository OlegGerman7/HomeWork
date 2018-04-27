<?php require_once'header.php'; ?>
<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="col-6">
				<div class="card">
					  <img class="card-img-top" src="img/tovar1.png" alt="Card image cap">
					  <div class="card-block">
					    <h4 class="card-title"><?php echo $_GET['title']; ?> </h4>
					    <p class="card-text"><?php echo $_GET['fullDesc']; ?></p>
					    <h3 class="card-text"><?php echo $_GET['price']; ?></h3>
					    <a href="zakaz.php?title=<?php echo $_GET['title']; ?>&desc=<?php echo $_GET['desc'];?>&price=<?php echo $_GET['price']; ?>" class="btn btn-primary">Buy product</a>
					  </div>
					</div>
			</div>
		</div>
	</div>
</body>
</html>