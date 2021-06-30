(function($){
	$("#btnLogin").on("click",function(){
		console.log("whut");
		$(location).attr('href',location.origin+"/r2n/main_c/dashboard");
	});

})(jQuery);