<div class="container-fluid">
    <h1 class="mt-4 mb-4">Quản lý người dùng</h1>
    <div class="card mb-4 p-3">
        <div class="table-responsive">
            <table class="table table-bordered"  width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tài khoản</th>
                        <th>Mật khẩu</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>SDT</th>
                        <th>Loại toài khoản</th>
                        <th>Xoá</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody id="show_user">
                </tbody>
            </table>
        </div>
        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="add_user_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
            <div class="modal-content">
          <form id="add_user" method="post">
              <div class="modal-body " id="modal">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12" >
                            <div class="form-group">
                                <label>* Tài khoản  :</label>    
                                <input  type="text" class="form-control" name="username" id="username_acount" minlength="3" required="">
                            </div>
                            <div id="alert_username" class="mb-2"></div>
                            <div class="form-group">
                                <label>* Mật khẩu :</label>    
                                <input  type="password" class="form-control" name="password" minlength="3" required="" id="pass1">
                            </div>
                            <div class="form-group">
                                <label>* Nhập lại mật khẩu </label>    
                                <input  type="password" class="form-control" name="password2" minlength="3" required="" id="pass2">
                            </div>
                            <div id="alert_pass" class="mb-2"></div>
                            <div class="form-group">
                                <label>* Tên :</label>    
                                <input  type="text" class="form-control" name="name" minlength="3" required="">
                            </div>
                            <div class="form-group">
                                <label>Email :</label>    
                                <input  type="email" class="form-control" name="email" >
                            </div>
                            <div class="form-group">
                                <label>* Địa chỉ :</label>    
                                <input  type="text" class="form-control" name="address" minlength="3" required="">
                            </div>
                            <div class="form-group">
                                <label>* Số điện thoại :</label>    
                                <input  type="number" class="form-control" name="phone" minlength="3" required="">
                            </div>
                            <div class="form-group">
                                <label>Loại tài khoản :</label>
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" value="1" name="level" checked >Khách hàng
                                </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" value="2" name="level">Admin
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div id="alert_user"></div>
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
<div class="modal fade bd-example-modal-lg" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Sửa tài khoản</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
   <form id="update_user" method="post">
              <div class="modal-body " id="modal">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12" >
                            <div class="form-group">
                                <label>* Tài khoản  :</label>    
                                <input  id="username_update" type="text" class="form-control" name="username"  minlength="3" required="" disabled="">

                            </div>
                             <div id="alert_username" class="mb-2"></div>
                            <div class="form-group">
                                <label>* Mật khẩu :</label>    
                                <input   type="password" class="form-control" name="password" minlength="3" required="" id="pass_update">
                            </div>
                            <div id="alert_pass" class="mb-2"></div>
                            <div class="form-group">
                                <label>* Tên :</label>    
                                <input  type="text" class="form-control" name="name" minlength="3" required="" id="name_update">
                            </div>
                            <div class="form-group">
                                <label> Email :</label>    
                                <input  type="email" class="form-control" name="email" id="mail_update">
                            </div>
                            <div class="form-group">
                                <label>* Địa chỉ :</label>    
                                <input  type="text" class="form-control" name="address" minlength="3" required="" id="address_update">
                            </div>
                            <div class="form-group">
                                <label>* Số điện thoại :</label>    
                                <input  type="number" class="form-control" name="phone" minlength="3" required="" id="phone_update">
                            </div>
                            <div class="form-group">
                                <label>Loại tài khoản :</label>
                               <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" value="1" name="level" id="kh_update" >Khách hàng
                                </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" value="2" name="level" id="admin_update">Admin
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div id="alert_user"></div>
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
