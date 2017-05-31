$(function() {
	$(".section-button-details").click(function() {
		console.log("dupa")
		console.log($(this).parent().children(".section-more").css( "border", "1px solid red" ));
		$(this).parent().children(".section-more").children("img").toggleClass("hidden")
	});
});
