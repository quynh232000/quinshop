
       
                <!-- main -->
                <main class="shop-main">
                    <!-- content -->
                    <div class="shop-main-content">
                        <div class="shop-top">
                            <div class="shop-title">Tạo sản phẩm mới</div>
                            
                        </div>
                        <div class="shop-add">
                            <form class="c-body"
                            id="form-create-product"
                            method="POST"
                            enctype="multipart/form-data"
                            action="?mod=admin&act=addproduct">
                          <div class="c-left">
                              <div class="detail-group-item w-100">
                                  <div class="shop-form-group  w-100">
                                      <div class="form-group-wrapper">
                                         
                                          <div class="form-group-body w-100">
                                          <label for="" class="form-label">
                                              Tên <i class="fa-solid fa-circle-info"></i>
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
              
                                      <div class="cate-body w-50">
                                          <div class="form-group-body w-100">
                                              <label for="" class="form-label">
                                                  Đanh mục <i class="fa-solid fa-circle-info"></i>
                                              </label>
                                              <div class="shop-form-control">
                                                      <div class="form-input-body">
                                                          <select name="categoryId"
                                                                  rules="required"
                                                                  id=""
                                                                  class="list-categoryChild">
                                                                <option value="">--Chọn danh mục--</option>   
                                                                <?php foreach ($allCategory as $key => $value) { ?>
                                                                        <option value="<?=$value['id'] ?>"><?=$value['nameCate'] ?></option>
                                                                 <?php   }
                                                                ?> 
                                                            </select>
                                                      </div>
                                                  </div>
                                              <div class="form-msg"></div>
                                          </div>
                                          
                                      </div>
                                      <div class="form-group-body w-50">
                                          <label for="" class="form-label">
                                              Đơn vị <i class="fa-solid fa-circle-info"></i>
                                          </label>
                                          <div class="shop-form-control">
                                              <div class="form-input-body">
                                                  <input type="text" name="unit" placeholder="Cái, cặp, hộp,..." />
              
                                              </div>
                                          </div>
                                          <div class="form-msg"></div>
                                      </div>
                                          <div class="form-group-body w-50">
                                              <label for="" class="form-label">
                                                  Thương hiệu<i class="fa-solid fa-circle-info"></i>
                                              </label>
                                              <div class="shop-form-control">
                                                  <div class="form-input-body">
                                                      <input type="text"
                                                             name="brand"
                                                             class="form-input"
                                                             placeholder="Iphone, Samsung,..." />
                                                  </div>
                                              </div>
                                              <div class="form-msg"></div>
                                          </div>
                                          <div class="form-group-body w-50">
                                              <label for="" class="form-label">
                                                  Xuất sứ
                                              </label>
                                              <div class="shop-form-control">
                                                  <div class="form-input-body">
                                                      <input type="text"
                                                             name="origin"
                                                             class="form-input"
                                                             placeholder="Trung Quốc, Nhật Bản..." />
                                                  </div>
                                              </div>
                                              <div class="form-msg"></div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="shop-form-group  w-100">
                                  <div class="form-group-wrapper">
                                      
                                      <div class="form-group-body w-50">
                                          <label for="" class="form-label">
                                              Giá ( VND )<i class="fa-solid fa-circle-info"></i>
                                          </label>
                                          <div class="shop-form-control">
                                              <div class="form-input-body">
                                                  <input type="number"
                                                         name="price"
                                                         class="form-input"
                                                         rules="required"
                                                         placeholder="VND" />
                                              </div>
                                          </div>
                                          <div class="form-msg"></div>
                                      </div>
                                      <div class="form-group-body w-50">
                                          <label for="" class="form-label">(%) giảm giá </label>
                                          <div class="shop-form-control">
                                              <div class="form-input-body">
                                                  <input type="number"
                                                         name="salePercent"
                                                         class="form-input"
                                                         
                                                         placeholder="0%" />
                                              </div>
                                          </div>
                                          <div class="form-msg"></div>
                                      </div>
                                      <div class="form-group-body w-50">
                                          <label for="" class="form-label">
                                              Số lượng<i class="fa-solid fa-circle-info"></i>
                                          </label>
                                          <div class="shop-form-control">
                                              <div class="form-input-body">
                                                  <input type="number"
                                                         name="quantity"
                                                         class="form-input"
                                                         rules="required"
                                                         value="100"
                                                         placeholder="0" />
                                              </div>
                                          </div>
                                          <div class="form-msg"></div>
                                      </div>
                                  </div>
                              </div>
                              
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
                                              <textarea name="description" style="display:none" id="description"></textarea>
                                          </div>
                                          <div class="form-msg"></div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="c-right">
                              <!-- item -->
                             
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
                                                 name="image"
                                                 
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
                                                 name="listImage[]"
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
                                <!-- <button type="submit" class="c-btn c-btn-save">Save</button> -->
                                <input type="submit" class="c-btn c-btn-save" name="btn-create-product" value ="Save">
                            </div>
                          </div>
                          
                      </form>
                        </div>
                    </div>
                </main>
            </div>
        </div>

