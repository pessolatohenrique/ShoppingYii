function adicionaEstudio(descricao){
	var action = "index.php?r=distribuidora/create";
	var params = {"descricao":descricao};
	$.post(action,params,function(data){
		var insert_id = data;
		if(insert_id == "0"){
			alert("O estúdio já existe na base de dados! Escolha outro estúdio e tente novamente");
		}else{
			adicionaItemCombo("#estudio",descricao,insert_id);
		}
		$("#addEstudio").modal('hide');
	}).error(function(){
		alert("Erro ao realizar requisição. Contate o desenvolvedor!");
	});
}
function mainDistribuidora(){
	$("#btn_add_estudio").on("click",function(event){
		var descricao = $("#estudio_dialog").val();
		if(descricao != ""){
			adicionaEstudio(descricao);	
		}else{
			validaCampo("#estudio_dialog","estúdio");
		}
		
	})
}
$(document).ready(function(){
	mainDistribuidora();
})