<?php require_once'header.php'; ?>
<?php require_once'nav_articles.php'; ?>


<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="main.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Add new</li>
      </ol>
          
        <?php if ($_POST){
        insertArticle($_POST);
        } ?>

      <!-- Example DataTables Card-->
     <div class="row" >
       <div class="col-12" >
         <form method="POST" action="add_articles.php" >
           <label>Title<br>
             <input type="text" name="title">
           </label><br>
          <label>Subtitle<br>
            <textarea name="sub_title" rows="3" cols="40"></textarea>
          </label><br>
          <label>Content<br>
            <textarea name="content" rows="7" cols="40"></textarea>
          </label><br>
          <button>Send</button>
         </form>
       </div>
     </div>
                
      </div>
    </div>
  </div>
</div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php require_once'footer.php'; ?>