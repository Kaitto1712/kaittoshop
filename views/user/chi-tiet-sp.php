<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chi tiết sản phẩm</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
	<link rel="stylesheet" type="text/css" href="public/css/tatcahang.css">
	<link rel="stylesheet" type="text/css" href="public/css/chi-tiet.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
</head>
<body>
<div id="fb-root"></div>
	<?php require_once('layout/header.php') ?>
	<div class="container chi-tiet">
		<div class="row">
			<div class="col-md-6" >
				<div class="card-c">
					<img id="img-container" src="<?=$data['image_link1']?>" width="100%">
					<div class="nav row">
						<div class="col-md-12"> 
							<img  class="img opac" onclick="change_img(this);" src="<?=$data['image_link1']?>">
							<img class="img" onclick="change_img(this);" src="<?=$data['image_link2']?>">
							<img class="img" onclick="change_img(this);" src="<?=$data['image_link3']?>">
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 right" >
				<div class="row">
					<div class="col-md-12 breadcumb">
						<p><a href="">Trang chủ </a> / <span><?=$breadcrumb['paren']?></span> / <span><?=$breadcrumb['child']?></span></p>
						<h1><?=$data['name']?></h1>
						<h2 id="price"><span><?php if($data['discount']>0){ 
								$sell= FLOOR($data['discount']/$data['price']*100);
								echo number_format($data['price']+$data['discount'])."<span>₫</span>";
							} ?></span><?=number_format($data['price'])?><span>₫</span></h2>
						<div class="row">
							<div class="col-md-6">
								<div class="form">
								<?php if($breadcrumb['paren']!="Phụ kiện"): ?>
									<div class="form-group">
										<label for="sel1">Size</label>
										<select id="select" name="sizes" class="form-control" id="sel1">
											<option value="s">S</option>
											<option value="m">M</option>
											<option value="l">L</option>
											<option value="xl">XL</option>
											<option value="xxl">XXL</option>
										</select>
									</div>
								<?php endif ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label for="sel1">Số lượng</label><br>
								<div class="quantity">
									<input type="number" id="number" min="1"  step="1" value="1">
									<div class="quantity-nav">
										<div class="quantity-button quantity-up">+</div>
										<div class="quantity-button quantity-down">-</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-md-12 mt-2">
								<label><b>Thời trang</b> : <?=$breadcrumb['paren']?></label>
							</div>
							<div class="col-md-12 mt-2">
								<label><b>Danh mục</b> : <?=$breadcrumb['child']?></label>
							</div>
							<div class="col-md-12 mt-2">
								<label><b>Giảm giá</b> : <b style="color: red;"><?=isset($sell)?$sell:0?>%</b></label>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10 add">
						<button onclick="cart(<?=$data['id']?>)">Thêm vào giỏ hàng</button>
					</div>
				</div>
			</div>
		</div>
		<div class="row text-center">
			<div class="col-md-7 motasp" >
				<h3>MÔ TẢ SẢN PHẨM</h3>
				<p><?=$data['describes']==''?"Không có mô tả":$data['describes']?></p>
			</div>
		</div>
	</div>
<footer id="footer"></footer>
</body>
<script type="text/javascript">
	var container = document.getElementById("img-container");
	function change_img(img){
		container.src= img.src;
	}
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="public/js/cart.js"></script>
<script type="text/javascript" src="public/js/footer.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$( ".nav .img" ).click(function() {
			$( ".nav .img" ).removeClass("opac");
			$( this ).addClass("opac");
		});
	});
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
			} else {
				var newVal = oldValue + 1;
			}
			spinner.find("input").val(newVal);
			spinner.find("input").trigger("change");
		});
		btnDown.click(function() {
			var oldValue = parseFloat(input.val());
			if (oldValue <= min) {
				var newVal = oldValue;
			} else {
				var newVal = oldValue - 1;
			}
			spinner.find("input").val(newVal);
			spinner.find("input").trigger("change");
		});
	});
</script>
<script type="text/javascript">
	function cart(id){
		var number = $("#number").val();
		var size = $('#select :selected').text();
		$.post('?controller=chi-tiet&id='+id+'&cart',{'id':id,'number':number,'size':size},function(data){
		});
		Swal.fire({
				  icon: 'success',
				  title: 'Thêm vào giỏ hàng thành công !',
				  showConfirmButton: false,
				  timer: 1500
				})
		setTimeout(function(){location.reload(); }, 1000);
	}
</script>
</html>