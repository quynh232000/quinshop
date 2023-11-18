<?php  
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];    
      
     
  ?>  


<div class="shop-sidebar">
                    <div class="shop-sidebar-inner">
                        <div class="shop-sidebar-menu">
                            <!--shop-sidebar item -->
                            <div class="shop-sidebar-item  <?php if(
                                !str_contains($url,"admin/manageproduct.php")&&
                                !str_contains($url,"admin/manageorders.php")&&
                                !str_contains($url,"admin/addproduct.php")&&
                                !str_contains($url,"admin/managecategory.php")&&
                                !str_contains($url,"admin/delivery.php")
                                ) {echo "active";}?>">
                                <a href="./" class="shop-sidebar-link">
                                    <div class="shop-sidebar-icon">
                                        <i class="fa-solid fa-house"></i>
                                    </div>
                                    <span class="shop-sidebar-title">OverView</span>
                                </a>
                            </div>
                            <!--shop-sidebar item -->
                            <div class="shop-sidebar-item <?php if(str_contains($url,"admin/manageproduct.php")) {echo "active";}?>">
                                <a href="./manageproduct.php" class="shop-sidebar-link">
                                    <div class="shop-sidebar-icon">
                                        <i class="fa-solid fa-box"></i>
                                    </div>
                                    <span class="shop-sidebar-title">Products</span>
                                   
                                </a>
                                
                            </div>
                            <div class="shop-sidebar-item <?php if(str_contains($url,"admin/managecategory.php")) {echo "active";}?>">
                                <a href="./managecategory.php" class="shop-sidebar-link">
                                    <div class="shop-sidebar-icon">
                                        <i class="fa-solid fa-box"></i>
                                    </div>
                                    <span class="shop-sidebar-title">Categories</span>
                                   
                                </a>
                                
                            </div>
                            <!--shop-sidebar item -->
                            <div class="shop-sidebar-item <?php if(str_contains($url,"admin/manageorders.php")) {echo "active";}?>">
                                <a href="./manageorders.php" class="shop-sidebar-link">
                                    <div class="shop-sidebar-icon">
                                        <i class="fa-solid fa-file-invoice"></i>
                                    </div>
                                    <span class="shop-sidebar-title">Orders</span>
                                </a>
                            </div>
                            <!--shop-sidebar item -->
                            <div class="shop-sidebar-item <?php if(str_contains($url,"admin/delivery.php")) {echo "active";}?>">
                                <a href="./delivery.php" class="shop-sidebar-link">
                                    <div class="shop-sidebar-icon">
                                        <i class="fa-solid fa-truck-fast"></i>
                                    </div>
                                    <span class="shop-sidebar-title">Delivery</span>
                                </a>
                            </div>
    
                           
                           
                            
                        </div>
                    </div>
                </div>