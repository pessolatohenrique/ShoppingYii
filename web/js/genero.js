function adicionaGenero(descricao){
	var action = "index.php?r=genero/create";
	var params = {"descricao":descricao};
	$.post(action,params,function(data){
		var insert_id = data;
		if(insert_id == "0"){
			alert("O gênero já existe na base de dados! Escolha outro gênero e tente novamente");
		}else{
			adicionaItemCombo("#genero",descricao,insert_id);
		}
		$("#addGenero").modal('hide');
	}).error(function(){
		alert("Erro ao realizar requisição. Contate o desenvolvedor!");
	});
}
function mainGenero(){
	$("#btn_add_genero").on("click",function(event){
		var descricao = $("#genero_dialog").val();
		if(descricao != ""){
			adicionaGenero(descricao);	
		}else{
			validaCampo("#genero_dialog","gênero");
		}
		
	})
}
$(document).ready(function(){
	mainGenero();
})