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
            <?php if (getArticles()): ?>
             <?php $articles = getArticles(); ?>
                <?php foreach ($articles as $key => $article) { ?>
                  <?php $author = getAuthor($article['author']); ?>

                   <h2 class="post-title">
                    <a href='post<?php echo $article["id"] ?>.php'>
                      <?php echo $article['title']; ?>
                    </a> 
                  </h2>
                  <p class="">
                      <?php echo $article['content']; ?>
                  </p>

                <p class="post-meta">Author by :
                  <a href="#"><?php echo $author[0]['login'] ?></a>
                    <?php $date = DateTime::createFromFormat('Y-m-d H:i:s', $article['created_at']); ?>
                      on <?= $date->format('F d, Y'); ?></p>
                </p>
                 <hr>

               <?php  } ?> 

             <?php else: ?>
                <p>Articles not found!</p>
              <?php endif; ?>
              
            
          </div>

          <div class="clearfix">
            <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
          </div>
        </div>
      </div>
    </div>

    <hr>
    <?php require_once'footer.php'; ?>