<h5 class="text-center">Đổi mật khẩu</h5>
<form method="post" action="">
	<div class="form-group">
		<label>Mật khẩu cũ</label>
		<input type="password" class="form-control" name="pass"  placeholder="Nhập mật khẩu cũ" required=""/>
	</div>
	<div class="form-group">
		<label>Mật khẩu mới</label>
		<input type="password" class="form-control" name="pass1" placeholder="Nhập mật khẩu mới"  required="" />
	</div>
	<div class="form-group">
		<label>Nhập lại mật khẩu mới</label>
		<input required="" type="password" class="form-control" name="pass2" id="password1"  placeholder="Nhập lại mật khẩu mới ">
	</div>
	<p class=""><?php if(isset($_SESSION['err'])) {echo $_SESSION['err']; unset($_SESSION['err']);} ?></p>
	<button type="submit" name="submit" class="btn btn-info btn-block btn-round">Cập nhật</button>
</form>  