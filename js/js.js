/**
 * @author Mohamed
 */
$(document).ready(function(){
	
	 footer_bottom();
	 function footer_bottom(){
	 	var height= $(window).height();
	 	$("footer").css('top', height-$("footer").height()-10);
	 }
	 $(window).bind('resize',footer_bottom);

	 
	 $(".song h1").css('left', 345-$(".song h1").width()/2);
	 $(".down_btn").css('left', 320-$(".down_btn").width()/2);

	 // $('.process_btn').click(function(){
	 // 	$('.data').show('top');
	 // 	$('.data').html("loading");
	 // 	var url = $('.url_text').val();
	 // 	var type = ("[name='type']:checked").val();
	 // 	$.ajax({  
		//  type: "POST",
		//  url: "get.php", 
		//  data: "url="+ url+"&n=1&type="+type,  
		//  success: function(server_response){

		// 		alert(server_response);

		// 	 }

		//  });
	

	 // });
	
});