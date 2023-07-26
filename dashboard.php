<?php
require_once('./asset/Database.php');
require_once('./lib/siteConstant.php');
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
$category = $_POST['category'];
// Search data by dropdown
$action = $_POST['action'];
if ($action == 'dropdown_data') {
    $details = $data->selectData('blog', '*', "JOIN category on blog.category=category.category_id WHERE category='$category'  "); ?>

    <?php foreach ($details as $value) {
        if ($category == $value['category_id']) { 
           ?>
            <div class='col-md-4 text-center '>
                <div class='row'>
                    <a href="content.php?blog_id=<?php echo $value['blog_id']; ?> &category=<?php echo $value['category']; ?>"><img class='border border-dark' src="<?php echo SITE_URL; ?>PHPOPS/blogwebsite/asset/blog_image/<?php echo  $value['blog_id'] . '/' . $value['blog_image'] ?>" width='300px' height='300px'></a>
                </div>

                <div>
                    <div class='row'>
                        <p><strong>Name:</strong><?php echo $value['blog_name']; ?></p>
                    </div>
                    <div class='row'>
                        <p><strong>Title:</strong><?php echo $value['blog_title']; ?></p>
                    </div>
                    <div class='row'>
                        <p><strong>Category:</strong><?php echo $value['category']; ?></p>
                    </div>
                    <div class="row">
                        <p><strong>Publish Date:</strong><?php echo $value['publish_date']; ?></p>
                    </div>
                </div>
            </div>
    <?php
        }
    } 
    exit;
}

if($action=='search_data'){
    $search=$_POST['search'];
    $searchdata=$data->selectData('blog','*');
    echo '<br>jeel<br>File: '. __FILE__.'<br>Line: '.__LINE__.'<br><pre>';print_r($searchdata);echo '</pre>'; die();
}
?>
<?php
require_once('./lib/common.php');
?>
<div style="background-color: #E9DAC4">
    <header>

        <!-- Navbar-->
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: 	#5A5A5A;">
            <div class="container-fluid justify-content-between">
                <!-- Left elements -->
                <img src="<?php echo SITE_URL ?>PHPOPS/blogwebsite/asset/img/logo.png" alt='blog website' style="margin-top: 2px; width:150px" />
                <!-- Center elements -->
                <div class="navbar-nav flex-row d-none d-md-flex">
                    <h1>
                    <select class='form-select' name='category' id='category'>
                        <option value=''>Select Data Please</option>
                                <?php $option=$data->selectData('category','*');
                                foreach($option as $value){?>
                                <option value="<?php echo $value['category_id'];?>"><?php echo $value['category_name'];?></option>
                                <?php }?>
                            </select>
                    </h1>
                </div>
                <!-- Right elements -->
                <div class="navbar-nav ">
                    <a class="nav-link d-sm-flex align-items-sm-center btn btn-dark text-light" name='logout' href="index.php">Log Out</a>
                </div>
            </div>
        </nav>
    </header>

    <div class='container' style="margin-bottom:200px">
<div class='text-center my-5'>
    <input type='search' placeholder='search heare'id='usersearch'>
</div>
<!-- <span ></span> -->
        <div class='row my-3 ' id='detail'>
            <?php $blogdata = $data->selectData('blog', '*');
            foreach ($blogdata as $value) { ?>
                <div class='col-md-4 text-center'>
                    <div class='row'>
                        <a href="content.php?blog_id=<?php echo $value['blog_id']; ?> &category=<?php echo $value['category']; ?>"><img class='border border-dark' src="<?php echo SITE_URL; ?>PHPOPS/blogwebsite/asset/blog_image/<?php echo  $value['blog_id'] . '/' . $value['blog_image'] ?>" width='300px' height='300px'></a>
                    </div>
                    <div>
                        <div class='row'>
                            <p><strong>Name:</strong><?php echo $value['blog_name']; ?></p>
                        </div>
                        <div class='row'>
                            <p><strong>Title:</strong><?php echo $value['blog_title']; ?></p>
                        </div>
                        <div class='row'>
                            <p><strong>Category:</strong><?php echo $value['category']; ?></p>
                        </div>
                        <div class="row">
                            <p><strong>Publish Date:</strong><?php echo $value['publish_date']; ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php
require_once('./lib/footer.php');
?>
