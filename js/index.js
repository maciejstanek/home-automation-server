$(function() {
	$(".section-button-details").click(function() {
		$(this).parent().parent().find(".section-more").toggleClass("hidden")
	});
	$(".header-refresh").click(function() {
		console.log("refresh");
	});
});
