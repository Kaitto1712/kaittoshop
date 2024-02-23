<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Trang chủ</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
	<link rel="stylesheet" href="public/owlcarousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="public/owlcarousel/assets/owl.theme.default.min.css">
</head>
<body>
	<?php require_once('layout/header.php') ?>
	<div class="container">
		<section>
			<div class="banner">
				<a href="?controller=cua-hang"><img src="public/img/banner.png"></a>
			</div>
		</section>
		<section>
			<div class="styles">
				<div class="style row">
					<div id="ef_boy" class="col-md-4">
						<a href="?controller=thoi-trang-nam">
							<img src="public/img/thoi-trang-nam.jpg">
							<div class="text"><h4>Thời trang nam</h4></div>
						</a>
					</div>
					<div id="ef_girl" class="col-md-4">
						<a href="?controller=thoi-trang-nu">
							<img src="public/img/thoi-trang-nu.jpeg">
							<div class="text"><h4>Thời trang nữ</h4></div>
						</a>
					</div>
					<div id="ef_sr" class="col-md-4">
						<a href="?controller=phu-kien">
							<img src="public/img/pk.jpg">
							<div class="text"><h4>Phụ kiện</h4></div>
						</a>
					</div>
				</div>
			</div>
		</section>
		<section>
			<div class="container girl">
				<div class="row"><div class="con-12"><h2>Thời trang nữ</h2></div></div>
				<div class="row">
					<?php while($row = $data1->fetch_assoc()){ ?>
						<div class="col-md-3">
							<div class="card">
								<a href="?controller=chi-tiet&id=<?=$row['id']?>">
									<img src="<?=$row['image_link']?>">
								</a>
								<div class="content">
									<h2><?=$row['name']?></h2>
									<?php if($row['discount']>0){ ?>
										<p class="sell"><?=number_format($row['price']+$row['discount'])?><span> ₫</span></p>
									<?php } ?>
									<p><?=number_format($row['price'])?><span><u>₫</u></span></p>
									<button onclick="cart(<?=$row['id']?>)">Thêm vào giỏ hàng</button>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
				<div class="row"><div class="con-12"><h2>Thời trang nam</h2></div></div>
				<div class="row " >
					<?php while($row = $data2->fetch_assoc()){ ?>
						<div class="col-md-3">
							<div class="card">
								<a href="?controller=chi-tiet&id=<?=$row['id']?>">
								<img src="<?=$row['image_link']?>">
								</a>
								<div class="content">
									<h2><?=$row['name']?></h2>
									<?php if($row['discount']>0){ ?>
										<p class="sell"><?=number_format($row['price']+$row['discount'])?><span>₫</span></p>
									<?php } ?>
									<p><?=number_format($row['price'])?><span><u>₫</u></span></p>
									<button onclick="cart(<?=$row['id']?>)">Thêm vào giỏ hàng</button>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
				<div class="row"><div class="col-12 "><h2>Phụ kiện</h2></div></div>
				<div class="row " >
					<?php while($row = $data3->fetch_assoc()){ ?>
						<div class="col-md-3">
							<div class="card">
								<a href="?controller=chi-tiet&id=<?=$row['id']?>">
								<img src="<?=$row['image_link']?>">
								</a>
								<div class="content">
									<h2><?=$row['name']?></h2>
									<?php if($row['discount']>0){ ?>
										<p class="sell"><?=number_format($row['price']+$row['discount'])?><span>₫</span></p>
									<?php } ?>
									<p><?=number_format($row['price'])?><span><u>đ</u></span></p>
									<button onclick="cart(<?=$row['id']?>)">Thêm vào giỏ hàng</button>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		</section>
		<section>
			<div class="container">
				<div class="service row justify-content-md-center">
					<div class="item col-md-4">
						<img src="public/img/icon1.png">
						<h3>QUÀ TẶNG HẤP DẪN</h3>
						<p>Nhiều quà tặng hấp dẫn trong ngày</p>
					</div>
					<div class="item col-md-4">
						<img src="public/img/icon2.png">
						<h3>GIAO HÀNG NHANH</h3>
						<p>Giao hàng tận nơi, nhanh chóng tiện lợi</p>
					</div>
					<div class="item col-md-4">
						<img src="public/img/icon3.png">
						<h3>DỊCH VỤ KHÁCH HÀNG</h3>
						<p>Phục vụ nhiệt tình, chu đáo</p>
					</div>
				</div>
			</div>
		</section>
	</div>
	<hr>
	<footer id="footer"></footer>
</body>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="public/owlcarousel/owl.carousel.min.js"></script>
	<script type="text/javascript" src="public/js/script.js"></script>
	<script type="text/javascript" src="public/js/cart.js"></script>
	<script type="text/javascript" src="public/js/footer.js"></script>
	<script type="text/javascript">
				$(document).ready(function(){
					$(".owl-carousel").owlCarousel();
				});
				$('.owl-carousel').owlCarousel({
					loop:true,
					items:3,
					margin:20,
					
					autoplay:true,
					loop:true,
					autoplayTimeout:4000,
					autoplayHoverPause:true,
					responsive:{
						0:{
							items:1
						},
						600:{
							items:2
						},
						1000:{
							items:3
						}
					}
				});
			</script>
			<script type="text/javascript">
			function cart(id){
				var number = 1;
				var size = "S";
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
