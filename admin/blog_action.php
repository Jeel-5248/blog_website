<?php
require_once('../lib/siteConstant.php');
?>
<?php
require_once('../asset/Database.php');
?>
<?php
session_start();

if (!isset($_SESSION['Login']) || $_SESSION['Login'] !== true) {
    header("Location: index.php");
    exit;
}

$errorinfo = $_FILES["blogimage"]["error"];
$filename = basename($_FILES["blogimage"]["name"]);
$tmpfile = $_FILES["blogimage"]["tmp_name"];
$filesize = $_FILES["blogimage"]["size"];
$filetype = $_FILES["blogimage"]["type"];

$data = new Database();
$id = $_GET['blog_id'];
if (isset($id)) {
    $modify = $data->selectData('blog', '*', "WHERE blog_id=$id")[0];
    $blogname = $modify['blog_name'];
    $blogtitle = $modify['blog_title'];
    $category = $modify['category'];
    $text = $modify['blog_content'];
    $date = date('y-m-d');
}

if (isset($_POST['addblog'])) {
    $blog_name = $_POST['blogname'];
    $blog_title = $_POST['blogtitle'];
    $categorys = $_POST['category'];
    $texts = $_POST['text'];
    $publish_date = date('y-m-d');
    $array = array('blog_name' => "$blog_name", 'blog_title' => "$blog_title", 'category' => "$categorys", 'publish_date' => "$publish_date", 'blog_content' => "$texts");
    if (!empty($blog_name) && !empty($blog_title) && !empty($categorys) && !empty($texts)) {
        if (!empty($id)) {

            $blog_imagen = $data->selectData('blog', 'blog_image', "WHERE blog_id='$id'")[0]['blog_image'];
            $lastInsert = $data->updateData('blog', $array, "WHERE blog_id=$id");
            if (!empty($filename)) {
                unlink("../asset/blog_image/$id/$blog_imagen");
                $array['blog_image'] = "$filename";
            }
            move_uploaded_file($tmpfile, "../asset/blog_image/" . $id . '/' . $filename);
            $success = 'your data edited successfully';
        } else {
            if (!empty($filename)) {
                $array['blog_image'] = "$filename";
                $lastInsert = $data->Insertdata('blog', $array);
                mkdir("../asset/blog_image/" . $lastInsert);
                move_uploaded_file($tmpfile, "../asset/blog_image/" . $lastInsert . '/' . $filename);
                $success = 'your data enterd successfully';
            } else {
                $error = 'enter all details';
            }
        }
    } else {
        $error = 'enter all details';
    }
}


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog Website</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tiny.cloud/1/sr6t98x2uwca86tz9mox6ac1rqoxuc9wpb9xlvneeysgxgzy/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>
    <header>
        <!-- Navbar-->
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #5A5A5A;">
            <div class="container-fluid justify-content-between">
                <!-- Left elements -->
                <img src="<?php echo SITE_URL ?>PHPOPS/blogwebsite/asset/img/logo.png" alt='blog website' style="margin-top: 2px; width:150px" />
                <!-- Center elements -->
                <div class="navbar-nav flex-row d-none d-md-flex">
                    <h1 class='text-light'>
                        <p>Add Blog</p>
                    </h1>
                </div>
                <!-- Right elements -->
                <div class="navbar-nav ">
                    <a class="nav-link d-sm-flex align-items-sm-center btn btn-dark text-light" href="<?php echo SITE_URL; ?>PHPOPS/blogwebsite/admin/dashboard.php">Dashboard</a>
                </div>
            </div>
        </nav>
    </header>

    <?php require_once('../lib/sidebar.php'); ?>
    <div class="col py-3" style="background-color:#dadada; margin-bottom:80px">

        <div class="container py-5 d-flex justify-content-center">
            <div class=' border border-dark border-3 w-75 h-75 p-4' style="background-color: #ffffff">
                <div class='my-2 text-center'>
                    <h1>Add Blog</h1>
                </div>
                <form action="" method='post' enctype='multipart/form-data' id='registerform'>
                    <div class='row mt-3'>
                        <div class='col-md-8 form-group'>
                            <label class="form-label" for='blogname'>Blog Name:</label>
                            <input type='text' name='blogname' value='<?php echo $blogname; ?>' placeholder="Enter name of your blog" id='blogname' class='form-control'>
                            <span id='blog_name' class='text-danger'></span>
                        </div>
                        <div class='col-md-4 form-group'>
                            <label class="form-label" for='blogtitle'>Blog Title:</label>
                            <input type='text' name='blogtitle' value='<?php echo $blogtitle; ?>' placeholder="Enter Title of your blog" id='blogtitle' class='form-control'>
                            <span id='blog_title' class='text-danger'></span>
                        </div>
                    </div>
                    <div class='row mt-3'>
                        <div class='col-md-5'>
                            <label for='category' class='form-label' id='category'>Category Of Blog:</label>
                            <select class='form-select' name='category' id='category' required>
                                <option value=''>Select Category Name</option>
                                <?php $option = $data->selectData('category', '*');
                                foreach ($option as $value) { ?>
                                 <option value="<?php echo $value['category_id']; ?>" <?php echo $category==$value['category_id']?'selected':'';  ?> ><?php echo $value['category_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class='col-md-7 form-group'>
                            <label for='image' class='form-label'>Upload Your Image:</label>
                            <input type='file' id='blogimage' name='blogimage' placeholder='uploade your image' class='form-control'>
                            <span id='blog_image' class='text-danger'></span>
                        </div>
                    </div>
                    <div class='mt-4'>
                        <strong>Add Your Content:</strong>
                    </div>
                    <div class='col-md-4'>


                        <textarea name='text' id='text'>
                          <?php echo $text; ?>
                        </textarea>


                    </div>

                    </section>
                    <span id='error' class='text-danger'><?php echo $error ?></span>
                    <span id='success' class='text-success'><?php echo $success ?></span>
                    <div class='row'>
                        <div class='col-md-4 mt-3'>
                            <button type='submit' name='addblog' id='form' class='btn btn-primary btn-outline-dark text-light'>Add Blog</button>

                        </div>
                    </div>
            </div>

            </form>

            <?php
            require_once('../lib/footer.php');
            ?>