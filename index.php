<?php
session_start();
require_once('./asset/Database.php')
?>
<?php


$action = $_POST['action'];
if ($action == 'login_data') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (!empty($email) && !empty($password)) {
        $data = new Database();
        $details = $data->selectData('user', "COUNT('email,password')","WHERE email=BINARY '$email' AND password=BINARY'$password'");
        foreach ($details as $value) {
            if ($value["COUNT('email,password')"] === 1) {
                $_SESSION['Login'] = true;
            echo 'success';
            
             } else {
                $error = 'Your entered data is incorrect';
            }
        }
      
    } else {
        $errors = "Enter All The Details";
    }

    exit;
}

?>
<?php
require_once('./lib/common.php');
?>

    <section class="vh-100" style="background-color: #E9DAC4;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block ">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp" alt="login form" class="img-fluid w-100 h-100" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form action='' method='post'>

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0"><img src="<?php echo SITE_URL; ?>PHPOPS/blogwebsite/asset/img/logo.png " class='img-fluid w-50 h-50 rounded-circle shadow-4-strong'></span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example17">Email address</label>
                                            <input type="email" name='email' id="email" class="form-control form-control-lg" required>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example27">Password</label>
                                            <input type="password" name='password' id="password" class="form-control form-control-lg" required>
                                        </div>
                                        <div>
                                            <span id='error' class='text-danger'></span>
                                        </div>
                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="button" id='Login' name='Login'>Login</button>
                                        </div>


                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="<?php echo SITE_URL; ?>PHPOPS/blogwebsite/register.php" style="color: #393f81;">Register here</a></p>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> 
</body>
</html>
<script src="<?php echo SITE_URL; ?>PHPOPS/blogwebsite/asset/main.js"></script>;
<script>
    var SITE_URL = "<?php echo SITE_URL; ?>";
</script>