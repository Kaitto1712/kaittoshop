	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="show">
					<h3>Về chúng tôi</h3>
					<ul>
						<li><a href="?controller=trang-chu">Trang chủ</a></li>
						<li><a href="?controller=gioi-thieu">Giới thiệu</a></li>
						<li><a href="?controller=tai-khoan">Tài khoản</a></li>
						<li><a href="?controller=lien-he">Liên hệ</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-3">
				<div class="show">
					<h3>Thời Trang Nam</h3>
					<ul>
						<?php foreach ($catalog_nam as $key => $value) :?>
							<li><a href="?controller=thoi-trang-nam"><?=$value['name']?></a></li>
						<?php endforeach ?>
					</ul>
				</div>
			</div>
			<div class="col-md-3">
				<div class="show">
					<h3>Thời Trang Nữ</h3>
					<ul>
						<?php foreach ($catalog_nu as $key => $value) :?>
							<li><a href="?controller=thoi-trang-nu"><?=$value['name']?></a></li>
						<?php endforeach ?>
					</ul>
				</div>
			</div>
			<div class="col-md-3">
				<div class="show">
					<h3>Phụ kiện</h3>
					<ul>
						<?php foreach ($catalog_phukien as $key => $value) :?>
							<li><a href="?controller=phu-kien"><?=$value['name']?></a></li>
						<?php endforeach ?>
					</ul>
				</div>
			</div>
		</div>
	</div>


