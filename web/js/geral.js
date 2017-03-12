function enviaFormularioPorLink(formulario){
	$(".linkExcluir").on("click",function(event){
		var formulario_id = $(this).parent().parent().parent().find("form").attr("id");
		event.preventDefault();
		document.getElementById(formulario_id).submit();
	})
}
$(document).ready(function(){
	
	enviaFormularioPorLink();
});