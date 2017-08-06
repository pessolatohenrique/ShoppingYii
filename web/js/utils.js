/**
	exibe ou oculta uma lista de acordo com os parâmetros fornecidos
	Exemplo de uso: categorias para versão mobile
	*@param seletor: seletor referente à lista, enviar com caractere identificador (puro, #, ou .)
	*@param botao: botao que dispara o evento
*/
function exibeLista(seletor,botao){
	var estado_exibicao = $(seletor).css("display");
	if(estado_exibicao == "none"){
		$(botao).addClass("botao-ativo");
		$(seletor).slideDown("slow","swing",function(){
			$(seletor).css("display","block");
		});
	}else{
		$(botao).removeClass("botao-ativo");
		$(seletor).slideUp("slow","swing",function(){
			$(seletor).css("display","none");
		});
	}
}
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
	$(seletor).prepend($("<option>").text(texto).val(valor));
}
function verificaConfirm(mensagem,link,tipo_acao){
	var resp = window.confirm(mensagem);
	if(resp == 1){
		switch(tipo_acao){
			case 'form': $(link).parent().submit();break;
		}
	}
}
function validaCampo(seletor,campo){
	var form_group = $(seletor).parent();
	var nova_div = $("<div>");
	form_group.find("div.help-block").remove();
	form_group.addClass("has-error");
	form_group.find("label").css("color","#a94442");
	nova_div.addClass("help-block").text("O campo "+campo+" não pode estar vazio");
	form_group.append(nova_div);
}
function excluiLinhaTabela(linha){
	$(linha).fadeOut(600,function(){
		$(linha).remove();
	});
}
function abreMenu(seletor){
	var menuAtivo = $(seletor).hasClass("ativa-menu");
	if(menuAtivo != false){
		$(seletor).removeClass("ativa-menu");
	}else{	
		setTimeout(function(){
			$(seletor).addClass("ativa-menu");
		},100);
	}
}
function fechaMenu(seletor){
	var flagMenu = $(seletor).hasClass("ativa-menu");
	if(flagMenu != false){
		$(seletor).removeClass("ativa-menu");
	}
}
$(".linkConfirmForm").on("click",function(event){
	event.preventDefault();
	var mensagem = "Deseja realmente executar esta ação?";
	var link = $(this);
	var tipo = "form";
	verificaConfirm(mensagem,link,tipo);
});
$(".abre-menu").on("click",function(event){
	var seletor = $(".menu-mobile-lateral");
	abreMenu(seletor);
});
$('html').click(function(event) {
	var seletor = $(".menu-mobile-lateral");
	var elemento_disp = event.target.type;
    fechaMenu(seletor);
});