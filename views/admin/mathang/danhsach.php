<div class="container-fluid">
    <h1 class="mt-4">Mặt hàng</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Danh sách</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Danh sách mặt hàng</div>
        <div class="card-body">
            <div class="table-responsive">
                <button class="btn btn-primary " style="float: right;margin-left: 50px;" onclick="add_product()">Thêm mới</button>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Giá bán</th>
                            <th>Giảm giá</th>
                            <th>Mô tả</th>
                            <th>Danh mục</th>
                            <th>Thời gian tạo</th>
                            <th>Xoá</th>
                            <th>Sửa</th>
                        </tr>
                    </thead>

                    <tbody >
                     <?php 
                     foreach ($data as $key => $value) {
                                $i = $key+1;
                                echo " <tr>
                                <td>".$i."</td>
                                <td>".$value['id']."</td>
                                <td>$value[name]</td>
                                <td><img src='$value[image_link]' height='100px' ></td>
                                <td>".number_format($value['price'])."</td>
                                <td>$value[discount]</td>
                                <td  id='shorten' style='max-width: 500px;''><p class='hidden-char'>".htmlentities($value['describes'])."</p></td>
                                <td>$value[name_catalog]</td>
                                <td>$value[created]</td>
                                <td><button data='$value[id]'  class='btn btn-danger btn_delete'>Xoá</button></td>
                                <td><button data='$value[id]'  class='btn btn-success btn_update'>Sửa</button></td>
                            </tr>";
                            } ?>
                    </tbody>
                </table>
            </div>
        </div>
</div>
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="mathang" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Thêm mới mặt hàng</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <form id="create_product" method="post">
      <div class="modal-body " id="modal">
        <div class="container">
            <div class="row">
                <div class="col-md-12" >
                    <label for="usr">Mã sản phẩm :<b> <?=$count?></b></label>
                    <div class="form-group">
                        <label for="sel1">Thời trang :</label>
                        <select class="form-control" id="thoitrang" required="">
                           <option value="dafault" selected disabled hidden>-- Lựa chọn --</option>
                            <option value="1">Thời trang nam</option>
                            <option value="2">Thời trang nữ</option>
                            <option value="3">Phụ kiện</option>
                        </select>
                    </div>
                    <div class="form-group">
                    <label for="sel1">Danh mục:</label>
                      <select class="form-control" id="dm" name="catalog_id">
                            
                    </select>
                </div>   
                    <div class="form-group">
                        <label>Tên sản phẩm :</label>    
                        <input type="text" class="form-control" name="name" minlength="3" required="">
                    </div>
                    <div class="form-group">
                        <label>Giá bán :</label>    
                        <input type="number" class="form-control" name="price" required="" min="1">
                    </div>
                    <div class="form-group">
                        <label>Giảm giá :</label>    
                        <input type="number" class="form-control" name="dismount"  required="" min="0" value="0">
                    </div>
                    <div class="form-group">
                        <label>Ảnh đại diện :</label>    
                        <input required="" type="file" class="form-control-file border" name="img_link">
                    </div>
                     <div class="form-group">
                        <label>Ảnh slide 1 :</label>    
                        <input type="file" class="form-control-file border" name="img_link1">
                    </div>
                     <div class="form-group">
                        <label>Ảnh slide 2 :</label>    
                        <input type="file" class="form-control-file border" name="img_link2">
                    </div>
                     <div class="form-group">
                        <label>Ảnh slide 3 :</label>    
                        <input type="file" class="form-control-file border" name="img_link3">
                    </div>
                   <div class="form-group">
                          <label for="comment">Mô tả:</label>
                          <textarea name="describes" class="form-control describes" rows="5" id="mota"></textarea>
                        </div>
                </div>
            </div>
            <div id="alert"></div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary" >Chấp nhận</button>
    </div>
</form>
</div>
</div>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="edit_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Sửa mặt hàng</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <form id="update_product" method="post">
      <div class="modal-body " id="modal">
        <div class="container">
            <div class="row">
                <div class="col-md-12" >
                    <label for="usr">Mã sản phẩm :<b id="masp"></b></label>
                    <div class="form-group">
                    <label for="sel1">Danh mục:</label>
                      <select class="form-control" id="dm2" name="catalog_id">
                            
                    </select>
                </div>   
                    <div class="form-group">
                        <label>Tên sản phẩm :</label>    
                        <input id="update_name" type="text" class="form-control" name="name" minlength="3" required="">
                    </div>
                    <div class="form-group">
                        <label>Giá bán :</label>    
                        <input id="update_price" type="number" class="form-control" name="price" required="" min="1">
                    </div>
                    <div class="form-group">
                        <label>Giảm giá :</label>    
                        <input id="update_dismount" type="number" class="form-control" name="dismount"  required="" min="0" >
                    </div>
                    <div class="form-group">
                        <label>Ảnh đại diện :</label>    
                        <input  type="file" class="form-control-file border" name="img_link">
                        <img  id="update_img" style="max-width:300px">
                    </div>
                     <div class="form-group">
                        <label>Ảnh slide 1 :</label>    
                        <input type="file" class="form-control-file border" name="img_link1">
                         <img  id="update_img1" style="max-width:300px">
                    </div>
                     <div class="form-group">
                        <label>Ảnh slide 2 :</label>    
                        <input type="file" class="form-control-file border" name="img_link2">
                         <img  id="update_img2" style="max-width:300px">
                    </div>
                     <div class="form-group">
                        <label>Ảnh slide 3 :</label>    
                        <input type="file" class="form-control-file border" name="img_link3">
                         <img  id="update_img3" style="max-width:300px">
                    </div>
                   <div class="form-group">
                          <label for="comment">Mô tả:</label>
                          <textarea   name="describes" class="form-control describes" rows="5" id="mota2"></textarea>
                        </div>
                </div>
            </div>
            <div id="alert"></div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" id="close2" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary" >Chấp nhận</button>
    </div>
</form>
</div>
</div>
</div>
