$(document).ready(function() {
	var isCellphone = window.matchMedia('screen and (max-width: 626px)').matches;
	$("iframe").attr("width",380);
	$("iframe").attr("height",215);
});