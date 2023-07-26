<?php
    require_once('../../lib/siteConstant.php');
    require_once('./asset/Database.php')
?>

<?php
    $data = new Database();
        if (isset($_POST['register'])) 
        {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $Gender = $_POST['gender'];

    $age = $_POST['age'];
    $password = $_POST['password'];

        if ($Gender == 'male') {
            $gender = 'M';
    } 
        else {
            $gender = 'F';
    }
    $birthdate = $_POST['birthdate'];
    $array = array(
        'id' => "''", 'firstname' => $firstname, 'lastname' => $lastname,
        'email' => $email,
        'password' => $password,
        'gender' => $gender,
        'age' => $age
    );
    $exist = $data->selectData('user', "COUNT(*)", "WHERE email=BINARY '$email'");
    foreach ($exist as $value) {
        if ($value['COUNT(*)'] == 0) {
            if(!empty($firstname) && !empty($lastname) && !empty($email) && !empty($age) && !empty($password)) {
            $data->Insertdata('user', $array);
            header('Location:index.php');
            $success = 'Data Entered Successfully';
            }
        } else {
            $mailerror = 'mail is already exist';
        }
    }
        }
?>

<?php
    require_once('./lib/common.php');
?>
<div  style="background-color: #E9DAC4; margin-bottom:200px">
<header>
    <!-- Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #5A5A5A;">
        <div class="container-fluid justify-content-between">
            <!-- Left elements -->
            <img src="<?php echo SITE_URL ?>PHPOPS/blogwebsite/asset/img/logo.png" alt='blog website' style="margin-top: 2px; width:150px" />
            <!-- Center elements -->
            <div class="navbar-nav flex-row d-none d-md-flex">
                <h1>
                    <p class='text-light'>Register Your Self</p>
                </h1>
            </div>
            <!-- Right elements -->
            <div class="navbar-nav ">
                <a class="nav-link d-sm-flex align-items-sm-center btn btn-dark text-light" href="index.php">Back To Login Page</a>
            </div>
        </div>
    </nav>
</header>
<main>
    <section class="gradient-custom">
        <div class="container mt-3">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                            <form action='' method='post'>

                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <label class="form-label" for="firstName">First Name</label>
                                            <span class="input-group-require pl-1 text-danger"> * </span>
                                            <input type="text" id="firstName" name='firstname' class="form-control " placeholder='John' value="<?php echo $_POST['firstname']; ?>" />
                                            <span id='first' class='text-danger'></span>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <label class="form-label" for="lastName">Last Name</label>
                                            <span class="input-group-require pl-1 text-danger"> * </span>
                                            <input type="text" id="lastName" name='lastname' class="form-control " placeholder='Doe' value="<?php echo $_POST['lastname']; ?>" />
                                            <span id='last' class='text-danger'></span>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 d-flex align-items-center">

                                        <div class="form-outline datepicker w-100">
                                            <label for="password" class="form-label">Password</label>
                                            <span class="input-group-require pl-1 text-danger"> * </span>
                                            <input type="password" name='password' class="form-control " id="password" placeholder='********' value="<?php echo $_POST['password']; ?>" />
                                            <span id='Password' class='text-danger'></span>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <h6 class="mb-2 pb-1">Gender: </h6>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="gender" value="female" <?php echo (isset($Gender) && ($Gender == 'female') ? 'checked' : '') ?> checked>
                                            <label class="form-check-label" for="femaleGender">Female</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="gender" value="male" <?php echo (isset($Gender) && ($Gender == 'male') ? 'checked' : '') ?> />
                                            <label class="form-check-label" for="maleGender">Male</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                            <label class="form-label" for="emailAddress">Email</label>
                                            <span class="input-group-require pl-1 text-danger"> * </span>
                                            <input type="email" name='email' id="emailAddress" class="form-control " placeholder='john@gmail.com' value="<?php echo $_POST['email']; ?>" />
                                            <span id='Email' class='text-danger'><?php echo $mailerror; ?></span>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                            <label class="form-label" for="age">age </label>
                                            <span class="input-group-require pl-1 text-danger"> * </span>
                                            <input type="number" name='age' id="age" class="form-control "  placeholder="Your Age" value="<?php echo $_POST['age']; ?>" >
                                            <span id='Age' class='text-danger'></span>
                                        </div>

                                    </div>
                                </div>


                                <div class="mt-4 pt-2">
                                    <span id='error' class='text-danger'><?php echo $error; ?></span>
                                    <span id='success' class='text-dark'><?php echo $success; ?></span>
                                </div>
                                <div class="mt-4 pt-2">
                                    <button class="btn btn-primary " type="submit" name='register' id='register'>Register</button>
                                    <button class="btn btn-dark " type="submit" name='login' id='register'><a href='index.php' class='text-light' style='text-decoration:none'>Back To Login Page</button>

                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</main>
    </div>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> 
    <script src="<?php echo SITE_URL; ?>/PHPOPS/blogwebsite/asset/main.js"></script>
</body>
</html>