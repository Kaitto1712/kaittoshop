var add = true;
function formatNumber(num) {
  return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}
function delete_cart(id){
	$.ajax({
    type: "POST",
    url: '?controller=gio-hang&action=delete_cart&id='+id,
    success: function () {
     	$("#cart").load("views/user/setting/table_cart.php");
     	location.reload();
    }
  });
}
$(document).ready(function(){
	var str = $(".money").text();
	var array = $('.money').map(function(){
		return parseInt($.trim($(this).text().replace(",", "")));
	}).get();
	var sum = array. reduce(function(a, b){
		return a + b;
	}, 0);
	$("#count").click(function(){
		if(add==true){
			$("#count + div").addClass("active");
			add=!add;
		}else{
			$("#count + div").removeClass("active");
			add=!add;
		}
	});
});
//load all product
var page =1;
var temp = true;
var types = 'default';
var url = window.location.href;
var action = url.split("controller=");
	$.ajax({
		url: '?controller=ajax&action='+action[1]+'&page='+page,
		type: 'GET',
		dataType: 'html',
	}).done(function(ketqua) {
		$('#contents').html(ketqua);
	});
	$("#option").on("change",function(){
		 types = this.value;
		page = 1;
		$.ajax({
			url: '?controller=ajax&action='+action[1]+'&type='+this.value+'&page='+page,
			type: 'GET',
			dataType: 'html',
		}).done(function(ketqua) {
			$('#contents').html(ketqua);
		});
	});
$("#show_product").on("click",function(){
	page ++;
	$.ajax({
		url: '?controller=ajax&action='+action[1]+'&type='+types+'&page='+page,
		type: 'GET',
		dataType: 'html',
	}).done(function(ketqua) {
		$('#contents').append(ketqua);
	});
});
$.ajax({
		url:'?controller=ajax&action=product-new',
		type:'GET',
		dataType:'html'
}).done(function($ketqua){
		$("#vip").html($ketqua);
});