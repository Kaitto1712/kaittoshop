add_product_ajax();
 function show(id){
 	$.ajax({
 		url:'?controller=admin-ajax&action=chi-tiet-don-hang&id='+id,
 		method: 'get',
 		dataType:'html',
 	}).done(function(data){
 		$('#modal').html(data);
 		$("#exampleModalCenter").modal('show');
 	});
}
$("#create").on('submit',function(e){
 	e.preventDefault();
});
function  add_product() {
 	$("#mathang").modal('show');
}
function add_product_ajax(){
    CKEDITOR.replace( 'mota' );
    $("#thoitrang").on('change',function(){
        var id = $(this).val();
        $.ajax({
            url : "?controller=admin-ajax&action=danh-sach-catalog&id="+id,
            method:"get",
            dataType:"json",
        }).done(function(data){
            let employee="<option value='null' selected >--Lựa chọn--</option>";  
            $.each(data,function(key,value){
                employee +=" <option value='"+value.id+"'>"+value.name+"</option>";    
            });
            $("#dm").html(employee);
        });
    });
    $("#create_product").on("submit",function(e){
        e.preventDefault();
        for ( instance in CKEDITOR.instances ) {
            CKEDITOR.instances[instance].updateElement();
        }
        var data = new FormData(this);
        $.ajax({
            url :"?controller=admin-ajax&action=add-product",
            method:"post",
            data :data ,
            contentType:false,
            processData:false
        }).done(function(data){
            $("#alert").html(data);
            $("#mathang").modal('hide');
            setTimeout(function(){
                location.reload();
            }, 1000);
        });
    });
}
CKEDITOR.replace( 'mota2');
$("#close2").click(function(){
 	document.querySelector("#update_product").reset();
});
$(document).on("click",".btn_update",function(){
 	var id = $(this).attr('data');     
 	$.ajax({
 		url :"?controller=admin-ajax&action=show_product_id",
 		method:"post",
 		data :{id:id},
 		dataType:"json",
 	}).done(function(data){
 		$.each(data, function(key, value){
 			$.ajax({
 				url :"?controller=admin-ajax&action=select_all_catalog",
 				method:"get",
 				dataType:"json",
 			}).done(function(data){
 				let employee="";  
 				$.each(data,function(key2,value2){
 					employee +=" <option "+(value2.id==value.catalog_id?"selected":"")+"  value='"+value2.id+"' >"+value2.name+"</option>";    
 				});
 				$("#dm2").html(employee);
 			});
 			$("#update_product")[0].elements[2].value = value.price;
 			$("#update_product")[0].elements[1].value = value.name;
 			$("#update_product")[0].elements[3].value = value.discount;
 			$("#update_img")[0].src = value.image_link;
 			$("#update_img1")[0].src = value.image_link1;
 			$("#update_img2")[0].src = value.image_link2;
 			$("#update_img3")[0].src = value.image_link3;
 			CKEDITOR.instances['mota2'].setData(value.describes);
            $("#edit_product").modal('show');
            $("#masp").html(id);
        });
 	});
 	$("#update_product").on("submit",function(e){
 		e.preventDefault();
 		for ( instance in CKEDITOR.instances ) {
 			CKEDITOR.instances[instance].updateElement();
 		}
        var data = new FormData(this);
        data.append('id',id);
          //  data.append('describes', CKEDITOR.instances['describes'].getData());
        $.ajax({
          	url :"?controller=admin-ajax&action=update_product",
          	method:"post",
          	data :data ,
          	contentType:false,
          	processData:false
        }).done(function(data){
          	$("#edit_product").modal('hide');
          	$("#alert").html(data);
          	setTimeout(function(){
          		location.reload();
          	}, 1000);
        });
    });
});
$(document).on("click",".btn_delete",function(){
 	var id = $(this).attr('data');
 	var r = confirm("Bạn có chắc chắn muốn xoá");
 	if (r == true) {
 		$.ajax({
 			url :"?controller=admin-ajax&action=delete_product",
 			method:"post",
 			data :{id:id}
 		}).done(function(data){
 			location.reload();
 		});
 	}
 });