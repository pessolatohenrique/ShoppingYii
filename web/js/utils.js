function alteraIconePainel(link){
	var icone = link.find("i");
	if(icone.hasClass("fa-caret-down")){
		icone.removeClass("fa-caret-down");
		icone.addClass("fa-caret-up");
	}else{
		icone.removeClass("fa-caret-up");
		icone.addClass("fa-caret-down");
	}
}
/*minimiza o painel com efeito em jQuery se slidedown*/
function minimizaPainel(link,flagBootstrap){
	var painel_heading = link.parent();
	var classe = ".panel-body";
	if(flagBootstrap == false){
		classe = ".painel_corpo";
	}
	var painel_body = painel_heading.siblings(classe);
	console.log(painel_body);
	painel_body.slideToggle(800);
	alteraIconePainel(link);
}
function adicionaItemCombo(seletor,texto,valor){
	$(seletor).append($("<option>").text(texto).val(valor));
}
function verificaConfirm(mensagem,link,tipo_acao){
	var resp = window.confirm(mensagem);
	if(resp == 1){
		switch(tipo_acao){
			case 'form': $(link).parent().submit();break;
		}
	}
}
function excluiLinhaTabela(linha){
	$(linha).fadeOut(600,function(){
		$(linha).remove();
	});
}
$(".linkConfirmForm").on("click",function(event){
	event.preventDefault();
	var mensagem = "Deseja realmente executar esta ação?";
	var link = $(this);
	var tipo = "form";
	verificaConfirm(mensagem,link,tipo);
});