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
		<h2>Thông báo đơn hàng</h2>
	</div>
	<div class="container dat-hang">
	
			<form action="" method="post" >
				<div class="row">	
					<div class="col-md-12">
						<p>Cảm ơn bạn. Đơn hàng của bạn đã được nhận</p>
						<p>Mã đơn hàng của bạn : <?=$transaction_id?></p>
						<p class="text-success"><?=isset($_SESSION['user'])?'Vui lòng kiểm tra tình trạng đơn hàng trong Tài khoản -> Đơn hàng':'<p class="text-danger">Bạn chưa đăng nhập vui lòng lưu lại mã đơn hàng để liên hệ theo dõi đơn hàng</p>'; ?></p>
					</div>			
				</div>
			</form>
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
