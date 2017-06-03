$(function() {
	$(".section-button-details").click(function() {
		console.log("--DBG-- Details");
		$(this).parent().parent().find(".section-more").toggleClass("hidden");
	});
	$(".section-button-toggle").click(function() {
		var relay = $(this).parent().parent().attr("id");
		relay = relay.substring(relay.lastIndexOf("-") + 1);
		console.log("--DBG-- Toggle " + relay);
	});
	function refreshField(index, value) {
		var obj = $("#section-" + index).find(".section-value");
		if(index == "pir") {
			if(value == 1) {
				obj.html("Activated");
			} else {
				obj.html("Quiet");
			}
		} else if(index.substring(0, 5) == "relay") {
			if(value == 1) {
				obj.html("On");
			} else {
				obj.html("Off");
			}
		} else {
			obj.html(value);
		}
		if(index == "pir" || index.substring(0, 5) == "relay") {
			obj.removeClass("section-element-yellow");
			if(value == 1) {
				obj.addClass("section-element-green");
				obj.removeClass("section-element-red");
			} else {
				obj.addClass("section-element-red");
				obj.removeClass("section-element-green");
			}
		} else {
			obj.removeClass("section-element-yellow");
			obj.addClass("section-element-white");
		}
	}
	$(".header-refresh").click(function() {
		console.log("--DBG-- Refresh request");
		$.get("php/ajax_get.php", function(data) {
			dataObj = JSON.parse(data);
			console.log(dataObj);
			$.each(dataObj, refreshField);
			console.log("--DBG-- Refresh done");
		});
	});
	$(".header-refresh").click();
});
