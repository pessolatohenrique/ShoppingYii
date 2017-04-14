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
/*realiza uma requisição AJAX salvando dados no servidor PHP.
Salva na tabela cardapiotipo_gastronomia o ID da loja Gastronomica e o ID do cardapioTipo*/
function addTipoCardapioServidor(combo){
	var cardapioTipo_id = combo.val();
	var gastronomia_id = $("#gastronomia_id").val();
	var action = $("#urlForm").val()+"/index.php?r=gastronomia/adiciona_tipo_gastronomia";
	var dados = {"cardapio_id":cardapioTipo_id,"gastronomia_id":gastronomia_id};
	$.post(action,dados,function(data){
		console.log("Deu certo");
	})
	.error(function(){
		alert("Erro ao realizar requisição. Contate o desenvolvedor!");
	});
}
/*adiciona um tipo de cardápio na tela do usuário.
Exemplos de tipos de cardápio: doces, salgados, etc.*/
function adicionaTipoCardapio(combo){
	$("#tipo_cardapio_form").parent().find("span").remove();
	var value = combo.val();
	var text = combo.text();
	var paineisExistentes = $(".linhaCardapio").find(".col-md-12");
	var existePainel = false;
	$.each(paineisExistentes,function(key,val){
		var itemVerifica = $(val).find(".panel-heading > .tituloCardapio").text();
		if(itemVerifica == text){
			existePainel = true;
		}
	});
	if(value != "" && existePainel != true){
		var ul = $("<ul>");
		var spanTitulo = $("<span>").addClass("tituloCardapio").text(text);
		var panelBody = $("<div>").addClass("panel-body");
		var panelHeading = $("<div>").addClass("panel-heading");
		var panel = $("<div>").addClass("panel").addClass("panel-primary");
		var col = $("<div>").addClass("col-md-12");
		panelHeading.append(spanTitulo);
		panelBody.append(ul);
		panel.append(panelHeading);
		panel.append(panelBody);
		col.append(panel);
		$(".linhaCardapio").prepend(col);
		addTipoCardapioServidor(combo);
	}
	if(existePainel == true){
		$("#tipo_cardapio_form").addClass("field-error");
		$("#tipo_cardapio_form").parent().append($("<span>").text("Tipo de cardápio já existente!"))
			.addClass("text-error");
	}
}
/*realiza uma requisição AJAX salvando os dados de um item no servidor.
Exemplos de um item: café, brigadeiro, coxinha, etc.*/
function addItemServidor(item,painel){
	var gastronomia_id = $("#gastronomia_id").val();
	var cardapio_id = painel.find("#tipo_cardapio_id").val();
	var action = $("#urlForm").val()+"/index.php?r=gastronomia/adiciona_item";
	var dados = {"gastronomia_id":gastronomia_id,
		"cardapio_id":cardapio_id, "item":item
	};
	$.post(action,dados,function(data){
		console.log("Deu certo");
	}).
	error(function(){
		alert("Erro ao adicionar item. Contate o desenvolvedor!");
	});
}
/*mostra as gastronomias pesquisadas*/
function mostraGastronomias(vetor){
	$(".painel_itens").remove();
	var painel_itens = $("<section>").addClass("painel_itens");
	$.each(vetor,function(key,val){
		var descricaoCurta = val.descricao.substr(0,50);
		var listaUL = $("<ul>").addClass("itemPainel");
		var itemGeral = $("<li>");
		var tituloLoja = $("<h4>");
		var linkTituloLoja = $("<a>").attr("href","#").text(val.nome_loja);
		var listaUL_encadeada = $("<ul>");
		var itemDescricao = $("<li>").text(descricaoCurta);
		var itemCategoria = $("<li>");
		var itemLocalizacao = $("<li>").text(val.localizacao);
		var spanCategoria = $("<span>").addClass("categoriaItem").text(val.categoria_nome);
		itemCategoria.append(spanCategoria);
		listaUL_encadeada.append(itemDescricao);
		listaUL_encadeada.append(itemCategoria);
		listaUL_encadeada.append(itemLocalizacao);
		tituloLoja.append(linkTituloLoja);
		itemGeral.append(tituloLoja);
		itemGeral.append(listaUL_encadeada);
		listaUL.append(itemGeral);
		painel_itens.append(listaUL);	
	});
	$("div.container").append(painel_itens);	
}
/*altera o layout dos links para categoria selecionada*/
function formataEstiloLink(link){
	$(".linkPesquisaCategoria").removeClass("itemDestaque");
	$(".linkPesquisaCategoria").css("color","#848c94");
	$(link).addClass("itemDestaque");
	$(link).css("color","#008B45");
}
/*busca gastronomias que pertencem a uma determinada categoria.
Exemplo: todas as lojas gastronomicas com a categoria "Cafeteria"*/
function buscaGastronomiaServidor(link){
	formataEstiloLink(link);
	var gastronomia_id = link.siblings(".categoria_id").val();
	var action = $("#urlForm").val()+"/index.php?r=gastronomia/busca_por_categoria&categoria_id="+gastronomia_id;
	$.getJSON(action,{},function(data){
		mostraGastronomias(data);
	})
	.error(function(){
		alert("Erro ao pesquisar lojas. Contate o desenvolvedor!");
	})
}
/*realiza a busca de uma gastronomia por seu nome, em estilo LIKE.
Exemplo: todas as lojas gastronomicas com a palavra "Café"*/
function buscaPorNomeServidor(nome_loja){
	var action = $("#urlForm").val()+"/index.php?r=gastronomia/busca_por_nome&loja="+nome_loja;
	$.getJSON(action,{},function(data){
		mostraGastronomias(data);
	})
	.error(function(){
		alert("Erro ao pesquisar lojas. Contate o desenvolvedor!");
	});
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
	addItemServidor(item,painel);
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
	$(".linkPesquisaCategoria").on("click",function(event){
		event.preventDefault();
		var link = $(this);
		buscaGastronomiaServidor(link);
	});
	$("#pesquisaGastro").on("keyup",function(){
		var palavra = $(this).val();
		buscaPorNomeServidor(palavra);
	});
}
$(document).ready(function(){
	ajustaLayoutPreco();
	disparaEventos();
});