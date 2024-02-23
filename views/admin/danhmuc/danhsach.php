<div class="container-fluid">
    <h1 class="mt-4">Quản lý Danh mục</h1>
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Danh sách danh mục</div>
        <div class="card-body">
            <div class="table-responsive">
                <button class="btn btn-primary " style="float: right;margin-left: 50px;" onclick="add_catalog();">Thêm mới</button>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th>Mã danh mục</th>
                            <th>Tên danh mục</th>
                            <th>Loại</th>
                            <th>Xoá</th>
                             <th>Sửa</th>
                        </tr>
                    </thead>
                    <tbody id="show_catalog">
                    </tbody>
                </table>
            </div>
        </div>
</div>
<!-- Modal -->
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="add_catalog_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Thêm mới danh mục</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <form id="update_product" method="post">
      <div class="modal-body " id="modal">
        <div class="container">
            <div class="row">
                <div class="col-md-12" >
                    <div class="form-group">
                    <label for="sel1">Thời trang:</label>
                      <select class="form-control" id="thoitrang" required="">
                           <option value="dafault" selected disabled hidden>-- Lựa chọn --</option>
                            <option value="1">Thời trang nam</option>
                            <option value="2">Thời trang nữ</option>
                            <option value="3">Phụ kiện</option>
                        </select>
                </div>   
                    <div class="form-group">
                        <label>Tên danh mục :</label>    
                        <input  type="text" class="form-control" name="name" minlength="3" required="">
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
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="edit_catalog_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Sửa danh mục</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <form id="update_catalog" method="post">
      <div class="modal-body " id="modal">
        <div class="container">
             <span>Mã danh mục : <b id="maDM"></b></span>
            <div class="row">

                <div class="col-md-12" >
                    <div class="form-group">
                    <label for="sel1">Thời trang:</label>
                      <select class="form-control" id="update_thoitrang" required="" name="id_catalog_paren">
                          
                            <option value="1">Thời trang nam</option>
                            <option value="2">Thời trang nữ</option>
                            <option value="3">Phụ kiện</option>
                        </select>
                </div>   
                    <div class="form-group">
                        <label>Tên danh mục :</label>    
                        <input id="update_name" type="text" class="form-control" name="name_catalog" minlength="3" required="">
                    </div>
                    
                </div>
            </div>
            <div id="alert_catalog"></div>
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
