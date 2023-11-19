<?php
 function path(){ 
    $url= $_SERVER['HTTP_HOST'];   
    $url.= $_SERVER['REQUEST_URI']; 
    $url = str_contains($url,"localhost") ? str_replace("localhost/web-demo_php","",$url) : $url; 
    
    $url= explode("/",$url);
    $value ="";
    if(count($url)> 2){
       for($i= 0;$i<count($url)-2;$i++){
           $value .= "../";
       }
    }else{
        $value ="./";
    }
   return $value;
}
include path()."inc/headerAdmin.php";
include path()."controller/category.php";

$cate = new Category();

if (isset($_POST['create-cate-btn']) && $_POST['create-cate-btn']) {
    $createCate = $cate->createNewCate($_POST['name'], $_FILES['image']);
}
if ( isset($_POST['delete-cate']) && $_POST['delete-cate']) {
    $createCate = $cate->deleteCate($_POST['idcate']);
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

                                <!-- <button class="form-submit">Tạo</button> -->
                                <input class="form-submit" type="submit" name="create-cate-btn" vallue="Tạo">


                            </form>

                        </div>
                    </div>

                    <div class="cate-list-item">
                        <div class="cate-nav">
                            <div class="cate-item1">
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

                                    echo '<div class="cate-item1">
                                            <div class="cate-stt">'.$value["id"].'</div>
                                            <div class="cate-iamge">
                                                <img src="'.$value["imageCate"].'"
                                                    alt="">
                                            </div>
                                           <div class="cate-right">
                                            <div class="cate-name">'.$value["nameCate"].'</div>
                                            <form method="post" class="cate-action" >
                                                <div class="cate-action-item" title="Sửa"><i class="fa-regular fa-pen-to-square"></i></div>
                                                <label for="btn-cate-delete" class="cate-action-item" title="Xóa"><i class="fa-solid fa-trash-can"></i></label>
                                                <input hidden id="btn-cate-delete" name="delete-cate" type="submit" onclick="confirm("Bạn có chắc sẽ xóa danh mục này chứ!");">
                                                <input hidden  name="idcate" value="'.$value["id"].'" type="text">
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