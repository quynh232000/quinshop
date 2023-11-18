<?php
include "../inc/headerAdmin.php";
include "../controller/category.php";

$cate = new Category();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $createCate = $cate->createNewCate($_POST['name'], $_FILES['image']);

}
$allCategory = $cate->getAllCate();

?>
<div class="shop shop-no-bg">
    <div class="wrapper">
        <?php
        include "../inc/sidebarAdmin.php";
        ?>

        <!-- main -->
        <main class="shop-main">
            <!-- content -->
            <div class="shop-main-content">
                <div class="shop-top">
                    <div class="shop-title">Manage category</div>
                    <div class="shop-pro-filter">
                        <div class="category">
                            <form method="post" class="cate-add" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="name" class="form-label">Tên danh mục</label>
                                    <input type="text" name="name" rules="required" class="form-control"
                                        placeholder="Aa..." />
                                    <span class="form-message"></span>
                                </div>
                                <div class="form-group">
                                    <label for="fullname" class="form-label">Ảnh đại diện</label>
                                    <input type="file" name="image" rules="required" class="form-control" />
                                    <span class="form-message"></span>
                                </div>

                                <div class="cate-mes" style="color:blue">
                                    <?php
                                    if (isset($createCate)) {
                                        echo $createCate;
                                    }
                                    ?>
                                </div>

                                <button class="form-submit">Tạo</button>


                            </form>

                        </div>
                    </div>

                    <div class="cate-list-item">
                        <div class="cate-nav">
                            <div class="cate-item">
                                <div class="cate-stt">
                                    <div class="cate-label">STT</div>
                                </div>
                                <div class="cate-iamge">
                                    <div class="cate-label">Ảnh</div>
                                </div>
                                <div class="cate-right">
                                    <div class="cate-name">
                                        <div class="cate-label">Tên</div>
                                    </div>
                                    <div class="cate-action">
                                        <div class="cate-label">Hành động</div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="cate-list">

                            <?php
                            if (isset($allCategory)) {
                                foreach ($allCategory as $key => $value) {

                                    echo '<div class="cate-item">
                                            <div class="cate-stt">'.$value["id"].'</div>
                                            <div class="cate-iamge">
                                                <img src="'.$value["imageCate"].'"
                                                    alt="">
                                            </div>
                                           <div class="cate-right">
                                            <div class="cate-name">'.$value["nameCate"].'</div>
                                            <form class="cate-action">
                                                <div class="cate-action-item" title="Sửa"><i class="fa-regular fa-pen-to-square"></i></div>
                                                <label for="btn-cate-delete" class="cate-action-item" title="Xóa"><i class="fa-solid fa-trash-can"></i></label>
                                                <input hidden id="btn-cate-delete" name="delete-cate" type="submit">
                                                <input hidden  name="idcate" type="text">
                                            </form>
                                           </div>
                                        </div>';
                                }
                            }
                            ?>
                            
                        </div>


                    </div>
                </div>

            </div>
        </main>
    </div>
</div>

<?php
include "../inc/footerAdmin.php";
?>