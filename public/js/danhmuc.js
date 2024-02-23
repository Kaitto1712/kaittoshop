function changeDM(dm){
	$.ajax({
		url: '?controller=ajax&action=danh-muc&type='+dm,
		type: 'GET',
		dataType: 'html',

	}).done(function(ketqua) {
		$('#contents').html(ketqua);
	});
}
var url = window.location.href;
var type = url.split("controller=");
$('#seach').on('input',function(){
	let seach = $('#seach').val();
	$.ajax({
		url: '?controller=ajax&action=seach&type='+type[1]+'&key='+seach,
		type: 'GET',
		dataType: 'html',

	}).done(function(ketqua) {
		$('#contents').html(ketqua);
	});
});