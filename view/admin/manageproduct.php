
<main class="shop-main">
    <!-- content -->
    <div class="shop-main-content">
        <div class="shop-top">
            <div class="shop-title">Dashboard</div>
            <div class="shop-pro-filter">
                <div class="shop-pro-filter-item">
                    <div class="shop-pro-filter-input">
                        <select name="" id="" class="shop-pro-filter-search">
                            <option value="" selected>Name Product</option>
                            <option value="">SKU Product</option>
                        </select>
                        <input type="text" placeholder="Search...">
                    </div>
                </div>
                <div class="shop-pro-filter-item">
                    <label for="">Category</label>
                    <div class="shop-pro-filter-input">
                        <select name="" id="">
                            <option value="" selected>Men's clothes</option>
                            <option value="">Shoes</option>
                            <option value="">Phone</option>
                        </select>
                    </div>
                </div>
                <div class="shop-pro-filter-item">
                    <label for="">Kho hàng</label>
                    <div class="shop-pro-filter-input">
                        <input type="text" placeholder="Min...">
                    </div>
                    -
                    <div class="shop-pro-filter-input">
                        <input type="text" placeholder="Max...">
                    </div>
                </div>
                <div class="shop-pro-filter-item">
                    <label for="">Doanh số</label>
                    <div class="shop-pro-filter-input">
                        <input type="text" placeholder="Min...">
                    </div>
                    -
                    <div class="shop-pro-filter-input">
                        <input type="text" placeholder="Max...">
                    </div>
                </div>
            </div>
        </div>
        <div class="shop-pro-content">
            <div class="shop-pro-show">
                <div class="show-pro-show-item">
                    All:
                    <span>190</span>
                </div>
                <div class="show-pro-show-item">
                    Active:
                    <span>190</span>
                </div>
                <div class="show-pro-show-item">
                    Out off:
                    <span>0</span>
                </div>
                <div class="show-pro-show-item">
                    Waiting:
                    <span>0</span>
                </div>
                <div class="show-pro-show-item">
                    Span:
                    <span>0</span>
                </div>
                <div class="show-pro-show-item">
                    Hidden:
                    <span>0</span>
                </div>
            </div>
            <div class="shop-pro-add">
                <div class="shop-pro-add-title">
                    100 Products
                </div>
                <a href="?mod=admin&act=addproduct" class="show-pro-add-btn">
                    + Add new product
                </a>
            </div>
            <div class="shop-pro-body">
                <div class="shop-pro-body-wrapper">
                    <div class="shop-pro-nav">
                        <div class="shop-pro-item">
                            <div class="shop-pro-info">
                                <input type="checkbox">
                                <div class="shop-pro-info-wrapper">
                                    <div class="shop-pro-nav-title">Name</div>
                                </div>
                            </div>
                            <div class="shop-pro-sku">
                                <div class="shop-pro-nav-title">SKU</div>
                            </div>
                            <div class="shop-pro-type">
                                <div class="shop-pro-nav-title">Type</div>
                            </div>
                            <div class="shop-pro-price">
                                <div class="shop-pro-nav-title">Price</div>
                            </div>
                            <div class="shop-pro-quantity">
                                <div class="shop-pro-nav-title">Quantity</div>
                            </div>
                            <div class="shop-pro-balance">
                                <div class="shop-pro-nav-title">Balance</div>
                            </div>
                            <div class="shop-pro-status">
                                <div class="shop-pro-nav-title">Status</div>
                            </div>
                            <div class="shop-pro-action">
                                <div class="shop-pro-nav-title">Action</div>
                            </div>
                        </div>
                    </div>
                    <div class="shop-pro-list">
                        <?php if (isset($allProduct) && is_array($allProduct) > 0) {

                            foreach ($allProduct as $key => $value) { ?>
                                <!-- item -->
                                <div class="shop-pro-item">
                                    <div class="shop-pro-info">
                                        <input type="checkbox">
                                        <div class="shop-pro-info-wrapper">
                                            <div class="shop-pro-info-img">
                                                <img src="assest/upload/<?= $value['image'] ?>" alt="">
                                            </div>
                                            <div class="shop-pro-info-right">
                                                <div class="shop-pro-info-name">
                                                    <?= $value['namePro'] ?>
                                                </div>
                                                <div class="shop-pro-info-sku">
                                                    SKU: <span>
                                                        <?= $value['id'] ?>
                                                    </span>
                                                </div>
                                                <div class="shop-pro-info-action">
                                                    <a href="." class="shop-pro-info-view" title="View detail">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </a>
                                                    <div class="shop-pro-info-heart">
                                                        <i class="fa-regular fa-heart"></i>
                                                        <span>8</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="shop-pro-sku">
                                        <?= $value['id'] ?>
                                    </div>
                                    <div class="shop-pro-type">
                                        <?= $value['nameCategory'] ?>
                                    </div>
                                    <div class="shop-pro-price fm-price">
                                        <?= $value['price'] ?>
                                    </div>
                                    <div class="shop-pro-quantity">
                                        <?= $value['quantity'] ?>
                                    </div>
                                    <div class="shop-pro-balance">
                                        <?= $value['price'] * $value['sold'] ?>
                                    </div>
                                    <div class="shop-pro-status" title="Waiting">
                                        <i class="fa-regular fa-clock"></i>
                                        <!-- <i class="fa-regular fa-circle-check"></i> -->
                                        <!-- <i class="fa-regular fa-circle-xmark"></i> -->
                                    </div>
                                    <div class="shop-pro-action">
                                        <a href="?mod=admin&act=addproduct&type=edit&idPro=<?= $value['id'] ?>"
                                            class="shop-pro-edit" title="Edit">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        <a href="?mod=admin&act=manageproduct&type=delete&idPro=<?= $value['id'] ?>" 
                                            class="shop-pro-delete delete-product" title="Delete">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </a>
                                    </div>
                                </div>
                            <?php }
                        }else{
                            echo '<div class="no-data">No product found!</div>';
                        }
                        ?>

                       

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</div>
</div>
<script>
    $(function () {
        $("#spanLink").click(function () {
            console.log("okok")
            $.ajax('?mod=admin&act=manageproduct&do=swap');
        });
    });
</script>