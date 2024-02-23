load_catalog();
add_catalog_ajax();
function load_catalog(){
	$.ajax({
		url : "?controller=admin-ajax&action=show_all_catalog",
		method:"get",
		dataType:"html",

	}).done(function(data){
		$("#show_catalog").append(data);
	});
}
function add_catalog(){
	$("#add_catalog_modal").modal('show');
}

function add_catalog_ajax(){
	$("#add_catalog_modal").on("submit",function(e){
		var id = $("#update_product")[0].elements[0].value;
		var catalog = $("#update_product")[0].elements[1].value;
		e.preventDefault();
		if(id =='dafault'){
			$("#alert").html("<div class='alert alert-danger'><strong>Lỗi !</strong> Vui lòng lựa chọn thời trang .</div>");
		}else{
			$.ajax({
				url : "?controller=admin-ajax&action=add_catalog",
				method:"post",
				data:{id:id,catalog:catalog}
			}).done(function(data){
				$("#alert").html(data);
				setTimeout(function(){
					location.reload();
				}, 1000);
			});
		}

	});
}
$(document).on("click",".btn_delete_catalog",function(){
	let id = $(this).attr('data');
	let r = confirm("Bạn có chắc chắn muốn xoá");
	if (r == true) {
		$.ajax({
			url :"?controller=admin-ajax&action=delete_catalog",
			method:"post",
			data :{id:id}
		}).done(function(data){
			location.reload();
		});
	}
	
});
$(document).on("click",".btn_update_catalog",function(){
	$("#edit_catalog_modal").modal('show');
	let id = $(this).attr('data');
	$.ajax({
			url :"?controller=admin-ajax&action=show_catalog_id",
			method:"post",
			data :{id:id}
		}).done(function(data){
			$("#maDM").html(id);
			let myObj = JSON.parse(data);
			$("#update_name").val(myObj[0].name);
			$('#update_thoitrang option:contains('+myObj[0].name_paren+')').prop('selected',true);
			
		});


		$("#update_catalog").on("submit",function(e){
			e.preventDefault();
			let data = new FormData(this);
			data.append("id",id);
			$.ajax({
			url :"?controller=admin-ajax&action=update_catalog",
			method:"post",
			data : data,
			contentType:false,
          	processData:false
			}).done(function(data){
				$("#alert_catalog").html(data);
          	setTimeout(function(){
          		location.reload();
          	}, 1000);
			});
		});
	
});
