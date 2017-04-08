/*ajusta o layout de onde o campo preço irá ficar na tela.
Exemplo de funcionamento em http://localhost/Projetos/ShoppingYii/web/index.php?r=gastronomia/view&id=23*/
function ajustaLayoutPreco(){
	var cardapio_item = $(".cardapio_gastronomia").find("li");
	$.each(cardapio_item,function(key,val){
		var tamNomeItem = $(val).find(".item_cardapio").text().length;
		var tamDescricaoItem = $(val).find(".descricao_cardapio").text().length;
		var total = tamNomeItem + tamDescricaoItem + 1;
		console.log(total);
		// for(var i = total; i >= 20; i++){
		// 	$(".descricao_cardapio").append(".");
		// }
		/*for(var i = total; i > 20; i++){
			$(".descricao_cardapio").after(".");
		}*/
		// for(var i = total; i <= 1800; i++){
		// 	$(".precoCardapio").before(".");
		// }
		/*beleza deu certo com $("#elemento").offset().left e $("#elemento").offset().top*/
	});
}
$(document).ready(function(){
	ajustaLayoutPreco();
});