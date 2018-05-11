<?php require_once'header.php'; ?>
<?php require_once'nav_articles.php'; ?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="main.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Articles</li>
      </ol>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="add_articles.php">Add new</a>
        </li>
      </ol>
      
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>Article list</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Subtitle</th>
                  <th>Created</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Title</th>
                  <th>Subtitle</th>
                  <th>Created</th>
                  <th>Actions</th>
                </tr>
              </tfoot>
              <tbody>
              <?php $articles = getArticles(); ?>
              <?php foreach ($articles as $article): ?>
                
                <tr>
                  <td><?php echo $article['title']; ?></td>
                  <td><?php echo $article['sub_title']; ?></td>
                  <td><?= $article['created_at']; ?></td>
                  <td>
                    <a href="javascript:void(0)">Edit</a><br>
                    <a href="javascript:void(0)">Delete</a>
                  </td>
                </tr>

             <?php endforeach; ?>
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php require_once'footer.php'; ?>