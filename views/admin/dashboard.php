<div class="container-fluid">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Đơn hàng</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Đơn hàng đang chờ : 
                    <h2><?=$count_donhangcho?></h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="?controller=admin&action=don-hang-moi">Xem chi tiết</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Đơn hàng đang gửi :
                    <h2><?=$count_donhanggui?></h2>
                </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="?controller=admin&action=dang-gui">Xem chi tiết</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Đơn hàng thành công :
                    <h2><?=$count_donhangok?></h2>
                </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="?controller=admin&action=da-nhan">Xem chi tiết</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Số lượng</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Số lượng mặt hàng :
                    <h2><?=$count_product?></h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="?controller=admin&action=show-product">Xem chi tiết</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-dark text-white mb-4">
                <div class="card-body">Số lượng danh mục :
                    <h2><?=$count_catalog?></h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="?controller=admin&action=show-catalog">Xem chi tiết</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-info text-white mb-4">
                <div class="card-body">Số lượng người dùng :
                    <h2><?=$count_user?></h2></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="?controller=admin&action=show-user">Xem chi tiết</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
</div>
</div>
<div class="container-fluid">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Doanh thu</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card text-white mb-4" style="background-color: #5610ff;">
                <div class="card-body">Doanh thu trong ngày:
                    <h2><?=number_format($day['tongtien'])?><span class="ml-1"></h2></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                                       
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card text-white mb-4" style="background-color: #5610ff;">
                <div class="card-body">Doanh thu trong tháng:
                    <h2><?=number_format($month['tongtien'])?><span class="ml-1"></h2></div>
                <div class="card-footer d-flex align-items-center justify-content-between">                
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card text-white mb-4" style="background-color: #5610ff;">
                <div class="card-body">Doanh thu trong năm:
                    <h2><?=number_format($year['tongtien'])?><span class="ml-1">đ</span></h2></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                                        
                </div>
            </div>
        </div>
    </div>
</div>