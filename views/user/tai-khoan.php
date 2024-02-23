<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tài khoản</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
	<link rel="stylesheet" type="text/css" href="public/css/tatcahang.css">
	<link rel="stylesheet" type="text/css" href="public/css/taikhoan.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
<body>
	<?php require_once('layout/header.php') ?>
	<?php if(!isset($_SESSION['user'])){ ?>
		<div class="container form">
			<div class="row">
				<div class="col-md-12">
					<h2>Đăng nhập</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5">
					<form method="post">
						<div class="form-group">
							<label for="email">Tài khoản:</label>
							<input type="text" name="user" class="form-control" required="" placeholder="Nhập tài khoản" id="email">
						</div>
						<div class="form-group">
							<label for="pwd">Mật khẩu:</label>
							<input type="password" name="pass" class="form-control" required="" placeholder="Nhập mật khẩu" id="pwd">
							<?php if(isset($_SESSION['err'])){
								echo '<span class="err">* Thông tin tài khoản không chính xác</span>';
								unset($_SESSION['err']);
							} ?>
						</div>
						<div class="form-group form-check">
							<label class="form-check-label">
								<input class="form-check-input" type="checkbox"> Nhớ mật khẩu
							</label>
						</div>
						<div>
							<button type="submit" name="login" class="btn btn-primary">Đăng nhập</button>
							<p data-toggle="modal" data-target="#loginModal"> Chưa có tài khoản ?</p>
						</div>
					</form>
				</div>
				<div class="col-md-7">
					<img src="public/img/note.png" width="100%">
				</div>
			</div>
		</div>
		<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header border-bottom-0">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-title text-center">
							<h4>Đăng ký</h4>
						</div>
						<div class="d-flex flex-column text-center">
							<form>
								<div class="form-group">
									<input id="user" type="text" class="form-control" id="email1"placeholder="Nhập tài khoản" required=""> 
								</div>
								<div class="form-group">
									<input id="name" type="text" class="form-control" placeholder="Họ và tên" required>
								</div>
								<div class="form-group">
									<input id="phone" type="number" class="form-control" placeholder="Nhập số điện thoại" required>
								</div>
								<div class="form-group">
									<input id="address" type="text" class="form-control" placeholder="Địa chỉ" required>
								</div>
								<div class="form-group">
									<input id="pass" type="password" class="form-control" id="password1" placeholder="Mật khẩu" required>
								</div>
								<div class="form-group">
									<input id="pass2" type="password" class="form-control" id="password2" placeholder="Nhập lại mật khẩu" required>
								</div>
								<button id="dangky" type="button" class="btn btn-info btn-block btn-round">Đăng ký</button>
							</form>  
						<div id="alert">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<?php } else { ?>
	<div class="container info">
		<div class="row">
			<div class="col-md-4">
				<ul>
					<li class="text-center">Bảng điều khiển</li>
					<a href="?controller=tai-khoan&action=thong-tin-ca-nhan"><li class="btns">Thông tin cá nhân</li></a>
					<a href="?controller=tai-khoan&action=don-hang"><li  class="btns">Đơn hàng</li></a>
					<a href="?controller=tai-khoan&action=doi-mat-khau"><li  class="btns">Đổi mật khẩu</li></a>
					<a href="?controller=tai-khoan&action=dang-xuat"><li >Đăng xuất</li></a>
				</ul>
			</div>
			<div class="col-md-8 " id="content">
				<?php switch ($action) {
					case 'thong-tin-ca-nhan':
					include("setting/info.php");
					break;
					case 'doi-mat-khau':
					include("setting/chage-pass.php");
					break;
					case 'don-hang':
					$data = $userModel->select_don_hang($_SESSION['user']['username']);
					include("setting/product.php");
					break;
					default:
					include("setting/info.php");
					break;
				} ?>  
			</div>
		</div>
	</div>
<?php } ?>
<footer id="footer"></footer>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="public/js/cart.js"></script>
<script type="text/javascript" src="public/js/footer.js"></script>
<script type="text/javascript">
</script>
</html>
