	<header>
		<div class="header-menu container">
			<div class="row">
				<div class="logo col-md-2">
					<img style="width:120px" src="public/img/lg.png">
				</div>
				<div class="main-menu col-md-9">
					<ul>
						<li><a href="?controller=index">Trang chủ</a></li>
						<li><a href="?controller=cua-hang">Cửa hàng</a></li>
						<li><a href="?controller=thoi-trang-nam">Thời trang nam</a></li>
						<li><a href="?controller=thoi-trang-nu">Thời trang nữ</a></li>
						<li><a href="?controller=phu-kien">Phụ kiện</a></li>
						<?php if(isset($_SESSION['user'])){
							if($_SESSION['user']['level']==2){
								echo '<li><a href="?controller=admin">Quản lý</a></li>';
							}else{
								echo '<li><a href="?controller=gioi-thieu">Giới thiệu</a></li>';
							}
							}else{
								echo '<li><a href="?controller=gioi-thieu">Giới thiệu</a></li>';
						} ?>
						<li><a href="?controller=tai-khoan">Tài khoản</a></li>
						<li><a href="?controller=lien-he">Liên hệ</a></li>
					</ul>
				</div>
				<div class="col-md-1" >
						<div id="cart">
							<?php if(isset($_SESSION['cart'])){
								echo "<span id='count'>".count($_SESSION['cart'])."</span>";
							} else{
								echo "<span id='count'>0</span>";
							}
							?>
							<div id="cart-item">
								<?php $total = 0; ?>
								<?php if(isset($_SESSION['cart'])){ ?>
									<?php if(count($_SESSION['cart'])>0){ ?>
										<?php foreach ($_SESSION['cart'] as $key => $value): ?>
										<div class="item temp">
											<div class="">
												<img src="<?=$value['img']?>" width="50px">
											</div>
											<div class="content">
												<p><?=$value['name']?></p>
												<p><?=$value['number']?><span> × </span><span class="money"><?=number_format($value['price'])?></span><span> ₫</span></p>
											</div>
											<div >
												<span style="cursor: pointer;" onclick="delete_cart(<?=$key?>);" ><i class="fas fa-trash-alt"></i></span>
											</div>
										</div>
										<?php $total += $value['number'] * $value['price']?>
									<?php endforeach ?>
									<div class="item ">
										<h6>Tổng tiền : <span id="total"><?=number_format($total)?></span><span> ₫</span></h6>
									</div>
									<div class="item btn">
										<a href="?controller=gio-hang">Xem giỏ hàng</a>
										<a href="?controller=dat-hang">Đặt hàng </a>
									</div>
									<?php }else { echo "Giỏ hàng trống "; }?>
								<?php } else { echo "Giỏ hàng trống "; }?>
							</div>
						</div>
				</div>
			</div>
		</div>
	</header>