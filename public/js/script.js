$(document).ready(function(){
	$('.tile').addClass('zoomInLeft animated slow');
		$(window).scroll(function(event){

			var body = $('html,body').scrollTop();

			var logo = $('.service').offset().top;
			var elementor = $('.styles .style').offset().top;
			
			/*if(body>logo-1000){
		
				$('.service').addClass('slideInLeft animated fast');

			}*/

			aimation(body,logo,'slideInLeft animated fast','.service');
			aimation(body,elementor,'slideInLeft animated fast ','#ef_boy');
			aimation(body,elementor,'slideInRight animated fast','#ef_sr');

		});


		
	});
	


	function aimation(body,selector,class_name,element){
		if(body>selector-1000){
				$(element).addClass(class_name);

			}
	}