<?php require_once'header.php'; ?>
	<div class="container">
		<div class="row">
		<?php 
			$tovari = getTovari();

			foreach ($tovari as $tovar) { ?>
			
				<div class="col-md-4">
					<div class="card">
					  <img class="card-img-top" src="img/tovar1.png" alt="Card image cap">
					  <div class="card-block">
					    <h4 class="card-title"><?php echo $tovar['title']; ?> </h4>
					    <p class="card-text"><?php echo $tovar['desc']; ?></p>
					    <h3 class="card-text"><?php echo $tovar['price']; ?></h3>
					    <a href="tovar.php?title=<?php echo $tovar['title']; ?>&desc=<?php echo $tovar['desc'];?>&fullDesc=<?php echo $tovar['fullDesc'];?>&price=<?php echo $tovar['price']; ?>" class="btn btn-primary">Followe</a>
					  </div>
					</div>
				</div>

		<?php } ?>
			
		</div>
	</div>

</body>
</html>
