<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thời trang</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
	<link rel="stylesheet" type="text/css" href="public/css/tatcahang.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
</head>
<body>
	<?php require_once('layout/header.php') ?>
	<div class="container" id="main">
		<div class="row">
			<?php require_once('layout/danhmuc.php') ?>
			<div class="col-md-9 main-right" >
				<p> <a href="?controller=trang-chu">Trang chủ </a>/ <?=$breadcrumb?></p>
				<div class="row">
					<div class="col-md-6">
						<div class="seach">
							<div class="form-group">
								<form>
								<input class="form-control" id="seach" type="text" name="search" placeholder="Tìm kiếm..">
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<select class="form-control" id="option">
								<option value="default">Thứ tự mặc định</option>
								<option value="asc">Giá từ thấp đến cao</option>
								<option value="desc">Giá từ cao đến thấp</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row info" id="contents"></div>
				<div class="row" >
					<div class=" next">
						<button id="show_product">Xêm thêm <i class="fas fa-arrow-down"></i></button>
					</div>
				</div>
			</div>
		</div>
	</div>
<footer id="footer"></footer>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="script.js"></script>
<script type="text/javascript" src="public/js/cart.js"></script>
<script type="text/javascript" src="public/js/danhmuc.js"></script>
<script type="text/javascript" src="public/js/footer.js"></script>
</html>
