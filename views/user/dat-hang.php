<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đặt hàng</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
	<link rel="stylesheet" type="text/css" href="public/css/tatcahang.css">
	<link rel="stylesheet" type="text/css" href="public/css/giohang.css">
	<link rel="stylesheet" type="text/css" href="public/css/dat-hang.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
<body>
	<?php require_once('layout/header.php') ?>
	<div class="title">
		<h2>Đặt hàng</h2>
	</div>
	<?php if(!isset($_SESSION['user'])): ?>
		<div class="dang-nhap title">
			<span>Vui lòng đăng ký tài khoản để theo dõi đơn hàng dễ dàng hơn!
				<a href="?controller=tai-khoan&action=dat-hang"> Đăng ký ngay</a>
			</span >			
		</div>
		<div class="dang-nhap title">
			<span>Bạn đã có tài khoản? <a href="?controller=tai-khoan&action=dat-hang">Ấn vào đây để đăng nhập</a></span >			
		</div>
	<?php endif ?>
	<div class="container dat-hang">
		<?php if(isset($_SESSION['cart'])) { ?>
			<form action="" method="post" >
				<div class="row">				
					<div class="col-md-6 dat-hang-left">
						<h2>Thông tin khách hàng</h2>
						<div class="form-group">
							<label for="ht">Họ và tên:</label>
							<input name="name" type="text" class="form-control" placeholder="Nhập họ tên của bạn"
								value="<?= isset($_SESSION['user'])?$_SESSION['user']['fullname']:""?>" >
						</div>
						<div class="form-group">
							<label >Số điện thoại :</label>
							<input name="phone" type="text" class="form-control" placeholder="Nhập số điện thoại của bạn"
								value="<?= isset($_SESSION['user'])?$_SESSION['user']['phone']:""?>" >
						</div>
						<div class="form-group">
							<label >Email :</label>
							<input name="email" type="email" class="form-control" placeholder="Nhập vào email của bạn" 
								value="<?= isset($_SESSION['user'])?$_SESSION['user']['email']:""?>" >
						</div>
						<div class="form-group">
							<label >Địa chỉ nhận hàng :</label>
							<input name="address" type="text" class="form-control" placeholder="Nhập vào địa chỉ nhận hàng"
								value="<?= isset($_SESSION['user'])?$_SESSION['user']['address']:""?>">
						</div>
						<div class="form-group">
							<label for="comment">Thông tin thêm :</label>
							<textarea name="comment" class="form-control" rows="5" id="comment"></textarea>
						</div>
					</div>
					<div class="col-md-6 text-center" >
						<div class="cart">
							<h2>Thông tin đơn hàng</h2>
							<table  width="100%">
								<tr>
									<th>Sản phẩm</th>
									<th>Giá</th>
									<th>Số lượng</th>
									<th>Thành tiền</th>
								</tr>
								<?php if(isset($_SESSION['cart'])): ?>
									<?php foreach($_SESSION['cart']  as $key => $value):?>
										<tr>
											<td><?=$value['name']?></td>
											<td><?=number_format($value['price'])?><span>₫</span></td>
											<td><?=$value['number']?></td>
											<td><?=number_format($value['price']*$value['number'])?><span>₫</span></td>
										</tr>
									<?php endforeach ?>
								<?php endif ?>
								<tr>
									<th colspan="3">Tổng tiền :</th>
									<th> <?=number_format($total)?><span>₫</span></th>
								</tr>
							</table>
							<div class="text-left form-check radio">
								<label class="form-check-label ">
									<input type="radio" class="form-check-input" name="optradio">Trả tiền mặt khi nhận hàng
								</label>
							</div>
							<div class="text-left form-check radio">
								<label class="form-check-label">
									<input type="radio" class="form-check-input" name="optradio" >Chuyển khoản ngân hàng
								</label>
							</div>
							<button type="submit" name="submit" class="btn btn-primary">Đặt hàng</button>
						</div>
					</div>
				</div>
			</form>
		<?php }else{ ?>
	<script type="text/javascript">
		Swal.fire({
			title: 'Giỏ hàng trống',
			showClass: {
			    popup: 'animated fadeInDown faster'
			},
			hideClass: {
			    popup: 'animated fadeOutUp faster'
			}
		})
	</script>
		<?php } ?>
	</div>
	<footer id="footer"></footer>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="public/js/cart.js"></script>
<script type="text/javascript" src="public/js/footer.js"></script>
</html>
