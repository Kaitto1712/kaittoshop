<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="public/css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="public/css/admin.css">
        <script src="public/ckeditor/ckeditor.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="?controller=admin&action=trang-chu">KaittoShop</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"></form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <span style="color: white;margin-top: 7px;"><?=isset($_SESSION['user'])?$_SESSION['user']['username']:'Admin'?></span>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="?controller=admin&action=dang-xuat">Đăng xuất</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
           <div id="layoutSidenav_nav">
               
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Thống kê</div>
                            <a class="nav-link" href="?controller=admin&action=trang-chu">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-tachometer-alt"></i>
                                </div> Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Quản lý</div>
                        <!-- List-menu-managament -->
                            <a class="nav-link collapsed" href="#" 
                                data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon">
                                   <i class="fas fa-cart-plus"></i>
                                </div> Đơn hàng
                                <div style="float: right;margin-left: 60px;">
                                    <i class="fas fa-caret-down"></i>
                                </div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a href="?controller=admin&action=don-hang-moi" class="nav-link">Đơn hàng mới</a>
                                    <a href="?controller=admin&action=dang-gui" class="nav-link">Đang gửi</a>
                                    <a href="?controller=admin&action=da-nhan" class="nav-link">Đơn hàng thành công</a>
                                </nav>
                            </div>
                             <a class="nav-link collapsed" href="?controller=admin&action=show-product">
                                <div class="sb-nav-link-icon">
                                   <i class="fas fa-tshirt"></i>
                                </div> Mặt hàng
                            </a>
                             <a class="nav-link collapsed" href="?controller=admin&action=show-catalog" >
                                <div class="sb-nav-link-icon">
                                   <i class="fas fa-baby-carriage"></i>
                                </div> Danh mục
                            </a>
                             <a href="?controller=admin&action=show-user" class="nav-link collapsed"  >
                                <div class="sb-nav-link-icon">
                                   <i class="fas fa-users"></i>
                                </div> Người dùng
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                       <?=isset($_SESSION['user'])?$_SESSION['user']['username']:'Admin'?>
                    </div>
                </nav>
           </div>
        <div id="layoutSidenav_content">
    <main id="contents">             
