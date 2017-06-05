$(function() {
	$(".section-button-details").click(function() {
		console.log("--DBG-- Details");
		$(this).parent().parent().find(".section-more").toggleClass("hidden");
	});
	$(".section-button-toggle").click(function() {
		var relay = $(this).parent().parent().attr("id");
		relay = relay.substr(relay.lastIndexOf("-") + 1);
		console.log("--DBG-- Toggle " + relay);
		$.post("php/ajax_set.php", {relay: relay}, function(data) {
			console.log("--DBG-- Toggle returned '" + data + "'");
			refreshField(relay, data);
		});
	});
	function refreshField(index, value) {
		var obj = $("#section-" + index).find(".section-value");
		// Values
		if(index == "pir") {
			if(value == 1) {
				obj.html("Activated");
			} else if(value == 0) {
				obj.html("Quiet");
			} else {
				obj.html("---");
			}
		} else if(index.substr(0, 5) == "relay") {
			if(value == 1) {
				obj.html("On");
			} else if(value == 0) {
				obj.html("Off");
			} else {
				obj.html("---");
			}
		} else {
			if(value == "false") {
				obj.html("---");
			} else {
				obj.html(value);
			}
		}
		// Styles
		if(index == "pir" || index.substr(0, 5) == "relay") {
			if(value == 1) {
				obj.removeClass("section-element-red");
				obj.removeClass("section-element-yellow");
				obj.addClass("section-element-green");
			} else if(value == 0) {
				obj.addClass("section-element-red");
				obj.removeClass("section-element-yellow");
				obj.removeClass("section-element-green");
			} else {
				obj.removeClass("section-element-red");
				obj.addClass("section-element-yellow");
				obj.removeClass("section-element-green");
			}
		} else {
			if(value == "false") {
				obj.removeClass("section-element-white");
				obj.addClass("section-element-yellow");
			} else {
				obj.removeClass("section-element-yellow");
				obj.addClass("section-element-white");
			}
		}
	}
	$(".header-refresh").click(function() {
		console.log("--DBG-- Refresh request");
		$.get("php/ajax_get.php", function(data) {
			var dataObj;
			try {
				dataObj = JSON.parse(data);
			} catch(err) {
				dummyJSON = '{"temperature":"false","pressure":"false","pir":-1,"relay1":-1,"relay2":-1,"relay3":-1}';
				dataObj = JSON.parse(dummyJSON);
				console.log("--DBG-- " + err);
			}
			console.log("--DBG-- " + data);
			$.each(dataObj, refreshField);
			console.log("--DBG-- Refresh done");
		});
	});
	$(".header-refresh").click();
});
