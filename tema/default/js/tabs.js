$(document).ready(function(){
	$(".menu > li").click(function(){
		var obj = $(this).attr("id");
		$(this).addClass("active").siblings('li').removeClass("active");
		$('.'+obj).show().siblings('div').hide();
	});					   
});