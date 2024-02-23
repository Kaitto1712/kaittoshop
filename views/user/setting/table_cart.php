	<?php session_start(); ?>
	<?php if(isset($_SESSION['cart'])){
		echo "<span id='count'>".count($_SESSION['cart'])."</span>";
	} else{
		echo "<span id='count'>0</span>";
	}
	?>
	<div id="cart-item">
		<?php $total = 0; ?>
		<?php if(isset($_SESSION['cart'])): ?>
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
						<span onclick="delete_cart();" ><i class="fas fa-trash-alt"></i></span>
					</div>
				</div>
				<?php $total += $value['number'] * $value['price']?>
			<?php endforeach ?>
		<?php endif ?>
		<div class="item ">
			<h6>Tổng tiền : <span id="total"><?=number_format($total)?></span><span>₫</span></h6>
		</div>
		<div class="item btn">
			<a href="?controller=gio-hang">Xem giỏ hàng</a>
			<a href="">Đặt hàng </a>
		</div>
	</div>