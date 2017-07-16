function vinculaAtorFilme(ator){
	var action = "index.php?r=ator_filme/create";
	var params = {"ator":ator};
	$.post(action,params,function(data){
		var lista_atores = data;
		lista_atores = lista_atores.replace('"','');
		lista_atores = lista_atores.replace('"','');
		lista_atores = lista_atores.trim();
		$(".label-atores").text(lista_atores);
		$("#addAtor").modal('hide');
	}).error(function(){
		alert("Erro ao realizar requisição. Contate o desenvolvedor!")
	})
}
function excluiAtorFilme(filme_id,ator_id,linha){
	var action = "index.php?r=ator_filme/delete";
	var params = {"filme_id":filme_id,"ator_id":ator_id};
	$.post(action,params,function(data){
		excluiLinhaTabela(linha);
	}).error(function(){
		alert("Erro ao realizar requisição. Contate o desenvolvedor!");
	})
}
function mainAtores(){
	$("#btn_add_ator").on("click",function(){
		var atorObj = {
			"filme_id": $("#filme_id").val(),
			"nome": $("#ator_dialog").val(),
			"personagem": $("#personagem_dialog").val() 
		}
		vinculaAtorFilme(atorObj);
	});
	$(".link_exclui_ator").on("click",function(event){
		event.preventDefault();
		var filme_id = $("#filme_id").val();
		var linha = $(this).parent().parent();
		var ator_id = $(linha).find(".ator_id").val();
		excluiAtorFilme(filme_id,ator_id,linha);
	})
}
$(document).ready(function(){
	mainAtores();
})