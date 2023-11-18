<?php
    include "../inc/headerAdmin.php";
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
                                <a href="./addproduct.php" class="show-pro-add-btn">
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
                                             <div class="shop-pro-status" >
                                                <div class="shop-pro-nav-title">Status</div>
                                             </div>
                                             <div class="shop-pro-action">
                                                <div class="shop-pro-nav-title">Action</div>
                                             </div>
                                        </div>
                                     </div>
                                     <div class="shop-pro-list" >
                                        <!-- item -->
                                        <div class="shop-pro-item">
                                            <div class="shop-pro-info">
                                               <input type="checkbox">
                                               <div class="shop-pro-info-wrapper">
                                                   <div class="shop-pro-info-img">
                                                       <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRp08h_m5BRXykWuHH9v4OyHNCLPYTxU2tUp4sRCNPoTk_kald3lOABncQt0ExZVS3VLiI&usqp=CAU" alt="">
                                                   </div>
                                                   <div class="shop-pro-info-right">
                                                       <div class="shop-pro-info-name">Iphone 15 promax</div>
                                                       <div class="shop-pro-info-sku">
                                                           SKU: <span>ASDADASDD</span>
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
                                            <div class="shop-pro-sku">ASSDAS</div>
                                            <div class="shop-pro-type">phone</div>
                                            <div class="shop-pro-price">$500</div>
                                            <div class="shop-pro-quantity">150</div>
                                            <div class="shop-pro-balance">$100,000</div>
                                            <div class="shop-pro-status" title="Waiting">
                                               <i class="fa-regular fa-clock"></i>
                                               <!-- <i class="fa-regular fa-circle-check"></i> -->
                                               <!-- <i class="fa-regular fa-circle-xmark"></i> -->
                                            </div>
                                            <div class="shop-pro-action">
                                               <a href=".#" class="shop-pro-edit" title="Edit">
                                                   <i class="fa-regular fa-pen-to-square"></i>
                                               </a>
                                               <a href=".#" class="shop-pro-delete" title="Delete">
                                                   <i class="fa-regular fa-trash-can"></i>
                                               </a>
                                            </div>
                                       </div>
                                       <!-- item -->
                                       <div class="shop-pro-item">
                                        <div class="shop-pro-info">
                                           <input type="checkbox">
                                           <div class="shop-pro-info-wrapper">
                                               <div class="shop-pro-info-img">
                                                   <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRp08h_m5BRXykWuHH9v4OyHNCLPYTxU2tUp4sRCNPoTk_kald3lOABncQt0ExZVS3VLiI&usqp=CAU" alt="">
                                               </div>
                                               <div class="shop-pro-info-right">
                                                   <div class="shop-pro-info-name">Iphone 15 promax Iphone 15 promax Iphone 15 promax Iphone 15 promax</div>
                                                   <div class="shop-pro-info-sku">
                                                       SKU: <span>ASDADASDD</span>
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
                                        <div class="shop-pro-sku">ASSDAS</div>
                                        <div class="shop-pro-type">phone</div>
                                        <div class="shop-pro-price">$500</div>
                                        <div class="shop-pro-quantity">150</div>
                                        <div class="shop-pro-balance">$100,000</div>
                                        <div class="shop-pro-status" title="Waiting">
                                           <i class="fa-regular fa-clock"></i>
                                           <!-- <i class="fa-regular fa-circle-check"></i> -->
                                           <!-- <i class="fa-regular fa-circle-xmark"></i> -->
                                        </div>
                                        <div class="shop-pro-action">
                                           <a href=".#" class="shop-pro-edit">
                                               <i class="fa-regular fa-pen-to-square"></i>
                                           </a>
                                           <a href=".#" class="shop-pro-delete">
                                               <i class="fa-regular fa-trash-can"></i>
                                           </a>
                                        </div>
                                   </div>
                                   <!-- item -->
                                   <div class="shop-pro-item">
                                    <div class="shop-pro-info">
                                       <input type="checkbox">
                                       <div class="shop-pro-info-wrapper">
                                           <div class="shop-pro-info-img">
                                               <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRp08h_m5BRXykWuHH9v4OyHNCLPYTxU2tUp4sRCNPoTk_kald3lOABncQt0ExZVS3VLiI&usqp=CAU" alt="">
                                           </div>
                                           <div class="shop-pro-info-right">
                                               <div class="shop-pro-info-name">Iphone 15 promax</div>
                                               <div class="shop-pro-info-sku">
                                                   SKU: <span>ASDADASDD</span>
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
                                    <div class="shop-pro-sku">ASSDAS</div>
                                    <div class="shop-pro-type">phone</div>
                                    <div class="shop-pro-price">$500</div>
                                    <div class="shop-pro-quantity">150</div>
                                    <div class="shop-pro-balance">$100,000</div>
                                    <div class="shop-pro-status" title="Waiting">
                                       <i class="fa-regular fa-clock"></i>
                                       <!-- <i class="fa-regular fa-circle-check"></i> -->
                                       <!-- <i class="fa-regular fa-circle-xmark"></i> -->
                                    </div>
                                    <div class="shop-pro-action">
                                       <a href=".#" class="shop-pro-edit">
                                           <i class="fa-regular fa-pen-to-square"></i>
                                       </a>
                                       <a href=".#" class="shop-pro-delete">
                                           <i class="fa-regular fa-trash-can"></i>
                                       </a>
                                    </div>
                               </div>
                               <!-- item -->
                               <div class="shop-pro-item">
                                <div class="shop-pro-info">
                                   <input type="checkbox">
                                   <div class="shop-pro-info-wrapper">
                                       <div class="shop-pro-info-img">
                                           <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRp08h_m5BRXykWuHH9v4OyHNCLPYTxU2tUp4sRCNPoTk_kald3lOABncQt0ExZVS3VLiI&usqp=CAU" alt="">
                                       </div>
                                       <div class="shop-pro-info-right">
                                           <div class="shop-pro-info-name">Iphone 15 promax</div>
                                           <div class="shop-pro-info-sku">
                                               SKU: <span>ASDADASDD</span>
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
                                <div class="shop-pro-sku">ASSDAS</div>
                                <div class="shop-pro-type">phone</div>
                                <div class="shop-pro-price">$500</div>
                                <div class="shop-pro-quantity">150</div>
                                <div class="shop-pro-balance">$100,000</div>
                                <div class="shop-pro-status" title="Waiting">
                                   <i class="fa-regular fa-clock"></i>
                                   <!-- <i class="fa-regular fa-circle-check"></i> -->
                                   <!-- <i class="fa-regular fa-circle-xmark"></i> -->
                                </div>
                                <div class="shop-pro-action">
                                   <a href=".#" class="shop-pro-edit">
                                       <i class="fa-regular fa-pen-to-square"></i>
                                   </a>
                                   <a href=".#" class="shop-pro-delete">
                                       <i class="fa-regular fa-trash-can"></i>
                                   </a>
                                </div>
                           </div>
                           <!-- item -->
                           <div class="shop-pro-item">
                            <div class="shop-pro-info">
                               <input type="checkbox">
                               <div class="shop-pro-info-wrapper">
                                   <div class="shop-pro-info-img">
                                       <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRp08h_m5BRXykWuHH9v4OyHNCLPYTxU2tUp4sRCNPoTk_kald3lOABncQt0ExZVS3VLiI&usqp=CAU" alt="">
                                   </div>
                                   <div class="shop-pro-info-right">
                                       <div class="shop-pro-info-name">Iphone 15 promax</div>
                                       <div class="shop-pro-info-sku">
                                           SKU: <span>ASDADASDD</span>
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
                            <div class="shop-pro-sku">ASSDAS</div>
                            <div class="shop-pro-type">phone</div>
                            <div class="shop-pro-price">$500</div>
                            <div class="shop-pro-quantity">150</div>
                            <div class="shop-pro-balance">$100,000</div>
                            <div class="shop-pro-status" title="Waiting">
                               <i class="fa-regular fa-clock"></i>
                               <!-- <i class="fa-regular fa-circle-check"></i> -->
                               <!-- <i class="fa-regular fa-circle-xmark"></i> -->
                            </div>
                            <div class="shop-pro-action">
                               <a href=".#" class="shop-pro-edit">
                                   <i class="fa-regular fa-pen-to-square"></i>
                               </a>
                               <a href=".#" class="shop-pro-delete">
                                   <i class="fa-regular fa-trash-can"></i>
                               </a>
                            </div>
                       </div>
                       <!-- item -->
                       <div class="shop-pro-item">
                        <div class="shop-pro-info">
                           <input type="checkbox">
                           <div class="shop-pro-info-wrapper">
                               <div class="shop-pro-info-img">
                                   <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRp08h_m5BRXykWuHH9v4OyHNCLPYTxU2tUp4sRCNPoTk_kald3lOABncQt0ExZVS3VLiI&usqp=CAU" alt="">
                               </div>
                               <div class="shop-pro-info-right">
                                   <div class="shop-pro-info-name">Iphone 15 promax</div>
                                   <div class="shop-pro-info-sku">
                                       SKU: <span>ASDADASDD</span>
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
                        <div class="shop-pro-sku">ASSDAS</div>
                        <div class="shop-pro-type">phone</div>
                        <div class="shop-pro-price">$500</div>
                        <div class="shop-pro-quantity">150</div>
                        <div class="shop-pro-balance">$100,000</div>
                        <div class="shop-pro-status" title="Waiting">
                           <i class="fa-regular fa-clock"></i>
                           <!-- <i class="fa-regular fa-circle-check"></i> -->
                           <!-- <i class="fa-regular fa-circle-xmark"></i> -->
                        </div>
                        <div class="shop-pro-action">
                           <a href=".#" class="shop-pro-edit">
                               <i class="fa-regular fa-pen-to-square"></i>
                           </a>
                           <a href=".#" class="shop-pro-delete">
                               <i class="fa-regular fa-trash-can"></i>
                           </a>
                        </div>
                   </div>
                                     </div>
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