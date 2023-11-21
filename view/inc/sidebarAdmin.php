

<div class="shop-sidebar">
                    <div class="shop-sidebar-inner">
                        <div class="shop-sidebar-menu">
                            <!--shop-sidebar item -->
                            <div class="shop-sidebar-item  <?php if(
                               ($act !="manageproduct")&&
                               ($act !="manageorders")&&
                               ($act !="addproduct")&&
                               ($act !="managecategory")&&
                               ($act !="delivery")
                                ) {echo "active";}?>">
                                <a href="?mod=admin&act=dashboard" class="shop-sidebar-link">
                                    <div class="shop-sidebar-icon">
                                        <i class="fa-solid fa-house"></i>
                                    </div>
                                    <span class="shop-sidebar-title">OverView</span>
                                </a>
                            </div>
                            <!--shop-sidebar item -->
                            <div class="shop-sidebar-item <?php if(($act=="manageproduct") ||($act=="addproduct")) {echo "active";}?>">
                                <a href="?mod=admin&act=manageproduct" class="shop-sidebar-link">
                                    <div class="shop-sidebar-icon">
                                        <i class="fa-solid fa-box"></i>
                                    </div>
                                    <span class="shop-sidebar-title">Products</span>
                                   
                                </a>
                                
                            </div>
                            <div class="shop-sidebar-item <?php if(($act=="managecategory")) {echo "active";}?>">
                                <a href="?mod=admin&act=managecategory" class="shop-sidebar-link">
                                    <div class="shop-sidebar-icon">
                                        <i class="fa-solid fa-box"></i>
                                    </div>
                                    <span class="shop-sidebar-title">Categories</span>
                                   
                                </a>
                                
                            </div>
                            <!--shop-sidebar item -->
                            <div class="shop-sidebar-item <?php if(($act=="manageorders")) {echo "active";}?>">
                                <a href="?mod=admin&act=manageorders" class="shop-sidebar-link">
                                    <div class="shop-sidebar-icon">
                                        <i class="fa-solid fa-file-invoice"></i>
                                    </div>
                                    <span class="shop-sidebar-title">Orders</span>
                                </a>
                            </div>
                            <!--shop-sidebar item -->
                            <!-- <div class="shop-sidebar-item <?php if(($act=="delivery")) {echo "active";}?>">
                                <a href="?mod=admin&act=delivery" class="shop-sidebar-link">
                                    <div class="shop-sidebar-icon">
                                        <i class="fa-solid fa-truck-fast"></i>
                                    </div>
                                    <span class="shop-sidebar-title">Delivery</span>
                                </a>
                            </div> -->
    
                           
                           
                            
                        </div>
                    </div>
                </div>