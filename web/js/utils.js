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