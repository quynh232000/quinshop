
        
        
              
                <!-- main -->
                <main class="shop-main">
                    <!-- content -->
                    <div class="shop-main-content">
                        <div class="shop-top">
                            <div class="shop-title">Tổng quan</div>
                            <div class="dash-top">
                                <div class="dash-top-item">
                                    <div class="dash-top-title">
                                        <div class="dash-top-icon">
                                            <i class="fa-solid fa-money-bills"></i>
                                        </div>
                                        <span>Doanh thu</span>
                                    </div>
                                    <div class="dash-top-content fm-price"> 1000000</div>
                                </div>
                                <div class="dash-top-item">
                                    <div class="dash-top-title">
                                        <div class="dash-top-icon">
                                            <i class="fa-solid fa-box-open"></i>
                                        </div>
                                        <span>Tổng đơn hàng</span>
                                    </div>
                                    <div class="dash-top-content"> 1.000</div>
                                </div>
                            </div>
                        </div>
                        <div class="dash-content">
                            <div class="dash-content-row">
                                <a href="?mod=admin&act=manageproduct" class="dash-content-item">
                                    <div class="dash-content-count"><?php
                                    if(isset($resultData)){
                                        echo $resultData->result['totalPro'];
                                    }
                                    ?></div>
                                    <div class="dash-content-title">Tổng sản phẩm</div>
                                </a>
                                <a href="?mod=admin&act=manageproduct&type=sold" class="dash-content-item">
                                    <div class="dash-content-count"><?php
                                    if(isset($resultData)){
                                        echo $resultData->result['totalSold'];
                                    }
                                    ?></div>
                                    <div class="dash-content-title">Sản phẩm đã bán</div>
                                </a>
                                <a href="?mod=admin&act=manageproduct&type=out" class="dash-content-item">
                                    <div class="dash-content-count"><?php
                                    if(isset($resultData)){
                                        echo $resultData->result['totalOut'];
                                    }
                                    ?></div>
                                    <div class="dash-content-title">Sản phẩm hết hàng</div>
                                </a>
                                <a href="?mod=admin&act=manageproduct&type=hidden" class="dash-content-item">
                                    <div class="dash-content-count"><?php
                                    if(isset($resultData)){
                                        echo $resultData->result['totalHidden'];
                                    }
                                    ?></div>
                                    <div class="dash-content-title">Sản phẩm ẩn</div>
                                </a>
                            </div>
                            <div class="dash-content-row">
                                <a href="?mod=admin&act=manageorders" class="dash-content-item">
                                    <div class="dash-content-count"><?php
                                    if(isset($resultData)){
                                        echo $resultData->result['totalOrder'];
                                    }
                                    ?></div>
                                    <div class="dash-content-title">Tổng đơn hàng</div>
                                </a>
                                <a href="?mod=admin&act=manageorders&type=new" class="dash-content-item">
                                    <div class="dash-content-count"><?php
                                    if(isset($resultData)){
                                        echo $resultData->result['totalOrderNew'];
                                    }
                                    ?></div>
                                    <div class="dash-content-title">Đơn hàng mới</div>
                                </a>
                                <a href="?mod=admin&act=manageorders&type=success" class="dash-content-item">
                                    <div class="dash-content-count"><?php
                                    if(isset($resultData)){
                                        echo $resultData->result['totalOrderSuccess'];
                                    }
                                    ?></div>
                                    <div class="dash-content-title">Đơn hàng đã giao</div>
                                </a>
                                <a href="?mod=admin&act=manageorders&type=cancel" class="dash-content-item">
                                    <div class="dash-content-count"><?php
                                    if(isset($resultData)){
                                        echo $resultData->result['totalOrderCancel'];
                                    }
                                    ?></div>
                                    <div class="dash-content-title">Đơn hàng hủy</div>
                                </a>

                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
         
