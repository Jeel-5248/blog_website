<?php
session_start();
require_once('../lib/siteConstant.php');
require_once('./../asset/Database.php');
?>
<?php

$data = new Database();
$action = $_POST['action'];
if ($action == 'admin_login') {
  $username = $_POST['username'];
  $password = $_POST['password'];
  if (!empty($username) && !empty($password)) {
    $checkDetails = $data->selectData('admin', "COUNT('*')", "WHERE username=BINARY '$username' AND password=BINARY '$password'");
    foreach ($checkDetails as $value) {
      if ($value["COUNT('*')"] == 1) {
        $_SESSION['Login'] = true;
        echo 'success';
      } else {
        echo 'error';
      }
    }
  } else {
    $error = 'Enter All Details';
  }
  exit;
}
?>
<?php
require_once('../lib/common.php');
?>
<header>
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #c0c0c0;">
    <div class="container-fluid justify-content-between">
      <!-- Left elements -->
      <img src="<?php echo SITE_URL ?>PHPOPS/blogwebsite/asset/img/logo.png" alt='blog website' style="margin-top: 2px; width:150px" />

      <div class="navbar-nav ">
        <h1>
          <p>Welcome Admin</p>
        </h1>
      </div>
    </div>
  </nav>
</header>
<main>
  <section>
    <div class="container py-5">
      <div class="row d-flex align-items-center justify-content-center ">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="img-fluid" alt="Phone image">
        </div>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
          <form action='' method='post'>
            <!-- Email input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="username">Username</label>
              <input type="email" name='username' id="username" class="form-control " required>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="password">Password</label>
              <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div>
              <span id='error' class='text-danger'><?php echo $error; ?></span>
            </div>



            <!-- Submit button -->
            <button type="button" id='adminLogin' name='Login' class="btn btn-primary">Sign in</button>
          </form>
        </div>
      </div>
    </div>
  </section>
</main>
<script src="<?php echo SITE_URL; ?>PHPOPS/blogwebsite/asset/main.js"></script>
<script>
  var SITE_URL = "<?php echo SITE_URL; ?>";
</script>
<script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>   
</body>
</html>
