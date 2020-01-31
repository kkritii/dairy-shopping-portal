//console.log("Its Working");
$(document).ready(function () {
	//Loads initial index.html
	$("#content").load("../src/main.html");
	//handle menu click
	$(".nav__links").click(function () {
		//load content without refreshing
		var page = $(this).attr("href");
		// console.log("hello");
		$("#content").load("../src/" + page + ".html");
		// console.log(page);
		// to remove the background color in index.html
		if (page != "main") {
			$("#header-background").removeClass("header-background");
		} else {
			$("#header-background").addClass("header-background");
		}

		// if (page == "signin") {
		// 	$(".main-container").addClass("u-justify-flex-end");
		// 	console.log(page);
		// } else {
		// 	$(".main-container").removeClass("u-justify-flex-end");
		// }
		//prevent default href action in links
		return false;
	});
});