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
}
$(document).ready(function(){
	disparaEventos();
});