<?php require_once'functions.php'; ?>
<?php require_once'header_form.php'; ?>
   
    <!-- Post Content -->
    <article>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <?php $posts = getArticle($_GET['url']);
              foreach ($posts as $post) {?>
              <h3> <?php echo $post['title']."<br>";?></h3>
              <p> <?php echo $post['content'];?></p>
              <?php } ?>
          </div>
        </div>
      </div>
    </article>

    <hr>
    <?php require_once'footer.php'; ?>