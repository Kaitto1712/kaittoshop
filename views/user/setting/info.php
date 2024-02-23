<h5 class="text-center">Thông tin cá nhân</h5>
<form method="post">
	<div class="form-group">
		<label>Tên tài khoản</label>
		<input type="text" class="form-control" id="email1" value="<?=$_SESSION['user']['username']?>" disabled>
	</div>
	<div class="form-group">
		<label>Tên</label>
		<input type="text" required name="name" class="form-control" id="password1" value="<?=$_SESSION['user']['fullname']?>">
	</div>
	<div class="form-group">
		<label>Số điện thoại</label>
		<input type="number" required name="phone" class="form-control" value="<?=$_SESSION['user']['phone']?>"  />
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="email" required name="email" class="form-control" id="password1" value="<?=$_SESSION['user']['email']?>">
	</div>
	<div class="form-group">
		<label>Địa chỉ</label>
		<input type="text" required name="address" class="form-control" id="password2" value="<?=$_SESSION['user']['address']?>">
	</div>
	<?php if(isset($_SESSION['sussess'])){echo $_SESSION['sussess'];unset($_SESSION['sussess']);} ?>
	<button type="submit" name="submit" class="btn btn-info btn-block btn-round">Cập nhật</button>
</form>  