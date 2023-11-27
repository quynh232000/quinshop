<!-- main -->
<main class="shop-main">
    <!-- content -->
    <div class="shop-main-content">
        <div class="shop-top">
            <div class="shop-title">Quản lý đơn hàng</div>
        </div>
        <div class="shop-orders">
            <div class="s-orders-top">
                <div class="s-orders-filter">
                    <div class="s-orders-filter-left">
                        <div class="s-orders-filter-select">
                            <input type="text" placeholder="Tìm kiếm...">
                        </div>
                        <div class="s-orders-filter-select">
                            <select name="" id="">
                                <option value="">Mã đơn hàng</option>
                                <option value="">SKU</option>
                            </select>
                        </div>
                        <div class="s-orders-filter-select">
                            <select name="" id="">
                                <option value="">Mã đơn hàng</option>
                                <option value="">SKU</option>
                            </select>
                        </div>
                    </div>
                    <div class="s-orders-filter-right">
                        <div class="s-orders-filter-btn order-btn-search">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <span>Tìm kiếm</span>
                        </div>
                        <div class="s-orders-filter-btn order-btn-reset">
                            <span>Đặt lại</span>
                        </div>
                    </div>
                </div>
                <div class="s-orders-option">
                    <div class="s-orders-option-item">
                        <span>Xác nhận đơn hàng</span>
                        <i class="fa-solid fa-angle-down"></i>
                    </div>
                    <div class="s-orders-option-item">
                        <span>Xác nhận đã giao</span>
                        <i class="fa-solid fa-angle-down"></i>
                    </div>
                    <div class="s-orders-option-item">
                        <span>Hủy đơn hàng</span>
                        <i class="fa-solid fa-angle-down"></i>
                    </div>
                    <div class="s-orders-option-item">
                        <span>Xóa đơn hàng</span>
                        <i class="fa-solid fa-angle-down"></i>
                    </div>
                </div>
            </div>
            <div class="s-orders-body">
                <div class="s-ordes-nav">
                    <div class="s-order-item">
                        <div class="s-order-left">
                            <div class="s-orders-input">
                                <input type="checkbox">
                                <div class="s-orders-view">
                                    <div class="s-orders-title">Chi tiết</div>

                                </div>
                            </div>
                            <div class="s-orders-time">
                                <div class="s-orders-title">Ngày</div>
                            </div>
                            
                            <div class="s-orders-code">
                                <div class="s-orders-title">Code</div>
                            </div>

                        </div>
                        <div class="s-order-right">
                            <div class="s-orders-user">
                                <div class="s-orders-title">Tên</div>
                            </div>
                            <div class="s-orders-phone">
                                <div class="s-orders-title">Số ĐT</div>
                            </div>
                            <div class="s-orders-payment">
                                <div class="s-orders-title">Thanh toán</div>
                            </div>
                            <div class="s-orders-status">
                                <div class="s-orders-title">Trạng thái</div>
                            </div>
                          
                            <div class="s-orders-total-price">
                                <div class="s-orders-title">Tổng</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="s-orders-list">
                    <?php
                    if (isset($resultOrder)) {
                        $status =['new'=>["s1"=>"Đang giao hàng",'s2'=>'Chưa thanh toán'],'success'=>['s1'=>"Đã giao hàng",'s2'=>'Đã thanh toán'],'fail'=>['s1'=>"Đã hủy",'s2'=>"Đã hủy"]];
                        foreach ($resultOrder->result as $key => $value) { ?>
                            <div class="s-order-item">
                                <div class="s-order-left">
                                    <div class="s-orders-input">
                                        <input type="checkbox">
                                        <div class="s-orders-view">
                                            <a href="?mod=admin&act=detailorder&id=<?=$value['id'] ?>" class="s-orders-view-wrapper">
                                                <i class="fa-solid fa-eye"></i>
                                                <span>View</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="s-orders-time"><?=explode(" ",$value['createdAt'])[0] ?></div>
                                    
                                    <div class="s-orders-code">#000<?=$value['id'] ?></div>

                                </div>
                                <div class="s-order-right">
                                    <div class="s-orders-user"><?=$value['nameReceiver'] ?></div>
                                    <div class="s-orders-phone"><?=$value['phone'] ?></div>
                                    <div class="s-orders-payment <?=$value['status'] ?>"><?=$status[$value['status']]['s2'] ?></div>
                                    <div class="s-orders-status new">
                                        New
                                    </div>
                                    
                                    <div class="s-orders-total-price fm-price"><?=$value['total'] ?></div>
                                </div>
                            </div>
                        <?php }
                    }
                    ?>
                   
                 
                </div>
            </div>
        </div>
    </div>
</main>
</div>
</div>