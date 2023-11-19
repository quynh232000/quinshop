<?php
include "./controller/adminlogin.php";
$class = new Adminlogin();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $checkRegister = $class->registerlogin_admin(
    $_POST['username']
    ,
    $_POST['fullname'],
    $_POST['email'],
    $_POST['phone'],
    md5($_POST['password']),
    md5($_POST['confirmpassword'])
  );

}




?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>UNIDI - Register</title>
  <link rel="icon" type="image/x-icon" href="./assest/images/logo-no-text.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./src/css/base.css" />
  <link rel="stylesheet" href="./src/css/register.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-2.2.4.min.js"
    integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
  <style>
    /* .body-register{
        max-height: 80vh;
        overflow-y: scroll;
      }
      ::-webkit-scrollbar{
        display: hidden;
      } */
    .form-group {
      margin-top: 0;
    }

    .register {
      padding: 40px 0;
    }
  </style>
</head>

<body>
  <div class="register">
    <div class="wrapper body-register">
      <form class="form-register" id="register-form" method="POST" action="register.php">
        <h1>Register form</h1>
        <!-- invalidate -->
        <div class="form-group">
          <div class="form-wrapper">
            <label for="userName">Username</label>
            <div class="form-body">
              <i class="fa-solid fa-user"></i>
              <input type="text" class="form-control" id="userName" rules="required" name="username"
                placeholder="Username" />
            </div>
            <div class="form-msg"></div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-wrapper">
            <label for="Full name">Full Name</label>
            <div class="form-body">
              <i class="fa-solid fa-user"></i>
              <input type="text" class="form-control" id="Full name" rules="required" name="fullname"
                placeholder="Full name" />
            </div>
            <div class="form-msg"></div>
          </div>
        </div>

        <div class="form-group">
          <div class="form-wrapper">
            <label for="email">Email</label>
            <div class="form-body">
              <i class="fa-solid fa-paper-plane"></i>
              <input type="text" class="form-control" rules="required|email" id="email" name="email"
                placeholder="Email" />
            </div>
            <div class="form-msg"></div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-wrapper">
            <label for="phone">Phone</label>
            <div class="form-body">
              <i class="fa-solid fa-phone"></i>
              <input type="text" class="form-control" id="phone" rules="required" name="phone"
                placeholder="Phone number" />
            </div>
            <div class="form-msg"></div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-wrapper">
            <label for="password">Password</label>
            <div class="form-body">
              <i class="fa-solid fa-lock"></i>
              <input type="password" class="form-control" id="password" rules="required|min:6" name="password"
                placeholder="Password" />
            </div>
            <div class="form-msg"></div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-wrapper">
            <label for="confirmPassword">Confirm Password</label>
            <div class="form-body">
              <i class="fa-solid fa-lock"></i>
              <input type="text" class="form-control" id="confirmPassword" rules="required|min:6" name="confirmpassword"
                placeholder="Confirm Password" />
            </div>
            <div class="form-msg"></div>
          </div>
        </div>
        <div class="form-group invalid">
          <div class="form-wrapper">
            <div class="form-msg">
              <?php
              if (isset($checkRegister)) {
                echo $checkRegister;
              } else {
                echo "";
              }
              ?>
            </div>
          </div>
        </div>
        <div class="form-btn">
          <button class="btn-submit" type="submit">Register</button>
        </div>
        <div class="form-change">
          Already have an account?
          <span><a href="./login.php">Signup</a></span>
        </div>
      </form>
    </div>
  </div>


  <script src="./src/js/register.js" type="module"></script>
  <!-- <script src="./src/js/main.js" type="module"></script> -->
</body>

</html>