/*ajusta o layout de onde o campo preço irá ficar na tela.
Exemplo de funcionamento em http://localhost/Projetos/ShoppingYii/web/index.php?r=gastronomia/view&id=23*/
function ajustaLayoutPreco(){
	var cardapio_item = $(".cardapio_gastronomia").find("li");
	$.each(cardapio_item,function(key,val){
		var tamNomeItem = $(val).find(".item_cardapio").text().length;
		var tamDescricaoItem = $(val).find(".descricao_cardapio").text().length;
		var total = tamNomeItem + tamDescricaoItem + 1;
		// console.log(total);
	});
}
function adicionaTipoCardapio(combo){
	$("#tipo_cardapio_form").parent().find("span").remove();
	var value = combo.val();
	var text = combo.text();
	var paineisExistentes = $(".linhaCardapio").find(".col-md-12");
	var existePainel = false;
	$.each(paineisExistentes,function(key,val){
		var itemVerifica = $(val).find(".panel-heading > .tituloCardapio").text();
		console.log(itemVerifica);
		if(itemVerifica == text){
			existePainel = true;
		}
	});
	if(value != "" && existePainel != true){
		var ul = $("<ul>");
		// var linkHeading = $("<a>").attr("href","#").addClass("addItem").text(" Adicionar Item");
		// var iconeHeading = $("<i>").addClass("fa").addClass("fa-plus").attr("aria-hidden","true");
		var spanTitulo = $("<span>").addClass("tituloCardapio").text(text);
		var panelBody = $("<div>").addClass("panel-body");
		var panelHeading = $("<div>").addClass("panel-heading");
		var panel = $("<div>").addClass("panel").addClass("panel-primary");
		var col = $("<div>").addClass("col-md-12");
		// linkHeading.prepend(iconeHeading);
		// panelHeading.append(linkHeading);
		panelHeading.append(spanTitulo);
		panelBody.append(ul);
		panel.append(panelHeading);
		panel.append(panelBody);
		col.append(panel);
		$(".linhaCardapio").prepend(col);
	}
	if(existePainel == true){
		$("#tipo_cardapio_form").addClass("field-error");
		$("#tipo_cardapio_form").parent().append($("<span>").text("Tipo de cardápio já existente!"))
			.addClass("text-error");
	}
}
/*mostra a dialog de itens, utilizando efeito de overlay*/
function mostraDialogItem(){
	$(".itemDialog").css("display","block");
	$(".itemDialog").addClass("display");
	$(".itemDialog").addClass("bannerDialog");
}
/*adiciona dinamicamente um item ao painel, a princípio de modo visual*/
function adicionaItemPainel(painel){
	var item = {
		"nome": $("#nome_item").val(),
		"descricao": $("#descricao_item").val(),
		"preco": $("#preco_item").val()
	};
	var listaHTML = painel.find(".panel-body").find("ul");
	var spanItem = $("<span>").addClass("item_cardapio").text(item.nome + " - ");
	var spanDescricao = $("<span>").addClass("descricao_cardapio").text(item.descricao);
	var spanPreco = $("<span>").addClass("precoCardapio").text("R$ " + item.preco);
	var itemHTML = $("<li>");
	itemHTML.append(spanItem);
	itemHTML.append(spanDescricao);
	itemHTML.append(spanPreco);
	listaHTML.append(itemHTML);
	limpaFormulario();
}
function limpaFormulario(){
	$("#nome_item").val("");
	$("#descricao_item").val("");
	$("#preco_item").val("");
}
/*centraliza todos os eventos desta página*/
function disparaEventos(){
	var painel = "";
	$(".adicionaTipoCardapio").on("click",function(){
		var combo = $("#tipo_cardapio_form option:selected");
		adicionaTipoCardapio(combo);
	});
	$("#tipo_cardapio_form").on("change",function(){
		$("#tipo_cardapio_form").parent().find("span").remove();
	});
	$(".addItem").on("click",function(event){
		event.preventDefault();
		mostraDialogItem();
		painel = $(this).parent().parent();
	});
	$(".adicionaItem").on("click",function(){
		var anuncio = $("body").find(".dialog");
		anuncio.removeClass("display");
		anuncio.removeClass("bannerDialog");
		anuncio.css("display","none");
		adicionaItemPainel(painel);
	});
}
$(document).ready(function(){
	ajustaLayoutPreco();
	disparaEventos();
});