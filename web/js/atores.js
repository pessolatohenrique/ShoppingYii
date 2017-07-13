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
function mainAtores(){
	$("#btn_add_ator").on("click",function(){
		var atorObj = {
			"filme_id": $("#filme_id").val(),
			"nome": $("#ator_dialog").val(),
			"personagem": $("#personagem_dialog").val() 
		}
		vinculaAtorFilme(atorObj);
	});
}
$(document).ready(function(){
	mainAtores();
})