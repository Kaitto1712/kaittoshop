	$.ajax({
		url: '?controller=ajax&action=footer',
		type: 'GET',
		dataType: 'html',

	}).done(function(ketqua) {
		$('#footer').html(ketqua);
	});

var regex=string=>{
	var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;

	if(format.test(string)){
	     return true;
	} else {
	      return false;
	}
}
$("#dangky").on('click',function(){
		var user = $("#user").val();
		var phone = $("#phone").val();
		var pass = $("#pass").val();
		var pass2 = $("#pass2").val();
		var name = $("#name").val();
		var address = $("#address").val();
		if(user==''||phone==''||pass==''||pass2==''||name==''||address==''){
			$("#alert").html("<div class='alert alert-danger mt-3'><strong>Thông báo!</strong> Các trường không được để trống</div>");

		}else{
			if(regex(user)||regex(phone)||regex(pass)||regex(pass2)||regex(name)||regex(address)){
				$("#alert").html("<div class='alert alert-danger mt-3'><strong>Thông báo!</strong>Vui lòng không có ký tự đặc biệt </div>");
			}else{
				if(pass!=pass2){
					$("#alert").html("<div class='alert alert-danger mt-3'><strong>Thông báo!</strong> Nhập lại mật khẩu không đúng.</div>");
				}else{
					$.ajax({
						url:'?controller=ajax&action=dang-ky',
						method : 'POST',
						dataType: 'html',
						data: {
							user: user,
							phone: phone,
							pass :pass,
							name:name,
							address:address
						}
					}).done(function(ketqua){
						$("#user").val('');
						$("#phone").val('');
						$("#pass").val('');
						$("#pass2").val('');
						$("#name").val('');
						$("#address").val('');
						$("#alert").html(ketqua);
					});
				}
			}
		}
	});