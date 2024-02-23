load_user();
add_user();
function load_user(){
	$.ajax({
		url : "?controller=admin-ajax&action=select_user",
		method:"get",
		dataType:"json",

	}).done(function(data){
		let employee ="";
		let i =1;
		$.each(data,function(key,value){
			let level = value.level == 1?"Khách hàng" : "Admin";
			employee +="<tr>";
			employee +="<td>"+i+"</td>";
			employee +="<td>"+value.username+"</td>";
			employee +="<td>"+pass(value.password)+"</td>";
			employee +="<td>"+value.fullname+"</td>";
			employee +="<td>"+value.email+"</td>";
			employee +="<td>"+value.address+"</td>";
			employee +="<td>"+value.phone+"</td>";
			employee +="<td>"+level+"</td>";
			employee +="<td><button class='btn btn-danger btn-delete-user' data='"+value.id+"'>Xoá</button></td>";
			employee +="<td><button class='btn btn-success btn-update-user' data='"+value.id+"'>Sửa</button></td>";
			employee +="<tr>";
			i++;
			
		});
		$("#show_user").html(employee);
	});
}

function pass(string){
	let number = string.length;
	let data ="";
	for(let i=0;i<number;i++){
		data+="*";
	}
	return data;
}

$(document).on("click",".btn-delete-user",function(){
	let id = $(this).attr('data');
	let r = confirm("Bạn có chắc chắn muốn xoá");
	if (r == true) {
		$.ajax({
			url :"?controller=admin-ajax&action=delete_user",
			method:"post",
			data :{id:id}
		}).done(function(data){
			load_user();
		});
	}
	
});



function show_add_user(){
	$("#add_user_modal").modal('show');
	$("#alert_username").html("");
	$("#add_user")[0].reset();
}
function show_update_user(){

	
}


function add_user(){
	var temp = true;
	var temp2 = true;
	$("#username_acount").blur(function(){
		let user = $("#username_acount").val();
		$.ajax({
			url :"?controller=admin-ajax&action=check-user",
			method:"post",
			data :{user:user}


		}).done(function(data){
			if(data==0){
				$("#alert_username").html("<p class='text-danger'><strong><i class=\"fas fa-exclamation-triangle\"></i></strong> Tài khoản đã tồn tại</p>");
				temp = false;
			}else{
				$("#alert_user").html("");
				$("#alert_username").html("<p class='text-success'><strong><i class=\"fas fa-check\"></i></strong> Tài khoản có thể sử dụng</p>");
				temp =true;
			}
		});

	});
	$("#pass2").blur(function(){
		let pass1 = $("#pass1").val();
		let pass2 = $("#pass2").val();
		if(pass1!=pass2){
			$("#alert_pass").html("<p class='text-danger'><strong><i class=\"fas fa-exclamation-triangle\"></i></strong> Nhập lại mật khẩu không đúng</p>");
			temp2=false;
		}else{
			$("#alert_pass").html("");
			temp2=true;
		}
	});

	$("#add_user").on("submit",function(e){
		e.preventDefault();
		if(temp==false||temp2==false){
			$("#alert_user").html("<div class=\"alert alert-danger\"><strong><i class=\"fas fa-exclamation-triangle\"></i></strong> Kiểm tra lại tài khoản </div>");
		}else{
			$("#alert_user").html("");
			$.ajax({
				url :"?controller=admin-ajax&action=add_user",
				method:"post",
				data :new FormData(this),
				contentType:false,
				processData:false
			}).done(function(data){

				swal("Thông báo!", "Thêm mới người dùng thành công!", "success");
				$("#alert_username").html("");
				$("#add_user")[0].reset();
				load_user();
			});
		}
	});
}




$(document).on("click",".btn-update-user",function(){
	$("#update_user_modal").modal('show');
	let id = $(this).attr('data');
	
	$.ajax({
		url :"?controller=admin-ajax&action=select_user_id",
		method:"post",
		data :{id:id},
	}).done(function(data){
		let myObj = JSON.parse(data);
		$("#username_update").val(myObj[0].username);
		$("#pass_update").val(myObj[0].password);
		$("#name_update").val(myObj[0].fullname);
		$("#phone_update").val(myObj[0].phone);
		$("#mail_update").val(myObj[0].email);
		$("#address_update").val(myObj[0].address);
		if(myObj[0].level==1){
			 $("#kh_update").prop("checked", true);
		}else{
			 $("#admin_update").prop("checked", true);
		}

	});


	$("#update_user").on("submit",function(e){
			e.preventDefault();
			var data =new FormData(this);
			data.append("id",id);
			$.ajax({
				url :"?controller=admin-ajax&action=update_user_id",
				method:"post",
				data :data,
				contentType:false,
				processData:false
			}).done(function(data){

				swal("Thông báo!", "Sửa thành công!", "success");
				$("#update_user_modal").modal('hide');
				$("#update_user")[0].reset();
				load_user();
			});
		
	});

	
});

