<?php
require_once('../lib/siteConstant.php');
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
  $blog_id = $_POST['blog_id'];
  $action = $_POST['action'];
  if ($action == 'delete_data') {

    $blog_imagen = $data->selectData('blog', 'blog_image', "WHERE blog_id='$blog_id'")[0]['blog_image'];
    unlink("../asset/blog_image/$blog_id/$blog_imagen");
    rmdir("../asset/blog_image/$blog_id");
    $data->deleteData('blog', 'WHERE blog_id=' . $blog_id);
    echo 'success';
    exit;
  }
}

$action = $_POST['action'];
if ($action == 'dropdown_data') {
  $category = $_POST['category'];

  $matchdata = $data->selectData('blog', '*', "WHERE category='$category'");
  foreach ($matchdata as $value) {
    // echo '<br>jeel<br>File: '. __FILE__.'<br>Line: '.__LINE__.'<br><pre>';print_r($value['v']);echo '</pre>'; die();
    if ($value['category'] == $category) { ?>

      <?php
      $id = $_GET['blog_id'];
      $i += 1; ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td>
          <?php echo "<img src=" . SITE_URL . 'PHPOPS/blogwebsite/asset/blog_image/' . $value['blog_id'] . '/' . $value['blog_image'] . " width='100px' height='100px'>"; ?>
        </td>
        <td><?php echo $value['blog_name']; ?></td>
        <td><?php echo $value['blog_title']; ?></td>
        <td><?php echo $value['category']; ?></td>
        <td><?php echo $value['publish_date']; ?></td>
        <td><a href="blog_action.php?blog_id=<?php echo $value['blog_id']; ?>"><button type='button' name='edit' class='btn btn-warning ms-2' value=<?php echo $value['blog_id']; ?>>Edit</button></a></td>
        <td><button type='button' name='delete' class='btn btn-danger' onclick="deleteData(<?php echo $value['blog_id']; ?>)" id='delete' value=<?php echo $value['blog_id']; ?>>Delete</button></td>
      </tr>

    <?php } ?>
<?php
  }
  exit;
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
        <h1>
          <p>List Of Your Blogs</p>
        </h1>
      </div>
      <!-- Right elements -->
      <div class="navbar-nav ">
        <a class="nav-link d-sm-flex align-items-sm-center btn btn-dark text-light my-2" href="<?php echo SITE_URL; ?>PHPOPS/blogwebsite/admin/blog_action.php">Add New Blog</a>
        <a class="nav-link d-sm-flex align-items-sm-center btn btn-dark text-light mx-2 my-2" name='logout' href="<?php echo SITE_URL; ?>PHPOPS/blogwebsite/admin/index.php">Log Out</a>
      </div>
    </div>
  </nav>
</header>
<div style="margin-bottom:80px" ;>
  <?php require_once('../lib/sidebar.php'); ?>
  <div class="col">
    <div class='mt-5'>
      <div class='row'>
        <div class='col-md-8 form-group'>
          <div class='d-flex'>
            <input type='search' name='search' id='search' class='form-control' placeholder='search Your Data'>
          </div>
        </div>
        <div class='col-md-4'>
          <select class='form-select' name='category' id='category'>
            <option value=''>Choose Category</option>
            <?php $option = $data->selectData('category', '*');
            foreach ($option as $value) { ?>
              <option value="<?php echo $value['category_id']; ?>"><?php echo $value['category_name']; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <span id='error' class='text-danger'><?php echo $error; ?></span>
      <div class='mt-5'>
        <table class="table table-dark table-striped" id='example'>
          <thead>
            <tr>
              <th>Sr No.</th>
              <th>Blog Image</th>
              <th>Blog Name</th>
              <th>Blog Title</th>
              <th>Blog Category</th>
              <th>Publish Date</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody id='detail'>
            <?php $list = $data->selectData('blog', '*', "JOIN category on blog.category=category.category_id ORDER BY blog_id");
            foreach ($list as $value) {
              $id = $_GET['blog_id'];
              $i += 1; ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td>
                  <?php echo "<img src=" . SITE_URL . 'PHPOPS/blogwebsite/asset/blog_image/' . $value['blog_id'] . '/' . $value['blog_image'] . " width='100px' height='100px'>"; ?>
                </td>
                <td><?php echo $value['blog_name']; ?></td>
                <td><?php echo $value['blog_title']; ?></td>
                <td><?php echo $value['category_name']; ?></td>
                <td><?php echo $value['publish_date']; ?></td>
                <td><button type='button' name='edit' class='btn btn-warning ms-2' value=<?php echo $value['blog_id']; ?>><a href="blog_action.php?blog_id=<?php echo $value['blog_id']; ?>">Edit</a></button></td>
                <td><button type='button' name='delete' class='btn btn-danger' onclick="deleteData(<?php echo $value['blog_id']; ?>)" id='delete' value=<?php echo $value['blog_id']; ?>>Delete</button></td>
              </tr>

            <?php } ?>
          </tbody>
      </div>
      </table>
    </div>
    </main>
  </div>
  <?php
  require_once('../lib/footer.php');
  ?>