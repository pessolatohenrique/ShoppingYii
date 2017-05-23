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
function minimizaPainel(link){
	var painel_heading = link.parent();
	var painel_body = painel_heading.siblings(".panel-body");
	painel_body.slideToggle(800);
	alteraIconePainel(link);
}
function adicionaItemCombo(seletor,texto,valor){
	$(seletor).append($("<option>").text(texto).val(valor));
}