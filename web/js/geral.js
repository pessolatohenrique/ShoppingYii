function enviaFormularioPorLink(formulario){
	$(".linkExcluir").on("click",function(event){
		var formulario_id = $(this).parent().parent().parent().find("form").attr("id");
		event.preventDefault();
		document.getElementById(formulario_id).submit();
	})
}
function fecharDialog(){
	$(".fecharDialog").on("click",function(){
		var anuncio = $("body").find(".dialog");
		anuncio.fadeOut(1200,function(){
			anuncio.removeClass("display");
			anuncio.removeClass("bannerDialog");
		});
	});
}
$(document).ready(function(){
	enviaFormularioPorLink();
	fecharDialog();
});