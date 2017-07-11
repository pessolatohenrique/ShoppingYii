function adicionaDiretor(nome){
	var action = "index.php?r=diretor/create";
	var params = {"nome":nome};
	$.post(action,params,function(data){
		var insert_id = data;
		if(insert_id == "0"){
			alert("O diretor já existe na base de dados! Escolha outro diretor e tente novamente");
		}else{
			adicionaItemCombo("#diretor",nome,insert_id);
		}
		$("#addDiretor").modal('hide');
	}).error(function(){
		alert("Erro ao realizar requisição. Contate o desenvolvedor!");
	});
}
function mainDiretor(){
	$("#btn_add_diretor").on("click",function(event){
		var nome = $("#diretor_dialog").val();
		if(nome != ""){
			adicionaDiretor(nome);	
		}else{
			validaCampo("#diretor_dialog","diretor");
		}
		
	})
}
$(document).ready(function(){
	mainDiretor();
})