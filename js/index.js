$(function() {
	$(".section-button-details").click(function() {
		console.log("--DBG-- Details");
		$(this).parent().parent().find(".section-more").toggleClass("hidden");
	});
	$(".header-refresh").click(function() {
		console.log("--DBG-- Refresh request");
		$.get("php/ajax_get.php", function(data) {
			dataObj = JSON.parse(data);
			console.log(dataObj);
			console.log("--DBG-- Refresh done");
		});
	});
	$(".header-refresh").click();
});
