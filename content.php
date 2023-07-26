<?php 
require_once('./asset/Database.php');
require_once('./lib/siteConstant.php');
?>
<?php
session_start();
if (!isset($_SESSION['Login']) || $_SESSION['Login'] !== true) {

    header("Location: index.php");
    exit;
  }
  else{
    echo false;
  }


$id=$_GET['blog_id'];
$category=$_GET['category'];
// echo '<br>jeel<br>File: '. __FILE__.'<br>Line: '.__LINE__.'<br><pre>';print_r($category);echo '</pre>'; die();
$data=new Database();
$blogcontent=$data->selectData('blog','*',"WHERE blog_id='$id'");
foreach($blogcontent as $value){
    $title=$value['blog_title'];
    $content=$value['blog_content'];
}

?>
<?php 
require_once('./lib/common.php');
?>
<div style="background-color: #E9DAC4; height: 100%; margin-bottom:200px">
<header>
    <div class='content'>
    <!-- Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #5A5A5A;">
        <div class="container-fluid justify-content-between ">
            <!-- Left elements -->
            <img src="<?php echo SITE_URL ?>PHPOPS/blogwebsite/asset/img/logo.png" alt='blog website' style="margin-top: 2px; width:150px" />
            <!-- Center elements -->
            <div class="navbar-nav flex-row d-none d-md-flex">
                <h3 class='text-center text-light'>
                        Hello user,You Are Reading <br>
                        <strong><?php echo $title;?></strong>
                </h3>
            </div>
            <!-- Right elements -->
            <div class="navbar-nav ">
                <a class="nav-link d-sm-flex align-items-sm-center btn btn-dark text-light"  href="dashboard.php">Dashboard</a>
            </div>
        </div>
    </nav>
    </div>
</header>
<div class='container-fluid' >
<div class='container' >

<div class='my-5'>
        <?php echo $content;?>
</div>
<div class='mt-3'>
    <h4 class='text-center text-primary'>You Can Also Read</h4>
    <div class='row mb-3'>
        <?php $readmore=$data->selectData('blog','*',"WHERE category='$category' AND blog_id!='$id' LIMIT 3");
foreach($readmore as $value){?>
    <div class='col-md-4'>
        <div class='row'>
      
        <a href="content.php?blog_id=<?php echo $value['blog_id']; ?> &category=<?php echo $value['category'];?>"><?php echo "<img src=" . SITE_URL . 'PHPOPS/blogwebsite/asset/blog_image/' . $value['blog_id'] . '/' . $value['blog_image'] . " width='300px' height='300px'>"?></a>
        </div>
        <div class='row'>
            <p class='text-center'><?php echo $value['blog_title'];?></p>
        </div>
</div>
<?php }?>
</div>
</div>
</div>
</div>
</div>
<?php
require_once('./lib/footer.php');
?>