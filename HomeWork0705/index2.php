<?php require_once'header.php'; ?>
<!-- Page Header -->
    <header class="masthead" style="background-image: url('img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Clean Blog</h1>
              <span class="subheading">A Blog Theme by Start Bootstrap</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-preview">
            <a href="post.php">
           <?php $mass = viewArticles() ?>
            <?php foreach ($mass as $key => $value) { ?>

               <h2 class="post-title">
                <a href="post.php">
                  <?php echo $value['title']; ?>
                </a> 
              </h2>

              <p class="">
                  <?php echo $value['content']; ?>
              </p>

            <p class="post-meta">Author by :
              <a href="#"><?php echo $_SESSION['login'] ?></a>
              <?php echo date('Y-m-d'); ?>
            </p>
             <hr>

           <?php  } ?>              
            
          </div>

          <div class="clearfix">
            <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
          </div>
        </div>
      </div>
    </div>

    <hr>
    <?php require_once'footer.php'; ?>