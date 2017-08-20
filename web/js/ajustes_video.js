$(document).ready(function() {
	var isCellphone = window.matchMedia('screen and (max-width: 626px)').matches;
	if(isCellphone){
		$("iframe").attr("width",380);
		$("iframe").attr("height",215);
	}
});