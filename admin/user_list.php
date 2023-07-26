<?php
require_once('../asset/Database.php');
?>
<?php
session_start();

if (!isset($_SESSION['Login']) || $_SESSION['Login'] !== true) {

  header("Location: index.php");
  exit;
}
if (isset($_POST['logout'])) {
  session_destroy();
}
?>
<?php
$data = new Database();
if (isset($_POST['action'])) {
  $id = $_POST['id'];
  $action = $_POST['action'];
  if ($action == 'delete_data') {
    $data->deleteData('user', "WHERE id=$id");
    echo 'success';
    exit;
  }
}
?>
<?php
require_once('../lib/common.php');
?>

<header>
  <!-- Navbar-->
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #5A5A5A;">
    <div class="container-fluid justify-content-between">
      <!-- Left elements -->
      <img src="<?php echo SITE_URL ?>PHPOPS/blogwebsite/asset/img/logo.png" alt='blog website' style="margin-top: 2px; width:150px" />
      <!-- Center elements -->
      <div class="navbar-nav flex-row d-none d-md-flex">
        <h1 class='text-light'>
          <p>User Listing Page</p>
        </h1>
      </div>
      <!-- Right elements -->
      <div class="navbar-nav ">
        <a class="nav-link d-sm-flex align-items-sm-center btn btn-dark text-light mx-2 my-2" name='dashboard' href="<?php echo SITE_URL; ?>PHPOPS/blogwebsite/admin/dashboard.php">DashBoard</a>
        <a class="nav-link d-sm-flex align-items-sm-center btn btn-dark text-light mx-2 my-2" name='logout' href="<?php echo SITE_URL; ?>PHPOPS/blogwebsite/admin/index.php">Log Out</a>
      </div>
    </div>
  </nav>
</header>
<?php require_once('../lib/sidebar.php');?>
<div class="col py-3" style="background-color:#dadada; margin-bottom:200px">
  <div class='my-5 text-center'>
    <h2 class='text-success'>Users</h2>
  </div>
  <div class='d-flex justify-content-center'>
    <table class='table table-dark table-striped' id='example'>
      <thead>
        <tr>
          <th>Sr No.</th>
          <th>ID</th>
          <th>Name</th>
          <th>email</th>
          <th>password</th>
          <th>gender</th>
          <th>age</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php $userdata = $data->selectData('user', '*',"ORDER BY id");
        foreach ($userdata as $value) {
          $i += 1 ?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $value['id']; ?></td>
            <td><?php echo $value['firstname'] . " " . $value['lastname']; ?></td>
            <td><?php echo $value['email']; ?></td>
            <td><?php echo $value['password']; ?></td>
            <?php 
            if ($value['gender'] == 'F') {
              $gender = 'Female';
            } 
            else {
              $gender = 'Male';
            } ?>
            <td><?php echo $gender; ?></td>
            <td><?php echo $value['age']; ?></td>
            <td><button type='button' class='btn btn-danger' value=<?php echo $value['id']; ?> name='delete' onclick="deleteuser(<?php echo $value['id']; ?>)" id='delete'>Delete</button></td>
          </tr>

        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
<script>
$(document).ready(function () {
    let table = new DataTable('#example');
$('#example').DataTable();

});
</script>
<?php
require_once('../lib/footer.php');
?>