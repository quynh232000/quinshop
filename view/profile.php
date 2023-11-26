

           
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
                            <span>Tải lên</span>
                        </label>
                        <input type="file" name="avatar" id="avatar-input" hidden>
                    </div>
                    <div class="profile-wrapper">
                        <div class="profile-group">
                            <label for="">Tài khoản</label>
                            <div class="profile-content">
                                <input readonly type="text" value="<?=Session::get("userName") ?>" name="username" class="profile-input">
                            </div>
                        </div>
                        <div class="profile-group">
                            <label for="">Họ tên</label>
                            <div class="profile-content">
                                <input type="text" value="<?=Session::get("fullName") ?>" name="fullname" class="profile-input">
                            </div>
                        </div>
                       
                        <div class="profile-group">
                            <label for="">Số điện thoại</label>
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
                            <label for="">Địa chỉ</label>
                            <div class="profile-content">
                                <input type="text" value="q8, hcm" name="address" class="profile-input">
                            </div>
                        </div>
                        <div class="profile-eidt-submit">
                            <button class="btn-update-profile" type="submit">
                                Cập nhật
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