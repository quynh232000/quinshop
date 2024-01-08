<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/x-icon" href="./assest/images/logo-no-text.png">
  <title>QUIN -Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./src/css/register.css" />
  <link rel="stylesheet" href="./src/css/base.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-2.2.4.min.js"
    integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
</head>

<body>
  <div class="register">
    <div class="wrapper">
      <form class="form-login" action="?mod=profile&act=login" method="post" enctype="multipart/form-data">
        <h1>Đăng nhập</h1>

        <!-- invalidate -->
        <div class="form-group">
          <div class="form-wrapper">
            <label for="userName">Tên đăng nhập</label>

            <div class="form-body">
              <i class="fa-solid fa-user"></i>
              <input type="text" class="form-control" id="userName" name="adminUser" rules="required"
                placeholder="Tên đăng nhập..." />
            </div>
            <div class="form-msg"></div>
          </div>
        </div>

        <div class="form-group invalidate">
          <div class="form-wrapper">
            <label for="password">Mật khẩu</label>
            <div class="form-body">
              <i class="fa-solid fa-lock"></i>
              <input type="password" class="form-control" id="password" name="adminPass" rules="required|min:6"
                placeholder="Mật khẩu..." />
            </div>
            <div class="form-msg"></div>
          </div>
        </div>

        <div class="form-noti" style="width:100%">
          <div class="form-msg">
            <?php
            if (isset($login_check)) {
              if ($login_check['status'] == false) {
                echo '<div id="toast" mes-type="error" mes-title="Thất bại!" mes-text="' . $login_check['message'] . '."></div>';
              } else {
                echo '<div id="toast" mes-type="success" mes-title="Thành công!" mes-text="' . $login_check['message'] . '."></div>';
                echo ' <script>
                setTimeout(function() {
                    window.location.href="' . $login_check['redirect'] . '";
                }, 2500);
            </script>';
              }
            }
            ?>
          </div>
        </div>
        <div class="forgot-pass">
          <a href="?mod=profile&act=forgotpassword">Quên mật khẩu!</a>
        </div>

        <div class="form-btn">
          <button class="btn-submit" type="submit">Đăng nhập</button>
        </div>
       
        <div class="form-change">
          Bạn chưa có tài khoản?
          <span><a href="?mod=profile&act=register">Đăng kí</a></span>
        </div>
        <div class="login-with-google">
          <span>Or</span>
          <!-- "<?= $gclient->createAuthUrl() ?>" -->
          <a href="#" target="_blank" class="btn google">
            <svg version="1.1" width="20" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
              style="enable-background: new 0 0 512 512" xml:space="preserve">
              <path style="fill: #fbbb00" d="M113.47,309.408L95.648,375.94l-65.139,1.378C11.042,341.211,0,299.9,0,256
  c0-42.451,10.324-82.483,28.624-117.732h0.014l57.992,10.632l25.404,57.644c-5.317,15.501-8.215,32.141-8.215,49.456
  C103.821,274.792,107.225,292.797,113.47,309.408z"></path>
              <path style="fill: #518ef8" d="M507.527,208.176C510.467,223.662,512,239.655,512,256c0,18.328-1.927,36.206-5.598,53.451
  c-12.462,58.683-45.025,109.925-90.134,146.187l-0.014-0.014l-73.044-3.727l-10.338-64.535
  c29.932-17.554,53.324-45.025,65.646-77.911h-136.89V208.176h138.887L507.527,208.176L507.527,208.176z"></path>
              <path style="fill: #28b446" d="M416.253,455.624l0.014,0.014C372.396,490.901,316.666,512,256,512
  c-97.491,0-182.252-54.491-225.491-134.681l82.961-67.91c21.619,57.698,77.278,98.771,142.53,98.771
  c28.047,0,54.323-7.582,76.87-20.818L416.253,455.624z"></path>
              <path style="fill: #f14336" d="M419.404,58.936l-82.933,67.896c-23.335-14.586-50.919-23.012-80.471-23.012
  c-66.729,0-123.429,42.957-143.965,102.724l-83.397-68.276h-0.014C71.23,56.123,157.06,0,256,0
  C318.115,0,375.068,22.126,419.404,58.936z"></path>
            </svg>

            Login With Google</a>
        </div>
        <div class="l-back-home">
          <a href="./" class="home-btn">Trang chủ</a>
        </div>
      </form>
    </div>
  </div>
  <script src="./src/js/main.js" type="module"></script>
</body>

</html>