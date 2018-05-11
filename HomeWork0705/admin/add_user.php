<?php require_once'header.php'; ?>
<?php require_once'nav_users.php'; ?>
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
        registerUser($_POST);
        } ?>

      <!-- Example DataTables Card-->
     <?php if(getErrorMessage()): ?>
   <p style="color: red"><?= getErrorMessage(); ?></p>
 <?php endif; ?>

  <div class="container">
    <div class="row d-flex justify-content-center align-items-center" style="height: 100vh;">
      <form method="POST" action="">
      <h3>Add new user : </h3>
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
        <div class="form-group">
          <label for="exampleInputPassword1">Access rights</label>
          <input type="text" name="acces" class="form-control" id="exampleInputPassword1" placeholder='reader'>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      </div>
                
      </div>
    </div>
  </div>
</div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php require_once'footer.php'; ?>