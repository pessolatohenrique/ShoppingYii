/*adiciona no servidor uma categoria para um produto.
Exemplo: "Eletrodoméstico"
Essa categoria será, conforme uso do site, vinculada a uma loja*/
function adicionaCategoriaProduto(categoria_nome){
	var action = "index.php?r=categoria_produto/create";
	var dados = {"categoria_nome":categoria_nome};
	$.post(action,dados,function(data){
		adicionaItemCombo("#categoria_id",categoria_nome,data)
		$("#modalCategoria").modal('hide');
	}).error(function(){
		alert("Erro ao adicionar categoria. Contate o desenvolvedor!");
	})
}
/*adiciona um painel de categoria, dinamicamente via jQuery*/
function adicionaPainelCategoria(){
	var categoria_nome = $("#categoria_id option:selected").text();
	var section = $(".categorias_produtos");
	var panel = $("<div>").addClass("panel").addClass("panel-primary");
	var panel_heading = $("<div>").addClass("panel-heading").text(categoria_nome);
	var panel_body = $("<div>").addClass("panel-body").text("Sem subcategorias vinculadas");
	panel.append(panel_heading);
	panel.append(panel_body);
	section.append(panel);
}
/*realiza a busca de uma gastronomia por seu nome, em estilo LIKE.
Exemplo: todas as lojas gastronomicas com a palavra "Café"*/
function buscaPorNomeServidor(nome_loja){
	var action = "index.php?r=loja/busca_por_nome&loja="+nome_loja;
	$.getJSON(action,{},function(data){
		mostraGastronomias(data);
	})
	.error(function(){
		alert("Erro ao pesquisar lojas. Contate o desenvolvedor!");
	});
}
/*busca lojas que pertencem a uma determinada categoria.
Exemplo: todas as lojas gastronomicas com a categoria "Livraria"*/
function buscaLojaServidor(link){
	formataEstiloLink(link);
	var loja_id = link.siblings(".categoria_id").val();
	var action = "index.php?r=loja/busca_por_categoria&categoria_id="+loja_id;
	$.getJSON(action,{},function(data){
		mostraGastronomias(data);
	})
	.error(function(){
		alert("Erro ao pesquisar lojas. Contate o desenvolvedor!");
	})
}
/**
	*realiza uma requisição para o servidor, vinculando uma categoria a uma loja
	*exemplo: a loja Saraiva terá a categoria "Livros"
	*@param loja_id: ID da loja
	@param categoria_id: ID da categoria
*/
function vinculaLojaCategoria(loja_id,categoria_id){
	var url_ajax = "index.php?r=categoria_produto/vincula_categoria";
	var dados = {"loja_id":loja_id,"categoria_id":categoria_id};
	$.post(url_ajax,dados,function(data){
		adicionaPainelCategoria();
	}).error(function(){
		alert("Erro ao realizar requisição. Contate o desenvolvedor!");
	})
}
/**
	exclui o vínculo entre loja e categoria.
	*Exemplo: a loja Saraiva não venderá mais a categoria "Papelaria"
	*@param loja_id: ID da loja
	*@param categoria_id: ID da categoria
*/
function excluiVinculo(loja_id,categoria_id,link){
	var url_ajax = "index.php?r=categoria_produto/delete";
	var dados = {"loja_id":loja_id,"categoria_id":categoria_id};
	$.post(url_ajax,dados,function(data){
		var painel = $(link).parent().parent();
		painel.fadeOut(700,function(){
			painel.remove();
		})
	}).error(function(){
		alert("Erro ao realizar requisição. Contate o desenvolvedor!");
	})
}
function disparaEventos(){
	$(".linkPesquisaLoja").on("click",function(event){
		event.preventDefault();
		var link = $(this);
		buscaLojaServidor(link);
	});
	$("#pesquisaLoja").on("keyup",function(){
		var palavra = $(this).val();
		buscaPorNomeServidor(palavra);
	});
	$("#vincular_categoria").on("click",function(){
		var loja_id = $("#loja_id").val();
		var categoria_id = $("#categoria_id").val();
		vinculaLojaCategoria(loja_id,categoria_id);
	});
	$("#salvar_dialog").on("click",function(){
		var categoria_nome = $("#categoria_dialog").val();
		adicionaCategoriaProduto(categoria_nome);
	});
	$(".excluirVinculo").on("click",function(event){
		event.preventDefault();
		var link = $(this);
		var loja_id = $("#loja_id").val();
		var categoria_id = $(this).siblings("#categoria_painel_id").val();
		excluiVinculo(loja_id,categoria_id,link);
	});
	$(".minimizarPainel").on("click",function(event){
		event.preventDefault();
		var link = $(this);
		minimizaPainel(link);
	});
}
$(document).ready(function(){
	disparaEventos();
});