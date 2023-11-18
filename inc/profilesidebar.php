<?php
    // session_start();
    // include "./lib/session.php";
    Session::checkSession();
    // Session::checkPermission(0);

    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
        $url = "https://";
    else
        $url = "http://";
    $url .= $_SERVER['HTTP_HOST'];
    $url .= $_SERVER['REQUEST_URI'];


?>

<main class="profile">
    <div class="wrapper">
        <div class="profile-body">
            <div class="profile-nav">
                <div class="profile-nav-user">
                    <div class="profile-nav-avatar">
                        <img src="<?=Session::get("avatar") ?>" alt="">
                    </div>
                    <div class="profile-nav-info">
                        <div class="profile-nav-user-name"><?=Session::get("fullName") ?></div>
                        <div class="profile-nav-user-edit">Edit account</div>
                    </div>
                </div>
                <div class="profile-nav-list">
                    <div class="profile-nav-item  <?php if(
                                !str_contains($url,"orderhistory.php")&&
                                !str_contains($url,"sercurity.php")
                                ) {echo "active";}?>">
                        <a href="./profile.php" class="profile-nav-content ">
                            <div class="profile-nav-item-title">
                                <i class="fa-regular fa-user"></i>
                                <div class="profile-nav-name">Profile</div>
                            </div>
                            <div class="profile-nav-item-down">
                                <!--  -->
                            </div>
                        </a>

                    </div>
                    <div class="profile-nav-item <?php if(str_contains($url,"orderhistory.php")) {echo "active";}?>">
                        <a href="./orderhistory.php" class="profile-nav-content">
                            <div class="profile-nav-item-title">
                            <i class="fa-solid fa-box"></i>
                                <div class="profile-nav-name">History Orders</div>
                            </div>
                        </a>

                    </div>
                    <div class="profile-nav-item <?php if(str_contains($url,"sercurity.php")) {echo "active";}?>">
                        <a href="./sercurity.php" class="profile-nav-content">
                            <div class="profile-nav-item-title">
                                <i class="fa-solid fa-shield"></i>
                                <div class="profile-nav-name">Security</div>
                            </div>
                            <div class="profile-nav-item-down">

                            </div>
                        </a>

                    </div>


                </div>
            </div>