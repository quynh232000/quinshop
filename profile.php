<?php
include 'inc/header.php';
?>
<!-- main -->
<?php
include 'inc/profilesidebar.php';
?>
           
            <div class="profile-container">
                <div class="profile-title">Profile</div>
                <form class="form-update-profile">
                    <div class="profile-avatar-body">
                        <div class="profile-img">
                            <img src="<?=Session::get("avatar") ?>"
                                alt="">
                        </div>
                        <label for="avatar-input">
                            <i class="fa-regular fa-pen-to-square"></i>
                            <span>Upload photo</span>
                        </label>
                        <input type="file" name="avatar" id="avatar-input" hidden>
                    </div>
                    <div class="profile-wrapper">
                        <div class="profile-group">
                            <label for="">Username</label>
                            <div class="profile-content">
                                <input type="text" value="<?=Session::get("userName") ?>" name="username" class="profile-input">
                            </div>
                        </div>
                        <div class="profile-group">
                            <label for="">Fullname</label>
                            <div class="profile-content">
                                <input type="text" value="<?=Session::get("fullName") ?>" name="fullname" class="profile-input">
                            </div>
                        </div>
                        <!-- <div class="profile-group">
                            <label for="">Gender</label>
                            <div class="profile-content">
                                <div class="profile-gender">
                                    <input type="radio" id="gender1" name="gender">
                                    <label for="gender1">Male</label>
                                </div>
                                <div class="profile-gender">
                                    <input type="radio" id="gender2" name="gender">
                                    <label for="gender2">Female</label>
                                </div>
                                <div class="profile-gender">
                                    <input type="radio" id="gender3" name="gender">
                                    <label for="gender3">Orther</label>
                                </div>
                            </div>
                        </div> -->
                        <div class="profile-group">
                            <label for="">Phone number</label>
                            <div class="profile-content">
                                <input type="text" value="<?=Session::get("phone") ?>" name="phonenumber" class="profile-input">
                            </div>
                        </div>
                        <div class="profile-group">
                            <label for="">Email</label>
                            <div class="profile-content">
                                <input type="email" value="<?=Session::get("email") ?>" name="email" class="profile-input">
                            </div>
                        </div>
                        <!-- <div class="profile-group">
                            <label for="">Date of birth</label>
                            <div class="profile-content">
                                <input type="date" name="birthday" class="profile-input">
                            </div>
                        </div> -->
                        <div class="profile-group">
                            <label for="">Address</label>
                            <div class="profile-content">
                                <input type="text" value="q8, hcm" name="address" class="profile-input">
                            </div>
                        </div>
                        <div class="profile-eidt-submit">
                            <button class="btn-update-profile" type="submit">
                                Update
                            </button>
                        </div>
                    </div>




                </form>
            </div>
        </div>
    </div>
</main>
<?php
include 'inc/footer.php';
?>