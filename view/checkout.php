<!-- main -->
<main class="checkout">
    <div class="wrapper">
        <div class="detail-tab">
            <a href="./" class="detail-tab-item">
                <span>Trang chủ</span>
                <i class="fa-solid fa-angle-right"></i>
            </a>
            <a href="?mod=page&act=cart" class="detail-tab-item">
                <span>Giỏ hàng</span>
                <i class="fa-solid fa-angle-right"></i>
            </a>
            <div class="detail-tab-item detail-tab-item-name">
                <span>Đặt hàng</span>
            </div>
        </div>
        <form method="POST" class="checkout-body">

            <div class="checkout-left">
                <div class="checkout-info-address">
                    <div class="input-box">
                        <div class="checkout-title">
                            <i class="fa-solid fa-user"></i> Người nhận
                        </div>
                        <div class="checkout-group">
                            <input class="checkout-input" placeholder="Aa.." name="nameReceiver">
                        </div>
                    </div>
                    <div class="input-box">
                        <div class="checkout-title">
                            <i class="fa-solid fa-city"></i> Thành phố
                        </div>
                        <div class="checkout-group">
                            <input class="checkout-input" placeholder="Aa..." name="city">
                        </div>
                    </div>
                    <div class="input-box">
                        <div class="checkout-title">
                            <i class="fa-solid fa-user"></i>Huyện
                        </div>
                        <div class="checkout-group">
                            <input class="checkout-input" placeholder="Aa..." name="province">
                        </div>
                    </div>
                    <div class="input-box">
                        <div class="checkout-title">
                            <i class="fa-solid fa-road"></i>Địa chỉ chi tiết
                        </div>
                        <div class="checkout-group">
                            <input class="checkout-input" placeholder="Aa..." name="addressDetail">
                        </div>
                    </div>
                    

                    <div class="checkout-group input-box">
                        <div class="checkout-title mt-2">
                            <i class="fa-solid fa-phone"></i> Số điện thoại
                        </div>
                        <input class="checkout-input" value="<?=Session::get("phone")   ?>" placeholder="+84-..." name="phone">
                    </div>
                    
                </div>



                <div class="input-box">
                    <div class="checkout-title mt-2">
                        <i class="fa-solid fa-file-lines"></i>Ghi chú
                    </div>
                    <div class="checkout-group">
                        <textarea class="checkout-input" placeholder="Thêm ghi chú..." rows="5" name="note"></textarea>
                    </div>
                </div>
            </div>



            <div class="checkout-right">

                <div class="checkout-title">
                    <i class="fa-solid fa-money-check-dollar"></i>Tổng cộng
                </div>
                <div class="cart-total-item">
                    <div class="cart-total-text">
                        Tạm tính
                    </div>
                    <div class="cart-total-price fm-price">
                    <?= ($getCartInfo->result['totalPrice']) ?>
                </div>
            </div>
            <input type="text" hidden value="<?= ($getCartInfo->result['totalPrice']) ?>" name="subTotal" placeholder="okoko">
                <div class="cart-total-item">
                    <div class="cart-total-text">
                        Phí vận chuyển
                        <input type="text" hidden value="30000" name="fee"  >
                    </div>
                    <div class="cart-total-ship cart-total-price">
                        30,000đ
                    </div>
                </div>

                <div class="cart-total-item cart-total-item--final">
                    <div class="cart-total-final">
                        Tổng thanh toán
                    </div>
                    <div class="cart-total-final-price price cart-total-price fm-price">
                    <?= ($getCartInfo->result['totalPrice'])+ 30000 ?>
                    
                </div>
            </div>
            <input type="text" hidden  value=" <?= ($getCartInfo->result['totalPrice'])+ 30000 ?>" name="total" placeholder="okoko">
                <div class="checkout-btn-wrapper">
                    <button type="submit" class="checkout-btn">
                        Đặt hàng
                    </button>
                </div>
            </div>
        </form>


        <div class="more-info">
            <div class="more-info-item">
                <div class="more-infor-wrapper">
                    <div class="more-info-img"><img src="./assest/images/xe 1.svg" alt=""></div>
                    <div class="more-info-text1">Free Delivery</div>
                    <div class="more-info-text2">Free shipping on all order</div>
                </div>
            </div>
            <div class="more-info-item">
                <div class="more-infor-wrapper">
                    <div class="more-info-img"><img src="./assest/images/save 1.svg" alt=""></div>
                    <div class="more-info-text1">Big Saving Shop</div>
                    <div class="more-info-text2">save Big Every Day</div>
                </div>
            </div>
            <div class="more-info-item">
                <div class="more-infor-wrapper">
                    <div class="more-info-img"><img src="./assest/images/online.svg"></div>
                    <div class="more-info-text1">Online Support 24/7</div>
                    <div class="more-info-text2">Support online 24 hours a day</div>
                </div>
            </div>
            <div class="more-info-item">
                <div class="more-infor-wrapper">
                    <div class="more-info-img"><img src="./assest/images/money.svg" alt=""></div>
                    <div class="more-info-text1">Money Back Return</div>
                    <div class="more-info-text2">Back guarantee under 7 day</div>
                </div>
            </div>
            <div class="more-info-item">
                <div class="more-infor-wrapper">
                    <div class="more-info-img"><img src="./assest/images/member.svg" alt=""></div>
                    <div class="more-info-text1">Member Discount</div>
                    <div class="more-info-text2">Onevery order over $120.000</div>
                </div>
            </div>
        </div>
    </div>
</main>