<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Giỏ hàng</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
	<link rel="stylesheet" type="text/css" href="public/css/tatcahang.css">
	<link rel="stylesheet" type="text/css" href="public/css/giohang.css">
	<link rel="stylesheet" type="text/css" href="public/css/chi-tiet.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
<body>
	<?php require_once('layout/header.php') ?>
	<div class="title">
		<h2>Giỏ Hàng</h2>
	</div>
	<div class="container gio-hang">
		<div class="row">
			<div class="col-md-12">
				<form method="post">
					<table>
					<tr>
						<th>Ảnh</th>
						<th>Sản phẩm</th>
						<th>Giá</th>
						<th>Size</th>
						<th>Số lượng</th>
						<th>Tổng</th>
						<th>Xoá</th>
					</tr>
					<?php if(isset($_SESSION['cart'])): ?>
						<?php foreach($_SESSION['cart']  as $key => $value):?>
							<tr>
								<td><img src="<?=$value['img']?>" width="80px"></td>
								<td><?=$value['name']?></td>
								<td><?=number_format($value['price'])?><span>₫</span></td>
								<td><?=$value['size']?></td>
								<td>
									<div class="quantity">
										<input id="quantity<?=$key?>" onchange="updateCart(<?=$key?>)" 
											type="number" min="1"  step="1" value="<?=$value['number']?>">
										<div class="quantity-nav">
											<div class="quantity-button quantity-up">+</div>
											<div class="quantity-button quantity-down">-</div>
										</div>
									</div>
								</td>
									<td><?=number_format($value['price']*$value['number'])?><span>₫</span></td>
									<td><a href="?controller=gio-hang&action=delete_cart&id=<?=$key?>" id="delete">×</a></td>
								</tr>
							<?php endforeach ?>
						<?php endif ?>
						<tr>
							<td class="text-right" colspan ="6"><a href="?controller=gio-hang">Cập nhật giỏ hàng</a></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
		<div class="row justify-content-end text-center">
			<div class="col-md-6 ">
				<table>
					<tr>
						<td colspan="2" class="text-center">Tổng tiền : <?=number_format($total)?><span>₫</span></td>
					</tr>
					<tr>
						<td colspan="2" class="text-center">
							<a href="?controller=dat-hang">Tiến hành đặt hàng</a>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
<footer id="footer"></footer>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script type="text/javascript" src="public/js/cart.js"></script>
<script type="text/javascript" src="public/js/footer.js"></script>
<script type="text/javascript">
	function updateCart(id){
		var link = '#quantity'+id;
		var number = $(link).val();
		$.post('?controller=gio-hang&action=update_cart',{'id':id,'number':number},function(data){});
	}
</script>
<script type="text/javascript">
	$('.quantity').each(function() {
		var spinner = jQuery(this),
		input = spinner.find('input[type="number"]'),
		btnUp = spinner.find('.quantity-up'),
		btnDown = spinner.find('.quantity-down'),
		min = input.attr('min'),
		max = input.attr('max');
		btnUp.click(function() {
			var oldValue = parseFloat(input.val());
			if (oldValue >= max) {
				var newVal = oldValue;
			}else {
				var newVal = oldValue + 1;
			}
			spinner.find("input").val(newVal);
			spinner.find("input").trigger("change");
		});
		btnDown.click(function() {
			var oldValue = parseFloat(input.val());
			if (oldValue <= min) {
				var newVal = oldValue;
			}else {
				var newVal = oldValue - 1;
			}
			spinner.find("input").val(newVal);
			spinner.find("input").trigger("change");
		});
	});
</script>
</html>
