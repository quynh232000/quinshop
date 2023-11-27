<link rel="stylesheet" href="./src/css/manageuser.css">
<main class="main-manageuser">
    <div class="manage-user">

        <div class="p-body">
            <div class="p-body-title">
                <span class="title-item active" data-user="">Tất cả người dùng </span>
            </div>
            <div class="p-content">
                <div class="p-search">
                    <div class="p-search-item filter">
                        <span>Tìm kiếm</span>
                        <i class="fa-solid fa-sort"></i>
                        <div class="p-fillter-more">
                            <div class="p-fillter-item">Tên</div>
                            <div class="p-fillter-item">Email</div>
                        </div>
                    </div>
                    <div class="p-search-item p-search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="text" placeholder="Tìm kiếm..." />
                    </div>
                    <div class="p-search-item p-search-item-trash">
                        <i class="fa-solid fa-trash-can"></i>
                    </div>
                </div>
                <div class="p-pagination">
                    <div class="p-pagination-left">
                        <span>
                            (<span class="count-product">0</span>/20)
                            sản phẩm
                        </span>
                        <div>|</div>
                        <span>
                            (<span class="current-page">1</span>/
                            <span class="total-page">6</span>) trang
                        </span>
                    </div>
                    <div class="p-pagination-right">
                        <div class="p-pagination-item previous-page">
                            Trước
                        </div>
                        <div class="p-pagination-item">1</div>
                        <div class="p-pagination-item">2</div>
                        <div class="p-pagination-item">3</div>
                        <div class="p-pagination-item next-page">Sau</div>
                    </div>
                </div>
                <div class="item item-nav">
                    <div class="item-left">
                        <input type="checkbox" class="item-input" />
                        <div class="item-img">Ảnh</div>
                        <div class="item-name">Tài khoản</div>
                    </div>
                    <div class="item-right">
                        <div class="item-role">Quyền</div>
                        <div class="item-action">Hành động</div>
                    </div>
                </div>
                <div class="list-item list-users">
                    <div class="loading">
                        <div class="spinner-2"></div>
                    </div>
                    <?php
                    if (isset($allUser) && is_array($allUser->result)) {
                        
                        foreach ($allUser->result as $key => $value) { ?>
                            <div class="item">
                                <div class="item-left">
                                    <input type="checkbox" class="item-input" user-id='${item?.id}' />
                                    <div class="item-img">
                                        <img
                                            src='<?=$value['avatar'] ?>' />
                                    </div>
                                    <div class="item-name">
                                        <p><?=$value['userName'] ?></p>
                                        <span><?=$value['email'] ?></span>
                                    </div>
                                </div>
                                <div class="item-right">
                                    <div class="item-role">
                                        <div class="role <?=$value['role'] ?>">
                                        <?=$value['role'] ?>
                                        </div>
                                    </div>
                                    <div class="item-action">
                                        <div class="action modify">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            <span>Sửa</span>
                                        </div>
                                        <div class="action delete-btn" user-id='${item?.id}'>
                                            <i class="fa-solid fa-trash"></i>
                                            <span>Xóa</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php }

                    }
                    ?>
                    <!-- item -->

                </div>
               
            </div>
        </div>
    </div>
</main>
<div class="modal hidden modal-detail-user">
    <div class="modal-wrapper">
        <div class="m-close">
            <i class="fa-solid fa-xmark"></i>
        </div>
        <div class="m-title">Edit Profile</div>

        <div class="m-body">
            <div class="loading-all hidden">
                <div class="spinner-3"></div>

            </div>
            <!-- body -->
            <div class="form-modal-user">
                <div class="form-body-wrapper">

                    <div class="body-item w-50">
                        <div class="avatar w-100">
                            <div class="avatar-body">
                                <img src="https://static.vecteezy.com/system/resources/previews/000/439/863/original/vector-users-icon.jpg"
                                    alt="" class="img-avatar" />
                                <label for="input-avatar" class="label-avatar">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </label>
                                <input type="file" name="avatar" id="input-avatar" class="input-avatar" />
                            </div>
                        </div>


                        <div class="form-group w-100">
                            <div class="form-wrapper">
                                <label for="">Roles</label>
                                <div class="form-body">
                                    <div class="list-roles">
                                        <div class="role">
                                            <span>Admin</span>
                                            <i class="fa-solid fa-trash-can"></i>
                                        </div>
                                        <div class="role">
                                            <span>Seller</span>
                                            <i class="fa-solid fa-trash-can"></i>
                                        </div>
                                        <div class="role">
                                            <span>Member</span>
                                            <i class="fa-solid fa-trash-can"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-msg"></div>
                            </div>
                        </div>
                        <div class="form-group w-100">
                            <div class="form-wrapper">
                                <label for="">Add roles</label>
                                <div class="form-body">
                                    <select class="select-role w-100" name="" id="">
                                        <option value="">Admin</option>
                                        <option value="">Seller</option>
                                        <option value="">Member</option>
                                    </select>
                                </div>
                                <div class="form-msg"></div>
                            </div>
                        </div>

                        <div class="form-group w-50">
                            <div class="form-wrapper">
                                <label for="userName">Gender</label>
                                <div class="form-body">
                                    <span class="info-more">Male</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group w-50">
                            <div class="form-wrapper">
                                <label for="userName">Country</label>
                                <div class="form-body">
                                    <span class="info-more">Viet nam</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="body-item w-50">

                        <div class="form-group w-100">
                            <div class="form-wrapper">
                                <label for="userName">Username</label>
                                <div class="form-body">
                                    <input type="text" class="form-control" id="userName" name="UserName"
                                        rules="required" placeholder="Username" />
                                </div>
                                <div class="form-msg"></div>
                            </div>
                        </div>

                        <div class="form-group w-100">
                            <div class="form-wrapper">
                                <label for="">Phone</label>
                                <div class="form-body">
                                    <input type="text" class="form-control" name="email" rules="required"
                                        placeholder="Phone Number" />
                                </div>
                                <div class="form-msg"></div>
                            </div>
                        </div>

                        <div class="form-group w-100">
                            <div class="form-wrapper">
                                <label for="userName">FullName</label>
                                <div class="form-body">
                                    <input type="text" class="form-control" name="fullName" rules="required"
                                        placeholder="FullName" />
                                </div>
                                <div class="form-msg"></div>
                            </div>
                        </div>

                        <div class="form-group w-100">
                            <div class="form-wrapper">
                                <label for="userName">Email</label>
                                <div class="form-body">
                                    <input type="text" class="form-control" name="email" rules="required"
                                        placeholder="Email" />
                                </div>
                                <div class="form-msg"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="btn-body w-100">
                    <button type="reset" class="btn">Cancel</button>
                    <div class="btn btn-submit">Save</div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>