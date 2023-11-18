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
                            <div class="shop-title">Add a new product</div>
                            
                        </div>
                        <div class="shop-add">
                            <form class="c-body"
                            id="form-create-product"
                            method="POST"
                            action="">
                          <div class="c-left">
                              <!-- item -->
                              <div class="shop-form-group  w-100">
                                  <div class="form-group-wrapper">
                                      <!-- error -->
                                      <div class="form-group-body w-100">
                                          <label for="" class="form-label">
                                              Name <i class="fa-solid fa-circle-info"></i>
                                          </label>
                                          <div class="shop-form-control">
                                              <div class="form-input-body">
                                                  <input type="text"
                                                         name="name"
                                                         rules="required"
                                                         class="form-input"
                                                         placeholder="Enter name's product..." />
                                              </div>
                                          </div>
                                          <div class="form-msg"></div>
                                      </div>
              
                                      <div class="cate-body w-100">
                                          <div class="form-group-body w-100">
                                              <label for="" class="form-label">
                                                  Category <i class="fa-solid fa-circle-info"></i>
                                              </label>
                                              <div class="shop-form-control">
                                                  <div class="form-input-body">
                                                      <div class="select-cate-title" id="select-category-product">
                                                          <span>
                                                              Select category
                                                          </span>
                                                          <i class="fa-solid fa-pen"></i>
                                                      </div>
                                                      <!-- @*modal eidit category*@ -->
                                                      <div class="modal-edit-cate">
                                                          <div class="modal-cate-wrapper">
                                                              <div class="modal-cate-title">
                                                                  <span>Edit category</span>
                                                                  <div class="modal-close btn-modal-cate-close">
                                                                      <i class="fa-solid fa-xmark"></i>
                                                                  </div>
                                                              </div>
                                                              <div class="modal-cate-body">
                                                                  <div class="madla-cate-body-title">Select the correct field, <a href="#">click here to learn more.</a></div>
                                                                  <div class="modal-cate-info">
                                                                      <div class="modal-cate-group">
                                                                          <div class="modal-cate-group-wrapper">
                                                                              <!-- @*item*@
                                                                              @foreach (var item in categories)
                                                                              {
                                                                                  <div class="modal-cate-item" idCate="@item.Id" checkLast=@(item.TempChild == true ?"has":"no")>
                                                                                      <p>@item.Name</p>
                                                                                      @if (item.TempChild == true)
                                                                                      {
                                                                                          <i class="fa-solid fa-chevron-right"></i>
                                                                                      }
                                                                                  </div>
                                                                              } -->
                                                                          </div>
                                                                      </div>
              
                                                                      <div class="modal-cate-group">
                                                                      <div class="modal-cate-group-wrapper">
                                                                    
                                                                      <div class="modal-cate-item active">
                                                                          <p>Men clothes</p>
                                                                          <i class="fa-solid fa-chevron-right"></i>
                                                                      </div>
                                                                     
                                                                      <div class="modal-cate-item">
                                                                          <p>Men clothes</p>
                                                                          <i class="fa-solid fa-chevron-right"></i>
                                                                      </div>
                                                                      
                                                                      <div class="modal-cate-item">
                                                                          <p>Men clothes</p>
                                                                          <i class="fa-solid fa-chevron-right"></i>
                                                                      </div>
                                                                      
                                                                      <div class="modal-cate-item">
                                                                          <p>Men clothes</p>
                                                                          <i class="fa-solid fa-chevron-right"></i>
                                                                      </div>
                                                                      
                                                                      <div class="modal-cate-item">
                                                                                  <p>Men clothes</p>
                                                                                  <i class="fa-solid fa-chevron-right"></i>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                              <div class="modal-cate-bottom">
                                                                  <div class="modal-cate-bottom-left">
                                                                      <span>
                                                                          Selected:
                                                                      </span>
                                                                      <div class="modal-cate-selected">
                                                                          <div class="modal-cate-selected-item">
                                                                              <span>Clothes</span>
              
                                                                          </div>
                                                                          <div class="modal-cate-selected-item">
                                                                              <i class="fa-solid fa-chevron-right"></i>
                                                                              <span>Clothes</span>
              
                                                                          </div>
                                                                          <div class="modal-cate-selected-item">
                                                                              <i class="fa-solid fa-chevron-right"></i>
                                                                              <span>Clothes</span>
              
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                                  <div class="modal-cate-bottom-right">
                                                                      <button class="modal-btn-cancel">
                                                                          Cancel
                                                                      </button>
                                                                      <button disabled class="modal-btn-confirm">
                                                                          Confirm
                                                                      </button>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
              
                                                  </div>
                                              </div>
                                              <div class="form-msg"></div>
                                          </div>
              
                                          <div class="form-group-body w-30 catelog1">
                                              <!-- @*<label for="" class="form-label">
                                                      Catalog <i class="fa-solid fa-circle-info"></i>
                                                  </label>
                                                  <div class="shop-form-control">
                                                      <div class="form-input-body">
                                                          <select name="cateChildId"
                                                                  rules="required"
                                                                  id=""
                                                                  class="list-categoryChild"></select>
                                                      </div>
                                                  </div>
                                                  <div class="form-msg"></div>*@ -->
                                          </div>
                                          <div class="form-group-body w-30 catelog2">
                                              <!-- @*<label for="" class="form-label">
                                                      Catalog <i class="fa-solid fa-circle-info"></i>
                                                  </label>
                                                  <div class="shop-form-control">
                                                      <div class="form-input-body">
                                                          <select name="cateChildId"
                                                                  rules="required"
                                                                  id=""
                                                                  class="list-categoryChild"></select>
                                                      </div>
                                                  </div>
                                                  <div class="form-msg"></div>*@ -->
                                          </div>
                                      </div>
                                      <!-- @*country*@ -->
                                      <div class="form-group-body w-60">
                                          <label for="" class="form-label">
                                              Country <i class="fa-solid fa-circle-info"></i>
                                          </label>
                                          <div class="shop-form-control">
                                              <div class="form-input-body">
                                                  <select name="countryId"
                                                          rules="required"
                                                          id=""
                                                          class="list-country">
                                                          <option value="">VN</option>
                                                          <option value="">VN</option>
                                                         <!-- @foreach (var p in countries)
                                                          {
                                                              <option value="@p.Id">@p.Nicename</option>
                                                          } -->
                                                  </select>
                                              </div>
                                          </div>
                                          <div class="form-msg"></div>
                                      </div>
                                      <!-- @*unit*@ -->
                                      <div class="form-group-body w-40">
                                          <label for="" class="form-label">
                                              Unit <i class="fa-solid fa-circle-info"></i>
                                          </label>
                                          <div class="shop-form-control">
                                              <div class="form-input-body">
                                                  <input type="text" name="unit" placeholder="Unit..." />
              
                                              </div>
                                          </div>
                                          <div class="form-msg"></div>
                                      </div>
                                      <!-- @*SKU*@ -->
                                      <div class="form-group-body w-60">
                                          <label for="" class="form-label">
                                              SKU<i class="fa-solid fa-circle-info"></i>
                                          </label>
                                          <div class="shop-form-control">
                                              <div class="form-input-body sku-refesh-body">
                                                  <input type="text"
                                                         name="sku"
                                                         rules="required"
                                                         class="form-input"
                                                         placeholder="Enter sku..." />
                                                  <div class="sku-refesh"><i class="fa-solid fa-arrows-rotate"></i></div>
                                              </div>
                                          </div>
                                          <div class="form-msg"></div>
                                      </div>
                                      <!-- @*Weight*@ -->
                                      <div class="form-group-body w-40">
                                          <label for="" class="form-label">
                                              Weight (Kg)<i class="fa-solid fa-circle-info"></i>
                                          </label>
                                          <div class="shop-form-control">
                                              <div class="form-input-body">
                                                  <input type="number"
                                                         name="weight"
                                                         rules="required"
                                                         min="0"
                                                         step="0.001"
                                                         class="form-input"
                                                         placeholder="Enter product's weight..." />
              
                                              </div>
                                          </div>
                                          <div class="form-msg"></div>
                                      </div>
                                  </div>
                              </div>
                              <!-- @*more desciption*@ -->
                              <div class="detail-group-item w-100">
                                  <div class="shop-form-group  w-100">
                                      <div class="form-group-wrapper">
                                          <div class="form-group-body w-100">
                                              <div class="form-group-title">More infomation</div>
                                          </div>
                                          <div class="form-group-body w-50">
                                              <label for="" class="form-label">
                                                  Brand<i class="fa-solid fa-circle-info"></i>
                                              </label>
                                              <div class="shop-form-control">
                                                  <div class="form-input-body">
                                                      <input type="text"
                                                             name="Brand"
                                                             class="form-input"
                                                             placeholder="Aa..." />
                                                  </div>
                                              </div>
                                              <div class="form-msg"></div>
                                          </div>
                                          <div class="form-group-body w-50">
                                              <label for="" class="form-label">
                                                  Origin
                                              </label>
                                              <div class="shop-form-control">
                                                  <div class="form-input-body">
                                                      <input type="text"
                                                             name="Origin"
                                                             class="form-input"
                                                             placeholder="Origin..." />
                                                  </div>
                                              </div>
                                              <div class="form-msg"></div>
                                          </div>
                                          <div class="form-group-body w-50">
                                              <label for="" class="form-label">Manufacture Date</label>
                                              <div class="shop-form-control">
                                                  <div class="form-input-body">
                                                      <input type="date"
                                                             class="form-input"
                                                             name="ManudactureDate" />
                                                  </div>
                                              </div>
                                              <div class="form-msg"></div>
                                          </div>
              
                                      </div>
                                  </div>
                              </div>
                              <!--add atribute-->
                              <div class="detail-group-item w-100">
                                  <div class="shop-form-group  w-100">
                                      <div class="form-group-wrapper">
                                          <div class="form-group-body w-100 group-add-attribute">
                                              <div class="form-group-title">Add attribute</div>
                                              <div class="create-btn-add-attibute">
                                                  <i class="fa-solid fa-plus"></i>
                                              </div>
                                          </div>
                                          <div class="form-group-body w-100 create-pro-attr-body">
                                              <div class="attr-nav">
                                                  <div class="attr-item">
                                                      <div class="attr-no">No.</div>
                                                      <div class="attr-size">SIZE</div>
                                                      <div class="attr-color">COLOR</div>
                                                      <div class="attr-quantity">QUANTITY</div>
                                                      <div class="attr-price">PRICE</div>
                                                      <div class="attr-remove"></div>
              
                                                  </div>
                                              </div>
                                              <div class="attr-list">
                                                  <!--item-->
                                                  <!-- <div class="attr-item">
                                                          <div class="attr-no">
                                                              1
                                                          </div>
                                                          <div class="attr-size">
                                                              <input type="text" name="ProductProperties_Size" value="" placeholder="X, L, M,..." />
                                                          </div>
                                                          <div class="attr-color">
                                                              <input type="color" name="ProductProperties_Color" value="" placeholder="Red, pink,blue,..." />
                                                          </div>
                                                          <div class="attr-quantity">
                                                              <input type="number" name="ProductProperties_Quantity" value="" placeholder="0" />
                                                          </div>
                                                          <div class="attr-price">
                                                              <input type="number" name="ProductProperties_Price" value="" placeholder="$ 0" />
                                                          </div>
                                                          <div class="attr-remove"> <i class="fa-solid fa-trash-can"></i></div>
                                                      </div> -->
              
                                              </div>
                                          </div>
              
              
                                      </div>
                                  </div>
                              </div>
                              <!-- item -->
                              <div class="shop-form-group  w-100">
                                  <div class="form-group-wrapper">
                                      <div class="form-group-body w-100">
                                          <div class="form-group-title">Description</div>
                                      </div>
                                      <div class="form-group-body w-100">
                                          <div class="shop-form-control">
                                              <div class="form-input-body form-input-body-editor">
                                                  <div id="editor" style="min-height: 220px">
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="form-msg"></div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="c-right">
                              <!-- item -->
                              <div class="shop-form-group  w-100">
                                  <div class="form-group-wrapper">
                                      <div class="form-group-body w-100">
                                          <div class="form-group-title">Price</div>
                                      </div>
                                      <div class="form-group-body w-100">
                                          <label for="" class="form-label">
                                              Old price ( $ )<i class="fa-solid fa-circle-info"></i>
                                          </label>
                                          <div class="shop-form-control">
                                              <div class="form-input-body">
                                                  <input type="text"
                                                         name="OldPrice"
                                                         class="form-input"
                                                         rules="required"
                                                         placeholder="$" />
                                              </div>
                                          </div>
                                          <div class="form-msg"></div>
                                      </div>
                                      <div class="form-group-body w-100">
                                          <label for="" class="form-label">Sale price (%) </label>
                                          <div class="shop-form-control">
                                              <div class="form-input-body">
                                                  <input type="number"
                                                         name="SalePrice"
                                                         class="form-input"
                                                         value="0"
                                                         placeholder="0%" />
                                              </div>
                                          </div>
                                          <div class="form-msg"></div>
                                      </div>
                                      <div class="form-group-body w-100">
                                          <label for="" class="form-label">Discount for Unidi (%) <i class="fa-solid fa-circle-info"></i></label>
                                          <div class="shop-form-control">
                                              <div class="form-input-body">
                                                  <input type="number"
                                                         name="DiscountForWeb"
                                                         class="form-input"
                                                         rules="required"
                                                         placeholder="0%" />
                                              </div>
                                          </div>
                                          <div class="form-msg"></div>
                                      </div>
              
                                      <div class="form-group-body w-100">
                                          <label for="" class="form-label">
                                              Quantity<i class="fa-solid fa-circle-info"></i>
                                          </label>
                                          <div class="shop-form-control">
                                              <div class="form-input-body">
                                                  <input type="number"
                                                         name="counts"
                                                         class="form-input"
                                                         rules="required"
                                                         placeholder="0" />
                                              </div>
                                          </div>
                                          <div class="form-msg"></div>
                                      </div>
                                      <div class="form-group-body w-100">
                                          <label for="" class="form-label">
                                              Fee ship<i class="fa-solid fa-circle-info"></i>
                                          </label>
                                          <div class="shop-form-control">
                                              <div class="form-input-body">
                                                  <input type="number"
                                                         name="FeeShipSpecial"
                                                         class="form-input"
                                                         rules="required"
                                                         placeholder="0" />
                                              </div>
                                          </div>
                                          <div class="form-msg"></div>
                                      </div>
              
                                  </div>
                              </div>
                              <!-- @* <input name="imageCover" type="file"/>*@ -->
                              <!-- item -->
                              <div class="shop-form-group  w-100">
                                  <div class="form-group-wrapper">
                                      <div class="form-group-body w-100">
                                          <div class="form-group-title">
                                              <div>Image cover</div>
                                              <label for="upload-img-avatar" class="btn-upload-img">Upload images</label>
                                          </div>
                                      </div>
                                      <div class="form-group-body w-100 ">
                                          <input type="file"
                                                 id="upload-img-avatar"
                                                 class="upload-img hidden"
                                                 name="Image"
                                                 accept="image/*"
                                                 hidden />
                                          <label class="form-list-img label-img label-image-cover" for="upload-img-avatar">
                                              <div class="list-img w-100">
                                                  <i class="fa-solid fa-images"></i>
                                              </div>
                                              <div class="list-title">Drop your images here!</div>
                                          </label>
                                          <!-- @*show image*@ -->
                                          <div class="product-imgs">
                                              <div class="create-show-image-body">
                                                  <img class="create-show-image" />
                                              </div>
                                          </div>
                                          <div class="form-msg"></div>
                                      </div>
                                  </div>
                              </div>
                              <div class="shop-form-group  w-100">
                                  <div class="form-group-wrapper">
                                      <div class="form-group-body w-100">
                                          <div class="form-group-title">
                                              <div>Images preview <span>(<span class="total-img">0</span>/10)</span></div>
                                              <label for="upload-img" class="btn-upload-img">Upload images</label>
                                          </div>
                                      </div>
                                      <div class="form-group-body w-100 ">
                                          <input type="file"
                                                 id="upload-img"
                                                 class="upload-img"
                                                 name="ImagePreview"
                                                 accept="image/*"
                                                 multiple />
                                          <label class="form-list-img label-list-img" for="upload-img">
                                              <div class="list-img w-100">
                                                  <i class="fa-solid fa-images"></i>
                                              </div>
                                              <div class="list-title">Drop your images here!</div>
                                          </label>
                                          <div class="product-imgs list-img-preview">
              
                                          </div>
                                          <div class="form-msg"></div>
                                      </div>
                                  </div>
                              </div>
                              <div class="c-bottom w-100 create-new-product-btn">
                                <button type="reset" class="c-btn">Cancel</button>
                                <button type="submit" class="c-btn c-btn-save">Save</button>
                            </div>
                          </div>
                          
                      </form>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <?php
    include "../inc/footerAdmin.php";
?>   