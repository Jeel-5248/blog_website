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
$id=$_GET['category_id'];
if(isset($_GET['category_id'])){
    $modify= $data->selectData('category', '*',"where category_id='$id'")[0];
    $name = $modify['category_name'];
    if (isset($_POST['addcategory'])){

        $update=array('category_id' => $id, 'category_name' => $_POST['categoryname']);
        if (!empty($name)) {
                $updateData=$data->updateData('category',$update,"WHERE category_id=$id");
                $success='Your Data Edited Successfully';         
}
else{
    $error='Enter Valid Category Name';
}
    }
}
else{
if (isset($_POST['addcategory'])) {
    $name = $_POST['categoryname'];
    $array = array('category_id' => "''", 'category_name' => "$name");
    if (!empty($name)) {
        $select = $data->selectData('category', "COUNT(*)", "WHERE category_name='$name'");

        foreach ($select as $value) {
            if ($value['COUNT(*)'] == 0) {
                $data->Insertdata('category', $array);
                $success = 'Data Entered Successfully';
            } else {
                $error = 'category is already exist';
            }
        }
    }
}
}

if (isset($_POST['action'])) {
    $category_id = $_POST['category_id'];
    $action = $_POST['action'];
    if ($action == 'delete_data') {
        $data->deleteData('category', "WHERE category_id=$category_id");;
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
                    <p>Category</p>
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
<?php require_once('../lib/sidebar.php'); ?>
<div class="col py-3" style="background-color:#dadada;">
    <div class='my-5 text-center'>
        <div class="container py-5 d-flex justify-content-center">
            <div class=' border border-dark border-3 w-75 h-75 p-4' style="background-color: #ffffff">
                <div class='my-2 text-center'>
                    <h1>Add Category</h1>
                </div>
                <form action="" method='post' enctype='multipart/form-data' id='registerform'>
                    <div class='row mt-3'>
                        <div class='col-md-8 form-group'>
                            <label class="form-label" for='categoryname'>Category Name:</label>
                            <input type='text' name='categoryname' value='<?php echo $name; ?>' placeholder="Enter name of your category" id='categoryName' class='form-control' required>
                            <span id='category_name' class='text-danger'><?php echo $error;?></span>
                            <span><?php echo $success;?></span>
                        </div>
                        <div class='col-md-4 form-group'>
                            <div>
                                <button type='submit' name='addcategory' class='btn btn-primary mt-4'>Add Category</button>
                            </div>
                        </div>
                        
                    </div>
                </form>
                <h3 class='mt-5'>Available Category Are</h3>
                <table class="table table-dark table-striped mt-2">
                    <thead>
                        <tr>
                            <th>Sr no.</th>
                            <th>Category_Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data->selectData('category','*') as $list){
                            $i+=1;?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $list['category_name'];?></td>
                                <td><button type='button' class='btn btn-warning' name='edit' value=<?php echo $list['category_id'];?>><a href="add_category.php?category_id=<?php echo $list['category_id'];?>">Edit</a></button>
                                <td><button type='button' name='delete' class='btn btn-danger' onclick="deletecategory(<?php echo $list['category_id']; ?>)" id='delete' value=<?php echo $list['category_id']; ?>>Delete</button></td>
                            </tr>
                       <?php }?>
                    </tbody>
</table>
            </div>
        </div>
        <?php
        require_once('../lib/footer.php');
        ?>
