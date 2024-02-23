<div class="container-fluid">
    <h1 class="mt-4">Đơn hàng</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Thành công</a></li>
        <li class="breadcrumb-item active">Danh sách</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Danh sách đơn hàng đã nhận</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã đơn hàng</th>
                            <th>Tài khoản</th>
                            <th>Tên khách hàng</th>
                            <th>Email khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Lời nhắn</th>
                            <th>Tổng tiền</th>
                            <th>Thời gian đặt</th>
                             <th>Chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $key => $value):?>
                        <tr>
                            <td><?=$key+1?></td>
                            <td><?=$value['id']?></td>
                            <td><?=$value['user_id']==null?'':$value['username']?></td>
                            <td><?=$value['user_id']!==null?$value['fullname']:$value['user_name']?></td>
                            <td><?=$value['user_id']!==null?$value['email']:$value['user_email']?></td>
                            <td><?=$value['user_id']!==null?$value['phone']:$value['user_phone']?></td>
                            <td><?=$value['user_id']!==null?$value['address2']:$value['address']?></td>
                            <td><?=$value['message']?></td>
                            <td><?=number_format($value['amount'])?></td>
                            <td><?=$value['created']?></td>
                            <td>
                                <button type="button" id="btn-modal" class="btn btn-primary" 
                                    onclick="show(<?=$value['id']?>);" data-toggle="modal" data-target="#2exampleModalCenter">Xem
                                </button>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Chi tiết đơn hàng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body " id="modal"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
