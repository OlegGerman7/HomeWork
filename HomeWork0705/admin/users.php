<?php require_once'header.php'; ?>
<?php require_once'nav_users.php'; ?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="main.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Users</li>
      </ol>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="add_user.php">Add new user</a>
        </li>
      </ol>
      
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>User list</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Login</th>
                  <th>Email</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Login</th>
                  <th>Edit</th>
                </tr>
              </tfoot>
              <tbody>
              <?php $users = getAllUsers(); ?>
              <?php foreach ($users as $user): ?>
                
                <tr>
                  <td><?php echo $user['id']; ?></td>
                  <td><?php echo $user['name']; ?></td>
                  <td><?= $user['login']; ?></td>
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