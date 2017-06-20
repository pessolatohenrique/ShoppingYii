function excluiFilmeServidor(filme_id,link){
	var resp = window.confirm("Deseja realmente excluir este filme?");
	var action = "index.php?r=filme/delete";
	var dados = {"filme_id":filme_id};
	if(resp == 1){
		$.post(action,dados,function(data){
			var linha = $(link).parent().parent();
			excluiLinhaTabela(linha);
		})
	}
}
function mainFilmes(){
	$(".link_exclui_filme").on("click",function(event){
		event.preventDefault();
		var filme_id = $(this).find(".filme_id").val();
		var link = $(this);
		excluiFilmeServidor(filme_id,link);
		
	})
}
$(document).ready(function(){
	mainFilmes();
})